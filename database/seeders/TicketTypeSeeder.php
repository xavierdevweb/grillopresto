<?php

namespace Database\Seeders;

use App\Models\TicketType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeArray = ['Paiement refusé', 'Commande non reçu', 'Support', 'Problème de commande'];

        foreach($typeArray as $type){
            TicketType::create([
                'type' => $type
            ]);
        }
    }
}
