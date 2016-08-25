<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Film;
use App\Day;
use App\Time;
use App\Cinema;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $users = User::all();
        $films= Film::all();
        $days= Day::all();
        $times= Time::all();
        $cinemas= Cinema::all();
        $cinema=array();
        for($i=0; $i<count($cinemas); $i++){
            array_push($cinema, $cinemas[$i]['name']);
        }
        $time=array();
        for($i=0; $i<count($times); $i++){
            array_push($time, $times[$i]['time']);
        }
        $date=array();
        for($i=0; $i<count($days); $i++){
            array_push($date, $days[$i]['name']);
        }
        $films_id= array();
        for($i=0; $i<count($films); $i++){
        	array_push($films_id, $films[$i]['id']);
        }
        $character= array('A','B','C','D','E','F','H','I');
        $seats=array();
        for($k=0; $k<count($character);$k++){
            for($j=1;$j<=10;$j++){
                array_push($seats, $character[$k].$j );
            }
        }
        $quantity = 2;
        foreach($users as $user){
        for($j=0;$j<2;$j++){
        	$seat=$faker-> randomElements($array = $seats, $count = 2);
            $seat= implode(',', $seat);
        	DB::table('bookings')->insert([
                'users_id'         => $user-> id,
                'films_id'         => $faker-> randomElement($array = $films_id),
                'identitycard'     => $faker-> isbn10,
                'cinema'          => $faker-> randomElement($array = $cinema),
                'quantity'        => $quantity,
                'date'            => $faker-> randomElement($array = $date),
                'time'            => $faker-> randomElement($array = $time),
                'seat'            => $seat,
                'created_at'      => Carbon\Carbon::now()
            ]);
        }
            
        
        }
    }
}
