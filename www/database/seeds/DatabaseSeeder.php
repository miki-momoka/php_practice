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
        $this->call(PrefecturesTableSeeder::class);
        $this->call(Quest1sTableSeeder::class);
        $this->call(Quest2sTableSeeder::class);
    }
}
