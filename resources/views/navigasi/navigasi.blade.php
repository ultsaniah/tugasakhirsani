<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-4 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold text-primary ">
                    Himari Craft</h1>
            </a>
        </div>
        <div class="col-lg-5 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search ">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            @auth
            @php
                $isi = App\Models\Keranjang::where('user_id', auth()->user()->id)->where('status', 'pending')->get()->count();
            @endphp
            @else
            @php
                $isi = '';
            @endphp
            @endauth
            <a href="{{ route('keranjang') }}" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">{{ $isi }}</span>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">Himari Craft</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ route('beranda') }}" class="nav-item nav-link">Beranda</a>
                        <a href="{{ route('produk') }}" class="nav-item nav-link">Produk</a>
                        <a href="{{ route('kontak') }}" class="nav-item nav-link">Kontak</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        @guest
                        <a href="{{ route('login') }}" class="nav-item nav-link {{ Request::is('login') ? 'active' : '' }}">Login</a>
                        <a href="{{ route('register') }}" class="nav-item nav-link {{ Request::is('register') ? 'active' : '' }}">Register</a>
                        @endguest
                        @auth
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu" style="margin-left: -2rem; margin-top: -1rem">
                                <a href="{{ route('profil') }}" class="dropdown-item">Profil</a>
                                <a href="{{ route('pesanan') }}" class="dropdown-item">Pesanan</a>
                                <form action="{{ route('logout') }}" id="logout-form" method="post">
                                    @csrf        
                                </form>
                                <a class="dropdown-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Keluar
                                </a>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->