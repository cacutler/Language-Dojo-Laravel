<?php

namespace Database\Factories;
use App\Models\GrammarRule;
use App\Models\SystemExample;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SystemExample>
 */
class SystemExampleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grammar_rule_id' => GrammarRule::factory(),
            'phrase' => fake()->sentence(),
            'translation' => fake()->sentence(),
            'romanization' => fake()->words(3, true)
        ];
    }
}
