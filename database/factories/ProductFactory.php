<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text($maxNbChars = 30),
            'brand' => $this->faker->text($maxNbChars = 5),
            'type' => $this->faker->text($maxNbChars = 5),
            'mfg' => $this->faker->date(),
            'life' => $this->faker->text($maxNbChars = 5),
            'slug' => $this->faker->text(5),
            'summary' => $this->faker->text($maxNbChars = 100),
            'description' => $this->faker->text($maxNbChars = 100),
            'sku' => $this->faker->text(5),
            'price' => $this->faker->numberBetween(1000000,50000000),
            'discount' => $this->faker->numberBetween(10,80),
            'qty' => $this->faker->numberBetween(10,80),
            'img_url' => $this->faker->imageUrl(640,480,'food'),
        ];
    }
}
