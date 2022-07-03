<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Physical_PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf' => $this->faker->isbn10(),
            'birth_date' => $this->faker->dateTime(),
            'gender' => $this->faker->randomElements(['male', 'female'])[0],
            'person_id' => rand(1, 20),
        ];
    }
}
