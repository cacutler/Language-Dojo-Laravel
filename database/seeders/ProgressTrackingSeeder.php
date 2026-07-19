<?php
namespace Database\Seeders;
use App\Models\CourseUser;
use App\Models\ProgressTracking;
use Illuminate\Database\Seeder;
class ProgressTrackingSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        CourseUser::query()->each(function (CourseUser $courseUser) {
            $courseUser->course->grammarRules->each(function ($grammarRule) use ($courseUser) {
                ProgressTracking::factory()->create([
                    'user_id' => $courseUser->user_id,
                    'grammar_rule_id' => $grammarRule->id,
                    'is_completed' => fake()->boolean(60),
                    'completed_at' => fake()->boolean(60) ? now() : null
                ]);
            });
        });
    }
}
