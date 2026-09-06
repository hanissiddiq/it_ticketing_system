<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'HelpDeskin') }} | Sistem IT Helpdesk Ticketing</title>
  <!--favicon-->
  <link rel="icon" href="{{ asset('landingpage/assets/images/favicon-32x32.png') }}" type="image/png">
  <!-- loader-->
  <link href="{{ asset('landingpage/assets/css/pace.min.css') }}" rel="stylesheet">
  <script src="{{ asset('landingpage/assets/js/pace.min.js') }}"></script>

  <!--plugins-->
  <link href="{{ asset('landingpage/assets/plugins/OwlCarousel/css/owl.carousel.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('landingpage/assets/plugins/lightbox/dist/css/glightbox.min.css') }}">
  <!--bootstrap css-->
  <link href="{{ asset('landingpage/assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
  <!--main css-->
  <link href="{{ asset('landingpage/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/sass/main.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/assets/css/horizontal-menu.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/sass/dark-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/sass/semi-dark.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/sass/blue-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/sass/bordered-theme.css') }}" rel="stylesheet">
</head>

<body>

  <!--start header (navbar sederhana: hanya logo, Login & Register) -->
  <header class="top-header" id="Parent_Scroll_Div">
    <nav class="navbar navbar-expand-xl align-items-center justify-content-between gap-3 container px-4 px-lg-0">
      <div class="logo-header d-flex align-items-center gap-2">
        <div class="logo-icon">
          <img src="{{ asset('landingpage/assets/images/logo-icon.png') }}" class="logo-img" width="45" alt="Logo">
        </div>
        <div class="logo-name">
          <h5 class="mb-0">{{ config('app.name', 'HelpDeskin') }}</h5>
        </div>
      </div>

      <div class="d-flex align-items-center gap-2">
        @auth
          <a href="{{ url('/dashboard') }}"
            class="btn btn-grd btn-grd-primary raised d-flex align-items-center rounded-5 gap-2 px-4">
            <i class="material-icons-outlined">dashboard</i>Dashboard
          </a>
        @else
          @if (Route::has('login'))
            <a href="{{ route('login') }}"
              class="btn btn-outline-primary d-flex align-items-center rounded-5 gap-2 px-4">
              <i class="material-icons-outlined">login</i>Login
            </a>
          @endif
          @if (Route::has('register'))
            <a href="{{ route('register') }}"
              class="btn btn-grd btn-grd-primary raised d-flex align-items-center rounded-5 gap-2 px-4">
              <i class="material-icons-outlined">person_add</i>Daftar
            </a>
          @endif
        @endauth
      </div>
    </nav>
  </header>
  <!--end header-->


  <!--start main wrapper-->
  <main class="container" data-bs-spy="scroll" data-bs-target="#Parent_Scroll_Div" data-bs-smooth-scroll="false"
    tabindex="0">
    <div class="main-content">

      <!--start banner-->
      <section class="py-5" id="home">
        <div class="container py-4 px-4 px-lg-0">
          <div class="row align-items-center justify-content-center g-4">
            <div class="col-12 col-xl-6 order-xl-first order-last">
              <h1 class="fw-bold mb-3 banner-heading">Kelola Tiket IT Anda Lebih Cepat &amp; Terorganisir</h1>
              <h5 class="mb-0 banner-paragraph">{{ config('app.name', 'HelpDeskin') }} membantu tim IT mencatat,
                melacak, dan menyelesaikan setiap kendala pengguna dalam satu sistem helpdesk yang rapi dan mudah
                dipantau.</h5>
              <div class="d-flex flex-column flex-lg-row align-items-center gap-3 mt-5">
                @if (Route::has('register'))
                  <a href="{{ route('register') }}"
                    class="btn btn-lg btn-grd btn-grd-primary d-flex align-items-center rounded-5 gap-2 raised">
                    <i class="material-icons-outlined">speed</i>Mulai Sekarang
                  </a>
                @endif
                <a href="#Fitur" class="btn btn-lg btn-light d-flex align-items-center rounded-5 gap-2 raised">
                  <i class="material-icons-outlined">play_circle_outline</i>Lihat Fitur
                </a>
              </div>
            </div>
            <div class="col-12 col-xl-6 text-center">
              <img src="{{ asset('landingpage/assets/images/banners/01.png') }}" class="img-fluid" width="560" alt="Ilustrasi Helpdesk Ticketing">
            </div>
          </div><!--end row-->
          <div class="row g-4 mt-4">
            <div class="col-12 col-lg-6 col-xl-4 d-flex">
              <div class="card rounded-4 mb-0 w-100">
                <div class="card-body p-4">
                  <div class="d-flex align-items-start gap-3">
                    <div
                      class="d-flex align-items-center justify-content-center rounded-circle wh-64 btn-grd-info text-white flex-shrink-0">
                      <i class="material-icons-outlined fs-2">confirmation_number</i>
                    </div>
                    <div class="">
                      <h5>Pencatatan Tiket Mudah</h5>
                      <p class="mb-0">Pengguna dapat mengajukan tiket keluhan IT hanya dalam beberapa klik, lengkap
                        dengan kategori dan lampiran.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-4 d-flex">
              <div class="card rounded-4 mb-0 w-100">
                <div class="card-body p-4">
                  <div class="d-flex align-items-start gap-3">
                    <div
                      class="d-flex align-items-center justify-content-center rounded-circle wh-64 btn-grd-danger text-white flex-shrink-0">
                      <i class="material-icons-outlined fs-2">schedule</i>
                    </div>
                    <div class="">
                      <h5>SLA &amp; Prioritas Tiket</h5>
                      <p class="mb-0">Setiap tiket otomatis diberi prioritas dan batas waktu penyelesaian (SLA) agar
                        tidak ada keluhan yang terlewat.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-4 d-flex">
              <div class="card rounded-4 mb-0 w-100">
                <div class="card-body p-4">
                  <div class="d-flex align-items-start gap-3">
                    <div
                      class="d-flex align-items-center justify-content-center rounded-circle wh-64 btn-grd-success text-white flex-shrink-0">
                      <i class="material-icons-outlined fs-2">insights</i>
                    </div>
                    <div class="">
                      <h5>Laporan &amp; Analitik</h5>
                      <p class="mb-0">Pantau performa tim IT melalui dashboard laporan yang lengkap dan mudah
                        dipahami.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--end row-->
        </div>
      </section>
      <!--end banner-->


      <!--start about us-->
      <section class="py-5 bg-section" id="About">
        <div class="container py-4 px-4 px-lg-0">
          <div class="section-title text-center mb-5">
            <h1 class="mb-0 section-title-name">Tentang Aplikasi</h1>
          </div>
          <div class="row g-4">
            <div class="col-12 col-xl-6">
              <h6 class="text-uppercase mb-3">Apa itu {{ config('app.name', 'HelpDeskin') }}</h6>
              <h2 class="mb-3">Solusi Terpadu untuk Manajemen Layanan IT Perusahaan Anda</h2>
              <p class="mb-3">{{ config('app.name', 'HelpDeskin') }} adalah aplikasi IT Helpdesk Ticketing yang
                dirancang untuk membantu tim support mencatat, mendistribusikan, dan menyelesaikan setiap laporan
                gangguan atau permintaan layanan IT secara terstruktur, sehingga tidak ada tiket yang terlewat atau
                tertangani terlambat.</p>
              <div class="d-flex flex-column gap-2">
                <p class="d-flex align-items-start gap-3 mb-0"><i
                    class="material-icons-outlined fs-5">check_circle</i>Sistem tiket terpusat untuk seluruh
                  departemen</p>
                <p class="d-flex align-items-start gap-3 mb-0"><i
                    class="material-icons-outlined fs-5">check_circle</i>Notifikasi otomatis ke agent dan pengguna
                </p>
                <p class="d-flex align-items-start gap-3 mb-0"><i
                    class="material-icons-outlined fs-5">check_circle</i>Riwayat tiket tersimpan rapi untuk
                  kebutuhan audit</p>
                <p class="d-flex align-items-start gap-3 mb-0"><i
                    class="material-icons-outlined fs-5">check_circle</i>Terintegrasi dengan basis pengetahuan
                  (knowledge base) untuk swadaya pengguna</p>
              </div>
              <div class="mt-4">
                <a href="#Fitur"
                  class="btn btn-grd btn-grd-primary rounded-5 d-flex align-items-center gap-2 raised px-4">
                  Pelajari Lebih Lanjut<i class="material-icons-outlined">east</i>
                </a>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <img src="{{ asset('landingpage/assets/images/banners/widget-1.png') }}"
                class="img-fluid img-thumbnail rounded-4 bg-grd-warning" alt="Tampilan aplikasi helpdesk">
            </div>
          </div><!--end row-->

          <div class="mt-5 clients">
            <h3 class="text-center mb-4">Dipercaya oleh Berbagai Perusahaan</h3>
            <div class="clients-grid py-3">
              <div class="clients-shops owl-carousel owl-theme">
                <div class="item">
                  <div class="p-4 rounded-4 card mb-0">
                    <a href="javascript:;">
                      <img src="{{ asset('landingpage/assets/images/clients/01.png') }}" class="img-fluid" alt="Klien 1">
                    </a>
                  </div>
                </div>
                <div class="item">
                  <div class="p-4 rounded-4 card mb-0">
                    <a href="javascript:;">
                      <img src="{{ asset('landingpage/assets/images/clients/02.png') }}" class="img-fluid" alt="Klien 2">
                    </a>
                  </div>
                </div>
                <div class="item">
                  <div class="p-4 rounded-4 card mb-0">
                    <a href="javascript:;">
                      <img src="{{ asset('landingpage/assets/images/clients/03.png') }}" class="img-fluid" alt="Klien 3">
                    </a>
                  </div>
                </div>
                <div class="item">
                  <div class="p-4 rounded-4 card mb-0">
                    <a href="javascript:;">
                      <img src="{{ asset('landingpage/assets/images/clients/04.png') }}" class="img-fluid" alt="Klien 4">
                    </a>
                  </div>
                </div>
                <div class="item">
                  <div class="p-4 rounded-4 card mb-0">
                    <a href="javascript:;">
                      <img src="{{ asset('landingpage/assets/images/clients/05.png') }}" class="img-fluid" alt="Klien 5">
                    </a>
                  </div>
                </div>
                <div class="item">
                  <div class="p-4 rounded-4 card mb-0">
                    <a href="javascript:;">
                      <img src="{{ asset('landingpage/assets/images/clients/06.png') }}" class="img-fluid" alt="Klien 6">
                    </a>
                  </div>
                </div>
                <div class="item">
                  <div class="p-4 rounded-4 card mb-0">
                    <a href="javascript:;">
                      <img src="{{ asset('landingpage/assets/images/clients/07.png') }}" class="img-fluid" alt="Klien 7">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--end about us-->


      <!--start fitur / services-->
      <section class="py-5" id="Fitur">
        <div class="container py-4 px-4 px-lg-0">
          <div class="section-title text-center mb-5">
            <h1 class="mb-0 section-title-name">Fitur Utama</h1>
          </div>
          <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
            <div class="col d-flex">
              <div class="card rounded-4 mb-0 w-100">
                <div class="card-body text-center p-4">
                  <div class="d-flex flex-column gap-4">
                    <div
                      class="d-flex align-items-center justify-content-center rounded-circle wh-64 bg-grd-primary text-white flex-shrink-0 mx-auto">
                      <i class="material-icons-outlined fs-2">confirmation_number</i>
                    </div>
                    <div class="">
                      <h5>Manajemen Tiket</h5>
                      <p class="mb-0">Kelola seluruh tiket masuk dari berbagai channel dalam satu dashboard
                        terpusat, lengkap dengan status dan riwayat penanganan.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col d-flex">
              <div class="card rounded-4 mb-0 w-100">
                <div class="card-body text-center p-4">
                  <div class="d-flex flex-column gap-4">
                    <div
                      class="d-flex align-items-center justify-content-center rounded-circle wh-64 bg-grd-danger text-white flex-shrink-0 mx-auto">
                      <i class="material-icons-outlined fs-2">support_agent</i>
                    </div>
                    <div class="">
                      <h5>Multi-Channel Support</h5>
                      <p class="mb-0">Terima tiket dari email, portal web, maupun chat dalam satu sistem yang
                        sama tanpa perlu berpindah aplikasi.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col d-flex">
              <div class="card rounded-4 mb-0 w-100">
                <div class="card-body text-center p-4">
                  <div class="d-flex flex-column gap-4">
                    <div
                      class="d-flex align-items-center justify-content-center rounded-circle wh-64 bg-grd-warning text-white flex-shrink-0 mx-auto">
                      <i class="material-icons-outlined fs-2">schedule</i>
                    </div>
                    <div class="">
                      <h5>SLA Otomatis</h5>
                      <p class="mb-0">Atur target waktu respon dan penyelesaian tiket sesuai tingkat prioritas
                        dan kategori masalah.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col d-flex">
              <div class="card rounded-4 mb-0 w-100">
                <div class="card-body text-center p-4">
                  <div class="d-flex flex-column gap-4">
                    <div
                      class="d-flex align-items-center justify-content-center rounded-circle wh-64 bg-grd-branding text-white flex-shrink-0 mx-auto">
                      <i class="material-icons-outlined fs-2">menu_book</i>
                    </div>
                    <div class="">
                      <h5>Knowledge Base</h5>
                      <p class="mb-0">Sediakan artikel bantuan agar pengguna bisa menyelesaikan masalah umum
                        secara mandiri tanpa membuat tiket baru.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col d-flex">
              <div class="card rounded-4 mb-0 w-100">
                <div class="card-body text-center p-4">
                  <div class="d-flex flex-column gap-4">
                    <div
                      class="d-flex align-items-center justify-content-center rounded-circle wh-64 bg-grd-success text-white flex-shrink-0 mx-auto">
                      <i class="material-icons-outlined fs-2">bar_chart</i>
                    </div>
                    <div class="">
                      <h5>Laporan &amp; Analitik</h5>
                      <p class="mb-0">Pantau kinerja agent, rata-rata waktu respon, dan tingkat kepuasan
                        pengguna secara real-time.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col d-flex">
              <div class="card rounded-4 mb-0 w-100">
                <div class="card-body text-center p-4">
                  <div class="d-flex flex-column gap-4">
                    <div
                      class="d-flex align-items-center justify-content-center rounded-circle wh-64 bg-grd-deep-blue text-white flex-shrink-0 mx-auto">
                      <i class="material-icons-outlined fs-2">notifications_active</i>
                    </div>
                    <div class="">
                      <h5>Notifikasi Real-time</h5>
                      <p class="mb-0">Agent dan pengguna mendapat notifikasi otomatis setiap ada perubahan
                        status pada tiket mereka.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--end row-->
        </div>
      </section>
      <!--end fitur / services-->


      <!-- start call to action-->
      <section class="py-5 bg-call-to-action">
        <div class="container py-4 px-4 px-lg-0">
          <div class="text-center">
            <h1 class="text-white">Siap Meningkatkan Layanan IT Anda?</h1>
            <p class="mb-1 text-white">Bergabunglah dengan tim-tim IT yang sudah beralih ke {{ config('app.name', 'HelpDeskin') }}
              untuk menangani tiket lebih cepat, terukur, dan tanpa kendala tercecer. Mulai kelola helpdesk Anda hari
              ini juga.</p>
            <div class="mt-4">
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-grd btn-lg btn-grd-primary rounded-5 px-4 raised">Daftar
                  Sekarang</a>
              @endif
            </div>
          </div>
        </div>
      </section>
      <!--end call to action-->


      <!--start tampilan aplikasi (portfolio)-->
      <section class="py-5" id="Tampilan">
        <div class="container py-4 px-4 px-lg-0">
          <div class="section-title text-center mb-5">
            <h1 class="mb-0 section-title-name">Tampilan Aplikasi</h1>
          </div>

          <div class="row row-cols-1 row-cols-lg-3 g-4">
            <div class="col">
              <div class="inner">
                <a href="https://placehold.co/1920x600/png?text=Dashboard+Tiket" class="glightbox">
                  <img src="https://placehold.co/800x500/png?text=Dashboard" class="img-fluid rounded-4 p-1 bg-grd-branding"
                    alt="Dashboard Tiket">
                </a>
              </div>
            </div>
            <div class="col">
              <div class="inner">
                <a href="https://placehold.co/1920x600/png?text=Daftar+Tiket" class="glightbox">
                  <img src="https://placehold.co/800x500/png?text=Daftar+Tiket" class="img-fluid rounded-4 p-1 bg-grd-danger"
                    alt="Daftar Tiket">
                </a>
              </div>
            </div>
            <div class="col">
              <div class="inner">
                <a href="https://placehold.co/1920x600/png?text=Detail+Tiket" class="glightbox">
                  <img src="https://placehold.co/800x500/png?text=Detail+Tiket" class="img-fluid rounded-4 p-1 bg-grd-info"
                    alt="Detail Tiket">
                </a>
              </div>
            </div>
            <div class="col">
              <div class="inner">
                <a href="https://placehold.co/1920x600/png?text=SLA+%26+Prioritas" class="glightbox">
                  <img src="https://placehold.co/800x500/png?text=SLA+%26+Prioritas" class="img-fluid rounded-4 p-1 bg-grd-warning"
                    alt="Pengaturan SLA">
                </a>
              </div>
            </div>
            <div class="col">
              <div class="inner">
                <a href="https://placehold.co/1920x600/png?text=Laporan" class="glightbox">
                  <img src="https://placehold.co/800x500/png?text=Laporan" class="img-fluid rounded-4 p-1 bg-grd-success"
                    alt="Laporan &amp; Analitik">
                </a>
              </div>
            </div>
            <div class="col">
              <div class="inner">
                <a href="https://placehold.co/1920x600/png?text=Knowledge+Base" class="glightbox">
                  <img src="https://placehold.co/800x500/png?text=Knowledge+Base" class="img-fluid rounded-4 p-1 bg-grd-voilet"
                    alt="Knowledge Base">
                </a>
              </div>
            </div>
          </div><!--end row-->
        </div>
      </section>
      <!--end tampilan aplikasi-->



      <!--start tim support-->
      <section class="py-5 bg-section" id="Team">
        <div class="container py-4 px-4 px-lg-0">
          <div class="section-title text-center mb-5">
            <h1 class="mb-0 section-title-name">Tim Support Kami</h1>
          </div>

          <div class="row row-cols-1 row-cols-xl-2 g-4">
            <div class="col">
              <div class="card mb-0 rounded-4">
                <div class="card-body p-4">
                  <div class="d-flex flex-column flex-lg-row align-items-center gap-4">
                    <div class="">
                      <img src="https://placehold.co/120x120/png" width="120" height="120"
                        class="rounded-circle p-1 bg-white bg-grd-warning" alt="Foto Ahmad Fadillah">
                    </div>
                    <div class="profile-info">
                      <div class="my-4">
                        <h3 class="mb-1">Ahmad Fadillah</h3>
                        <p class="mb-3 fs-6">IT Support Specialist</p>
                        <p class="mb-0">Menangani tiket harian dan memastikan setiap laporan gangguan direspon
                          sesuai SLA.</p>
                      </div>
                      <div class="d-flex align-items-center justify-content-start gap-3">
                        <a href="javascript:;"
                          class="wh-42 bg-grd-deep-blue text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-linkedin fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-42 bg-grd-info text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-facebook fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-42 bg-grd-danger text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-youtube fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-42 bg-grd-voilet text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-twitter-x fs-5"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card mb-0 rounded-4">
                <div class="card-body p-4">
                  <div class="d-flex flex-column flex-lg-row align-items-center gap-4">
                    <div class="">
                      <img src="https://placehold.co/120x120/png" width="120" height="120"
                        class="rounded-circle p-1 bg-white bg-grd-danger" alt="Foto Siti Aminah">
                    </div>
                    <div class="profile-info">
                      <div class="my-4">
                        <h3 class="mb-1">Siti Aminah</h3>
                        <p class="mb-3 fs-6">Helpdesk Manager</p>
                        <p class="mb-0">Mengawasi alur eskalasi tiket dan memastikan kualitas layanan tim
                          support terjaga.</p>
                      </div>
                      <div class="d-flex align-items-center justify-content-start gap-3">
                        <a href="javascript:;"
                          class="wh-42 bg-grd-deep-blue text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-linkedin fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-42 bg-grd-info text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-facebook fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-42 bg-grd-danger text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-youtube fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-42 bg-grd-voilet text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-twitter-x fs-5"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card mb-0 rounded-4">
                <div class="card-body p-4">
                  <div class="d-flex flex-column flex-lg-row align-items-center gap-4">
                    <div class="">
                      <img src="https://placehold.co/120x120/png" width="120" height="120"
                        class="rounded-circle p-1 bg-white bg-grd-primary" alt="Foto Budi Santoso">
                    </div>
                    <div class="profile-info">
                      <div class="my-4">
                        <h4 class="mb-1">Budi Santoso</h4>
                        <p class="mb-3">Network Engineer</p>
                        <p class="mb-0">Menindaklanjuti tiket teknis terkait jaringan dan infrastruktur
                          server.</p>
                      </div>
                      <div class="d-flex align-items-center justify-content-start gap-3">
                        <a href="javascript:;"
                          class="wh-42 bg-grd-deep-blue text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-linkedin fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-42 bg-grd-info text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-facebook fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-42 bg-grd-danger text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-youtube fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-42 bg-grd-voilet text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-twitter-x fs-5"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card mb-0 rounded-4">
                <div class="card-body p-4">
                  <div class="d-flex flex-column flex-lg-row align-items-center gap-4">
                    <div class="">
                      <img src="https://placehold.co/120x120/png" width="120" height="120"
                        class="rounded-circle p-1 bg-white bg-grd-success" alt="Foto Rina Wulandari">
                    </div>
                    <div class="profile-info">
                      <div class="my-4">
                        <h4 class="mb-1">Rina Wulandari</h4>
                        <p class="mb-3">System Administrator</p>
                        <p class="mb-0">Mengelola konfigurasi sistem dan memastikan aplikasi helpdesk selalu
                          berjalan optimal.</p>
                      </div>
                      <div class="d-flex align-items-center justify-content-start gap-3">
                        <a href="javascript:;"
                          class="wh-42 bg-grd-deep-blue text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-linkedin fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-42 bg-grd-info text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-facebook fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-42 bg-grd-danger text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-youtube fs-5"></i></a>
                        <a href="javascript:;"
                          class="wh-42 bg-grd-voilet text-white rounded-circle d-flex align-items-center justify-content-center"><i
                            class="bi bi-twitter-x fs-5"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--end row-->
        </div>
      </section>
      <!--end tim support-->



      <!--start paket berlangganan-->
      <section class="py-5" id="Pricing">
        <div class="container py-4 px-4 px-lg-0">
          <div class="section-title text-center mb-5">
            <h1 class="mb-0 section-title-name">Paket Berlangganan</h1>
          </div>

          <div class="row g-4">
            <div class="col-12 col-xl-4">
              <div class="card border-top border-4 border-primary rounded-4 mb-0">
                <div class="card-body p-4">
                  <div class="my-4">
                    <h3 class="mb-0">Paket Basic</h3>
                  </div>
                  <div class="pricing-content d-flex flex-column gap-3">
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Jumlah Agent</p>
                      <p class="mb-0 fw-medium fs-6">5 Agent</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Tiket per Bulan</p>
                      <p class="mb-0 fw-medium fs-6">500 Tiket</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Knowledge Base</p>
                      <p class="mb-0 fw-medium fs-6">Dasar</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Laporan &amp; Analitik</p>
                      <p class="mb-0 fw-medium fs-6">Standar</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Dukungan</p>
                      <p class="mb-0 fw-medium fs-6">Email Saja</p>
                    </div>
                  </div>
                  <div class="price-tag d-flex align-items-center justify-content-center gap-2 my-5">
                    <h5 class="mb-0 align-self-end text-primary">Rp</h5>
                    <h1 class="mb-0 lh-1 price-amount text-primary">299rb</h1>
                    <h5 class="mb-0 align-self-end text-primary">/bulan</h5>
                  </div>
                  <div class="d-grid">
                    <button class="btn btn-lg btn-grd btn-grd-info w-100 rounded-5">Pilih Paket</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card border-top border-4 border-success rounded-4 mb-0">
                <div class="card-body p-4">
                  <div class="my-4">
                    <h3 class="mb-0">Paket Business</h3>
                  </div>
                  <div class="pricing-content d-flex flex-column gap-3">
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Jumlah Agent</p>
                      <p class="mb-0 fw-medium fs-6">20 Agent</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Tiket per Bulan</p>
                      <p class="mb-0 fw-medium fs-6">Tanpa Batas</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Knowledge Base</p>
                      <p class="mb-0 fw-medium fs-6">Lengkap</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Laporan &amp; Analitik</p>
                      <p class="mb-0 fw-medium fs-6">Lanjutan</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Dukungan</p>
                      <p class="mb-0 fw-medium fs-6">Email &amp; Chat 24/7</p>
                    </div>
                  </div>
                  <div class="price-tag d-flex align-items-center justify-content-center gap-2 my-5">
                    <h5 class="mb-0 align-self-end text-success">Rp</h5>
                    <h1 class="mb-0 lh-1 price-amount text-success">799rb</h1>
                    <h5 class="mb-0 align-self-end text-success">/bulan</h5>
                  </div>
                  <div class="d-grid">
                    <button class="btn btn-lg btn-grd btn-grd-success w-100 rounded-5">Pilih Paket</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card border-top border-4 border-danger rounded-4 mb-0">
                <div class="card-body p-4">
                  <div class="my-4">
                    <h3 class="mb-0">Paket Enterprise</h3>
                  </div>
                  <div class="pricing-content d-flex flex-column gap-3">
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Jumlah Agent</p>
                      <p class="mb-0 fw-medium fs-6">Tanpa Batas</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Tiket per Bulan</p>
                      <p class="mb-0 fw-medium fs-6">Tanpa Batas</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Knowledge Base</p>
                      <p class="mb-0 fw-medium fs-6">Lengkap + Multi-Brand</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Laporan &amp; Analitik</p>
                      <p class="mb-0 fw-medium fs-6">Kustom &amp; API</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <p class="mb-0 fs-6">Dukungan</p>
                      <p class="mb-0 fw-medium fs-6">Dedicated Support</p>
                    </div>
                  </div>
                  <div class="price-tag d-flex align-items-center justify-content-center gap-2 my-5">
                    <h5 class="mb-0 align-self-end text-danger">Rp</h5>
                    <h1 class="mb-0 lh-1 price-amount text-danger">Hubungi</h1>
                  </div>
                  <div class="d-grid">
                    <button class="btn btn-lg btn-grd btn-grd-danger w-100 rounded-5">Hubungi Kami</button>
                  </div>
                </div>
              </div>
            </div>
          </div><!--end row-->

        </div>
      </section>
      <!--end paket berlangganan-->



      <!--start contact form-->
      <section class="py-5 bg-section" id="Contact">
        <div class="container py-4 px-4 px-lg-0">
          <div class="section-title text-center mb-5">
            <h1 class="mb-0 section-title-name">Hubungi Kami</h1>
          </div>

          <div class="row g-4">
            <div class="col-12 col-xl-5">
              <div class="card rounded-4">
                <div class="card-body p-4">
                  <div class="d-flex flex-column gap-4">
                    <div class="d-flex align-items-center gap-3">
                      <div
                        class="wh-48 bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center">
                        <i class="material-icons-outlined">house</i>
                      </div>
                      <div class="">
                        <h5 class="mb-0">Alamat</h5>
                        <p class="mb-0">Jl. Teknologi No. 10, Jakarta, Indonesia</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                      <div
                        class="wh-48 bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center">
                        <i class="material-icons-outlined">call</i>
                      </div>
                      <div class="">
                        <h5 class="mb-0">Telepon</h5>
                        <p class="mb-0">+62 812-3456-7890</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                      <div
                        class="wh-48 bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center">
                        <i class="material-icons-outlined">email</i>
                      </div>
                      <div class="">
                        <h5 class="mb-0">Email</h5>
                        <p class="mb-0">support@helpdeskin.test</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card rounded-4 mt-4">
                <div class="card-body p-4">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15894.051175250792!2d97.14132059124474!3d5.181750529419414!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3047832c19454515%3A0xc436d87eb555aab2!2sJl.%20Merdeka%20No.25%2C%20Simpang%20Empat%2C%20Kec.%20Banda%20Sakti%2C%20Kabupaten%20Aceh%20Utara%2C%20Aceh%2024355!5e0!3m2!1sid!2sid!4v1788691850178!5m2!1sid!2sid" width=100% height="255" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                </div>
              </div>

            </div>
            <div class="col-12 col-xl-7">
              <div class="card rounded-4 mb-0">
                <div class="card-body p-4">
                  <form>
                    <div class="row g-4">
                      <div class="col-12 col-lg-6">
                        <label for="YourName" class="form-label">Nama Anda</label>
                        <input type="text" class="form-control" id="YourName" placeholder="Masukkan nama Anda">
                      </div>
                      <div class="col-12 col-lg-6">
                        <label for="EmailId" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="EmailId" placeholder="Masukkan alamat email">
                      </div>
                      <div class="col-12 col-lg-12">
                        <label for="Subject" class="form-label">Subjek</label>
                        <input type="text" class="form-control" id="Subject" placeholder="Subjek pesan">
                      </div>
                      <div class="col-12 col-lg-12">
                        <label for="Message" class="form-label">Pesan</label>
                        <textarea class="form-control" id="Message" rows="10" cols="5"></textarea>
                      </div>
                      <div class="col-12 col-lg-12">
                        <button type="submit" class="btn btn-grd btn-grd-primary px-4 rounded-5">Kirim Pesan</button>
                      </div>
                    </div><!--end row-->
                  </form>
                </div>
              </div>
            </div>
          </div><!--end row-->
        </div>
      </section>
      <!--end contact form-->

    </div>
  </main>
  <!--end main wrapper-->


  <!--start footer -->
  <section class="page-footer py-5">
    <div class="container py-4 px-4 px-lg-0">
      <div class="row g-4">
        <div class="col-12 col-xl-4">
          <div class="footer-widget-1">
            <div class="footer-logo mb-4">
              <img src="{{ asset('landingpage/assets/images/logo1.png') }}" width="160" alt="Logo">
            </div>
            <p>{{ config('app.name', 'HelpDeskin') }} adalah aplikasi IT Helpdesk Ticketing yang membantu tim
              support mencatat, melacak, dan menyelesaikan setiap kendala teknis dengan lebih cepat dan
              terorganisir.</p>
            <p class="mb-2"><strong>Alamat: </strong>Jl. T. Hamzah Bendahara No.10 Lhokseumawe,<br> Aceh, Indonesia</p>
            <p class="mb-2"><strong>Telepon: </strong>+62 812-6313-2787</p>
            <p class="mb-0"><strong>Email: </strong>support@helpdeskin.test</p>
          </div>
        </div>
        <div class="col-12 col-xl-2">
          <div class="footer-widget-2">
            <div class="footer-links">
              <h5 class="mb-4">Tautan</h5>
              <div class="d-flex flex-column gap-2">
                <a href="#home">Beranda</a>
                <a href="#About">Tentang</a>
                <a href="#Fitur">Fitur</a>
                <a href="#Pricing">Harga</a>
                <a href="#Contact">Kontak</a>
                <a href="javascript:;">Syarat Layanan</a>
                <a href="javascript:;">Kebijakan Privasi</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-2">
          <div class="footer-widget-3">
            <div class="footer-links">
              <h5 class="mb-4">Layanan Kami</h5>
              <div class="d-flex flex-column gap-2">
                <a href="javascript:;">Manajemen Tiket</a>
                <a href="javascript:;">Monitoring SLA</a>
                <a href="javascript:;">Knowledge Base</a>
                <a href="javascript:;">Laporan &amp; Analitik</a>
                <a href="javascript:;">Integrasi API</a>
                <a href="javascript:;">Dukungan 24/7</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-4">
          <div class="footer-widget-4">
            <h5 class="mb-4">Newsletter Kami</h5>
            <div class="d-flex flex-column gap-2">
              <p>Berlangganan untuk mendapatkan info terbaru seputar update fitur dan tips pengelolaan helpdesk!</p>
              <form>
                <div class="input-group subscribe-control">
                  <input type="text" class="form-control" placeholder="Alamat email Anda">
                  <button class="btn btn-grd btn-grd-primary px-4" type="button">Berlangganan</button>
                </div>
              </form>
            </div>
            <h6 class="mb-3 mt-4">Ikuti Kami</h6>
            <div class="d-flex align-items-center justify-content-start gap-3">
              <a href="javascript:;"
                class="wh-42 bg-grd-deep-blue text-white rounded-circle d-flex align-items-center justify-content-center"><i
                  class="bi bi-linkedin fs-5"></i></a>
              <a href="javascript:;"
                class="wh-42 bg-grd-info text-white rounded-circle d-flex align-items-center justify-content-center"><i
                  class="bi bi-facebook fs-5"></i></a>
              <a href="javascript:;"
                class="wh-42 bg-grd-danger text-white rounded-circle d-flex align-items-center justify-content-center"><i
                  class="bi bi-youtube fs-5"></i></a>
              <a href="javascript:;"
                class="wh-42 bg-grd-voilet text-white rounded-circle d-flex align-items-center justify-content-center"><i
                  class="bi bi-twitter-x fs-5"></i></a>
            </div>
          </div>
        </div>
      </div><!--end row-->
    </div>
  </section>
  <!--end footer section-->


  <!--start footer strip-->
  <footer class="footer-strip py-3 px-4 px-lg-0 text-center border-top">
    <p class="mb-0">© {{ date('Y') }}. {{ config('app.name', 'HelpDeskin') }} | Seluruh hak cipta dilindungi.</p>
  </footer>
  <!--end footer strip-->


  <!--Start Back To Top Button-->
  <a href="javaScript:;" class="back-to-top"><i class="material-icons-outlined">arrow_upward</i></a>
  <!--End Back To Top Button-->

  <!--start switcher-->
  <!-- <button class="btn btn-grd btn-grd-danger btn-switcher position-fixed top-50 d-flex align-items-center gap-2"
    type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
    <i class="material-icons-outlined">tune</i>Kustomisasi
  </button> -->

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="staticBackdrop">
    <div class="offcanvas-header border-bottom h-70">
      <div class="">
        <h5 class="mb-0">Pengaturan Tema</h5>
        <p class="mb-0">Sesuaikan tampilan tema Anda</p>
      </div>
      <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
        <i class="material-icons-outlined">close</i>
      </a>
    </div>
    <div class="offcanvas-body">
      <div>
        <p>Varian Tema</p>

        <div class="row g-3">
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="BlueTheme" checked>
            <label
              class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
              for="BlueTheme">
              <span class="material-icons-outlined">contactless</span>
              <span>Blue</span>
            </label>
          </div>
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="LightTheme">
            <label
              class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
              for="LightTheme">
              <span class="material-icons-outlined">light_mode</span>
              <span>Light</span>
            </label>
          </div>
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="DarkTheme">
            <label
              class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
              for="DarkTheme">
              <span class="material-icons-outlined">dark_mode</span>
              <span>Dark</span>
            </label>
          </div>
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="SemiDarkTheme">
            <label
              class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
              for="SemiDarkTheme">
              <span class="material-icons-outlined">contrast</span>
              <span>Semi Dark</span>
            </label>
          </div>
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="BoderedTheme">
            <label
              class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
              for="BoderedTheme">
              <span class="material-icons-outlined">border_style</span>
              <span>Bordered</span>
            </label>
          </div>
        </div><!--end row-->

      </div>
    </div>
  </div>
  <!--end switcher-->

  <!--bootstrap js-->
  <script src="{{ asset('landingpage/assets/js/bootstrap.bundle.min.js') }}"></script>

  <!--plugins-->
  <script src="{{ asset('landingpage/assets/js/jquery.min.js') }}"></script>
  <!--plugins-->
  <script src="{{ asset('landingpage/assets/plugins/OwlCarousel/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('landingpage/assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js') }}"></script>
  <script src="{{ asset('landingpage/assets/js/main.js') }}"></script>

  <script src="{{ asset('landingpage/assets/plugins/lightbox/dist/js/glightbox.min.js') }}"></script>

  <script>
    var lightbox = GLightbox();
  </script>

  <script>
    $('.clients-shops').owlCarousel({
      loop: true,
      margin: 24,
      responsiveClass: true,
      nav: false,
      autoplay: true,
      autoplayTimeout: 3000,
      dots: false,
      responsive: {
        0: {
          nav: false,
          items: 1
        },
        576: {
          nav: false,
          items: 2
        },
        768: {
          nav: false,
          items: 3
        },
        1024: {
          nav: false,
          items: 3
        },
        1366: {
          items: 4
        },
        1400: {
          items: 5
        }
      },
    })
  </script>

</body>

</html>