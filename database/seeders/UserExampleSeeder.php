<?php
namespace Database\Seeders;
use App\Models\GrammarRule;
use App\Models\User;
use App\Models\UserExample;
use Illuminate\Database\Seeder;
class UserExampleSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        User::inRandomOrder()->limit(10)->get()->each(function (User $user) {
            GrammarRule::inRandomOrder(null)->limit(random_int(1, 3))->get()->each(function (GrammarRule $grammarRule) use ($user) {
                UserExample::factory()->create(['user_id' => $user->id, 'grammar_rule_id' => $grammarRule->id]);
            });
        });
    }
}
