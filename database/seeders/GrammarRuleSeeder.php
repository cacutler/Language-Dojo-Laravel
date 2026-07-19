<?php
namespace Database\Seeders;
use App\Models\Course;
use App\Models\GrammarRule;
use Illuminate\Database\Seeder;
class GrammarRuleSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Course::all()->each(function (Course $course) {
            GrammarRule::factory()->count(5)->create(['course_id' => $course->id]);
        });
    }
}
