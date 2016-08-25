<?php

use Illuminate\Database\Seeder;
use App\Film;
use App\Comment;

class CommentsTableSeeder extends Seeder
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
            DB::table('comments')->insert([
                'content'            => $faker-> realText($faker->numberBetween(10,100)),
                'parent_id'          => '',
                'films_id'           => rand(1,5),
                'users_id'           => rand(1,10),
                'created_at'         => Carbon\Carbon::now()
            ]);
        }
        for($j=0;$j< 20; $j++){
            $parent_id= rand(1,10);
            $films_id=DB::table('comments')->where('id', $parent_id)->value('films_id');
            DB::table('comments')->insert([
                'content'            => $faker-> realText($faker->numberBetween(10,100)),
                'parent_id'          => $parent_id,
                'films_id'           => $films_id,
                'users_id'           => rand(1,10),
                'created_at'         => Carbon\Carbon::now()
            ]);
        }
    }
}
