<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "name" => ucwords($this->faker->word)
        ];
    }
}

// $factory->define(Category::class, function (Faker $faker) {
//     return [
//         "name" => ucwords($faker->word)
//     ];
// });
