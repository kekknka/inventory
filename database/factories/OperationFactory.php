<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operation>
 */
class OperationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'quantity' => rand(2, 10),
            'product_id' => rand(1, 20),
            'order_id' => rand(1, 3),
            'operation_type_id' => rand(1, 2)
        ];
    }
}
