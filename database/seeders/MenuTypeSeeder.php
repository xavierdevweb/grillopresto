<?php

namespace Database\Seeders;

use App\Models\MenuType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuType::create([
            'type' => 'Classique',
        ]);
        MenuType::create([
            'type' => 'Végétarien',
        ]);
        MenuType::create([
            'type' => 'Sans Gluten',
        ]);
    }
}
