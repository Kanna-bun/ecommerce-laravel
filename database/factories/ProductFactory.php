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
            'name' => $this->faker->word(7),
            'description' => $this->faker->text(150),
            'price' => $this->faker->randomFloat(2,0,1000),
            'slug' => $this->faker->word(4),
            'hot' => $this->faker->boolean(),
            'picture' => $this->faker->imageUrl(),
            'promo' => $this->faker->randomFloat(2,0,1000),
        ];
    }
}
