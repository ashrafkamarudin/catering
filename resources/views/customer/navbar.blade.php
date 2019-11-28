<!--================ Header Menu Area start =================-->
<header class="header_area">
<div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container box_1620">

        <a class="navbar-brand logo_h" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
        <ul class="nav navbar-nav menu_nav justify-content-end">
            <li class="nav-item {{ Request::is('/') || Request::is('home') ? 'active' : '' }}"><a class="nav-link" href="/">Home</a></li>
            <li class="nav-item {{ Request::is('package') ? 'active' : '' }}"><a class="nav-link" href="/package">Packages</a></li>
            @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @if (Route::has('register'))
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @endif
            @else
            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">{{ Auth::user()->name }}</a>
                <ul class="dropdown-menu">

                    <li class="nav-item"><a class="nav-link" href="{{ route('manage:dashboard') }}">Dashboard</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                  </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                  </form>
                </ul>
			</li>
            @endguest
            <li class="nav-item"><a href="{{ route('order:list') }}" class="nav-link"><i class="fas fa-shopping-cart" style="color:black"></i></a></li>
            
          
        </ul>
        </div> 
    </div>
    </nav>
</div>
</header>
<!--================Header Menu Area =================-->