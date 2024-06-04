<?php
session_start();

require_once '../includes/connection.php';

$terminal = mysqli_query($conn, "SELECT * FROM terminal LIMIT 10;");

if (isset($_POST["search"])) {
    $search = mysqli_real_escape_string($conn, $_POST["terminal-search"]);
    $terminal = mysqli_query($conn, "SELECT * FROM terminal WHERE nama_terminal LIKE '%$search%'");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title> BUSEET - ADMIN </title>
    <link rel="icon" href="../assets/icon/logo-buseet.png">
    <!-- Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Linnk Font -->
    <link rel="stylesheet" href="../assets/style/font.css">
    <!-- css code file -->
    <link rel="stylesheet" href="../assets/style/global.css?v=<?= time(); ?>" />
    <link rel="stylesheet" href="../assets/style/component.css?v=<?= time(); ?>" />

    <style>
        .search-bus-section .btn {
          width: 315px;
          height: 58px;
          border-radius: 30px;
          font-weight: 500;
          margin-top: -2rem;
        }

        .bus-img {
            height: 40vh;
        }

        .list-bus{
          margin-top: 4rem;
        }

        .bus-add-btn {
          width: 12rem;
          height: 35px;
          background-color: #fff;
          font-size: 13px;
        }

        .bus-add-btn:hover {
          background-color: #fafafa;
        }

        table {
          border-collapse: collapse;
          width: 85%;
          margin-top: -3rem;
        }

        tr,
        td,
        th {
          border: 3px solid #0c206a;
          padding: 1rem;
        }

        thead {
          background-color: #3a4d93;
        }
    </style>
  </head>

  <body id="pesan-tiket">
    <!-- Navigation Bar Tag Start -->
    <?php include("../includes/admin-header.php") ?>
    <!-- Navigation Bar Tag End -->

    <!-- Image Header -->
    <img src="../assets/images/bus-banner.png" alt="Background Bus" class="bus-img" />

    <!-- Searching Bus Section Start -->
    <section class="container w-full text-center search-bus-section">
       <form action="" method="post">
        <div class="d-flex">
          <!-- Input Asal Bus -->
          <div class="input-group mb-3">
            <span class="input-group-text curved" id="basic-addon1"><i class="bi bi-map"></i></span>
            <input type="text" class="form-control curved" name="terminal-search" placeholder="Cari Terminal" aria-label="Pencarian Terminal" aria-describedby="input-asal-terminal" required />
          </div>
        </div>
        <button class="btn btn-outline-primary btn-light btn-lg" type="submit" name="search" aria-label="Cari Bus">Cari Terminal</button>
      </form>
    </section>
    <!-- Searching Bus Section End -->

    <!-- Table Bus Route Section Start -->
    <section class="list-bus text-center">
      <div class="mt-4">
        <div class="mb-2 text-end" style="margin-right: 6.5rem">
          <a href="terminal-add.php" role="button" class="btn bus-add-btn text-black"><i class="bi bi-plus-square-dotted me-2"></i>Tambah Terminal</a>
        </div>
        <table class="bg-white mx-auto mt-3 text-black">
        <!-- Table Head Start -->
        <thead class="text-white">
            <tr>
                <th>No</th>
                <th class="font-14">Nama Terminal</th>
                <th>Alamat terminal</th>
                <th></th>
            </tr>
        </thead>
        <!-- Table Head End -->

        <!-- Table Body Start -->
        <tbody>
            <?php $num = 1; ?>
            <?php while( $row = mysqli_fetch_assoc($terminal) ): ?>
            <tr>
                <td><?= $num; ?></td>
                <td class="font-15"><?= $row["nama_terminal"]; ?></td>
                <td class="font-15"><?= $row["lokasi"]; ?></td>
                <td>
                    <a href="../config/admin-terminal-delete.php?terminal-id=<?= $row['kode_terminal'] ?>" class="text-decoration-none text-danger"><i class="bi bi-trash3-fill"></i>Hapus</a>
                </td>
            </tr>
            <?php $num++; ?>
            <?php  endwhile; ?>
        </tbody>
        <!-- Table Body End -->
        </table>
      </div>
    </section>
    <!-- Table Bus Route Section End -->

    <!-- Footer Bus Search -->
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
<?php
if (isset($_SESSION["remove-message"])) {
  $msg = $_SESSION["remove-message"];
  echo "<script>alert('$msg')</script>";
  unset($_SESSION["remove-message"]);
}

if (isset($_SESSION["insert-message"])) {
  $msg = $_SESSION["insert-message"];
  echo "<script>alert('$msg')</script>";
  unset($_SESSION["insert-message"]);
}
?>