<?php

namespace Database\Seeders;

use App\Models\Allergen;
use Faker\Factory;
use App\Models\HistoryMeal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HistoryMealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        $ingredient = [];



        for($i = 0; $i < 5; $i++) {
            array_push($ingredient, $faker->sentence());
        }

        for($i = 0; $i < 30; $i++) {
            HistoryMeal::create([
                'name' => $faker->sentence(),
                'ingredients' => json_encode($ingredient),
                'description' => "Bien des gens affectionnent le poulet au beurre; c’est un véritable régal. Sa sauce tomate crémeuse et légèrement épicée en fait un repas accessible, même pour les palais les plus difficiles. Servi avec du riz moelleux et du pain naan chaud, ce plat est réconfortant à souhait!",
                'vegetarian' => $faker->boolean(),
                'gluten_free' => $faker->boolean(),
                'spicy' => $faker->randomNumber(),
                'menu_id' => rand(1, 3),
                'image_path' => "/image/MEAL.jpg"
            ]);
        }

        for($i = 0; $i < 30; $i++) {
            HistoryMeal::create([
                'name' => $faker->sentence(),
                'ingredients' => json_encode($ingredient),
                'description' => "Bien des gens affectionnent le poulet au beurre; c’est un véritable régal. Sa sauce tomate crémeuse et légèrement épicée en fait un repas accessible, même pour les palais les plus difficiles. Servi avec du riz moelleux et du pain naan chaud, ce plat est réconfortant à souhait!",
                'vegetarian' => $faker->boolean(),
                'gluten_free' => $faker->boolean(),
                'menu_id' => 4,
                'image_path' => $faker->sentence()
            ]);
        }



        foreach (HistoryMeal::all() as $meal) {
            $allergen = Allergen::inRandomOrder()->take(rand(1,5))->pluck('id');
            $meal->allergens()->attach($allergen);
        }

    }
}
