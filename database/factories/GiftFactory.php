<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gift>
 */
class GiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'unit_price'=>$this->faker->randomNumber(2),
            'units_owned'=>$this->faker->randomNumber(3),
            'type_id'=>$this->faker->numberBetween(1,5)
        ];
    }
}
