<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personne>
 */
class PersonneFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->unique()->firstName(),
            'prenom' => fake()->unique()->lastName(),
            'statut' => fake()->randomElement(['etudiant', 'professeur']),
            'photo' => null,
            'age' => fake()->rand(16, 100),
            'sexe' => fake()->randomElement(['male', 'femelle'])
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         // 'email_verified_at' => null,
    //     ]);
    // }
}
