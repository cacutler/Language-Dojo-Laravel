<?php
namespace Database\Factories;
use App\Models\Course;
use App\Models\GrammarRule;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends Factory<GrammarRule>
 */
class GrammarRuleFactory extends Factory {
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'course_id' => Course::factory(),
            'title' => fake()->sentence(4),
            'explanation' => fake()->paragraph(),
            'difficulty_level' => fake()->randomElement(['beginner', 'intermediate', 'advanced'])
        ];
    }
    public function beginner(): static {
        return $this->state(fn (array $attributes) => ['difficulty_level' => 'beginner']);
    }
    public function intermediate(): static {
        return $this->state(fn (array $attributes) => ['difficulty_level' => 'intermediate']);
    }
    public function advanced(): static {
        return $this->state(fn (array $attributes) => ['difficulty_level' => 'advanced']);
    }
}
