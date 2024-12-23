<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/images/logo.png" alt="logo" style="max-width: 266px; max-height: 70px; margin-left: 70px;" />
        </a>
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/images/tag.png" alt="tagline" style="max-width: 266px; max-height: 70px; margin-left: 70px;" />
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
                          margin-right: 10px;">Home</a>
                </li>
                {{-- Uncomment jika ingin menambahkan kategori atau tentang --}}
                {{-- 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                --}}
            </ul>
        </div>
    </div>
</nav>
