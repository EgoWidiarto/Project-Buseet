<!-- Function To Add Active Class -->
<?php
// Fungsi untuk mengecek halaman aktif
function setActiveClass($path) {
  $current_page = basename($_SERVER['REQUEST_URI'], ".php");
  return strpos($current_page, $path) !== false ? 'aktiv' : '';
}
?>


<!-- Navigation Bar Tag Start -->
<nav class="navbar navbar-dark navbar-expand-md bg-transparent fixed-top">
  <div class="container">
    <img src="../assets/icon/logo-buseet.png" width="60px" alt="Logo Buseet" />
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Offcanvas Navbar Start -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <!-- Profile User Offcanvas Start -->
          <?php if(isset( $_SESSION["user_id"])): ?> 
          <div class="dropdown ms-4 profile">
            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Profile and Setting">
              <img src="../assets/icon/profile.svg" width="35px" alt="" />
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../profile/transaction-history.php" aria-label="Perjalanan Saya">Perjalan Saya</a></li>
              <li><a class="dropdown-item" href="../profile/profile.php" aria-label="Profile Saya">Profile Saya</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item text-danger" href="../auth/logout.php" aria-label="Sign Out">Sign Out</a></li>
            </ul>
          </div>
          <?php else: ?>
          <div class="d-flex justify-content-around ms-4 profile">
            <a class="btn btn-primary btn-login" href="../auth/login.php" role="button" aria-label="Login">Login</a>
            <a class="btn btn-register" href="../auth/register.php" role="button" aria-label="Sign In">Sign In</a>
          </div>
          <?php endif; ?>
          <!-- Profile User Offcanvas End -->
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav ms-auto justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link <?= setActiveClass('home') ?>" aria-current="page" href="../pages/home.php" aria-label="Beranda">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= setActiveClass('bus-search') ?>" href="../pages/bus-search.php" aria-label="Tiket Bus Online">Tiket Bus Online</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= setActiveClass('partnership') ?>" href="../pages/partnership.php" aria-label="Partner Kami">Partner Kami</a>
          </li>
          <!-- Dropdown Menu Start -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Atur Pesanan"> Atur Pesanan </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../booking/change-ticket-search.php" aria-label="Perubahan Jadwal">Perubahan Jadwal</a></li>
              <li><a class="dropdown-item" href="../booking/user-ticket.php" aria-label="Tiket Saya">Tiket Saya</a></li>
            </ul>
          </li>
          <!-- Dropdown Menu End -->
          <!-- Profile User Start -->
          <?php if(isset( $_SESSION["user_id"])): ?> 
          <li class="nav-item dropdown ms-4 profile">
            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Profile and Setting">
              <img src="../assets/icon/profile.svg" width="35px" alt="" />
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../profile/transaction-history.php" aria-label="Perjalanan Saya">Perjalan Saya</a></li>
              <li><a class="dropdown-item" href="../profile/profile.php" aria-label="Profile Saya">Profile Saya</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item text-danger" href="../auth/logout.php" aria-label="Sign Out">Sign Out</a></li>
            </ul>
          </li>
          <?php else: ?>
          <li class="nav-link d-flex ms-4 profile">
            <a class="btn btn-primary btn-login me-2" href="../auth/login.php" role="button" aria-label="Login">Login</a>
            <a class="btn btn-register" href="../auth/register.php" role="button" aria-label="Sign In">Sign In</a>
          </li>
          <?php endif; ?>
          <!-- Profile User End -->
        </ul>
      </div>
    </div>
    <!-- Offcanvas Navbar End -->
  </div>
</nav>
<!-- Navigation Bar Tag End -->