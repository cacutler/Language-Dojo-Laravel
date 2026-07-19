<?php
namespace Database\Factories;
use App\Models\Language;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory {
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'language_id' => Language::factory(),
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph()
        ];
    }
}
