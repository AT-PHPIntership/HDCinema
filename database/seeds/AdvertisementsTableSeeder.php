<?php

use Illuminate\Database\Seeder;

class AdvertisementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
        	DB::table('advertisements')->insert([
        		'name'               => $faker-> username,
        		'description'        => $faker->realText($faker->numberBetween(10,100)),
        		'views'              => rand(1,100000),
        		'link'               => $faker-> url,
        		'hide'               => rand(0,1),
        		'created_at'         => Carbon\Carbon::now()
        	]);
        }
    }
}
