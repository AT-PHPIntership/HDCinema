<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(CinemasTableSeeder::class);
        $this->call(DaysTableSeeder::class);
        $this->call(TimesTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(TypeFilmsTableSeeder::class);
        $this->call(AdvertisementsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FilmsTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(SchedulesTableSeeder::class);
        $this->call(SeatsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
