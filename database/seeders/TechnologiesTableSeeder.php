<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $technology = new Technology();
            $technology->name = $faker->words(rand(1, 6), true);
           
            // Salva in modo permanente all'interno del DB, l'elemento appena creato
            $technology->save();
        }
    }
}
