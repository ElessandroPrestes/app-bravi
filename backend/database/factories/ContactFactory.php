<?php

namespace Database\Factories;

use App\Models\Person;
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
            'person_id' => function(){
                return Person::factory()->create()->id;
            }  
        ];
    }
}
