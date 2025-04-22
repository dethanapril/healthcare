@extends('layouts.app')
@section('content')

@include('layouts.navbar')

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
