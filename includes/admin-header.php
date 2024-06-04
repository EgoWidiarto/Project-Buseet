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
          <div class="dropdown ms-4 profile">
            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Profile and Setting">
              <img src="../assets/icon/profile.svg" width="35px" alt="" />
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../profile/profile.php" aria-label="Profile Saya">Profile Saya</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item text-danger" href="../auth/logout.php" aria-label="Sign Out">Sign Out</a></li>
            </ul>
          </div>
          <!-- Profile User Offcanvas End -->
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav ms-auto justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link <?= setActiveClass('admin-home') ?>" aria-current="page" href="../admin/admin-home.php" aria-label="Beranda">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= setActiveClass('bus-search') ?>" href="../admin/schedule-search.php" aria-label="Jadwal">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= setActiveClass('validasi-tiket') ?>" href="../admin/validasi-ticket.php" aria-label="Tiket">Tiket</a>
          </li>
          <!-- Dropdown Menu Start -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Atur Pesanan"> Tambah Baru </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../admin/bus-search.php" aria-label="Perubahan Jadwal">Bus</a></li>
              <li><a class="dropdown-item" href="../admin/driver-search.php" aria-label="Tiket Saya">Sopir</a></li>
              <li><a class="dropdown-item" href="../admin/terminal-search.php" aria-label="Tiket Saya">Jadwal</a></li>
            </ul>
          </li>
          <!-- Dropdown Menu End -->
        </ul>
      </div>
    </div>
    <!-- Offcanvas Navbar End -->
  </div>
</nav>
<!-- Navigation Bar Tag End -->