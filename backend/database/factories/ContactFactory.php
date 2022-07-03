<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email(),
            'whatsapp' => $this->faker->tollFreePhoneNumber(),
            'phone' => $this->faker->tollFreePhoneNumber(),
            'person_id' => rand(1, 20),   
        ];
    }
}
