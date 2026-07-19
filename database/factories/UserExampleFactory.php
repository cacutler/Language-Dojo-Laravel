<?php
namespace Database\Factories;
use App\Models\GrammarRule;
use App\Models\User;
use App\Models\UserExample;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends Factory<UserExample>
 */
class UserExampleFactory extends Factory {
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'user_id' => User::factory(),
            'grammar_rule_id' => GrammarRule::factory(),
            'custom_phrase' => fake()->sentence(),
            'translation' => fake()->sentence(),
            'romanization' => fake()->words(3, true),
            'notes' => fake()->optional()->sentence()
        ];
    }
}
