<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Order::create([
            'user_id' => 1,
            'prenom' => 'Benoit',
            'nom' => 'On-rails',
            'rue' => 'Du Cégep',
            'no_porte' => '475',
            'appartement' => '2',
            'code_postal' => 'g12-2e4',
            'ville' => 'Shebrooke',
            'telephone' => '819-444-4444',
            'email' => 'client@hotmail.com',
            'menu_id' => 1,
            'price' => '140',
            'order_number' => '3LN4HKLQYEBJABCL0HP7DPBY',
            'order_status_id' => '1',
            'portion_id' => '2',
            // 'meals' => json_encode([
            //     [
            //         "name" => "Pate-Chinois",
            //         "ingrediants" => ['Patate', 'Boeuf', 'Mais'],
            //         "description" => "Est-ce que le pâté chinois est santé ? Résultats de recherche d'images pour « pate chinois » Le pâté chinois est un plat relativement équilibré (à première vue) en raison de ses 277 kcal/100 g. Il contient 22,5 de protéines, 31,5 g de glucides, 3,4 g de sucre et 7,2 g de matières grasses. Consommé en grande quantité (200 g par repas), il vous fera prendre 1 kg en à peine une semaine.",
            //         "vegetarian" => false,
            //         "gluten_free" => false,
            //         "spicy" => 0,
            //         'allergens' => ['Oeufs', 'Laitier'],
            //         "image_path" => "./none"
            //     ], [
            //         "name" => "Poulet au beurre",
            //         "ingrediants" => ['Poulet', 'Riz', 'Beurre', 'Epices'],
            //         "description" => "Bien des gens affectionnent le poulet au beurre; c’est un véritable régal. Sa sauce tomate crémeuse et légèrement épicée en fait un repas accessible, même pour les palais les plus difficiles. Servi avec du riz moelleux et du pain naan chaud, ce plat est réconfortant à souhait!",
            //         "vegetarian" => false,
            //         "gluten_free" => true,
            //         "spicy" => 0,
            //         'allergens' => ['Gluten', 'Noix'],
            //         "image_path" => "./none"
            //     ]
            // ])
            'meals' => json_encode([21,22,24,25,29])
        ]);
    }
}
