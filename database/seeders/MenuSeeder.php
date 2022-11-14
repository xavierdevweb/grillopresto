<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        date_default_timezone_set("America/New_York");

        for($i = 1; $i < 4; $i++) {
            Menu::create([
                'menu_type_id' => $i,
                'start_date' => date("Y-m-d"),
                'end_date' => date("Y-m-d", strtotime(date("Y-m-d"). ' + 7 days'))
            ]);

            
        }

        for($i = 1; $i < 4; $i++) {
            
            Menu::create([
                'menu_type_id' => $i,
                'start_date' => date("Y-m-d", strtotime(date("Y-m-d"). ' - 20 days')),
                'end_date' => date("Y-m-d", strtotime(date("Y-m-d"). ' - 13 days'))
            ]);
            
        }

        
        
    }
}
