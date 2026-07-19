<?php
namespace Database\Seeders;
use App\Models\GrammarRule;
use App\Models\SystemExample;
use Illuminate\Database\Seeder;
class SystemExampleSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        GrammarRule::all()->each(function (GrammarRule $grammarRule) {
            SystemExample::factory()->count(3)->create(['grammar_rule_id' => $grammarRule->id]);
        });
    }
}
