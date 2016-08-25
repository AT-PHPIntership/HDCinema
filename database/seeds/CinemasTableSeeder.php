<?php

use Illuminate\Database\Seeder;

class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $cinemas=array('Đà Nẵng', 'Huế', 'Quảng Nam', 'Quảng Bình', 'Sài Gòn', 'Hà Nội',
         'Nam Định', 'Bình Định', 'Nghệ An', 'Hải Phòng');
        $streets=array('Lê Duẫn', 'Phan Châu Trinh', 'Trần Phú', 'Ngô Quyền', 'Hùng Vương',
         'Lê Đình Dương', 'Bạch Đằng', 'Thái Phiên', 'Điện Biên Phủ', 'Nguyễn Văn Linh');
        for($i = 0; $i < 10; $i++){
            $address=rand(10,70).' '.$faker-> randomElement($array = $streets);
            DB::table('cinemas')->insert([
                'name'                 => $cinemas[$i],
                'address'              => $address,
                'tel'                  => $faker-> phoneNumber,
                'description'          => $faker->realText($faker->numberBetween(10,100)),
                'created_at'           => Carbon\Carbon::now()
            ]);
        }
    }
}
