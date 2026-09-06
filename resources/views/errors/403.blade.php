<!doctype html>
<html lang="id" data-bs-theme="blue-theme">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 - Akses Ditolak</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png">
    
    <!-- Loader -->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    
    <!-- Custom Theme Styles -->
    <link href="{{ asset('sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/blue-theme.css') }}" rel="stylesheet">
  </head>

<body class="bg-error">

  <!-- Start wrapper -->
  <div class="pt-5">
    <div class="container pt-5">
      <div class="row pt-5">
        <div class="col-lg-12">
          <div class="text-center error-pages">
            <h1 class="error-title text-info mb-3">403</h1>
            <h2 class="error-sub-title text-white">Akses Ditolak</h2>

            <p class="error-message text-white text-uppercase">Kamu nggak punya izin buat ngakses halaman ini.</p>
            
            <div class="mt-4 d-flex align-items-center justify-content-center gap-3">
              <a href="{{ url('/') }}" class="btn btn-grd-danger rounded-5 px-4">
                <i class="bi bi-house-fill me-2"></i>Kembali ke Beranda
              </a>
              <a href="javascript:history.back()" class="btn btn-outline-light rounded-5 px-4">
                <i class="bi bi-arrow-left me-2"></i>Halaman Sebelumnya
              </a>
            </div>

            <div class="mt-4">
              <p class="text-light">Copyright © {{ date('Y') }} | All rights reserved.</p>
            </div>
            
            <hr class="border-light border-2">
            
            <div class="list-inline contacts-social mt-4"> 
              <a href="javascript:;" class="list-inline-item bg-facebook text-white border-0"><i class="bi bi-facebook"></i></a>
              <a href="javascript:;" class="list-inline-item bg-pinterest text-white border-0"><i class="bi bi-pinterest"></i></a>
              <a href="javascript:;" class="list-inline-item bg-whatsapp text-white border-0"><i class="bi bi-whatsapp"></i></a>
              <a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div><!--end row-->
    </div>
  </div><!--end wrapper-->

</body>
</html>