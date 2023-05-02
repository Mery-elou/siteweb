<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\client>
 */
class clientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'c_nom' => $this->faker->name(),
            'c_prenom' => $this->faker->name(),
            'c_email' => $this->faker->unique()->safeEmail(),
            'c_password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'created_at' => now(),
        ];
    }
}
