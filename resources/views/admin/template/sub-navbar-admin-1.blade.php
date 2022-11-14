<nav class="nav_container mt-5 px-2">
    <ul class="d-flex justify-content-center align-items-center">
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('admin.order.index') }}">Order</a></li>
        <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                href="{{ route('admin.ticket.index', Auth::user()->id) }}">Ticket</a></li>
    </ul>
</nav>