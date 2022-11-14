<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusArr = ['En attente', 'Completé', 'Annulé', 'Erreur'];
        foreach($statusArr as $status){
            OrderStatus::create([
                'status' => $status
            ]);
        }
       
    }
}
