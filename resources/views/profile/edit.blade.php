<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="blue-theme">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - {{ __('Profile') }}</title>

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

  <body>

    <!-- Main Wrapper -->
    <div class="container py-5">
      
      <!-- Page Header -->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
        <div class="breadcrumb-title pe-3 text-white h4 mb-0">{{ __('Profile') }}</div>
        <div class="ps-3 ms-auto">
          <a href="javascript:history.back()" class="btn btn-outline-light rounded-5 px-4">
            <i class="bi bi-arrow-left me-2"></i>Kembali
          </a>
        </div>
      </div>

      <div class="row g-4">
        <!-- Form Update Informasi Profil -->
        <div class="col-12 col-lg-8 mx-auto">
          <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
              <h5 class="card-title fw-bold mb-3">Informasi Profil</h5>
              @include('profile.partials.update-profile-information-form')
            </div>
          </div>
        </div>

        <!-- Form Update Password -->
        <div class="col-12 col-lg-8 mx-auto">
          <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
              <h5 class="card-title fw-bold mb-3">Ubah Password</h5>
              @include('profile.partials.update-password-form')
            </div>
          </div>
        </div>

        <!-- Form Hapus Akun -->
        <div class="col-12 col-lg-8 mx-auto">
          <div class="card border-0 shadow-sm border-danger rounded-4">
            <div class="card-body p-4">
              <h5 class="card-title fw-bold text-danger mb-3">Hapus Akun</h5>
              @include('profile.partials.delete-user-form')
            </div>
          </div>
        </div>
      </div>

    </div>

  </body>
</html>