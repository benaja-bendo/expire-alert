<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificat>
 */
class CertificatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'file' => fake()->url(), //fake()->file(),
            'expirated_at' => fake()->dateTimeBetween('now', '+1 years'),
        ];
    }
}
