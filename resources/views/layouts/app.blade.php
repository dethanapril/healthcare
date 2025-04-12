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
        
        @yield('content')

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>BabyCare</a>, All right reserved.</span>
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
                    // maximumSelectionLength: 5,
                    // language: {
                    //     maximumSelected: function (args) {
                    //         return "Anda hanya dapat memilih " + args.maximum + " item";
                    //     }
                    // }
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
