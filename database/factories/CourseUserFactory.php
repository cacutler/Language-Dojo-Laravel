<?php
namespace Database\Factories;
use App\Models\Course;
use App\Models\User;
use App\Models\CourseUser;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends Factory<CourseUser>
 */
class CourseUserFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'user_id' => User::factory(),
            'course_id' => Course::factory(),
            'current_status' => 'not_enrolled'
        ];
    }
    public function enrolled(): static {
        return $this->state(fn (array $attributes) => ['current_status' => 'enrolled']);
    }
    public function completed(): static {
        return $this->state(fn (array $attributes) => ['current_status' => 'completed']);
    }
}
