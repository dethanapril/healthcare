@extends('layouts.app')
@section('content')
<style>
    .icon-wrapper {
        transition: transform 0.3s ease;
    }
    
    .hover-effect:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(45deg, #4b6cb7, #182848);
    }
    
    .progress-bar {
        border-radius: 4px;
    }
    
    .hover-effect {
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.1);
    }

    .hover-effect:hover {
        background-color: #f8f9fa;
        cursor: pointer;
    }
    
    .detail-row td {
        border-top: 0;
        transition: all 0.3s ease;
    }
    
    .toggle-detail .fas {
        transition: transform 0.3s ease;
    }
    
    .toggle-detail[aria-expanded="true"] .fas {
        transform: rotate(180deg);
    }
</style>

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
                    <a href="/" class="nav-item nav-link active">Beranda</a>
                    <a href="/about" class="nav-item nav-link">Tentang</a>
                    <a href="/impact" class="nav-item nav-link">Dampak Kekurangan Gizi</a>
                    <a href="/optimasi-gizi" class="nav-item nav-link">Optimasi Gizi</a>
                    <a href="/faq" class="nav-item nav-link">FAQ</a>
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

<div class="container-fluid py-3 bg-light" id="optimasi">
    <div class="container py-3">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h1 class="mb-4 text-primary"><i class="fas fa-chart-line me-2"></i>Hasil Optimasi</h1>
                @if(isset($trialResults))
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center">Waktu Komputasi</th>
                                <th class="text-center">Jumlah Menu Sukses</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trialResults as $result)
                            <tr>
                                <td class="text-center">{{ $result['waktu'] }}</td>
                                <td class="text-center">{{ $result['sukses'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">{{ number_format(array_sum(array_column($trialResults, 'waktu'))/count($trialResults), 2) }} s</th>
                                <th class="text-center">{{ number_format(array_sum(array_column($trialResults, 'sukses'))/count($trialResults), 1) }} Menu</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @else
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>Tidak ada data hasil optimasi yang ditemukan!
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-3 bg-light" id="frekuensi-kemunculan">
    <div class="container py-3">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <h1 class="mb-4 text-primary"><i class="fas fa-chart-bar me-2"></i>Frekuensi Kemunculan Bahan Makanan</h1>
                @if(isset($trialResults))
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th class="text-center">Percobaan</th>
                                    @foreach($allIngredients as $ingredient)
                                        <th class="text-center">{{ $ingredient }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trialResults as $index => $result)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        @foreach($allIngredients as $ingredient)
                                            <td class="text-center">
                                                {{ $result['ingredient_frequency'][$ingredient] ?? 0 }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>Tidak ada data hasil optimasi yang ditemukan!
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.toggle-detail').forEach(button => {
        button.addEventListener('click', function() {
            const trial = this.dataset.trial;
            const detailRow = document.getElementById(`detail-${trial}`);
            const icon = this.querySelector('i');
            
            if (detailRow.style.display === 'none') {
                detailRow.style.display = 'table-row';
                icon.classList.add('fa-chevron-up');
                icon.classList.remove('fa-chevron-down');
            } else {
                detailRow.style.display = 'none';
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        });
    });
</script>
@endsection
