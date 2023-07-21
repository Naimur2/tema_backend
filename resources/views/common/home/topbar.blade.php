<!-- Topbar Start -->
<div class="container-fluid bg-primary text-white d-none d-lg-flex">
    <div class="container py-3">
        <div class="d-flex align-items-center">
            <a href="{{ route('home') }}">
                <h2 class="text-white fw-bold m-0">KANTOOR DELEN</h2>
            </a>
            <div class="ms-auto d-flex align-items-center">
                {{-- <small class="ms-4"><i class="fa fa-map-marker-alt me-3"></i>Kantoorstraat 134, 2800 Mechelen, Belgium</small>
                <small class="ms-4"><i class="fa fa-envelope me-3"></i>kantoordelen@muzamelhashimi10.be</small>
                <small class="ms-4"><i class="fa fa-phone-alt me-3"></i>+012 345 6789</small> --}}
                <div class="ms-3 d-none d-lg-block">
                    <a href="{{ route('login') }}" class="btn btn-light rounded-pill py-2 px-3">Login</a>
                </div>
                {{-- <div class="ms-3 d-flex">
                    <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href="#"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href="#"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href="#"><i
                            class="fab fa-linkedin-in"></i></a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->