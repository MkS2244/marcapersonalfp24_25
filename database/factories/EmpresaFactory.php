<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nif' => fake()->unique()->randomNumber(8, true) . fake()->randomLetter() . fake()->randomNumber(1, true),
            'nombre' => fake()->company(),
            'email' => fake()->unique()->safeEmail(),
            'token' => Str::random(10),
            'user_id' => fake()->numberBetween(1, 10)
        ];
    }
}
