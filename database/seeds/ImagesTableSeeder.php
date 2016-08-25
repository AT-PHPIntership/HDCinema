<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        // data for cinemas's image
        for($i = 1; $i <= 10; $i++){
            for($j=1;$j<=2;$j++){
                DB::table('images')->insert([
                    'name'                   => $faker-> name.'.jpg',
                    'description'            => $faker->realText($faker->numberBetween(10,100)),
                    'imageable_id'           => $i,
                    'imageable_type'         => 'App\Cinema',
                    'created_at'             => Carbon\Carbon::now()
                ]); 
            }
            
        }
        
        //data for news's image
        for($i = 1; $i <=10; $i++){
            for($j=1 ;$j<=2;$j++){
                DB::table('images')->insert([
                    'name'                   => $faker-> name.'.jpg',
                    'description'            => $faker->realText($faker->numberBetween(10,100)),
                    'imageable_id'           => $i,
                    'imageable_type'         => 'App\News',
                    'created_at'             => Carbon\Carbon::now()
                ]); 
            }
        }
        
        //data for Film's image
        for($i = 1; $i <= 10; $i++){
            for($j=1;$j<=2;$j++){
                DB::table('images')->insert([
                    'name'                   => $faker-> name.'.jpg',
                    'description'            => $faker->realText($faker->numberBetween(10,100)),
                    'imageable_id'           => $i,
                    'imageable_type'         => 'App\Film',
                    'created_at'             => Carbon\Carbon::now()
                ]); 
            }
        }
        
        //data for Advertisement's image
        for($i = 1; $i <= 10; $i++){
            for($j=1;$j<=2;$j++){
                DB::table('images')->insert([
                    'name'                   => $faker-> name.'.jpg',
                    'description'            => $faker->realText($faker->numberBetween(10,100)),
                    'imageable_id'           => $i,
                    'imageable_type'         => 'App\Advertisement',
                    'created_at'             => Carbon\Carbon::now()
                ]); 
            }
        }
    }
}
