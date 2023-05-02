<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\produit>
 */
class produitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom_produit' => $this->faker->text(),
            'prix' => $this->faker->numberBetween(),
            'Quantite' => $this->faker->numberBetween(),
            'categorie'=> $this->faker->text(),
            'path'=> $this->faker->image(),
            'created_at' => now(),
        ];
    }
}
