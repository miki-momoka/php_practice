<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PrefectureTableSeeder::class);
        $this->call(Q1TableSeeder::class);
        $this->call(Q2TableSeeder::class);
    }
}
