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

                <!-- Biodata Section -->
                <div class="card mb-4 border-primary shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="fas fa-user me-2"></i>Biodata</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <p class="mb-2"><strong><i class="fas fa-signature me-2"></i>Nama:</strong><br>
                                    <span class="ms-4">{{ $request['nama'] }}</span>
                                </p>
                                <p class="mb-2"><strong><i class="fas fa-venus-mars me-2"></i>Jenis Kelamin:</strong><br>
                                    <span class="ms-4">{{ $request['jeniskelamin'] }}</span>
                                </p>
                                <p class="mb-2"><strong><i class="fas fa-birthday-cake me-2"></i>Tanggal Lahir:</strong><br>
                                    <span class="ms-4">{{ $request['tanggallahir'] }}</span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2"><strong><i class="fas fa-child me-2"></i>Umur:</strong><br>
                                    <span class="ms-4">{{ $request['umur'] }} bulan</span>
                                </p>
                                <p class="mb-2"><strong><i class="fas fa-weight me-2"></i>Berat Badan:</strong><br>
                                    <span class="ms-4">{{ $request['beratbadan'] }} kg</span>
                                </p>
                                <p class="mb-2"><strong><i class="fas fa-ruler-vertical me-2"></i>Tinggi Badan:</strong><br>
                                    <span class="ms-4">{{ $request['tinggibadan'] }} cm</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kebutuhan Gizi Section -->
                <div class="card mb-4 border-success shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0"><i class="fas fa-heartbeat me-2"></i>Kebutuhan Gizi Harian</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            @php
                                $giziLabels = [
                                    'Energi (kkal)', 'Protein (gr)', 'Lemak (gr)', 
                                    'Karbohidrat (gr)', 'Serat (gr)', 'Kalsium (mg)', 
                                    'Besi (mg)', 'Seng (mg)', 'Tembaga (mg)', 
                                    'Fosfor (mg)', 'Vit C (mg)'
                                ];
                                
                                $icons = [
                                    'fas fa-fire',          // Energi
                                    'fas fa-dna',            // Protein
                                    'fas fa-oil-can',        // Lemak
                                    'fas fa-bread-slice',    // Karbo
                                    'fas fa-leaf',           // Serat
                                    'fas fa-bone',           // Kalsium
                                    'fas fa-magnet',        // Besi
                                    'fas fa-atom',          // Seng
                                    'fas fa-ring',          // Tembaga
                                    'fas fa-shield-virus',   // Fosfor
                                    'fas fa-capsules'       // Vit C
                                ];

                                if (!empty($combinationResults)) {
                                    $kebutuhanGizi = $combinationResults[0]['KebutuhanGizi'] ?? [];
                                    
                                    foreach ($giziLabels as $index => $label) {
                                        $min = $kebutuhanGizi[$index * 2] ?? 0;
                                        $max = $kebutuhanGizi[$index * 2 + 1] ?? 0;
                            @endphp
                                        <div class="col-md-4 col-lg-3">
                                            <div class="card h-100 border-0 shadow-sm hover-effect">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <h6 class="mb-0 fw-bold text-truncate">{{ $label }}</h6>
                                                    </div>
                                                    <div class="d-flex justify-content-between small">
                                                        <div>
                                                            <div class="fw-bold text-primary">Min: {{ round($min,1) }}</div>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="fw-bold text-danger">Max: {{ round($max,1) }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            @php
                                    }
                                }
                            @endphp
                        </div>
                    </div>
                </div>

                <!-- Kombinasi Bahan Makanan Section -->
                {{-- <div class="card border-warning shadow">
                    <div class="card-header bg-warning">
                        <h4 class="mb-0"><i class="fas fa-utensils me-2"></i>Kombinasi Bahan Makanan</h4>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="kombinasiAccordion">
                            @php
                                $no = 1;
                                usort($combinationResults, function($a, $b) {
                                    return $a['BestFitness2'] <=> $b['BestFitness2'];
                                });
                            @endphp
                            @foreach ($combinationResults as $key => $result)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button {{ $key === 0 ? '' : 'collapsed' }}" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#collapse{{ $key}}">
                                            <span class="badge bg-primary me-2">#{{ $no }}</span>
                                            Kombinasi Terbaik {{ $no }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $key}}" 
                                        class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}" 
                                        data-bs-parent="#kombinasiAccordion">
                                        <div class="accordion-body">
                                            <div class="row g-4">
                                                <!-- Bahan Makanan -->
                                                <div class="col-md-6">
                                                    <div class="card h-100 shadow-sm">
                                                        <div class="card-header bg-info text-white">
                                                            <h5 class="mb-0">Komposisi</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <ul class="list-group list-group-flush">
                                                                <!-- Bahan Pokok -->
                                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                    <span><i class="fas fa-bread-slice me-2"></i>{{ $result['NamaBahanPokok'] }}</span>
                                                                    <span class="badge bg-primary rounded-pill">
                                                                        {{ number_format($result['BestSolution1'][0], 2) }} gr
                                                                    </span>
                                                                </li>
                                                
                                                                <!-- Bahan Lauk -->
                                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                    <span><i class="fas fa-drumstick-bite me-2"></i>{{ $result['NamaBahanLauk'] }}</span>
                                                                    <span class="badge bg-primary rounded-pill">
                                                                        {{ number_format($result['BestSolution1'][1], 2) }} gr
                                                                    </span>
                                                                </li>
                                                
                                                                <!-- Bahan Sayur -->
                                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                    <span><i class="fas fa-carrot me-2"></i>{{ $result['NamaBahanSayur'] }}</span>
                                                                    <span class="badge bg-primary rounded-pill">
                                                                        {{ number_format($result['BestSolution1'][2], 2) }} gr
                                                                    </span>
                                                                </li>
                                                
                                                                <!-- Bahan Buah (Kondisional) -->
                                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                    <span>
                                                                        <i class="fas fa-apple-alt me-2"></i>
                                                                        {{ $result['NamaBahanBuah'] ?? '-' }}
                                                                    </span>
                                                                    @if($result['NamaBahanBuah'])
                                                                    <span class="badge bg-primary rounded-pill">
                                                                        {{ number_format($result['BestSolution1'][3], 2) }} gr
                                                                    </span>
                                                                    @else
                                                                    <span class="badge bg-secondary rounded-pill">-</span>
                                                                    @endif
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Total Gizi -->
                                                <div class="col-md-6">
                                                    <div class="card h-100 shadow-sm">
                                                        <div class="card-header bg-info text-white">
                                                            <h5 class="mb-0">Total Gizi</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead class="table-light">
                                                                        <tr>
                                                                            <th>Nutrisi</th>
                                                                            <th>Total</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($result['TotalGizi1'] as $index => $gizi)
                                                                            @php
                                                                                $min = $kebutuhanGizi[$index * 2];
                                                                                $max = $kebutuhanGizi[$index * 2 + 1];
                                                                                
                                                                                if($gizi < $min) {
                                                                                    $status = '<span class="badge bg-danger"><i class="fas fa-arrow-down me-1"></i>Kurang</span>';
                                                                                    $rowClass = 'table-danger';
                                                                                } elseif($gizi > $max) {
                                                                                    $status = '<span class="badge bg-warning"><i class="fas fa-arrow-up me-1"></i>Lebih</span>';
                                                                                    $rowClass = 'table-warning';
                                                                                } else {
                                                                                    $status = '<span class="badge bg-success">OK</span>';
                                                                                    $rowClass = '';
                                                                                }
                                                                            @endphp
                                                                            <tr class="{{ $rowClass }}">
                                                                                <td>{{ $giziLabels[$index] }}</td>
                                                                                <td>{{ round($gizi, 2) }}</td>
                                                                                <td>{!! $status !!}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php $no++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <!-- Kombinasi Bahan Makanan Section -->
                <div class="card border-warning shadow mt-4">
                    <div class="card-header bg-warning">
                        <h4 class="mb-0"><i class="fas fa-utensils me-2"></i>Pilihan Kombinasi Makanan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            @foreach($combinationResults as $key => $result)
                            <div class="col-md-4 col-lg-3">
                                <div class="card combination-card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">
                                            <i class="fas fa-star me-2"></i>Kombinasi #{{ $loop->iteration }}
                                        </h5>
                                        
                                        <div class="mb-3">
                                            @foreach(['Pokok', 'Lauk', 'Sayur', 'Buah'] as $type)
                                                @if($result["NamaBahan{$type}"])
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <span class="text-muted">{{ $type }}:</span>
                                                        <strong>{{ $result["NamaBahan{$type}"] }}</strong>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
        
                                        <button class="btn btn-primary w-100" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#priceModal"
                                                data-combination="{{ json_encode($result) }}">
                                            <i class="fas fa-check me-2"></i>Pilih Kombinasi Ini
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        
                <!-- Price Input Modal -->
                <div class="modal fade" id="priceModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title">Masukkan Harga Bahan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form id="priceForm">
                                <div class="modal-body">
                                    <div class="row g-3" id="priceInputs">
                                        <!-- Dynamic inputs will be inserted here -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-calculator me-2"></i>Hitung Biaya
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        
                <!-- Meal Plan Section (Initially Hidden) -->
                <div id="mealPlanSection" class="d-none mt-4">
                    <div class="card border-success shadow">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Rencana Makan Harian</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card bg-light mb-3">
                                        <div class="card-header bg-warning">Sarapan</div>
                                        <div class="card-body" id="breakfastPlan"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light mb-3">
                                        <div class="card-header bg-info">Makan Siang</div>
                                        <div class="card-body" id="lunchPlan"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light mb-3">
                                        <div class="card-header bg-primary">Makan Malam</div>
                                        <div class="card-body" id="dinnerPlan"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-success mt-3">
                                Total Perkiraan Biaya Harian: <strong id="totalCost"></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const priceModal = document.getElementById('priceModal');
        let currentCombination = null;
    
        // Handle combination selection
        priceModal.addEventListener('show.bs.modal', function(event) {
            document.getElementById('mealPlanSection').classList.add('d-none');

            const button = event.relatedTarget;
            currentCombination = JSON.parse(button.dataset.combination);
            const inputsContainer = document.getElementById('priceInputs');
            inputsContainer.innerHTML = '';
    
            // Create input fields for each ingredient
            ['Pokok', 'Lauk', 'Sayur', 'Buah'].forEach(type => {
                const ingredient = currentCombination[`NamaBahan${type}`];
                if(ingredient) {
                    const inputGroup = document.createElement('div');
                    inputGroup.className = 'col-md-6';
                    inputGroup.innerHTML = `
                        <label class="form-label">Harga ${ingredient} (per 100gr)</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp </span>
                            <input type="number" 
                                   class="form-control" 
                                   data-ingredient="${type.toLowerCase()}"
                                   required>
                        </div>
                    `;
                    inputsContainer.appendChild(inputGroup);
                }
            });
        });
    
        // Handle form submission
        document.getElementById('priceForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            ['breakfastPlan', 'lunchPlan', 'dinnerPlan'].forEach(id => {
                document.getElementById(id).innerHTML = '';
            });
            document.getElementById('totalCost').textContent = '';
            const prices = {};
            let totalCost = 0;
    
            // Calculate costs
            this.querySelectorAll('input').forEach(input => {
                const type = input.dataset.ingredient;
                const pricePer100g = parseFloat(input.value);
                const grams = currentCombination.BestSolution1[
                    type === 'pokok' ? 0 : 
                    type === 'lauk' ? 1 : 
                    type === 'sayur' ? 2 : 3
                ];
                
                const cost = (pricePer100g / 100) * grams;
                totalCost += cost;
                prices[type] = cost;
            });
    
            // Update meal plan
            const formatGram = (gram) => `${gram.toFixed(1)} gr`;
            const mealPortion = grams => (grams / 3).toFixed(1);
    
            ['Pokok', 'Lauk', 'Sayur', 'Buah'].forEach(type => {
                const lowerType = type.toLowerCase();
                if(currentCombination[`NamaBahan${type}`]) {
                    const gram = currentCombination.BestSolution1[
                        lowerType === 'pokok' ? 0 :
                        lowerType === 'lauk' ? 1 :
                        lowerType === 'sayur' ? 2 : 3
                    ];
                    
                    document.querySelectorAll(`#breakfastPlan, #lunchPlan, #dinnerPlan`).forEach(plan => {
                        plan.innerHTML += `
                            <div class="mb-2">
                                <span class="fw-bold">${currentCombination[`NamaBahan${type}`]}:</span>
                                ${mealPortion(gram)} gr
                            </div>
                        `;
                    });
                }
            });
    
            // Show results
            document.getElementById('totalCost').textContent = 
                `Rp. ${totalCost.toFixed(2)}`;
            
            document.getElementById('mealPlanSection').classList.remove('d-none');
            bootstrap.Modal.getInstance(priceModal).hide();
        });
    });
</script>
@endsection
