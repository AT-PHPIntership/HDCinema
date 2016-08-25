<?php

use Illuminate\Database\Seeder;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	DB::table('days')->insert([
    		'name'             => '2016-8-28',
    		'created_at'       => Carbon\Carbon::now()
    	]);

    	DB::table('days')->insert([
    		'name'             => '2016-8-29',
    		'created_at'       => Carbon\Carbon::now()
    	]);

    	DB::table('days')->insert([
    		'name'             => '2016-8-30',
    		'created_at'       => Carbon\Carbon::now()
    	]);
    }
}
