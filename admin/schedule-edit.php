<?php
session_start();
require_once '../includes/connection.php';
require_once '../includes/function.php';

$routeID = $_GET["id_rute"];

$scheduleInfoQuery = mysqli_query($conn, "SELECT 
        b.nama_bus AS 'bus_name',
        b.Id_bus AS 'bus-id', 
        ta.nama_terminal AS 'depart-terminal',
        ta.kode_terminal AS 'depart-code',
        tb.nama_terminal AS 'arrival-terminal',
        tb.kode_terminal AS 'arrival-code',
        DATE_FORMAT(j.jam_keberangkatan, '%H:%i') AS 'departure',
        rp.waktu_perjalanan AS 'estimated_time',
        j.Id_jadwal AS 'schedule-id'
    FROM 
        bus b
    INNER JOIN 
        jadwal j ON b.Id_bus = j.Id_bus
    INNER JOIN 
        rute_perjalanan rp ON j.Id_jadwal = rp.Id_jadwal
    INNER JOIN 
        terminal ta ON rp.terminal_awal = ta.kode_terminal
    INNER JOIN 
        terminal tb ON rp.terminal_akhir = tb.kode_terminal
    WHERE rp.Id_rute = '$routeID'");

$scheduleInfo = mysqli_fetch_assoc($scheduleInfoQuery);

$busInfoQuery = mysqli_query($conn, "SELECT Id_bus, nama_bus FROM bus");
$scheduleInfoQuery = mysqli_query($conn, "SELECT Id_jadwal, jam_keberangkatan FROM jadwal");
$departTerminalQuery = mysqli_query($conn, "SELECT kode_terminal, nama_terminal FROM terminal");
$arrTerminalQuery = mysqli_query($conn, "SELECT kode_terminal, nama_terminal FROM terminal");

if(isset($_POST["edit"])) {    
    if(updateSchedule($_POST)) {
        $_SESSION["update-message"] = "Perubahan Data Jadwal Berhasil";
        header('Location: schedule-search.php');
    } else {
        $_SESSION["update-message"] = "Perubahan Data Jadwa Gagal!!";
    }
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
    <link rel="icon" type="image/png" href="../assets/icon/logo-buseet.png">
    <!-- Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Linnk Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <!-- css code file -->
    <link rel="stylesheet" href="../assets/style/global.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../assets/style/profile.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../assets/style/component.css?v=<?= time() ?>" />

    <style>
    .form-control,
    .form-select {
        padding: .4rem !important;
        background-color: #ececec;
        border: none;
      }

    .cta-btn {
        background-color: #203f66;
        color: #fff;
        border: 1px solid #203f66;
    }
    
    .cta-btn:hover {
        background-color: transparent;
        border: 1px solid #203f66;
        color: #000;
    }

    .cancel-btn:active {
        color: red !important;
    }
    </style>
  </head>

  <body id="profile">
    <!-- Navigation Bar Tag Start -->
    <?php include '../includes/admin-header.php'; ?>
    <!-- Navigation Bar Tag End -->

    <!-- profile start -->
    <section class="profile-s w-100 d-flex justify-content-center p-3">
      <form action="" method="post" class="mx-auto edit-schedule-form">
        <input type="hidden" name="routeID" value="<?= $routeID ?>">
        <div class="mt-4 mb-5 bg-light mx-auto text-black p-4 rounded" style="width: 55rem">
          <div class="booking-detail-container mt-3 row w-100 p-0 position-relative">
            <h6 class="text-start fw-bold font-16">Edit Jadwal Perjalanan</h6>
            <!-- Identity Form Start -->
            <div class="form-identity-container text-start mt-3 gap-0 font-13">
              <!--Full Name Input -->
              <div class="mb-3">
                <div class="row d-flex justify-content-around">
                  <div class="col-7 mt-1">
                    <label for="bus-name">Nama Bus</label>
                    <select name="bus-name" class="form-select p-1 mt-1 font-14" aria-label="Default select example" id="bus-name">
                      <option class="font-13" selected value="<?= $scheduleInfo["bus-id"]?>"><?= $scheduleInfo["bus_name"]?></option>
                      <?php while($row = mysqli_fetch_assoc($busInfoQuery)): ?>
                      <option class="font-13" value="<?= $row["Id_bus"] ?>"><?= $row["nama_bus"] ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="col-5 mt-1">
                    <label for="depart-time">Waktu Keberangkatan</label>
                    <select name="depart-time" class="form-select p-1 mt-1 font-14" aria-label="Default select example" id="depart-time">
                      <option class="font-13" selected value="<?= $scheduleInfo["schedule-id"]?>"><?= $scheduleInfo["departure"] ?></option>
                      <?php while($row = mysqli_fetch_assoc($scheduleInfoQuery)): ?>
                      <option class="font-13" value="<?= $row["Id_jadwal"] ?>"><?= $row["jam_keberangkatan"] ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Identity Id Input -->
              <div class="mb-3">
                <div class="row d-flex justify-content-around">
                  <div class="col-6 mt-1">
                    <label for="depart-terminal">Terminal Keberangkatan</label>
                    <select name="depart-terminal" class="form-select p-1 mt-1 font-14" aria-label="Default select example" id="depart-terminal">
                      <option class="font-13" selected value="<?= $scheduleInfo["depart-code"]?>"><?= $scheduleInfo["depart-terminal"] ?></option>
                      <?php while($row = mysqli_fetch_assoc($departTerminalQuery)): ?>
                      <option class="font-13" value="<?= $row["kode_terminal"] ?>"><?= $row["nama_terminal"] ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="col-6 mt-1">
                    <label for="arr-terminal">Terminal Kedatangan</label>
                    <select name="arr-terminal" class="form-select p-1 mt-1 font-14" aria-label="Default select example" id="arr-terminal">
                      <option class="font-13" selected value="<?= $scheduleInfo["arrival-code"]?>"><?= $scheduleInfo["arrival-terminal"] ?></option>
                      <?php while($row = mysqli_fetch_assoc($arrTerminalQuery)): ?>
                      <option class="font-13" value="<?= $row["kode_terminal"] ?>"><?= $row["nama_terminal"] ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <div class="row d-flex justify-content-start">
                  <div class="col-7">
                    <label for="time-estimated" class="form-label">Estimasi Keberangkatan</label>
                    <input type="text" class="form-control col-8 p-1 font-14" id="time-estimated" name="time-estimated" placeholder="No. Telepon" value="<?= $scheduleInfo["estimated_time"] ?>" readonly />
                    <p class="font-12 ms-1 text-black-50">Masukkan Waktu Dalam Menit</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-end mb-3 mt-5 col-12">
              <a href="schedule-search.php" class="text-decoration-none text-danger me-3 fw-semibold">Cancel</a>
              <button type="submit" class="btn btn-lg font-13 cta-btn w-25" name="edit">Edit Jadwal</button>
            </div>
            <!-- Identity Form Start -->
          </div>
          <!-- Collapse Item End -->
        </div>
      </form>
      <!-- Form User Identity Tiket -->
    </section>

    <!-- profile end -->

    <!-- Bootstrap5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz " crossorigin="anonymous "></script>
    <!-- javascript code file -->
    <script src="../assets/js/function.js?v=<?= time() ?>"></script>

    <script>
    </script>
  </body>
</html>
<?php
if (isset($_SESSION["update-message"])) {
  $msg = $_SESSION["update-message"];
  echo "<script>alert('$msg')</script>";
  unset($_SESSION["update-message"]);
}
?>