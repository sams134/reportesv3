<?php

use App\Motor;
use Faker\Factory;
use Illuminate\Database\Seeder;


class MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($factory_counter = 0; $factory_counter < 100; $factory_counter++){
            $motor = new Motor();
            $faker = Factory::create();
            $motor->year = "2M21";
            $motor->os = $faker->unique()->numberBetween(1,2000)."";
            $motor->hp = $faker->numerify('##.#');
            $motor->serie = $faker->bothify('###??-####/19## - ?');
            $motor->hpkw = $faker->numberBetween(0,1);
            $motor->marca = $faker->randomElement($array = array ('a','b','c'));
            $motor->fecha_ingreso = $faker->dateTimeBetween($startDate = '-4 months', $endDate = 'now', $timezone = null);
            $motor->save();
        }
        
    }
}
