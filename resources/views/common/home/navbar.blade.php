<!-- Navbar Start -->
<div class="container-fluid bg-white sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
            <a href="index.html" class="navbar-brand d-lg-none">
                <h1 class="fw-bold m-0">KANTOOR DELEN</h1>
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ Route::is('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link {{ Route::is('about') ? 'active' : '' }}">About</a>
                    <a href="{{ route('contact') }}" class="nav-item nav-link {{ Route::is('contact') ? 'active' : '' }}">Contact</a>
                </div>
                <div class="ms-auto d-none d-lg-block">
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-2 px-3">Request/Share Space</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->