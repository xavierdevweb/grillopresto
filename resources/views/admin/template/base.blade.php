@include('admin.template.head')
@include('admin.template.navbar')
<div class="w-100 banner p-5 d-sm-none d-md-block">
    <h2 class="text-center text-black fw-bold"> @yield('banner-title')</h2>
</div>
@yield('content')
@include('admin.template.footer')