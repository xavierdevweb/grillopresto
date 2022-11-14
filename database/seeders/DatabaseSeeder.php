<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MenuTypeSeeder::class,
            PortionSeeder::class,
            MenuSeeder::class,
            AllergenSeeder::class,
            RoleSeeder::class,
            InfoUserSeeder::class,
            UserSeeder::class,
            TicketStatusSeeder::class,
            TicketTypeSeeder::class,
            TicketSeeder::class,
            MessageSeeder::class,
            OrderStatusSeeder::class,
            OrderSeeder::class,
            FaqThemeSeeder::class,
            FaqSeeder::class,
            ChartPriceSeeder::class,
            MealSeeder::class,
            CreditcardSeeder::class,
            TicketMessageNotificationSeeder::class
        ]);
    }
}
