<?php

namespace Database\Seeders;

use App\Models\ChartPrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChartPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //classic
        ChartPrice::create([
            'portion_id' => 1,
            'menu_type_id' => 1,
            'price' => 8,
        ]);
        ChartPrice::create([
            'portion_id' => 2,
            'menu_type_id' => 1,
            'price' => 14,
        ]);
        ChartPrice::create([
            'portion_id' => 3,
            'menu_type_id' => 1,
            'price' => 24,
        ]);

        

        //vege
        ChartPrice::create([
            'portion_id' => 1,
            'menu_type_id' => 2,
            'price' => 7,
        ]);
        ChartPrice::create([
            'portion_id' => 2,
            'menu_type_id' => 2,
            'price' => 12,
        ]);
        ChartPrice::create([
            'portion_id' => 3,
            'menu_type_id' => 2,
            'price' => 20,
        ]);





        ChartPrice::create([
            'portion_id' => 1,
            'menu_type_id' => 3,
            'price' => 9,
        ]);
        ChartPrice::create([
            'portion_id' => 2,
            'menu_type_id' => 3,
            'price' => 16,
        ]);
        ChartPrice::create([
            'portion_id' => 3,
            'menu_type_id' => 3,
            'price' => 28,
        ]);
    }
}
