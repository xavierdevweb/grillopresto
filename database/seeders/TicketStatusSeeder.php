<?php

namespace Database\Seeders;


use App\Models\TicketStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
        $statusArray = ['Ouvert', 'Fermé', 'Expiré', 'Non-résolu'];

        foreach($statusArray as $status){
            TicketStatus::create([
                'status' => $status
            ]);
        }
    }
}
