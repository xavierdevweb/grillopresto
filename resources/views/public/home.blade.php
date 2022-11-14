@extends('public.template.base')
@section('banner_title_on', 'displayNone')
@section('title', 'Accueil')
@section('content')
    <main class="home d-flex flex-column">
        <section class="wave_top_section w-100">
            <div class="over_wave_top bg-primary">
                <div class="flex-md-column justify-content-between w-100">
                    <h1 class="mb-5 main-title">GRILL-O-PRESTO</h1>

                    <p class="mb-sm-5 mb-md-1 zindex-10">Des mets savoureux préparé par les gens d'ici pour les gens d'ici !<br /> Plats pour
                        tous, végétariens et sans glutens.</p>
                        <p class="mb-5 d-sm-none d-md-block zindex-10">Du nouveau à chaque semaine, des produits d'épicerie de qualité, <br> des repas préparés et des boîtes-repas emballantes. <br> Le tout au même prix qu'à l'épicerie</p>
                    <div class="menu-home-link-div zindex-10">
                        <a href="{{ route('menu') }}" class="btn btn-secondary fs-4 btn-scale-press">Nos menus</a>
                    </div>
                </div>
            </div>
            </div>
            <svg class="topWave w-100" id="svg" viewBox="0 0 1440 598.7" xmlns="http://www.w3.org/2000/svg">
                <path class="w-100"
                    d="M 0,600 C 0,600 0,300 0,300 C 86.16923076923078,260.5846153846154 172.33846153846156,221.16923076923075 256,240 C 339.66153846153844,258.83076923076925 420.8153846153846,335.9076923076923 507,360 C 593.1846153846154,384.0923076923077 684.4,355.2 751,320 C 817.6,284.8 859.5846153846154,243.2923076923077 940,229 C 1020.4153846153846,214.7076923076923 1139.2615384615383,227.6307692307692 1229,244 C 1318.7384615384617,260.3692307692308 1379.3692307692309,280.1846153846154 1440,300 C 1440,300 1440,600 1440,600 Z"
                    stroke="none" stroke-width="0" fill="#b40500" fill-opacity="1"
                    class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 300)">
                </path>
            </svg>
            <img class="saladeImg col-sm-4" src="./image/salade_no_bg.png" alt="Salade Image">
        </section>

        <section class="card_section w-100 p-sm-3 p-md-5">
            <div class="my-5">
                <h2 class="text-center mb-5 display-5">NOS FAVORIS DE LA SEMAINE </h2>
            </div>
            <div class="home_grid_card">

                @foreach ($meals as $meal)
                    <a class="meal_card" href="{{ route('meal', ['name' => $meal->name, 'repas' => $meal->id]) }}">
                        {{-- <div class="meal_card">                  --}}
                        <img src="{{ asset('storage/' . $meal->image_path) }}" alt="image">
                        <p>{{ $meal->name }}</p>
                        <p>{{ $meal->menu->menu_type->type }}</p>
                        {{-- </div> --}}
                    </a>
                @endforeach

            </div>
            </div>
        </section>
        <section class="engage mx-5 mt-5">
            <h2 class="text-center display-4 mb-5 mt-5 w-100">Chez Grillo-O-Prestro on s’engage à</h2>
            <div class="d-flex engage_container">
                <div class="d-flex flex-column">
                    <h3 class="text-center mb-4">Des produits de qualités</h3>
                    <div class="d-flex flex-column align-items-center m-auto">
                        <i class="fa-solid fa-carrot pe-3 mb-2 mt-2"></i>
                        <p>Du nouveau à chaque semaine : des produits d’épicerie de base et des repas préparés. Le tout
                            moins dispendieux qu’à l’épicerie et pour tous les goûts.</p>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <h3 class="text-center mb-4">Livraison rapide</h3>
                    <div class="d-flex flex-column align-items-center m-auto">
                        <i class="fa-solid fa-truck-fast pe-3 mb-2 mt-2"></i>
                        <p>Selon la région où vous vous situez, nous nous engageons à vous offrir une livraison rapide et
                            efficace pour satisfaire tous nos clients.</p>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <h3 class="text-center mb-4">Aucun frais de livraison</h3>
                    <div class="d-flex flex-column align-items-center m-auto">
                        <i class="fa-solid fa-hand-holding-dollar pe-3 mb-2 mt-2"></i>
                        <p>Il n’y a aucun frais de livraison en bas de 50km. Au dessus de 50km, des frais de livraison
                            seront facturés.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="wave_middle_section">
            <img class="chef_img" src="./image/chef.png" alt="chef">
            <img class="salade2_img" src="./image/salade_2_no_bg.png" alt="">
            <svg class="svg_top_wave"id="svg" viewBox="0 0 1440 399" xmlns="http://www.w3.org/2000/svg"
                class="transition duration-300 ease-in-out delay-150">
                <path
                    d="M 0,400 C 0,400 0,200 0,200 C 78.39299209893508,210.91377533493645 156.78598419787016,221.8275506698729 232,220 C 307.21401580212984,218.1724493301271 379.2490553074545,203.60357265544485 443,193 C 506.7509446925455,182.39642734455515 562.217794572312,175.75815870834765 618,191 C 673.782205427688,206.24184129165235 729.8797664032977,243.36379251116455 810,244 C 890.1202335967023,244.63620748883545 994.2631398144968,208.78667124699416 1059,178 C 1123.7368601855032,147.21332875300584 1149.067674338715,121.48952250085881 1206,126 C 1262.932325661285,130.5104774991412 1351.4661628306426,165.2552387495706 1440,200 C 1440,200 1440,400 1440,400 Z"
                    stroke="none" stroke-width="0" fill="#b40500" fill-opacity="1"
                    class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
            </svg>
            <div class=" bg-primary d-flex justify-content-end div_home_page_middlewave">
                <p class="text-white">Chaque semaine, notre équipe crée une variété de recettes uniques et savoureuses,
                    s’inspirant d’ingrédients frais et des nouveaux arrivages.</p>
            </div>
            <svg class="svg_bottom_wave" id="svg" viewBox="0 0 1440 399" xmlns="http://www.w3.org/2000/svg"
                class="transition duration-300 ease-in-out delay-150">
                <path
                    d="M 0,400 C 0,400 0,200 0,200 C 77.46753692889041,225.98007557540365 154.93507385778082,251.96015115080726 215,244 C 275.0649261422192,236.03984884919274 317.7272414977671,194.13947097217454 388,198 C 458.2727585022329,201.86052902782546 556.1559601511509,251.4819649604947 637,236 C 717.8440398488491,220.5180350395053 781.6489178976296,139.93266918584675 837,142 C 892.3510821023704,144.06733081415325 939.2483682583304,228.78735829611819 1008,239 C 1076.7516317416696,249.21264170388181 1167.3576090690485,184.9178976296805 1243,166 C 1318.6423909309515,147.0821023703195 1379.3211954654757,173.54105118515974 1440,200 C 1440,200 1440,400 1440,400 Z"
                    stroke="none" stroke-width="0" fill="#b40500" fill-opacity="1"
                    class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)">
                </path>
            </svg>
        </section>
        <section class="ship_range_section d-flex flex-column flex-md-row align-items-center justify-content-center py-md-3">
            <div class="w-100">
                <h2>Service de livraison sans frais dans un rayon de 50km.</h2>
                <h3>Êtes-vous admissibles ?</h3>
                <form class="d-flex flex-column" action="">
                    <input class="form-control mw-600px ms-0" id="to_places" placeholder="Entrer votre addresse" />
                    <input id="destination" name="destination" required="" type="hidden" />
                    <button type="submit"
                        class="btn btn-primary w-100 mt-4 ms-0 btn-rounded btn-scale-press mw-300px">Rechercher</button>
                </form>
            </div>
            <img class="ms-5" src="./image/girl_looking.png" alt="">

        </section>
        <section class="offer_section">
            <div class="d-flex">
                <div class="img_container me-5 w-50">
                    <img src="./image/girl_choosing.png" alt="">
                </div>
                <div class="text_container w-50">
                    <h2 class="mb-3">Nous offrons 3 types de menu complet different chaque semaine</h2>
                    <ul class="p-0">
                        <a href="{{ route('menu', 'classic') }}" class="text-decoration-none">
                            <li class="text-secondary">Menu regulier <i
                                    class="fa-solid fa-circle-arrow-right text-primary btn-scale-press"></i></li>
                        </a>
                        <a href="{{ route('menu', 'vegetarian') }}" class="text-decoration-none">
                            <li class="text-secondary">Menu Vegetarien <i
                                    class="fa-solid fa-circle-arrow-right text-primary btn-scale-press"></i></li>
                        </a>
                        <a href="{{ route('menu', 'gluten-free') }}" class="text-decoration-none">
                            <li class="text-secondary">Menu sans-Gluten <i
                                    class="fa-solid fa-circle-arrow-right text-primary btn-scale-press"></i></li>
                        </a>
                        <a class="btn btn-primary btn-rounded mt-5 btn-scale-press a_menu_home"
                            href="{{ route('menu') }}">Nos menus</a>
                    </ul>
                </div>
            </div>
        </section>
    </main>
@endsection
