<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="bi bi-house-door menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/pelanggan') ? 'active' : '' }}" href="{{ route('admin.pelanggan') }}">
                <span class="menu-title">Pelanggan</span>
                <i class="bi bi-house-door menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/produk') ? 'active' : '' }}" href="{{ route('admin.produk') }}">
                <span class="menu-title">Produk</span>
                <i class="bi bi-house-door menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/pesanan') ? 'active' : '' }}" href="{{ route('admin.pesanan') }}">
                <span class="menu-title">Pesanan</span>
                <i class="bi bi-house-door menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/retur') ? 'active' : '' }}" href="{{ route('admin.retur') }}">
                <span class="menu-title">Retur</span>
                <i class="bi bi-house-door menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="menu-title">Laporan</span>
                <i class="bi bi-house-door menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>