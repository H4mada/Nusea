<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
      data-aos-duration="50"
    >
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="/images/logo.png" alt="logo" style="max-width: 266px; max-height: 70px; margin-left: 70px;"  />
        </a>
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="/images/tag.png" alt="logo" style="max-width: 266px; max-height: 70px; margin-left: 70px;"  />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home') }}">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('categories') }}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">About</a>
            </li>
            @guest
                <li class="nav-item">
                  <a
                  class="nav-linkblue nav-linkblue:hover" 
                  href="{{ route('login') }}"
                  style="padding: 10px 20px; 
                          display: inline-block; 
                          border-radius: 5px;
                          transition: all 0.3s ease;
                          margin-right: 10px;"
                  >Sign In</a>
                               </li>
                <li class="nav-item">
                    
                        <a class="nav-linkwhite nav-linkwhite:hover" 
                        href="{{ route('register') }}" 
                        style="padding: 10px 20px; 
                           display: inline-block; 
                           border-radius: 5px;
                          transition: all 0.3s ease;
                        ">
                        Sign Up
                     </a>
                </li>
            @endguest
          </ul>

          @auth
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                <a
                    class="nav-linkwhite"
                    href="#"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                    style="padding: 10px 20px; 
                          display: inline-block; 
                          border-radius: 5px;
                          transition: all 0.3s ease;
                          margin-right: 10px;"
                    padding="10px"
                    boarder-radius="10px"
                >
                   {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="dropdown-item" href="{{ route('dashboard-settings-account') }}">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-inline-block mt-2" href="{{ route('cart') }}">
                        @php
                            $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                        @endphp

                        @if ($carts > 0)
                          <img src="/images/icon-cart-filled.svg" alt="" />
                            <div class="cart-badge">{{ $carts }}</div>
                        @else
                          <img src="/images/icon-cart-empty.svg" alt="" />
                        @endif
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav d-block d-lg-none">  
                <li class="nav-item"></li>
                    <a class="nav-link" href="#">
                        Hi, {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-inline-block" href="#">
                        Cart
                    </a>
                </li>
            </ul>
            
          @endauth
        </div>
      </div>
    </nav>
