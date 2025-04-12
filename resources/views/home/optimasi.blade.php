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
                                            multiple>
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
@endsection
