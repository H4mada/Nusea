<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="/images/logo.png" alt="" />
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
              <a class="nav-linkwhite nav-linkwhite:hover" href="{{ route('home') }}"
              style="padding: 10px 20px; 
              display: inline-block; 
              border-radius: 5px;
              transition: all 0.3s ease;
              margin-right: 10px;">Home </a>
              {{-- </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('categories') }}">Categories</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li> --}}
          </ul>
        </div>
      </div>
</nav>