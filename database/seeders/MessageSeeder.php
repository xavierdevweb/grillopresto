<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Message::create([
                'response' => 'Salut! Nous sommes vraiment désolé. Nous allons vous envoyer une nouvelle commande! Merci',
                'user_role' => 'Admin',
                'user_id' => 2,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => "Ok, Merci. J'ai payé par Mastercard. Est-ce possible d'avoir un remboursement sur ce mode de paiement?",
                'user_role' => "Client",
                'user_id' => 1,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => 'Il est tout a fait possible. Nous offrons sinon un crédit restaurant. Vous serez sur notre liste de priorités pour la livraison. Au plaisir',
                'user_role' => 'Admin',
                'user_id' => 2,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => "Je preferes un remboursement sur ma carte de crédit. Merci",
                'user_role' => "Client",
                'user_id' => 1,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => "D'accord, le remboursement a été effectué. Il sera disponible sur votre solde dici 5-7jours ouvrables.",
                'user_role' => 'Admin',
                'user_id' => 2,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => "Merci !",
                'user_role' => "Client",
                'user_id' => 1,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => "Cela fait maintenant 5jours et je n'ai toujours pas recu le montant",
                'user_role' => "Client",
                'user_id' => 1,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => "Bonjour Benoit. Ici Johnny Crying. Je vais vous assister aujourdhui dans votre demande. Pouvez vous me donner les 4 derniers chiffres de votre carte de credit. Merci",
                'user_role' => 'Admin',
                'user_id' => 2,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => "Mastercard: 5433",
                'user_role' => "Client",
                'user_id' => 1,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => "Il y a bien un remboursement qui a été effectué. Si vous ne l'avez pas recu dans la période de grace de 7jours, veuillez-nous réécrire. Merci - Johnny Crying (Secteur Nord)",
                'user_role' => 'Admin',
                'user_id' => 2,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => "Merci chef babylonien, c'est recu! SECTEUR NORD",
                'user_role' => "Client",
                'user_id' => 1,
                'ticket_id' => 1
            ]);
            
        }
}
