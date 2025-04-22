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

@include('layouts.navbar')

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
                        <table class="table table-bordered table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col" colspan="2">Energi (kkal)</th>
                                    <th scope="col" colspan="2">Protein (gr)</th>
                                    <th scope="col" colspan="2">Lemak (gr)</th>
                                    <th scope="col" colspan="2">Karbohidrat (gr)</th>
                                    <th scope="col" colspan="2">Serat (gr)</th>
                                    <th scope="col" colspan="2">Kalsium (mg)</th>
                                    <th scope="col" colspan="2">Besi (mg)</th>
                                    <th scope="col" colspan="2">Seng (mg)</th>
                                    <th scope="col" colspan="2">Tembaga (mg)</th>
                                    <th scope="col" colspan="2">Fosfor (mg)</th>
                                    <th scope="col" colspan="2">Vitamin C (mg)</th>
                                </tr>
                                <tr class="table-info">
                                    @for ($i = 0; $i < 11; $i++)
                                        <th scope="col">Min</th>
                                        <th scope="col">Max</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    if (!empty($combinationResults)) {
                                        $kebutuhanGizi = $combinationResults[0]['KebutuhanGizi'] ?? [];
                                    }
                                @endphp
                                @if (!empty($kebutuhanGizi) && count($kebutuhanGizi) >= 22)
                                    <tr>
                                        @for ($i = 0; $i < 22; $i += 2)
                                            <td class="text-center text-primary fw-bold">{{ round($kebutuhanGizi[$i], 1) }}</td>
                                            <td class="text-center text-danger fw-bold">{{ round($kebutuhanGizi[$i + 1], 1) }}</td>
                                        @endfor
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="22" class="text-center text-muted">Data kebutuhan gizi tidak tersedia.</td>
                                    </tr>
                                @endif
                            </tbody>
                            
                        </table>
                    </div>
                </div>

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

                <div id="mealPlanSection" class="d-none mt-4">
                    <div class="card border-success shadow">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Rencana Makan Harian</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Sarapan -->
                                <div class="col-md-4">
                                    <div class="card bg-light mb-3">
                                        <div class="card-header bg-warning">Sarapan</div>
                                        <div class="card-body" id="breakfastPlan"></div>
                                        <div class="accordion" id="breakfastAccordion">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingBreakfast">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBreakfast" aria-expanded="false" aria-controls="collapseBreakfast">
                                                        Total Gizi Sarapan
                                                    </button>
                                                </h2>
                                                <div id="collapseBreakfast" class="accordion-collapse collapse" aria-labelledby="headingBreakfast" data-bs-parent="#breakfastAccordion">
                                                    <div class="accordion-body" id="breakfastNutrition"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Makan Siang -->
                                <div class="col-md-4">
                                    <div class="card bg-light mb-3">
                                        <div class="card-header bg-info">Makan Siang</div>
                                        <div class="card-body" id="lunchPlan"></div>
                                        <div class="accordion" id="lunchAccordion">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingLunch">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLunch" aria-expanded="false" aria-controls="collapseLunch">
                                                        Total Gizi Makan Siang
                                                    </button>
                                                </h2>
                                                <div id="collapseLunch" class="accordion-collapse collapse" aria-labelledby="headingLunch" data-bs-parent="#lunchAccordion">
                                                    <div class="accordion-body" id="lunchNutrition"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Makan Malam -->
                                <div class="col-md-4">
                                    <div class="card bg-light mb-3">
                                        <div class="card-header bg-primary">Makan Malam</div>
                                        <div class="card-body" id="dinnerPlan"></div>
                                        <div class="accordion" id="dinnerAccordion">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingDinner">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDinner" aria-expanded="false" aria-controls="collapseDinner">
                                                        Total Gizi Makan Malam
                                                    </button>
                                                </h2>
                                                <div id="collapseDinner" class="accordion-collapse collapse" aria-labelledby="headingDinner" data-bs-parent="#dinnerAccordion">
                                                    <div class="accordion-body" id="dinnerNutrition"></div>
                                                </div>
                                            </div>
                                        </div>
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
            if (ingredient) {
                const inputGroup = document.createElement('div');
                inputGroup.className = 'col-md-6';
                inputGroup.innerHTML = `
                    <label class="form-label">Harga ${ingredient} (per kilogram)</label>
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

        // Clear previous results
        ['breakfastPlan', 'lunchPlan', 'dinnerPlan'].forEach(id => {
            document.getElementById(id).innerHTML = '';
        });
        document.getElementById('totalCost').textContent = '';
        document.getElementById('breakfastNutrition').innerHTML = ''; // Clear breakfast nutrition
        document.getElementById('lunchNutrition').innerHTML = '';     // Clear lunch nutrition
        document.getElementById('dinnerNutrition').innerHTML = '';    // Clear dinner nutrition

        const prices = {};
        let totalCost = 0;

        // Calculate costs
        this.querySelectorAll('input').forEach(input => {
            const type = input.dataset.ingredient;
            const pricePerKg = parseFloat(input.value); // Harga per kilogram
            const pricePer100g = pricePerKg / 10; // Konversi ke harga per 100 gram
            const grams = currentCombination.BestSolution1[
                type === 'pokok' ? 0 :
                type === 'lauk' ? 1 :
                type === 'sayur' ? 2 : 3
            ];

            const cost = (pricePer100g / 100) * grams; // Hitung biaya berdasarkan gram
            totalCost += cost;
            prices[type] = cost;
        });

        // Update meal plan
        const formatGram = (gram) => `${gram.toFixed(1)} gr`;
        const mealPortion = grams => (grams / 3).toFixed(1);

        // Ambil total gizi harian dari kombinasi
        const totalGiziHarian = currentCombination.TotalGizi1 || [];
        const giziLabels = [
            'Energi (kkal)', 'Protein (gr)', 'Lemak (gr)', 
            'Karbohidrat (gr)', 'Serat (gr)', 'Kalsium (mg)', 
            'Besi (mg)', 'Seng (mg)', 'Tembaga (mg)', 
            'Fosfor (mg)', 'Vit C (mg)'
        ];

        // Bagi total gizi harian menjadi 3 bagian
        const giziPerSesi = totalGiziHarian.map(value => value / 3);

        // Fungsi untuk membuat teks total gizi
        const formatTotalGizi = (gizi) => {
            return giziLabels.map((label, index) => `<div>${label}: ${gizi[index].toFixed(1)}</div>`).join('');
        };

        // Tampilkan rencana makan dan total gizi per sesi
        ['Pokok', 'Lauk', 'Sayur', 'Buah'].forEach(type => {
            const lowerType = type.toLowerCase();
            if (currentCombination[`NamaBahan${type}`]) {
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

        // Tampilkan total gizi per sesi dalam accordion
        document.getElementById('breakfastNutrition').innerHTML = formatTotalGizi(giziPerSesi);
        document.getElementById('lunchNutrition').innerHTML = formatTotalGizi(giziPerSesi);
        document.getElementById('dinnerNutrition').innerHTML = formatTotalGizi(giziPerSesi);


        function formatRupiah(amount) {
            return `Rp ${new Intl.NumberFormat('id-ID', {
                style: 'decimal',
                minimumFractionDigits: 0
            }).format(amount)}`;
        }

        document.getElementById('totalCost').textContent = formatRupiah(totalCost);
        document.getElementById('mealPlanSection').classList.remove('d-none');
        bootstrap.Modal.getInstance(priceModal).hide();
    });
});
</script>
@endsection
