@include('public.template.head')
@include('public.template.navbar')


    <div class="w-100 banner p-5 d-sm-none d-md-block @yield('banner_title_on')">
        <h2 class="text-center text-black fw-bold"> @yield('banner-title')</h2>
    </div>



@yield('content')

@include('public.template.footer')
