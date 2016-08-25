<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $citys=array('Đà Nẵng', 'Huế', 'Quảng Nam', 'Quảng Bình', 'Sài Gòn', 'Hà Nội',
         'Nam Định', 'Bình Định', 'Nghệ An', 'Hải Phòng');
        $streets=array('Lê Duẫn', 'Phan Châu Trinh', 'Trần Phú', 'Ngô Quyền', 'Hùng Vương',
         'Lê Đình Dương', 'Bạch Đằng', 'Thái Phiên', 'Điện Biên Phủ', 'Nguyễn Văn Linh');
        for($i = 0; $i < 10; $i++){
            $address=rand(10,70).' '.$faker-> randomElement($array = $streets).', '.$faker-> randomElement($array = $citys);
        	DB::table('users')->insert([
        		'username'        => $faker-> username,  
        		'password'        => bcrypt('456789'),
        		'admins_id'       => rand(1,10),
        		'fullname'        => $faker-> name,
        		'tel'             => $faker-> phoneNumber,
        		'address'         => $address,
        		'block'           => '0',
        		'image'           => $faker-> image, 
        		'created_at'      => Carbon\Carbon::now()
        	]);
        }
    }
}
