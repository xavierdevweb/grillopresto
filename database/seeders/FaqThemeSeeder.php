<?php

namespace Database\Seeders;

use App\Models\FaqTheme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqThemeArray = ['Général', 'Noël', 'Pâques', 'Saint-Valentin', 'Estival'];

        foreach($faqThemeArray as $theme){
            FaqTheme::create([
                'theme' => $theme
            ]);
        }
    }
}
