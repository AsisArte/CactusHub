<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'content'=> Str::random(150),
            'slug' => Str::random(10),
        ];
    }
}
