<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        return [
            'Name' => fake()->words(2,true),
            'Category' => fake()->randomElement(['Fruit','Vegetable','Pork','Beef','Chicken','Others']),
            'Description' => fake()-> sentence(10),
            'Image' => '/storage/images/placeholder.png',
            'Date_and_Time' => fake()->dateTime(),
        ];
    }
}
