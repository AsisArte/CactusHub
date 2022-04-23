<?php

namespace Database\Factories;
use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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
            'name' =>$this->faker->name(),
            'content' => Str::random(400),
            'slug' => Str::random(10),
        ];
    }
}
