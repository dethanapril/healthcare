@extends('layouts.app')
@section('content')

@include('layouts.navbar')


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
