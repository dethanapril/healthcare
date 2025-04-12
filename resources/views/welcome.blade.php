<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>BabyCare - Daycare Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">



        <!-- Libraries Stylesheet -->
        <link href="{{asset('fe/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('fe/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('fe/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('fe/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('fe/css/style.css')}}" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
        
    </head>
    <body>
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
                    <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Baby<span class="text-secondary">Care</span></h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="#hero" class="nav-item nav-link active">Beranda</a>
                            <a href="#about" class="nav-item nav-link">Tentang</a>
                            <a href="#impact" class="nav-item nav-link">Dampak Kekurangan Gizi</a>
                            <a href="#optimasi" class="nav-item nav-link">Optimasi Gizi</a>
                            <a href="#faq" class="nav-item nav-link">FAQ</a>
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

        <!-- Hero Start -->
        <div class="container-fluid py-3 hero-header wow fadeIn" data-wow-delay="0.1s" id="hero">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-10 col-md-12">
                        <h1 class="mb-3 text-primary">Kami Peduli Balita Anda</h1>
                        <h1 class="mb-5 display-1 text-white">Optimasi Kebutuhan Gizi Balita Menggunakan Algoritma Differential Evolution (DE)</h1>
                        <a href="#optimasi" class="btn btn-primary px-4 py-3 px-md-5  me-4 btn-border-radius">Mulai Optimasi</a>
                        <a href="#about" class="btn btn-primary px-4 py-3 px-md-5 btn-border-radius">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->

        <!-- About Start -->
        <div class="container-fluid py-3 about bg-light" id="about">
            <div class="container py-3">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                        <div class="video border">
                            <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                <span></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                        <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Tentang Kami</h4>
                        <h1 class="text-dark mb-4 display-5">Optimasi Berbasis Algoritma Evolutioner</h1>
                        <p class="text-dark mb-4">BabyCare adalah platform optimasi gizi balita berbasis algoritma Differential Evolution (DE) yang bertujuan untuk membantu orang tua dalam menentukan kombinasi bahan makanan terbaik untuk balita mereka.
                        </p>
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>Optimasi cerdas</h6>
                                <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Gizi seimbang</h6>
                                <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>Biaya Efisien</h6>
                            </div>
                        </div>
                        <a href="#about" class="btn btn-primary px-5 py-3 btn-border-radius">Selengkapnya..</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Video -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Service Start -->
        <div class="container-fluid service py-3">
            <div class="container py-3">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <h1 class="mb-3 display-3">Bagaimana Cara Kerjanya</h1>
                    <p>Proses sederhana 4 langkah untuk optimasi pemenuhan kebutuhan gizi balita anda</p>
                </div>
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                        <div class="text-center border-primary border bg-white service-item">
                            <div class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-inner">
                                    <div class="p-4"><i class="fas fa-child fa-6x text-primary"></i></div>
                                    <a href="#" class="h4">Masukan Data Balita</a>
                                    <p class="my-3">Berikan informasi data balita anda seperti usia, berat badan, dan tinggi badan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
                        <div class="text-center border-primary border bg-white service-item">
                            <div class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-inner">
                                    <div class="p-4"><i class="fas fa-carrot fa-6x text-primary"></i></div>
                                    <a href="#" class="h4">Masukan Bahan Makanan</a>
                                    <p class="my-3">Berikan informasi bahan makanan yang dapat anda siapkan beserta dengan harga</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
                        <div class="text-center border-primary border bg-white service-item">
                            <div class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-inner">
                                    <div class="p-4"><i class="fas fa-utensils fa-6x text-primary"></i></div>
                                    <a href="#" class="h4">Optimasi Menu</a>
                                    <p class="my-3">Sistem melakukan optimasi menu makanan yang sesuai dengan kebutuhan gizi balita anda menggunakan algoritma Differential Evolution</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
                        <div class="text-center border-primary border bg-white service-item">
                            <div class="service-content d-flex align-items-center justify-content-center p-4">
                                <div class="service-content-inner">
                                    <div class="p-4"><i class="fas fa-check-circle fa-6x text-primary"></i></div>
                                    <a href="#" class="h4">Dapatkan Hasil</a>
                                    <p class="my-3">Terima hasil menu makanan yang optimal sesuai dengan kebutuhan gizi balita anda</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

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

        <!-- Form Start -->
        <div class="container-fluid py-3 bg-light" id="optimasi">
            <div class="container py-3">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <h1 class="mb-3 display-3">Optimasi Gizi Balita</h1>
                    <p>Isi data balita anda agar mendapatkan rekomendasi menu makanan yang tepat untuk balita anda.</p>
                </div>
                <div class="card shadow-sm">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white"><i class="fas fa-utensils me-2"></i>Form Optimasi Gizi Balita</h4>
                    </div>
                    <div class="card-body p-4">
                        <form id="optimasiForm" action="{{ route('optimasi') }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="row g-5">
                                <!-- Biodata Section -->
                                <div class="col-12">
                                    <h4 class="text-primary mb-4">Informasi Biodata</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                                                @error('nama')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="jeniskelamin" required>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                @error('jeniskelamin')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" name="tanggallahir" class="form-control" value="{{ old('tanggallahir') }}"  id="tanggalLahir" required>
                                                @error('tanggallahir')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="umur" class="form-label">Umur (dalam bulan)</label>
                                                <input type="number" class="form-control" id="umur" name="umur" readonly required>
                                                @error('umur')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="beratBadan" class="form-label">Berat Badan (kg)</label>
                                                <input type="number" name="beratbadan" class="form-control" step="0.1"  value="{{ old('beratbadan') }}" required>
                                                @error('beratbadan')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tinggiBadan" class="form-label">Tinggi Badan (cm)</label>
                                                <input type="number" name="tinggibadan" class="form-control" step="0.1"  value="{{ old('tinggibadan') }}" required>
                                                @error('tinggibadan')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Bahan Makanan Section -->
                                <div class="col-12">
                                    <h4 class="text-primary mb-4">Informasi Bahan Makanan</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="menu" class="form-label">Menu</label>
                                                <select class="form-select" name="menu" required>
                                                    <option value="">Pilih Menu</option>
                                                    <option value="Sehari">Sehari</option>
                                                    <option value="Sekali Makan">Sekali Makan</option>
                                                </select>
                                                @error('menu')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="bahanPokok" class="form-label">Bahan Makanan Pokok</label>
                                                <select class="form-select pilih-bahan" 
                                                    data-kategori="pokok" 
                                                    id="select-pokok" 
                                                    multiple required> 
                                                    @foreach ($tblBahanPokok as $item)
                                                        <option value="{{ $item->id }}">{{ $item->NamaMakanan }}</option>
                                                    @endforeach
                                                </select>
                                                @error('bahanPokok')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="lauk" class="form-label">Lauk</label>
                                                <select class="form-select pilih-bahan" 
                                                    data-kategori="lauk" 
                                                    id="select-lauk" 
                                                    multiple required>
                                                    @foreach ($tblBahanLauk as $item)
                                                        <option value="{{ $item->id }}">{{ $item->NamaMakanan }}</option>
                                                    @endforeach
                                                </select>
                                                @error('lauk')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sayur" class="form-label">Sayur</label>
                                                <select class="form-select pilih-bahan" 
                                                    data-kategori="sayur" 
                                                    id="select-sayur" 
                                                    multiple required>
                                                    @foreach ($tblBahanSayur as $item)
                                                        <option value="{{ $item->id }}">{{ $item->NamaMakanan }}</option>
                                                    @endforeach
                                                </select>
                                                @error('sayur')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="buah" class="form-label">Buah</label>
                                                <select class="form-select pilih-bahan" 
                                                    data-kategori="buah" 
                                                    id="select-buah" 
                                                    multiple required>
                                                    @foreach ($tblBahanBuah as $item)
                                                        <option value="{{ $item->id }}">{{ $item->NamaMakanan }}</option>
                                                    @endforeach
                                                </select>
                                                @error('buah')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Form Input Harga -->
                                <div class="col-12">
                                    <h4 class="text-primary">Informasi Harga Bahan Makanan</h4>
                                    <p>Masukan informasi harga dari bahan makanan yang telah anda pilih, silahkan isi dengan nilai 0 jika bahan makanan tersebut tidak di beli oleh anda</p>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table class="table table-bordered bg-white shadow-sm" id="form_harga">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Bahan Makanan</th>
                                                        <th>Harga (Rp per 100g)</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary px-5 py-3">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form End -->

        <!-- Testimonial Start -->
        <div class="container-fluid testimonial py-3">
            <div class="container py-3">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <h1 class="mb-5 display-3">Apa Kata Orang Tua Tentang Kami</h1>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.3s">
                    <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                        <div class="p-4 position-relative">
                            <i class="fa fa-quote-right fa-2x text-primary position-absolute" style="top: 15px; right: 15px;"></i>
                            <div class="d-flex align-items-center">
                                <div class="border border-primary bg-white rounded-circle">
                                    <img src="{{asset('fe/img/testimonial-1.jpg')}}" class="rounded-circle p-2" style="width: 80px; height: 80px; border-style: dotted; border-color: var(--bs-primary);" alt="">
                                </div>
                                <div class="ms-4">
                                    <h4 class="text-dark">Andi</h4>
                                    <p class="m-0 pb-3">Ayah dari Balita</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-primary mt-4 pt-3">
                                <p class="mb-0">"Platform ini sangat membantu saya dalam menentukan menu makanan yang tepat untuk anak saya. Sekarang saya tidak perlu khawatir lagi tentang kebutuhan gizi anak saya."</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                        <div class="p-4 position-relative">
                            <i class="fa fa-quote-right fa-2x text-primary position-absolute" style="top: 15px; right: 15px;"></i>
                            <div class="d-flex align-items-center">
                                <div class="border border-primary bg-white rounded-circle">
                                    <img src="{{asset('fe/img/testimonial-2.jpg')}}" class="rounded-circle p-2" style="width: 80px; height: 80px; border-style: dotted; border-color: var(--bs-primary);" alt="">
                                </div>
                                <div class="ms-4">
                                    <h4 class="text-dark">Budi</h4>
                                    <p class="m-0 pb-3">Ayah dari Balita</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-primary mt-4 pt-3">
                                <p class="mb-0">"Sangat mudah digunakan dan hasilnya sangat memuaskan. Anak saya sekarang lebih sehat dan aktif."</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item img-border-radius bg-light border border-primary p-4">
                        <div class="p-4 position-relative">
                            <i class="fa fa-quote-right fa-2x text-primary position-absolute" style="top: 15px; right: 15px;"></i>
                            <div class="d-flex align-items-center">
                                <div class="border border-primary bg-white rounded-circle">
                                    <img src="{{asset('fe/img/testimonial-3.jpg')}}" class="rounded-circle p-2" style="width: 80px; height: 80px; border-style: dotted; border-color: var(--bs-primary);" alt="">
                                </div>
                                <div class="ms-4">
                                    <h4 class="text-dark">Citra</h4>
                                    <p class="m-0 pb-3">Ibu dari Balita</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-primary mt-4 pt-3">
                                <p class="mb-0">"Saya sangat merekomendasikan platform ini kepada semua orang tua. Sangat membantu dalam memastikan anak mendapatkan gizi yang seimbang."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

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

        <!-- Footer Start -->
        <div class="container-fluid footer py-3 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="footer-item">
                            <h2 class="fw-bold mb-3"><span class="text-primary mb-0">Baby</span><span class="text-secondary">Care</span></h2>
                            <p class="mb-4">There cursus massa at urnaaculis estieSed aliquamellus vitae ultrs condmentum leo massamollis its estiegittis miristum.</p>
                            <div class="border border-primary p-3 rounded bg-light">
                                <h5 class="mb-3">Newsletter</h5>
                                <div class="position-relative mx-auto border border-primary rounded" style="max-width: 400px;">
                                    <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2 text-white">SignUp</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="footer-item">
                            <div class="d-flex flex-column p-4 ps-5 text-dark border border-primary" 
                            style="border-radius: 50% 20% / 10% 40%;">
                                <p>Monday: 8am to 5pm</p>
                                <p>Tuesday: 8am to 5pm</p>
                                <p>Wednes: 8am to 5pm</p>
                                <p>Thursday: 8am to 5pm</p>
                                <p>Friday: 8am to 5pm</p>
                                <p>Saturday: 8am to 5pm</p>
                                <p class="mb-0">Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="footer-item">
                            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">LOCATION</h4>
                            <div class="d-flex flex-column align-items-start">
                                <a href="" class="text-body mb-4"><i class="fa fa-map-marker-alt text-primary me-2"></i> 104 North tower New York, USA</a>
                                <a href="" class="text-start rounded-0 text-body mb-4"><i class="fa fa-phone-alt text-primary me-2"></i> (+012) 3456 7890 123</a>
                                <a href="" class="text-start rounded-0 text-body mb-4"><i class="fas fa-envelope text-primary me-2"></i> exampleemail@gmail.com</a>
                                <a href="" class="text-start rounded-0 text-body mb-4"><i class="fa fa-clock text-primary me-2"></i> 26/7 Hours Service</a>
                                <div class="footer-icon d-flex">
                                    <a class="btn btn-primary btn-sm-square me-3 rounded-circle text-white" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-primary btn-sm-square me-3 rounded-circle text-white" href=""><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="btn btn-primary btn-sm-square me-3 rounded-circle text-white"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="btn btn-primary btn-sm-square rounded-circle text-white"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="footer-item">
                            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">OUR GALLARY</h4>
                            <div class="row g-3">
                                <div class="col-4">
                                    <div class="footer-galary-img rounded-circle border border-primary">
                                        <img src="{{asset('fe/img/galary-1.jpg')}}" class="img-fluid rounded-circle p-2" alt="">
                                    </div>
                               </div>
                               <div class="col-4">
                                    <div class="footer-galary-img rounded-circle border border-primary">
                                        <img src="{{asset('fe/img/galary-2.jpg')}}" class="img-fluid rounded-circle p-2" alt="">
                                    </div>
                               </div>
                                <div class="col-4">
                                    <div class="footer-galary-img rounded-circle border border-primary">
                                        <img src="{{asset('fe/img/galary-3.jpg')}}" class="img-fluid rounded-circle p-2" alt="">
                                    </div>
                               </div>
                                <div class="col-4">
                                    <div class="footer-galary-img rounded-circle border border-primary">
                                        <img src="{{asset('fe/img/galary-4.jpg')}}" class="img-fluid rounded-circle p-2" alt="">
                                    </div>
                               </div>
                                <div class="col-4">
                                    <div class="footer-galary-img rounded-circle border border-primary">
                                        <img src="{{asset('fe/img/galary-5.jpg')}}" class="img-fluid rounded-circle p-2" alt="">
                                    </div>
                               </div>
                                <div class="col-4">
                                    <div class="footer-galary-img rounded-circle border border-primary">
                                        <img src="{{asset('fe/img/galary-6.jpg')}}" class="img-fluid rounded-circle p-2" alt="">
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a clas="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('fe/lib/wow/wow.min.js')}}"></script>
        <script src="{{asset('fe/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('fe/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('fe/lib/lightbox/js/lightbox.min.js')}}"></script>
        <script src="{{asset('fe/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!-- Template Javascript -->
        <script src="{{asset('fe/js/main.js')}}"></script>

        <script>
            document.getElementById('tanggalLahir').addEventListener('change', function() {
                const birthDate = new Date(this.value);
                const today = new Date();
                let ageInMonths = (today.getFullYear() - birthDate.getFullYear()) * 12;
                ageInMonths -= birthDate.getMonth();
                ageInMonths += today.getMonth();
                document.getElementById('umur').value = ageInMonths <= 0 ? 0 : ageInMonths;
            });

            $(document).ready(function () {
                $(".pilih-bahan").select2({
                    theme: "bootstrap-5",
                    placeholder: "Pilih bahan",
                    allowClear: true,
                    maximumSelectionLength: 5,
                    language: {
                        maximumSelected: function (args) {
                            return "Anda hanya dapat memilih " + args.maximum + " item";
                        }
                    }
                });

                // Handle perubahan seleksi bahan
                $(".pilih-bahan").on('change', function () {
                    const $select = $(this);
                    const kategori = $select.data("kategori").toLowerCase();
                    const selectedBahan = [];

                    // Ambil ID dari value option, bukan data-id
                    $select.find(":selected").each(function () {
                        selectedBahan.push($(this).val()); // Gunakan .val() bukan .data('id')
                    });

                    // Tambahkan baris baru
                    selectedBahan.forEach(function (bahanId) {
                        const rowId = `${kategori}_${bahanId}`;
                        
                        if (!$(`tr[data-row="${rowId}"]`).length) {
                            const bahanNama = $select.find(`option[value="${bahanId}"]`).text(); // Cari berdasarkan value
                            const kategoriCapitalized = kategori.charAt(0).toUpperCase() + kategori.slice(1);
                            
                            const newRow = `
                                <tr data-row="${rowId}">
                                    <td>${bahanNama}</td>
                                    <td>
                                        <input type="number" 
                                            name="harga[${kategori}][${bahanId}]" 
                                            class="form-control harga-input" 
                                            min="0" 
                                            step="1" required 
                                            >
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm remove">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>`;
                            
                            $("#form_harga tbody").append(newRow);
                        }
                    });

                    // Hapus baris yang tidak terpilih
                    $(`tr[data-row^="${kategori}_"]`).each(function () {
                        const rowBahanId = $(this).data('row').split("_")[1];
                        if (!selectedBahan.includes(rowBahanId)) {
                            $(this).remove();
                        }
                    });
                });

                // Handle penghapusan manual
                $(document).on("click", ".remove", function () {
                    const $row = $(this).closest('tr');
                    const kategori = $row.find('td:first').text().toLowerCase();
                    const bahanId = $row.data('row').split("_")[1];
                    
                    // Update seleksi di Select2
                    $(`select[data-kategori="${kategori}"]`)
                        .find(`option[value="${bahanId}"]`)
                        .prop("selected", false)
                        .trigger("change");
                    
                    $row.remove();
                });

                // Handle form submission
                $('#optimasiForm').on('submit', function() {
                    const $submitButton = $(this).find('button[type="submit"]');
                    const originalButtonText = $submitButton.html();

                    // Show loading spinner
                    $submitButton.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mengirim...').prop('disabled', true);
                });
            });
        </script>
    </body>
</html>
