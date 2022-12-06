<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <h1>
            <a href="{{ route('beranda') }}" style="text-decoration: none; color: black;">
                Himari
            </a>
            {{-- Himari --}}
        </h1>    
    </div>
    <div class="navbar-menu-wrapper d-flex justify-content-end align-items-center">
        
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                {{ auth()->user()->name }}
            </a>
            
            <div class="dropdown-menu" style="margin-left: -2rem; margin-top: -1rem">
                
                    <form action="{{ route('logout') }}" id="logout-form" method="post">
                        @csrf        
                    </form>
                <a class="dropdown-item" style="color: black" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </div>
        </div>

    </div>

    
</nav>