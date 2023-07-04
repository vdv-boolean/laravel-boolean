<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TravelsTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TravelsTableSeeder::class,
        ]);
    }
}
