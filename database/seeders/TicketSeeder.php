<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create([
            'ticket_number' => '432151',
            'order_number' => '4324234',
            'ticket_type_id' => 2,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '332651',
            'order_number' => '24234323',
            'ticket_type_id' => 3,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '435651',
            'order_number' => '1144434',
            'ticket_type_id' => 4,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '432343',
            'order_number' => '7754354',
            'ticket_type_id' => 1,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '523424',
            'order_number' => '123333',
            'ticket_type_id' => 3,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '676132',
            'order_number' => '5234333',
            'ticket_type_id' => 2,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '132333',
            'order_number' => '2433442',
            'ticket_type_id' => 1,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '687834',
            'order_number' => '765765',
            'ticket_type_id' => 3,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '432651',
            'order_number' => '535664',
            'ticket_type_id' => 4,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);

        Ticket::create([
            'ticket_number' => '774562',
            'order_number' => '251163',
            'ticket_type_id' => 3,
            'ticket_status_id' => 4,
            'description' => "Hi, i cant click on subscribe button. Is it broken?",
            'user_id' => 1
        ]);

        Ticket::create([
            'ticket_number' => '556551',
            'order_number' => '344278',
            'ticket_type_id' => 4,
            'ticket_status_id' => 3,
            'description' => "Lorsque j'essaie de passer une commande, j'ai un erreur 404. Pourquoi?",
            'user_id' => 1
        ]);

        Ticket::create([
            'ticket_number' => '445784',
            'order_number' => '884781',
            'ticket_type_id' => 1,
            'ticket_status_id' => 2,
            'description' => "Salut! lorsque je paye avec VISA ca me dit que ce marchand ne prends pas en charge cette methode de paiement. Pourquoi?",
            'user_id' => 1
        ]);

        Ticket::create([
            'ticket_number' => '123456',
            'order_number' => '654321',
            'ticket_type_id' => 1,
            'ticket_status_id' => 1,
            'description' => "Le pate chinois que j'ai recu etait trop bon... je veux un remboursement",
            'user_id' => 1
        ]);
    }
}
