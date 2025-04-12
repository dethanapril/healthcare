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


<!-- FAQ Start -->
<div class="container-fluid faq py-3 bg-light" id="faq">
    <div class="container py-3">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h1 class="mb-5 display-3">Pertanyaan yang Sering Diajukan</h1>
        </div>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item wow fadeIn" data-wow-delay="0.1s">
                <h2 class="accordion-header" id="faqHeadingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                        Apa itu BabyCare?
                    </button>
                </h2>
                <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        BabyCare adalah platform optimasi gizi balita berbasis algoritma Differential Evolution (DE) yang bertujuan untuk membantu orang tua dalam menentukan kombinasi bahan makanan terbaik untuk balita mereka.
                    </div>
                </div>
            </div>
            <div class="accordion-item wow fadeIn" data-wow-delay="0.2s">
                <h2 class="accordion-header" id="faqHeadingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                        Bagaimana cara kerja BabyCare?
                    </button>
                </h2>
                <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        BabyCare bekerja dengan mengumpulkan data balita Anda seperti usia, berat badan, dan tinggi badan, serta informasi bahan makanan yang dapat Anda siapkan. Sistem kemudian melakukan optimasi menu makanan yang sesuai dengan kebutuhan gizi balita Anda menggunakan algoritma Differential Evolution.
                    </div>
                </div>
            </div>
            <div class="accordion-item wow fadeIn" data-wow-delay="0.3s">
                <h2 class="accordion-header" id="faqHeadingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                        Apakah BabyCare gratis?
                    </button>
                </h2>
                <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Ya, BabyCare dapat digunakan secara gratis oleh semua orang tua yang ingin memastikan kebutuhan gizi balita mereka terpenuhi dengan baik.
                    </div>
                </div>
            </div>
            <div class="accordion-item wow fadeIn" data-wow-delay="0.4s">
                <h2 class="accordion-header" id="faqHeadingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">
                        Bagaimana cara mendaftar di BabyCare?
                    </button>
                </h2>
                <div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Anda dapat mendaftar di BabyCare dengan mengunjungi halaman pendaftaran di situs web kami dan mengisi formulir pendaftaran dengan informasi yang diperlukan.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQ End -->
@endsection
