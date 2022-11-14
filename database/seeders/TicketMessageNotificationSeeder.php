<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TicketMessageNotification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TicketMessageNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketMessageNotification::create([
            'ticket_id' => 1,
            'user_old_count' => 2,
            'user_new_count' => 2,
            'admin_old_count' => 2,
            'admin_new_count' => 3
        ]);
    }
}
