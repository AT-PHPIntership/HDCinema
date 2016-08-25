<?php

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $quantity = 3;

        for($i = 0; $i < 10; $i++){
            $names=array('Tấm Cám: The Story untold', 'Civil War', 'Bóng ma nhà hát',
             'Now You See Me', 'Tây Du Kí : Ba lần đánh bạch cốt tinh', 'Train to Busan',
              "Don"."'"."t Breathe", 'Mechanic: Resurrection', "Pete"."'"."s Dragon", 'Rằm Tháng Bảy');
        	$genres=array('Thần thoại', 'Phiêu lưu', 'Tình cảm', 'Kinh dị',
        	 'Viễn tưởng', 'Hài', 'Hoạt hình');
        	$genres=$faker->randomElements($array = $genres, $count = 2);
        	$genres=implode(',', $genres);
        	$actors=array();
        	for($j=0; $j<10; $j++){
        		array_push($actors, $faker-> name);
        	}
        	$actors=$faker->randomElements($array = $actors, $count = 3);
        	$actors=implode(',', $actors);
            DB::table('films')->insert([
                'name'            => $names[$i],
                'category_id'     => rand(1,2),
                'admins_id'       => rand(1,10),
                'genre'           => $genres,
                'actor'           => $actors,
                'director'        => $faker-> name,
                'duration'        => '01:30:00',
                'starttime'       => $faker-> date($format = 'Y-m-d', $max = 'now'),
                'image'           => $faker-> image,
                'trailer'         => $faker-> url,
                'views'           => rand(1,100000),
                'hide'            => rand(0,1),
                'type_films_id'   => rand(1,2),
                'created_at'      => Carbon\Carbon::now()
            ]);
        }
    }
}
