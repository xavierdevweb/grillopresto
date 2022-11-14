<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'question' => "Quoi faire si j'ai des allergies",
            'answer' => "Nous veillons à ce que tous nos aliments soient préparés en toute sécurité.",
            'faq_theme_id' => 1,
            'user_id' => 4,
            'is_active' => true
        ]);

        Faq::create([
            'question' => "Livrez-vous en dehors de 50km",
            'answer' => "Notre livraison est gratuite à l'intérieur de 50km mais des frais s'applique à l'extérieur",
            'faq_theme_id' => 1,
            'user_id' => 4,
            'is_active' => true
        ]);

        Faq::create([
            'question' => "Comment fonctionne la politique de remboursement",
            'answer' => "Passez nous un appel et nous vous expliqueront comment procéder avec les démarches de remboursement. Vous serez surpris par la grande souplesse de notre équipe.",
            'faq_theme_id' => 1,
            'user_id' => 4,
            'is_active' => true
        ]);

        Faq::create([
            'question' => "Offrez vous des repas spéciaux pour le temps des fêtes",
            'answer' => "Nous offront des spéciaux sur certains menus lors de la période des fêtes, vous pouvez aussi comptez sur des extras festifs pour mettre de la joie dans vos coeur.",
            'faq_theme_id' => 2,
            'user_id' => 2,
            'is_active' => true
        ]);

        Faq::create([
            'question' => "Avez-vous des offres spéciales pour les couples pendant la Saint-Valentin",
            'answer' => "Pour les couples durant cette période vous pourrez compter sur des formats spéciaux deux portions pour satisfaire vous et votre douce moitié",
            'faq_theme_id' => 4,
            'user_id' => 2,
            'is_active' => false
        ]);
    }
}
