<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Meal;
use App\Models\Allergen;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Meal::create([
            'name' => 'Gros naanwichs au bœuf au curry désordonnés',
            'ingredients' => json_encode(['Boeuf', 'Mangue', 'Épices']),
            'description' => "Sortez ces serviettes et préparez-vous à creuser dans un sandwich enveloppé de naan (ou « naanwich », si vous voulez) qui va changer votre vie ! Le bœuf épicé rehaussé de chutney de mangue est superposé sur un naan grillé doré pour un punch de saveur qui ne s'arrête pas.",
            'vegetarian' => 0,
            'gluten_free' => 0,
            'image_path' => "image/1.webp"
        ]);

        Meal::create([
            'name' => 'Soupe rapide de cannelini à la saucisse toscane',
            'ingredients' => json_encode(['Saucisse', 'Oignon', 'Ail']),
            'description' => "Qui savait que vous pouviez emballer autant de saveurs en si peu de temps ? ! Des haricots cannelini copieux et des saucisses de porc italiennes sont parfaitement équilibrés par des tomates fraîches et éclatantes et des bébés épinards. Le toast à l'ail est si bon que vous ne laisserez pas une goutte de soupe derrière vous!",
            'vegetarian' => 0,
            'gluten_free' => 0,
            'image_path' => "image/2.webp"
        ]);
        Meal::create([
            'name' => 'Saucisse épicée Arrabiatas',
            'ingredients' => json_encode(['Saucisse', 'Parmesan', 'Sauce Tomate']),
            'description' => "Arrabiata peut signifier «en colère» en italien, mais vous ne le serez pas après avoir creusé dans ces pâtes à la saucisse épicées. Une sauce tomate rustique est relevée d'épices chauffantes et une pincée de parmesan scelle l'affaire.",
            'vegetarian' => 0,
            'gluten_free' => 0,
            'image_path' => "image/3.jpg"
        ]);
        Meal::create([
            'name' => 'Boulettes de dinde aigres-douces',
            'ingredients' => json_encode(['Dinde', 'Riz', 'Oignons Verts']),
            'description' => "Tiens le téléphone! Ce plat de boulettes de viande de dinde aigre-douce est plus facile et plus rapide à préparer qu'à emporter. Les boulettes de dinde pétard et les légumes rôtis sont enrobés d'une délicieuse sauce aigre-douce et servis sur un lit de riz aux oignons verts. Une pincée d'arachides croquantes donne cette touche finale à emporter!",
            'vegetarian' => 0,
            'gluten_free' => 0,
            'image_path' => "image/4.webp"
        ]);
        Meal::create([
            'name' => 'revettes à la noix de coco à lair friteuse',
            'ingredients' => json_encode(['Crevettes', 'Oeuf', 'Riz']),
            'description' => "L'apéritif préféré de tous les crevettes à la noix de coco est transformé en un délicieux dîner. Vous serez ravis par des crevettes panées croustillantes arrosées de sauce chili-ail, et remplies de riz doré et d'une salade de mangue acidulée en accompagnement.",
            'vegetarian' => 0,
            'gluten_free' => 0,
            'image_path' => "image/5.webp"
        ]);
        Meal::create([
            'name' => 'Enchiladas de bœuf tex-mex',
            'ingredients' => json_encode(['Boeuf', 'Tomates', 'Tortillas']),
            'description' => "Préparez un petit plat tex-mex ce soir avec ces enchiladas rapides aux haricots noirs et au bœuf fumé. Pendant que le four fait son travail, vous mélangerez une crème sure au chipotle pour garnir ces fagots de bœuf délicieusement fromagés.",
            'vegetarian' => 0,
            'gluten_free' => 0,
            'image_path' => "image/6.jpg"
        ]);
        Meal::create([
            'name' => 'Bols de poulet en sauce dinspiration indienne',
            'ingredients' => json_encode(['Poulet', 'Riz', 'Yogourt']),
            'description' => "Sauce, crémeux et parfaitement épicé, ce festin d'inspiration indienne se prépare rapidement et regorge de saveurs audacieuses. Le riz doré est accompagné de poulet assaisonné recouvert d'une sauce sucrée et acidulée, le tout nappé de yogourt acidulé. Vous n'êtes qu'à 20 minutes des délices !",
            'vegetarian' => 0,
            'gluten_free' => 0,
            'image_path' => "image/7.jpg"
        ]);
        Meal::create([
            'name' => 'Burgers de bison farcis au fromage',
            'ingredients' => json_encode(['Bison', 'Ail', 'Mayonnaise']),
            'description' => "Ce ne sont pas vos hamburgers moyens! Nous avons échangé du bison contre du bœuf et farci les galettes de cheddar gluant. Ces beautés au fromage sont prises en sandwich entre des petits pains briochés au beurre recouverts d'un savoureux aïoli aux tomates séchées au soleil. Vous n'avez même pas à choisir entre salade et frites ce soir car nous servons les deux !",
            'vegetarian' => 0,
            'gluten_free' => 0,
            'image_path' => "image/8.webp"
        ]);
        Meal::create([
            'name' => 'Risotto au bœuf inspiré de la bolognaise',
            'ingredients' => json_encode(['Boeuf', 'Mirepoix', 'Épices']),
            'description' => "Un risotto qu'il ne faut pas remuer constamment ? Nous sommes tellement là pour ça ! Avec cette version, vous laissez le riz mijoter dans un bouillon savoureux, en remuant seulement de temps en temps, jusqu'à ce qu'il soit prêt à manger. Ce soir, vous n'avez pas à choisir entre les pâtes et le risotto car nous vous offrons le meilleur des deux mondes !",
            'vegetarian' => 0,
            'gluten_free' => 0,
            'image_path' => "image/9.webp"
        ]);
        Meal::create([
            'name' => 'Tacos à la dinde fumée',
            'ingredients' => json_encode(['Dinde', 'Tortilla', 'Piments']),
            'description' => "Les tacos faits maison sont un favori des soirs de semaine, et la version de ce soir utilise des épices fumées et des piments poblano pour une touche de saveur mexicaine authentique",
            'vegetarian' => 0,
            'gluten_free' => 0,
            'image_path' => "image/10.webp"
        ]);

        //

        Meal::create([
            'name' => 'Côtelettes de porc dinspiration espagnole',
            'ingredients' => json_encode(['Porc', 'Patate', 'Ketchup']),
            'description' => "Ce dîner vous apporte le bar à tapas ! Dégustez des côtelettes de porc tendres et fumées, du brocoli au beurre et des patatas bravas avec une sauce si bonne qu'elle pourrait bien être la vedette pas si secrète du plat.",
            'vegetarian' => 0,
            'gluten_free' => 1,
            'image_path' => "image/11.jpg"
        ]);

        Meal::create([
            'name' => 'Poulet au parmesan enrobé de bacon',
            'ingredients' => json_encode(['Poulet', 'Bacon', 'Mayonnaise']),
            'description' => "Enveloppé de bacon : faut-il en dire plus ? Ce soir, nous allons encore plus loin en enrobant le poulet d'une chapelure croustillante et en servant de l'aïoli à l'ail à côté pour tremper ! Une salade de roquette et d'amandes ajoute une touche de verdure pour compléter votre repas.",
            'vegetarian' => 0,
            'gluten_free' => 1,
            'image_path' => "image/12.jpg"
        ]);
        Meal::create([
            'name' => 'Poulet à lail et au poivre & pommes de terre rôties aux herbes',
            'ingredients' => json_encode(['Poulet', 'Ail', 'Patate']),
            'description' => "Tout a meilleur goût trempé dans une délicieuse sauce ! Ce soir, du poulet poêlé et poivré, des pommes de terre rôties assaisonnées et du brocoli sont à vous pour tremper dans une vinaigrette César crémeuse et de rêve.",
            'vegetarian' => 0,
            'gluten_free' => 1,
            'image_path' => "image/13.webp"
        ]);
        Meal::create([
            'name' => 'Burgers de porc tzatziki dinspiration grecque',
            'ingredients' => json_encode(['Porc', 'Patate', 'Tzatziki']),
            'description' => "La chaleur torride de Santorin inspire les saveurs fraîches de ces burgers de porc garnis de tzatziki, de tomates et d'olives. Vous associerez ces burgers de style méditerranéen à des frites cuites au four épicées.",
            'vegetarian' => 0,
            'gluten_free' => 1,
            'image_path' => "image/14.jpg"
        ]);
        Meal::create([
            'name' => 'Bols basa dinspiration méditerranéenne',
            'ingredients' => json_encode(['Basa', 'Zuchini', 'Tomates']),
            'description' => "Envie d'un peu de soleil méditerranéen ? Cette recette est exactement ce qu'il vous faut ! Un bol de couscous léger et moelleux est surmonté d'un délicieux tas de légumes rôtis, de basa poêlé et d'une sauce brillante à l'aneth et à l'ail pour compléter le tout.",
            'vegetarian' => 0,
            'gluten_free' => 1,
            'image_path' => "image/15.webp"
        ]);
        Meal::create([
            'name' => 'Pâtes au chou-fleur rôti au fromage',
            'ingredients' => json_encode(['Linguine', 'Creme', 'Epinards']),
            'description' => "Fromage et poivre - une idée simple donne de délicieux résultats dans ce favori crémeux et rêveur d'inspiration romaine. Les pâtes linguine sont étreintes d'une sauce à la crème de parmesan, avec du chou-fleur rôti doré se faufilant dans une saveur supplémentaire. Un filet d'huile de pesto sur l'assiette finale crée une chose de beauté !",
            'vegetarian' => 0,
            'gluten_free' => 1,
            'image_path' => "image/16.jpg"
        ]);
        Meal::create([
            'name' => 'Burgers de boeuf style maison',
            'ingredients' => json_encode(['Boeuf', 'Oignon', 'Salade']),
            'description' => "Ces burgers capturent l'essence des burgers classiques, avec une touche maison ! Vous garnirez des galettes de bœuf juteuses de confiture d'oignons et compléterez le repas avec des quartiers de pommes de terre croustillants saupoudrés de paprika.",
            'vegetarian' => 0,
            'gluten_free' => 1,
            'image_path' => "image/17.webp"
        ]);
        Meal::create([
            'name' => 'Tacos au bœuf épicé façon barbacoa',
            'ingredients' => json_encode(['Boeuf', 'Lime', 'Tomates']),
            'description' => "Nous avons rehaussé vos tacos de tous les jours avec une garniture fumée inspirée de la barbacoa ! La salsa fresca, le fromage feta et la crème sure apportent la touche salée et crémeuse que chaque taco mérite.",
            'vegetarian' => 0,
            'gluten_free' => 1,
            'image_path' => "image/18.jpg"
        ]);
        Meal::create([
            'name' => 'Bols de riz au porc sucrés et épicés à la japonaise',
            'ingredients' => json_encode(['Porc', 'Riz', 'Mayonnaise']),
            'description' => "Ce futur favori est un plat réconfortant dans un bol. Du riz gluant chaud et assaisonné est recouvert de porc au soja sucré, de carottes marinées brillantes et de bok choy poêlé. Un filet de mayonnaise épicée de style japonais fait maison est le secret pour atteindre le bonheur du bol de riz!",
            'vegetarian' => 0,
            'gluten_free' => 1,
            'image_path' => "image/19.jpg"
        ]);
        Meal::create([
            'name' => 'Poulet à la poêle',
            'ingredients' => json_encode(['Poulet', 'Piment', 'Mayonnaise']),
            'description' => "Pas besoin de casseroles supplémentaires ici - ce repas facile et aéré se fait sur un seul plateau ! Le poulet juteux est recouvert d'un enrobage aux herbes et cuit avec des légumes. Un aïoli à côté pour tremper égaye le tout.",
            'vegetarian' => 0,
            'gluten_free' => 1,
            'image_path' => "image/20.jpg"
        ]);

        //

        Meal::create([
            'name' => "Soupe Toscane",
            'ingredients' => json_encode(['Petites tomates', 'Oignon haché', 'Bébé épinard']),
            'description' => "Qui savait que vous pouviez emballer autant de saveurs en si peu de temps ? ! Des haricots cannelini copieux et des saucisses de porc italiennes sont parfaitement équilibrés par des tomates fraîches et éclatantes et des bébés épinards. Le toast à l'ail est si bon que vous ne laisserez pas une goutte de soupe derrière vous!",
            'vegetarian' => 1,
            'gluten_free' => 0,
            'image_path' => "image/21.jpg"
        ]);

        Meal::create([
            'name' => "Spaghetti crémeux au beurre noisette",
            'ingredients' => json_encode(['Spaghetti', 'Oignon jaune', 'Persil']),
            'description' => "Il est temps de se sentir comme un vrai chef ! Ce soir, vous remplirez vos assiettes de spaghettis mélangés à une luxueuse sauce au beurre bruni avec de savoureux champignons et oignons sautés. Si nous nous arrêtions là, le dîner serait déjà une victoire, mais vous passerez à un autre niveau en complétant ce plat de pâtes raffiné avec de la courge musquée rôtie, du parmesan et du persil frais.",
            'vegetarian' => 1,
            'gluten_free' => 0,
            'image_path' => "image/22.webp"
        ]);

        Meal::create([
            'name' => "Bols de houmous halloumi",
            'ingredients' => json_encode(['Mini concombre', 'Bébé épinard', 'Persil']),
            'description' => "Vous cherchez un bol de légumes plein de saveurs ? Cherchez pas plus loin! Ces bols vibrants contiennent du fromage halloumi poêlé et croustillant, des légumes frais et de l'houmous, le tout servi sur un délicieux couscous perlé.",
            'vegetarian' => 1,
            'gluten_free' => 0,
            'image_path' => "image/23.webp"
        ]);

        Meal::create([
            'name' => "Sloppy Joes aux lentilles fumées",
            'ingredients' => json_encode(['Petit pain artisanal', 'Oignon jaune', 'Poivron doux']),
            'description' => "Ces sloppy joes aux lentilles renferment des tonnes de saveurs de fumoir du Sud dans un emballage nutritif. Les lentilles en sauce sont recouvertes d'une salade de chou croustillante et d'aneth et d'ail, puis nichées entre deux petits pains grillés au beurre.",
            'vegetarian' => 1,
            'gluten_free' => 0,
            'image_path' => "image/24.webp"
        ]);

        Meal::create([
            'name' => "Pizzettes Mozzarella & Maïs",
            'ingredients' => json_encode(['Maïs en épi', 'Mini concombre', 'Flocons de chili']),
            'description' => "Nous ne pouvons pas nous lasser de ces pizzettes sucrées dans d'adorables portions personnelles. Le maïs grillé et la mozzarella fraîche sont un accord paradisiaque !",
            'vegetarian' => 1,
            'gluten_free' => 0,
            'image_path' => "image/25.jpg"
        ]);

        Meal::create([
            'name' => "Tortillas croustillantes d'inspiration mexicaine",
            'ingredients' => json_encode(['Coriandre', 'Oignon rouge', 'Tomate Roma']),
            'description' => "Les coquilles de tortillas croustillantes faites maison sont la base croustillante parfaite pour toutes vos garnitures à tacos préférées! Ils sont cuits au four, pas frits et prêts en un rien de temps. Empilez-les de haricots noirs copieux, de fromage fondant, de salsa de tomates et de salade de chou piquante.",
            'vegetarian' => 1,
            'gluten_free' => 0,
            'image_path' => "image/26.jpg"
        ]);

        Meal::create([
            'name' => "Ragoût épicé de pois chiches et de patates",
            'ingredients' => json_encode(['Patate douce', 'Oignon jaune', 'Bébé épinard']),
            'description' => "La saveur rencontre la nourriture dans ce bol doré de ragoût de pois chiches. Patates douces, lait de coco et épices au curry se réunissent dans un plat aromatique parfaitement satisfaisant pour une soirée agréable.",
            'vegetarian' => 1,
            'gluten_free' => 0,
            'image_path' => "image/27.webp"
        ]);

        Meal::create([
            'name' => "Salade César simple aux épinards",
            'ingredients' => json_encode(['Bébé épinard', 'Citron', 'Rouleau Ciabatta']),
            'description' => "Les épinards donnent un punch sain à cette salade César délicieusement crémeuse. Nous parions que cette délicieuse vinaigrette César maison sera votre nouveau héros de salade !",
            'vegetarian' => 1,
            'gluten_free' => 0,
            'image_path' => "image/28.jpg"
        ]);

        Meal::create([
            'name' => "Pain au fromage et à l'ail",
            'ingredients' => json_encode(['Sous-rouleau', 'Fromage cheddar râpé', 'Gousses ail']),
            'description' => "Amateurs de fromage, réjouissez-vous, le pain à l'ail de vos rêves est arrivé. Ces petits pains sont recouverts de beurre à l'ail et garnis de deux types de fromages - mozz et cheddar - puis cuits au four dans un délice fondant.",
            'vegetarian' => 1,
            'gluten_free' => 0,
            'image_path' => "image/29.webp"
        ]);

        Meal::create([
            'name' => "Soupe toscane piquante",
            'ingredients' => json_encode(['Sous-rouleau', 'Fromage cheddar râpé', 'Gousses ail']),
            'description' => "Qui savait que vous pouviez emballer autant de saveurs en si peu de temps ? ! Des haricots cannelini copieux et des saucisses de porc italiennes sont parfaitement équilibrés par des tomates fraîches et éclatantes et des bébés épinards. Le toast à l'ail est si bon que vous ne laisserez pas une goutte de soupe derrière vous!",
            'vegetarian' => 1,
            'gluten_free' => 0,
            'image_path' => "image/30.webp"
        ]);

        foreach (Meal::all() as $meal) {
            $allergen = Allergen::inRandomOrder()->take(rand(1, 5))->pluck('id');
            $meal->allergens()->attach($allergen);
        }
    }
}
