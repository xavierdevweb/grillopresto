<?php

namespace Database\Seeders;

use App\Models\Creditcard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreditcardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Creditcard::create([
            'name' => "Benoit on-rails",
            'card_number' => "4242-4242-4242-4242",
            'month' => "4",
            'year' => "2024",
            'cvc' => "433",
            'user_id' => 1
        ]);

        Creditcard::create([
            'name' => "Benoit on-rails",
            'card_number' => "5555-5555-5555-4444",
            'month' => "11",
            'year' => "2026",
            'cvc' => "174",
            'user_id' => 1
        ]);

        Creditcard::create([
            'name' => "Benoit on-rails",
            'card_number' => "3782-8224-6310-005",
            'month' => "12",
            'year' => "2024",
            'cvc' => "3663",
            'user_id' => 1
        ]);

        Creditcard::create([
            'name' => "Benoit on-rails",
            'card_number' => "6011-1111-1111-1117",
            'month' => "1",
            'year' => "2028",
            'cvc' => "743",
            'user_id' => 1
        ]);
    }
}
