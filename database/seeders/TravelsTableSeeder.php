<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Travel;

class TravelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('travels') as $travel) {

            Travel::create([

                'date'    => $travel['date'],
                'title'   => $travel['title'],
                'text'    => $travel['text'],
                'image'   => $travel['image'],
                'country' => $travel['country'],
                'address' => $travel['address'],
            ]);
        }
    }
}
