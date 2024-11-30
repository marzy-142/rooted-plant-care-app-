<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlantFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'type' => $this->faker->word(),
            'watering_interval' => $this->faker->numberBetween(1, 7),
            'fertilizing_interval' => $this->faker->numberBetween(7, 30),
            'care_tips' => $this->faker->sentence(),
             'picture' => 'https://via.placeholder.com/150'
        ];
    }
}
