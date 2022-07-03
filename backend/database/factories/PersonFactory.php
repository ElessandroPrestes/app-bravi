<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Person;

class PersonFactory extends Factory
{

    protected $model = Person::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'street' => $this->faker->streetName(),
            'streetNumber' => $this->faker->buildingNumber(),
            'neighborhood' => $this->faker->streetAddress(),
            'zipcode' =>$this->faker->ean8(),
            'city' => $this->faker->city(),
            'uf' => $this->faker->stateAbbr(),
        ];
    }
}
