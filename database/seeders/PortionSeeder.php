<?php

namespace Database\Seeders;

use App\Models\Portion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PortionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portionArray = ['1', '2', '4'];

        foreach ($portionArray as $portion) {
            Portion::create([
                'portion' => $portion
            ]);
        }
    }
}
