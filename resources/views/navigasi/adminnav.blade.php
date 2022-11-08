<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <h1>Himawari</h1>    
    </div>
    <div class="navbar-menu-wrapper d-flex justify-content-end align-items-center">
        <div>
            <form action="{{ route('logout') }}" id="logout-form" method="post">
                @csrf        
            </form>
            <a class="text-primary" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                Logout
            </a>
        </div>
    </div>
</nav>