// Responsive Navbar
function navbarResponsive() {
  // Mendapatkan elemen nav
  var navbar = document.querySelector("nav");

  // Mendefinisikan titik di mana transisi class akan terjadi
  var scrollPoint = 75; // Anda dapat mengubah nilai ini sesuai kebutuhan

  window.onscroll = function () {
    // Memeriksa posisi scroll saat ini
    var scrollPosition = window.scrollY;

    // Menambahkan atau menghapus class berdasarkan posisi scroll
    if (scrollPosition > scrollPoint) {
      navbar.classList.remove("transparent-navbar");
      navbar.classList.add("mynavbar");
    } else {
      navbar.classList.add("transparent-navbar");
      navbar.classList.remove("mynavbar");
    }
  };
}
