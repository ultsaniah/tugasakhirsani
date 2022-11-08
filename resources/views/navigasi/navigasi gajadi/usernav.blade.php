{{-- FONT --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Eczar&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300&display=swap" rel="stylesheet">
<style>
    .judul{
        font-family: 'Eczar', serif;
        font-size: 25px;
    }
    .isi{
        font-family: 'Fira Sans', sans-serif;
    }
</style>

<nav class="navbar d-flex justify-content-between sticky-top w-100 navbar-expand-lg" style="background-color: #798657;">
    <div class="container-fluid" style="margin-left: 25px; margin-right: 25px;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse judul" id="navbarSupportedContent" style="color: white">
            Himari Craft
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active isi" style="color: white" aria-current="page" href="{{ url('beranda') }}">Beranda</a>
                    <li class="nav-item">
                        <a class="nav-link isi" style="color: white" href="{{ url('produk') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link isi" style="color: white" href="#">Kontak</a>
                    </li>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @guest
                <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link isi" href="{{ route('login') }}" style="color: white">Login</a>
                    </li>
                </li>
                <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link isi" href="{{ route('register') }}" style="color: white">Register</a>
                    </li>
                </li>
                @endguest
                @auth                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">Edit Profile</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" id="logout-form" method="post">
                                @csrf        
                            </form>
                            <a class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>