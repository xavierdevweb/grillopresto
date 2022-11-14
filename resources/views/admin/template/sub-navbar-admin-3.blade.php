<nav class="nav_container mt-5 px-2">
    <ul class="d-flex justify-content-center align-items-center">
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('admin.admin.index', Auth::user()->id) }}">Admin</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('admin.client.index') }}">User</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('admin.menu.research') }}">Menu</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('admin.repas.index') }}">Repas</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('admin.order.index', Auth::user()->id) }}">Order</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('admin.ticket.index', Auth::user()->id) }}">Ticket</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('admin.faq.index', Auth::user()->id) }}">Faq</a></li>
    </ul>
</nav>
