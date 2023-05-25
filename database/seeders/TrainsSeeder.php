<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Train;


class TrainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++) {
            $train = new Train();
            $train->company = $faker->words(4, true);
            $train->departure_station = $faker->words(3, true);
            $train->arrival_station = $faker->words(3, true);
            
            // USE TO HAVE A REFERENCE STARTING DATE
            $departureTime = $faker->date();
            $train->departure_time = $departureTime . " " . $faker->time();

            // GIVE A MAXIMUM RANGE OF 2 DAYS FOR THE ARRIVAL DATE
            $arrivalTime = $faker->dateTimeInInterval($departureTime, '+2 days')->format('Y-m-d');
            $train->arrival_time = $arrivalTime . " " . $faker->time();

            $train->train_code = $faker->lexify('???') . "-" . $faker->numerify('###########');
            $train->carriages = $faker->numberBetween(1, 20);
            $train->on_time = $faker->boolean();
            $train->suppressed = $faker->boolean();
            $train->save();
        }
    }
}
