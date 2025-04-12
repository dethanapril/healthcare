@extends('layouts.app')
@section('content')

<!-- Spinner Start -->
<div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Navbar start -->
<div class="container-fluid border-bottom bg-light wow fadeIn" data-wow-delay="0.1s">
    <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 40px">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">123 Street, New York</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Email@Example.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-facebook-f text-secondary"></i></a>
                <a href="" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-twitter text-secondary"></i></a>
                <a href="" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-instagram text-secondary"></i></a>
                <a href="" class="btn btn-light btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in text-secondary"></i></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light navbar-expand-xl py-3">
            <a href="/" class="navbar-brand"><h1 class="text-primary display-6">Baby<span class="text-secondary">Care</span></h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Beranda</a>
                    <a href="/about" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">Tentang</a>
                    <a href="/impact" class="nav-item nav-link {{ Request::is('impact') ? 'active' : '' }}">Dampak Kekurangan Gizi</a>
                    <a href="/optimasi-gizi" class="nav-item nav-link {{ Request::is('optimasi-gizi') ? 'active' : '' }}">Optimasi Gizi</a>
                    <a href="/faq" class="nav-item nav-link {{ Request::is('faq') ? 'active' : '' }}">FAQ</a>
                </div>
                <div class="d-flex me-4">
                    <div id="phone-tada" class="d-flex align-items-center justify-content-center">
                        <a href="" class="position-relative wow tada" data-wow-delay=".9s" >
                            <i class="fa fa-phone-alt text-primary fa-2x me-4"></i>
                            <div class="position-absolute" style="top: -7px; left: 20px;">
                                <span><i class="fa fa-comment-dots text-secondary"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="d-flex flex-column pe-3 border-end border-primary">
                        <span class="text-primary">Have any questions?</span>
                        <a href="#"><span class="text-secondary">Free: + 0123 456 7890</span></a>
                    </div>
                </div>
                <button class="btn-search btn btn-primary btn-md-square rounded-circle" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-white"></i></button>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->

<!-- Events Start -->
<div class="container-fluid events py-3 bg-white" id="impact">
    <div class="container py-3">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h1 class="mb-3 display-3">Dampak dari Kekurangan Gizi</h1>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="events-item rounded p-4 border border-primary">
                    <div class="events-inner position-relative text-center pt-4">
                        <div class="events-icon mb-3">
                            <i class="fas fa-stethoscope fa-3x text-primary"></i>
                        </div>
                        <h4 class="text-dark">Masalah Kesehatan</h4>
                        <p class="text-dark">Kekurangan gizi dapat menyebabkan berbagai masalah kesehatan seperti anemia, gangguan pertumbuhan, dan penurunan sistem kekebalan tubuh.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="events-item rounded p-4 border border-primary">
                    <div class="events-inner position-relative text-center pt-4">
                        <div class="events-icon mb-3">
                            <i class="fas fa-brain fa-3x text-primary"></i>
                        </div>
                        <h4 class="text-dark">Gangguan Kognitif</h4>
                        <p class="text-dark">Kekurangan gizi dapat mempengaruhi perkembangan otak dan fungsi kognitif, yang dapat berdampak pada kemampuan belajar dan konsentrasi anak.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="events-item rounded p-4 border border-primary">
                    <div class="events-inner position-relative text-center pt-4">
                        <div class="events-icon mb-3">
                            <i class="fas fa-child fa-3x text-primary"></i>
                        </div>
                        <h4 class="text-dark">Pertumbuhan Terhambat</h4>
                        <p class="text-dark">Anak-anak yang mengalami kekurangan gizi seringkali mengalami pertumbuhan yang terhambat, baik dalam hal tinggi badan maupun berat badan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.7s">
                <div class="events-item rounded p-4 border border-primary">
                    <div class="events-inner position-relative text-center pt-4">
                        <div class="events-icon mb-3">
                            <i class="fas fa-frown fa-3x text-primary"></i>
                        </div>
                        <h4 class="text-dark">Masalah Emosional</h4>
                        <p class="text-dark">Kekurangan gizi juga dapat mempengaruhi kesehatan emosional anak, menyebabkan masalah seperti depresi, kecemasan, dan perilaku agresif.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.9s">
                <div class="events-item rounded p-4 border border-primary">
                    <div class="events-inner position-relative text-center pt-4">
                        <div class="events-icon mb-3">
                            <i class="fas fa-dna fa-3x text-primary"></i>
                        </div>
                        <h4 class="text-dark">Gangguan Metabolisme</h4>
                        <p class="text-dark">Kekurangan gizi dapat menyebabkan gangguan metabolisme yang dapat berdampak pada fungsi organ tubuh dan keseimbangan hormon.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Events End-->
@endsection
