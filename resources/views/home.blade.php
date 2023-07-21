@extends('layouts.home')
@section('content')
<!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('home/img/carousel-1.jpg') }}" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7 text-start">
                                <p class="fs-4 text-white animated slideInRight">Welcome to
                                    <strong>KANTOOR DELEN</strong>
                                </p>
                                <h1 class="display-1 text-white mb-4 animated slideInRight">Office Space Sharing Solutions</h1>
                                <a href="{{ route('contact') }}" class="btn btn-primary rounded-pill py-3 px-5 animated slideInRight">Explore
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('home/img/carousel-2.jpg') }}" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-lg-7 text-end">
                                <p class="fs-4 text-white animated slideInLeft">Welcome to <strong>KANTOOR DELEN</strong>
                                </p>
                                <h1 class="display-1 text-white mb-5 animated slideInLeft">Ready to optimize Your
                                    Business</h1>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Explore
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

<!-- Project Start -->
<div class="container-xxl pt-5">
    <div class="container">
        <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s" style="">
            <p class="fs-5 fw-medium text-primary">Locations</p>
            <h1 class="display-5 mb-5">Awesome Companies are sharing their space</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
            @for ($i = 0; $i < count($companies); $i++)
            <div class="project-item mb-5">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @for ($j = 0; $j < count($companies[$i]['images']); $j++)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Can you see that"></button>
                        @endfor
                    </div>
                    <div class="carousel-inner">
                        @for ($j = 0; $j < count($companies[$i]['images']); $j++)
                        <div class="carousel-item @if($j == 0) active @endif">
                            <img src="{{ asset('storage/'. $companies[$i]["images"][$j] ) }}" class="d-block w-100" style="height: 177px; object-fit: cover;">
                        </div>
                        @endfor
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div>
                    <h4>{{$companies[$i]->company_name}}</h4>
                    <p>{{$companies[$i]->street}}, {{$companies[$i]->city}}, {{$companies[$i]->country}}, {{$companies[$i]->postal_code}}</p>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
<!-- Project End -->
@endsection

@section('scripts')
<script>
    let companies = JSON.parse(`<?php echo $companies ?>`);
    console.log(companies);
    companies.forEach(company => {
        company.images.forEach(imageName => {

        })
    });
</script>
@endsection