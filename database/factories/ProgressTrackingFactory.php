<?php
namespace Database\Factories;
use App\Models\GrammarRule;
use App\Models\User;
use App\Models\ProgressTracking;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends Factory<ProgressTracking>
 */
class ProgressTrackingFactory extends Factory {
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'user_id' => User::factory(),
            'grammar_rule_id' => GrammarRule::factory(),
            'is_completed' => false,
            'completed_at' => null
        ];
    }
    public function completed(): static {
        return $this->state(fn (array $attributes) => [
            'is_completed' => true,
            'completed_at' => now()
        ]);
    }
}
