<nav class="navbar sticky-top navbar-expand-lg bg-white shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="{{ route('home') }}">
            🍜 Bistro <span>Bliss</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">Home</a></li>

               <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active fw-bold' : '' }}" href="{{ route('about') }}">About</a></li>
  
               <li class="nav-item">
  <a class="nav-link {{ request()->routeIs('menu.index') ? 'active fw-bold' : '' }}" 
     href="{{ route('menu.index', 'all') }}">
     Menu
  </a>
</li>

              
     <li class="nav-item">
    @if(Auth::check() && Auth::user()->is_admin)
        <a class="nav-link {{ request()->routeIs('admin.contact.index') ? 'active fw-bold' : '' }}" 
           href="{{ route('admin.contact.index') }}">
            Contact
        </a>
    @else
        <a class="nav-link {{ request()->routeIs('contact.form') ? 'active fw-bold' : '' }}" 
           href="{{ route('contact.form') }}">
            Contact
        </a>
    @endif
</li>



              
           @auth
    @if(Auth::user()->role === 'admin')
    
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active fw-bold' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a></li>

    @endif
@endauth

                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>

            <a class="btn btn-outline-dark rounded-pill px-4 py-2" href="{{ route('book.create') }}">Book A Table</a>
        </div>
    </div>
</nav>
