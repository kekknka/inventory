<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'SKU' => fake()->ean13(),
            'name' => fake()->word(),
            'description' => fake()->paragraph(),
            'inventory_min' => rand(40, 50),
            'price_in' => fake()->randomFloat(2, 100, 1000),
            'price_out' => fake()->randomFloat(2, 1000, 2000),
            'unit' => fake()->randomElement(['Kg', 'Mg', 'L', 'ml']),
            'presentation' => fake()->randomElement(['Bolsa', 'Caja', 'Botella']),
            'user_id' => rand(1, 10),
        ];
    }
}
