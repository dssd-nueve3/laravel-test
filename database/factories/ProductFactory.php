<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->country(),
            'price' => $this->faker->randomFloat(2,1,100),
            'image' => $this->faker->word(),
            'brand_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
