<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title> BUSEET </title>
    <link rel="icon" type="image/png" href="assets/icon/logo-buseet.png">
    <!-- Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Linnk Font -->
    <link rel="stylesheet" href="../assets/style/font.css">
    <!-- css code file -->
    <link rel="stylesheet" href="assets/style/global.css" />
    <link rel="stylesheet" href="assets/style/component.css" />
    <link rel="stylesheet" href="lib/AOS/node_modules/aos/dist/aos.css" />

    <style>
      body {
        background: linear-gradient(135deg, #00215e, #0E46A3, #1A61B2);
        padding-bottom: 8rem;
      }

      .tagline {
        background: url("assets/images/bus-banner.png") fixed;
        background-position: center bottom;
        background-repeat: no-repeat;
        background-size: cover;
        height: 47vh;
        width: 100%;
        border-radius: 0 0 12px 12px;
        padding-top: 6rem;
      }

      .tagline form {
        margin-top: -3.6rem;
      }

      .tagline form a {
        font-size: 1.2rem;
        padding-top: 0.9rem;
      }

      .cta-btn {
        border-radius: 50px;
        font-size: 14px;
        width: 15rem;
        height: 3rem;
        font-weight: 400;
        background-color: #00215e;
      }

      .auth-btn {
        width: 7rem;
        height: 2.5rem;
        font-size: 0.8rem;
        padding-top: 0.5rem;
      }

      main {
        width: 100%;
        padding-top: 5rem;
      }

      .main-heading h2 {
        font-size: 3.4rem;
      }
    </style>
  </head>
  <body>
    <!-- Navigation Bar Tag Start -->
    <!-- Navigation Bar Tag Start -->
    <nav class="navbar navbar-dark navbar-expand-md fixed-top">
      <div class="container">
        <img src="assets/icon/logo-buseet.png" width="50px" alt="Logo Buseet" />
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Offcanvas Navbar Start -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <div class="mx-auto">
              <a href="auth/login.php" class="btn btn-primary auth-btn" role="button" aria-label="Login Button">Login</a>
              <a href="auth/register.php" class="btn btn-outline-success auth-btn fw-bold" role="button" aria-label="Sign Up Button">Sign Up</a>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav ms-auto justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="pages/home.php">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/bus-search.php">Tiket Bus Online</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/partnership.php">Partner Kami</a>
              </li>
              <!-- Dropdown Menu Start -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Atur Pesanan</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Batalkan Tiket</a></li>
                  <li><a class="dropdown-item" href="#">Perubahan Jadwal</a></li>
                  <li><a class="dropdown-item" href="#">Tiket Saya</a></li>
                </ul>
              </li>
              <!-- Dropdown Menu End -->
              <!-- Profile Picture Start -->
              <li class="nav-item d-flex gap-4 ms-4 d-none d-md-block">
                <a href="auth/login.php" class="btn btn-primary btn-sm auth-btn" role="button" aria-label="Login Button">Login</a>
                <a href="auth/register.php" class="btn auth-btn btn-register fw-bold" role="button" aria-label="Sign Up Button">Sign Up</a>
              </li>
              <!-- Profile Picture End -->
            </ul>
          </div>
        </div>
        <!-- Offcanvas Navbar End -->
      </div>
    </nav>
    <!-- Navigation Bar Tag End -->
    <!-- Navigation Bar Tag End -->

    <div class="text-center ms-auto me-auto tagline text-white"></div>

    <div class="d-flex flex-row">
      <!-- Main Content Start -->
      <main class="ms-auto me-auto">
        <!-- Form User Identity Start -->
          <div class="mt-4 mb-5 m-auto text-black p-5 rounded" style="width: 65rem; color: #000000 !important; background-color: #fff">
            <div class="justify-content-between main-heading" style="padding-left: 30px; margin-top: 20px">
              <h2 class="text-start d-block fw-bold">Hey Travelers</h2>
              <h2 class="text-start d-block fw-bold">Mau Ke Mana Hari Ini?</h3>
            </div>
            <div class="rounded-2 mt-5 container">
              <div class="text-start row" style="padding-left: 30px">
                <div class="col-md-6">
                  <div class="card-content">
                    <div class="d-flex" data-aos="fade-left">
                      <p class="font-13"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M8.66667 19.7778L2.87749 21.7076C2.4458 21.8514 2 21.5301 2 21.075V4.70273C2 4.41578 2.18362 4.16101 2.45584 4.07028L8.66667 2M8.66667 19.7778L15.3333 22M8.66667 19.7778V2M8.66667 2L15.3333 4.22222M15.3333 22L21.5441 19.9298C21.8163 19.839 22 19.5842 22 19.2972V2.92496C22 2.46991 21.5542 2.1486 21.1226 2.2925L15.3333 4.22222M15.3333 22V4.22222"
                            stroke="#222831"
                            stroke-width="3"
                            stroke-linecap="round"
                            stroke-linejoin="round" /></svg
                      ></p>
                      <p class="d-block font-16 fw-semibold" style="padding-left: 28px">Mau Berangkat Dari Terminal mana??</p>
                    </div>
                    <p class="border-top border border-dark"></p>
                  </div>
                  <div class="card-content">
                    <div class="d-flex" data-aos="fade-right">
                      <p class="font-13"
                        ><svg width="24" height="30" viewBox="0 0 24 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M22 12C22 17.5229 12 27 12 27C12 27 2 17.5229 2 12C2 6.47715 6.47715 2 12 2C17.5229 2 22 6.47715 22 12Z" stroke="#222831" stroke-width="3" />
                          <path
                            d="M12 13.25C12.6904 13.25 13.25 12.6904 13.25 12C13.25 11.3096 12.6904 10.75 12 10.75C11.3096 10.75 10.75 11.3096 10.75 12C10.75 12.6904 11.3096 13.25 12 13.25Z"
                            stroke="#222831"
                            stroke-width="3"
                            stroke-linecap="round"
                            stroke-linejoin="round" /></svg
                      ></p>
                      <p class="d-block font-16 fw-semibold" style="padding-left: 28px">Mau turun terminal mana?</p>
                    </div>
                    <p class="border-top border border-dark"></p>
                  </div>
                  <div class="card-content">
                    <div class="d-flex" data-aos="fade-right">
                      <p class="font-13"
                        ><svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M15.3333 4.22222V2V4.22222ZM15.3333 4.22222V6.44444V4.22222ZM15.3333 4.22222H10.3333H15.3333ZM2 10.8889V20.8889C2 22.1162 2.99492 23.1111 4.22222 23.1111H19.7778C21.0051 23.1111 22 22.1162 22 20.8889V10.8889H2Z"
                            fill="white" />
                          <path
                            d="M15.3333 4.22222V2M15.3333 4.22222V6.44444M15.3333 4.22222H10.3333M2 10.8889V20.8889C2 22.1162 2.99492 23.1111 4.22222 23.1111H19.7778C21.0051 23.1111 22 22.1162 22 20.8889V10.8889H2Z"
                            stroke="#222831"
                            stroke-width="3"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                          <path d="M2 10.8888V6.44439C2 5.21709 2.99492 4.22217 4.22222 4.22217H6.44444" fill="white" />
                          <path d="M2 10.8888V6.44439C2 5.21709 2.99492 4.22217 4.22222 4.22217H6.44444" stroke="#222831" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M6.44434 2V6.44444V2Z" fill="white" />
                          <path d="M6.44434 2V6.44444" stroke="#222831" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M22.0004 10.8888V6.44439C22.0004 5.21709 21.0055 4.22217 19.7782 4.22217H19.2227" fill="white" />
                          <path d="M22.0004 10.8888V6.44439C22.0004 5.21709 21.0055 4.22217 19.7782 4.22217H19.2227" stroke="#222831" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </p>
                      <p class="d-block font-16 fw-semibold" style="padding-left: 28px">Pilih tanggal keberangkatanmu yuk!</p>
                    </div>
                    <p class="border-top border border-dark"></p>
                  </div>
                  <div class="card-content">
                    <div class="d-flex" data-aos="fade-left">
                      <p class="font-13"
                        ><svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M15.3333 4.22222V2V4.22222ZM15.3333 4.22222V6.44444V4.22222ZM15.3333 4.22222H10.3333H15.3333ZM2 10.8889V20.8889C2 22.1162 2.99492 23.1111 4.22222 23.1111H19.7778C21.0051 23.1111 22 22.1162 22 20.8889V10.8889H2Z"
                            fill="white" />
                          <path
                            d="M15.3333 4.22222V2M15.3333 4.22222V6.44444M15.3333 4.22222H10.3333M2 10.8889V20.8889C2 22.1162 2.99492 23.1111 4.22222 23.1111H19.7778C21.0051 23.1111 22 22.1162 22 20.8889V10.8889H2Z"
                            stroke="#222831"
                            stroke-width="3"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                          <path d="M2 10.8888V6.44439C2 5.21709 2.99492 4.22217 4.22222 4.22217H6.44444" fill="white" />
                          <path d="M2 10.8888V6.44439C2 5.21709 2.99492 4.22217 4.22222 4.22217H6.44444" stroke="#222831" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M6.44434 2V6.44444V2Z" fill="white" />
                          <path d="M6.44434 2V6.44444" stroke="#222831" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M22.0004 10.8888V6.44439C22.0004 5.21709 21.0055 4.22217 19.7782 4.22217H19.2227" fill="white" />
                          <path d="M22.0004 10.8888V6.44439C22.0004 5.21709 21.0055 4.22217 19.7782 4.22217H19.2227" stroke="#222831" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" /></svg
                      ></p>
                      <p class="d-block font-16 fw-semibold" style="padding-left: 28px">Pilih tanggal kembalimu juga ya!</p>
                    </div>
                    <p class="border-top border border-dark"></p>
                  </div>
                  <div class="text-center pt-5">
                    <a href="auth/login.php" class="btn btn-primary text-left cta-btn" style="padding-top: 0.7rem">Cari Bus</a>
                  </div>
                </div>
                <div class="col-md-6">
                  <img src="assets/images/image.png" class="img-fluid" alt="Placeholder" />
                </div>
              </div>
            </div>
          </div>
      </main>
    </div>

    <!-- Bootstrap5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- javascript code file -->
    <script src="assets/js/function.js?v=<?= time(); ?>"></script>
    <script src="assets/js/jquery-3.7.1.min.js?v=<?= time(); ?>"></script>
    <script src="lib/AOS/node_modules/aos/dist/aos.js?v<?= time(); ?>"></script>

    <script>
        navbarResponsive();

        AOS.init({
            once: true,
            duration: 900,
        });
    </script>
  </body>
</html>
