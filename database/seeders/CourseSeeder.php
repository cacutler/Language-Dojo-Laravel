<?php
namespace Database\Seeders;
use App\Models\Course;
use App\Models\Language;
use Illuminate\Database\Seeder;
class CourseSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Language::all()->each(function (Language $language) {
            Course::factory()->count(2)->create(['language_id' => $language->id]);
        });
    }
}
