<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
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
            DB::table('news')->insert([
            	'title'              => $faker-> sentence($nbWords = 10, $variableNbWords = true),
                'content'            => $faker-> paragraph($nbSentences = 5, $variableNbSentences = true),
                'views'              => rand(1,100000),
                'hide'               => rand(0,1),
                'created_at'         => Carbon\Carbon::now()
            ]);
        }
    }
}
