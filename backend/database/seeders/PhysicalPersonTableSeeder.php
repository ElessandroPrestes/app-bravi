<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PhysicalPerson;

class PhysicalPersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhysicalPerson::factory()->count(20)->create();
    }
}
