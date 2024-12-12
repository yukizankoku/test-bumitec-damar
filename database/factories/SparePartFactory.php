<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SparePart>
 */
class SparePartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'code' => fake()->ean13(),
            'price' => fake()->randomFloat(2, 0, 100000),
            'quantity' => fake()->randomNumber(2),
            'description' => fake()->text(),
            'supplier_id' => function () {
                return Supplier::factory()->create()->id;
            },
            'category_id' => fake()->numberBetween(1, 5),
        ];
    }
}
