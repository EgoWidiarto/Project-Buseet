<?php
session_start();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Link Font -->
    <link rel="stylesheet" href="../assets/style/font.css">
    <!-- css code file -->
    <link rel="stylesheet" href="../assets/style/global.css?v=<?= time() ?>" />

    <style>
        .partner {
            padding-top: 10rem;
        }
    </style>
  </head>

  <body>
    <!-- Navigation Bar Tag Start -->
    <?php include('../includes/header.php') ?>
    <!-- Navigation Bar Tag End -->

    <!--body our partner-->
    <section class="container w-full text-center d-flex justify-content-center partner">
      <div class="row">
        <div style="text-align: center">
          <h3 class="text-white">Our Partner</h3>
        </div>
        <div>
          <div class="img-container d-flex justify-content-center mt-5"></div>
          <img src="../assets/images/partner/pesona-indonesia.png" width="650px" />
        </div>
      </div>
    </section>

    <section class="w-full img-container partner d-flex justify-content-center text-center p-5">
      <div class="partner-img p-5">
        <div class="row d-flexjustify-content-between">
          <div class="col-4">
            <img src="../assets/images/partner/bus-pariwisata.png" width="180px" alt="" />
          </div>
          <div class="col-4">
            <img src="../assets/images/partner/surya-trans.png" width="180px" alt="" />
          </div>
          <div class="col-4">
            <img src="../assets/images/partner/logo-bus.png" width="180px" alt="" />
          </div>
        </div>
        <div class="row d-flex justify-content-between mt-5">
          <div class="col-4 img-row">
            <img src="../assets/images/partner/surya-trans.png" width="180px" alt="" />
          </div>
          <div class="col-4">
            <img src="../assets/images/partner/logo-bus.png" width="180px" alt="" />
          </div>
          <div class="col-4">
            <img src="../assets/images/partner/bus-pariwisata.png" width="180px" alt="" />
          </div>
        </div>
        <div class="row d-flex justify-content-center mt-5">
          <div class="col-4 img-row">
            <img src="../assets/images/partner/logo-bus.png" width="180px" alt="" />
          </div>
          <div class="col-4">
            <img src="../assets/images/partner/bus-pariwisata.png" width="180px" alt="" />
          </div>
          <div class="col-4">
            <img src="../assets/images/partner/surya-trans.png" width="180px" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- Body Our Partner End -->

    <!-- Partnership Footer -->
    <?php include('../includes/footer.php') ?>

    <!-- Bootstrap5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- javascript code file -->
    <script src="../assets/js/function.js?v=<?= time(); ?>"></script>
    <script>
        navbarResponsive();
    </script>
  </body>
</html>
