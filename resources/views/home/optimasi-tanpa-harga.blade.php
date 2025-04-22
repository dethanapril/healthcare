@extends('layouts.app')
@section('content')

@include('layouts.navbar')

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
                                            name="pokokIds[]"
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
                                            name="laukIds[]" 
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
                                            name="sayurIds[]" 
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
                                            name="buahIds[]"
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
