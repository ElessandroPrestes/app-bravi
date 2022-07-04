<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Person;

class PhysicalPersonFactory extends Factory
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
            'person_id' => function () {
                return Person::factory()->create()->id;
            }
        ];
    }
}
