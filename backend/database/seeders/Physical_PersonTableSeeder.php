<?php

namespace Database\Seeders;

use App\Models\Physical_Person;
use Illuminate\Database\Seeder;

class Physical_PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Physical_Person::factory()->count(20)->create();
    }
}
