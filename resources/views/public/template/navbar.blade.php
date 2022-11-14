<nav class="navbar navbar-dark bg-primary navbar-expand-lg px-md-5 px-sm-2 py-3">
    <div class="container-fluid navbar_div">
        <a class="navbar-brand" href="{{ route('home') }}"><img width="80"
                src="{{ asset('image/logo_white_no_bg.png') }}" alt="logo"></a>
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-5 align-items-center ul_nav">
                    <li class="nav-item">
                        <a class="nav-link text-white text-sm-secondary text-lg-white header_nav_item text-align-center fs-5 btn-scale-press"
                            aria-current="page" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white header_nav_item fs-5 btn-scale-press"
                            href="{{ route('menu') }}">Menu</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white header_nav_item fs-5 btn-scale-press"
                            href="{{ route('faq.index') }}">Support</a>
                    </li>
                </ul>
                <div class="d-flex gap-3 align-items-center flex-sm-column flex-lg-row">
                    <a href="{{ route('cart') }}" class="text-secondary"><i
                            class="fa-solid fa-cart-shopping fs-5 me-3 color-primary nav_cart btn-scale-press"></i></a>



                    <?php if(Auth::user()){
                        if ((Auth::user()->role->role == "Admin_1" || Auth::user()->role->role == "Admin_2" || Auth::user()->role->role == "Admin_3")){?>
                    <a href="{{ route('admin.ticket.index', Auth::user()->id) }}" class="text-secondary"><i
                            class="fa-solid fa-user fs-5 me-3 color-primary nav_cart btn-scale-press"></i></a>
                    <?php }else {?>
                    <a href="{{ route('user.edit.info', Auth::user()->id) }}" class="text-secondary"><i
                            class="fa-solid fa-user fs-5 me-3 color-primary nav_cart btn-scale-press"></i></a>
                    <?php }
                        } ?>
                    <?php if(Auth::user()){ ?>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-secondary btn-scale-press">Deconnexion</button>
                    </form>
                    <?php } else {
                                    ?>
                    <a class="btn pink fs-4 btn-scale-press" id="home-login-btn"
                        href="{{ route('login') }}">Connexion</a>
                    <a class="btn home-register-btn btn-secondary fs-4 btn-scale-press"
                        href="{{ route('register') }}">Inscription <i class="fa fa-arrow-right"></i></a>
                    <?php
                                }?>


                </div>

            </div>
        </div>
    </div>
</nav>
