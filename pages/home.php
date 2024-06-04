<?php
session_start();

require_once '../includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title> BUSEET </title>
    <link rel="icon" href="../assets/icon/logo-buseet.png">
    <!-- Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Link Font -->
    <link rel="stylesheet" href="../assets/style/font.css">
    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="../lib/AOS/node_modules/aos/dist/aos.css">
    <!-- css code file -->
    <link rel="stylesheet" href="../assets/style/global.css?v=<?= time() ?>" />

    <style>
        .hero-section {
          padding-top: 8rem !important;
        }

        .hero-section .btn {
          width: 315px;
          height: 58px;
          border-radius: 30px;
          font-weight: 500;
        }

        .hero-section p {
          text-align: center;
          font-family: "Poppins", sans-serif;
        }

        .hero-section .paragraf {
          font-size: 14px;
          font-weight: 300;
        }
    </style>
  </head>

  <body>
    <!-- Navigation Bar Tag Start -->
    <?php include("../includes/header.php"); ?>
    <!-- Navigation Bar Tag End -->

    <!-- Image Header -->
    <img src="../assets/images/bus-banner.png" alt="Background Bus" class="bus-img" />

    <!-- Hero Section Start -->
    <section class="container w-full hero-section">
      <div class="row align-items-center">
        <div class="col-3">
          <div class="row">
            <p class="h4"> Perjalanan Nyama Harga Terjamin </p>
          </div>
          <div class="row">
            <p class="paragraf">Pesan tiket bus semurah dan segampang ini? BUSEET lah, dimana lagi kalau bukan disini</p>
          </div>
        </div>
        <div class="col-4">
          <?php if(isset($_SESSION["user_id"])): ?>
            <a href="../pages/bus-search.php" role="button" class="btn btn-outline-primary btn-light btn-lg" aria-label="Get Started" style="padding-top: .8rem;">Get Started</a>
          <?php else: ?>
            <a href="../auth/login.php" role="button" class="btn btn-outline-primary btn-light btn-lg" aria-label="Get Started" style="padding-top: .8rem;">Get Started</a>
          <?php endif; ?>  
        </div>
        <!-- Map View Code -->
        <div class="col-4">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.022254927942!2d112.72197627442645!3d-7.351397072324451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e5ef62fbc74d%3A0xc850d71c0bfc7b60!2sTerminal%20Bungurasih!5e0!3m2!1sen!2sid!4v1709715394984!5m2!1sen!2sid"
            width="454"
            height="260"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="rounded"></iframe>
        </div>
        <!-- Map View End -->
      </div>
    </section>
    <!--  Hero Section End -->

    <!-- How To Booking  Section Start -->
    <section class="w-full pemesanan text-center">
      <h2 class="text-white">Cara Pemesanan Tiket Bus</h2>
      <!-- Booking Image Start -->
      <div class="img-container d-flex justify-content-center mt-5">
        <div class="row pesan-img">
          <div class="col-4" data-aos="fade-down">
            <img src="../assets/images/pilih-perjalanan.svg" width="190px" alt="" />
          </div>
          <div class="col-4" data-aos="fade-down" data-aos-delay="150">
            <img src="../assets/images/pilih-bus.svg" width="190px" alt="" />
          </div>
          <div class="col-4" data-aos="fade-down" data-aos-delay="250">
            <img src="../assets/images/pembayaran.svg" width="190px" alt="" />
          </div>
        </div>
      </div>
      <!-- Booking Image Start -->

      <!-- Caption  Text Start -->
      <div class="caption-conatiner d-flex justify-content-center text-white pt-2">
        <div class="row pesan-caption text-center">
          <div class="col-4" data-aos="fade-down">
            <h5>Pilih Rincian Perjalanan</h5>
            <p>Masukkan lokasi keberangkatan. tujuan, tanggal perjalanan, kemudian klik ‘cari’</p>
          </div>
          <div class="col-4" data-aos="fade-down" data-aos-delay="150">
            <h5>Pilih Bus dan Tempat Duduk</h5>
            <p>Pilih bis, tempat duduk, tempat keberangkatan, tujuan, isi rincian penumpang dan klik 'Pembayaran'</p>
          </div>
          <div class="col-4" data-aos="fade-down" data-aos-delay="250">
            <h5>Pembayaran yang Mudah</h5>
            <p>Pembayaran dapat dilakukan melalui transfer ATM, Internet banking, Alfamart, kartu Kredit/Debit, Mandiri Clickpay, Bca Clickpay</p>
          </div>
        </div>
      </div>
      <!-- Caption  Text End -->
    </section>
    <!-- How To Booking Section End -->

    <!-- Form For Button Pesan Sekarang -->
    <form action="" method="post" class="d-flex justify-content-center">
      <div class="container-btn">
        <a href="../pages/bus-search.php" role="button" class="btn btn-outline-primary btn-light btn-lg" aria-label="Pesan Sekarang" style="padding-top: .8rem;">Pesan Sekarang ></a>
      </div>
    </form>

    <?php include ("../includes/footer.php"); ?>

    <!-- Bootstrap5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- AOS Animation JS -->
    <script src="../lib/AOS/node_modules/aos/dist/aos.js?v=<?= time(); ?>"></script>
    <!-- javascript code file -->
    <script src="../assets/js/function.js?v=<?= time(); ?>"></script>
    <script>
        // Responsive NavBer
        navbarResponsive();

        // AOS Animation
        AOS.init({
            once: true,
            duration: 1200,
        })
    </script>
  </body>
</html>
<?php
if (isset($_SESSION["cancel-message"])) {
  $msg = $_SESSION["cancel-message"];
  echo "<script>alert('$msg')</script>";
  unset($_SESSION["cancel-message"]);
}
?>