<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->bothify('??###'), // Random 5 digit code, e.g., AB123
            'brand' => $this->faker->company,
            'city' => $this->faker->city,
            'email' => $this->faker->email,
            'telp' => $this->faker->phoneNumber,
            'address' => $this->faker->address,      // Fake address
            'area' => $this->faker->numberBetween(100, 1000), // Random area in square meters
        ];
    }
}
