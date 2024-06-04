<?php
session_start();
require_once '../includes/connection.php';

$userID = $_SESSION["user_id"];

$userInfoQuery = mysqli_query($conn, "SELECT p.*
                                      FROM pengguna p 
                                      WHERE p.Id_pengguna = '$userID';");
$userInfo = mysqli_fetch_assoc($userInfoQuery);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title> Profile </title>
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
    <?php include '../includes/header.php'; ?>
    <!-- Navigation Bar Tag End -->

    <!-- profile start -->
    <section class="profile-s w-100 d-flex justify-conten-center p-3">
      <div class="container-profile text-black p-2 ms-4">
        <div class="box d-flex align-items-center text-black justify-content-evenly">
          <img src="../assets/icon/profile.svg" width="120px" alt="" />
          <div>
            <p class="profile-item fw-semibold font-14 text-capitalize"> <?= $userInfo["nama_lengkap"] ?> </p>
            <p class="profile-item fw-semibold font-14"> <?= $userInfo["nomor_hp"] ?> </p>
          </div>
        </div>
        <div class="profile-item d-flex align-items-center text-black justify-content-between p-2">
          <div>
            <p class="item-profile fw-bold font-14"> Akun Saya </p>
            <p class="profil-ul fw-semibold font-14"> Profile </p>
            <a href="transaction-history.php" class="item-profile fw-bold font-14 text-decoration-none"> Riwayat Transaksi </a>
          </div>
        </div>
      </div>
      <form action="" method="post" class="mx-auto profile-form">
        <div class="mt-4 mb-5 bg-light mx-auto text-black p-4 rounded" style="width: 55rem">
          <div class="booking-detail-container mt-3 row w-100 p-0 position-relative">
            <h6 class="text-start fw-bold font-16">Profile Pengguna</h6>
            <!-- Identity Form Start -->
            <div class="form-identity-container text-start mt-3 gap-0 font-13">
              <!--Full Name Input -->
              <div class="mb-3">
                <div class="row d-flex justify-content-around">
                  <div class="col-5">
                    <label for="full-name" class="form-label">Nama</label>
                    <input type="text" class="form-control col-8 p-1 text-black-50 font-14 text-capitalize" id="full-name" name="full-name" placeholder="Masukkan Nama" value="<?= $userInfo["nama_lengkap"] ?>" readonly />
                  </div>
                  <div class="col-7">
                    <label for="contact" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control col-8 p-1 text-black-50 font-14" id="contact" name="contact" placeholder="No. Telepon" value="<?= $userInfo["nomor_hp"] ?>" readonly />
                  </div>
                </div>
              </div>

              <!-- Identity Id Input -->
              <div class="mb-3">
                <div class="row d-flex justify-content-around">
                  <div class="col-3 mt-1">
                    <?php if(is_null($userInfo["nomor_identitas"])): ?>
                    <label for="identity-type">Tipe Identitas</label>
                    <select name="identity-type" class="form-select p-1 mt-1 font-14" aria-label="Default select example" id="identity-type">
                      <option class="font-13" selected>Pilih Tipe Identitas</option>
                      <option class="font-13" value="KTP">KTP</option>
                      <option class="font-13" value="Passport">Passport</option>
                      <option class="font-13" value="VISA">VISA</option>
                    </select>
                    <?php else: ?>
                    <label for="identity-type">Tipe Identitas</label>
                    <input type="text" class="form-control p-1 mt-1 font-14 text-black-50" name="identity-type" id="identity-type" value="<?= $userInfo["tipe_identitas"] ?>" readonly>
                    <?php endif; ?>
                  </div>
                  <div class="col-5">
                    <label for="identity-number" class="form-label">Nomor Identitas</label>
                    <input type="text" name="identity-num" class="form-control col-8 p-1 text-black-50 font-14 personal" id="identity-number" placeholder="No. Identitas" value="<?= $userInfo["nomor_identitas"] ?>" readonly />
                  </div>
                  <div class="col-4">
                    <label for="birth-date" class="form-label">Tanggal Lahir</label>
                    <input onfocus="(this.type='date')" onblur="(this.type='text')" name="birth-date" class="form-control col-8 p-1 text-black-50 font-14 personal" id="birth-date" placeholder="Tanggal Lahir" value="<?= $userInfo["tgl_lahir"] ?>" readonly />
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <div class="row d-flex justify-content-around">
                  <div class="col-5">
                    <label for="user-email" class="form-label">Email</label>
                    <input type="text" class="form-control col-8 p-1 text-black-50 font-14" id="user-email" name="email" placeholder="Masukkan Email" value="<?= $userInfo["email"] ?>" />
                  </div>
                  <div class="col-7">
                    <label for="user-address" class="form-label">Alamat</label>
                    <input type="text" class="form-control col-8 p-1 text-black-50 font-14 text-capitalize" id="user-address" name="user-address" placeholder="Masukkan Alamat" value="<?= $userInfo["alamat"] ?>" />
                  </div>
                </div>
              </div>
              <!-- Password Input -->
              <div class="mb-3">
                <label for="password-change" class="form-label">Password Changes</label>
                <input type="password" class="form-control p-1 font-14" id="password-change" name="password-change" placeholder="New Password" />
                <p id="password-error" class="font-12 fw-semibold" style="color: #FF0060;"></p>
                <input type="password" class="form-control p-1 font-14" id="password-confirm" name="password-confirm" placeholder="Confirm New Password" />
                <p id="re-password-error" class="font-12 fw-semibold" style="color: #FF0060;"></p>
              </div>
            </div>
            <div class="text-end mb-3 col-12">
              <a role="button" class="font-13 text-black me-3 text-decoration-none cancel-btn fw-bold">Cancel</a>
              <a role="button" class="btn btn-lg font-13 cta-btn w-25">Change Profile</a>
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

      let h = document.querySelector("#password-change").value;
      console.log(h);
        navbarResponsive();

        // Handle Input Readable
        let inputs = document.querySelectorAll('input');
        document.addEventListener("DOMContentLoaded", () => {
            const identityInput = document.querySelector('#identity-number');
            // Cek nilai input
            if (identityInput.value !== '') {
                // Jika tidak null, tambahkan atribut readonly
                identityInput.setAttribute('readonly', true);
            }
            inputs.forEach(function(input) {
                input.setAttribute('readonly', true);
            });
        });

        function validatePasswordMatch() {
            let password = document.querySelector('#password-change').value;
            let rePassword = document.querySelector('#password-confirm').value;
            let rePasswordError = document.querySelector('.re-password-error');
            let passwordError = document.querySelector('.password-error');
            let regex = /^(?=.*[a-zA-Z])(?=.*\d).{5,}$/; 

            // Validasi password
            if (!regex.test(password)) {
                passwordError.innerHTML = 'Password harus minimal 5 karakter serta mengandung huruf (A-Z/a-z) dan angka (0-9).';
            } else {
                passwordError.innerHTML = '';
            }

            // Validasi re-password
            if (password !== rePassword) {
                rePasswordError.innerHTML = 'Password tidak cocok.';
            } else {
                rePasswordError.innerHTML = '';
            }
        }

        // Tambahkan event listener untuk field password dan re-password
        document.querySelector('#password-change').addEventListener('keyup', validatePasswordMatch);
        document.querySelector('#password-confirm').addEventListener('keyup', validatePasswordMatch);

        function toggleProfileEdit() {
            let button = document.querySelector('.cta-btn');
            let password = document.getElementById('password-change');
            let confirmPassword = document.getElementById('password-confirm');

            if (button.innerHTML === 'Change Profile') {
                button.innerHTML = 'Save Change';
                inputs.forEach(function(input) {
                    input.removeAttribute('readonly');
                });
            } else {
                if (password.value === confirmPassword.value) {
                  if( confirm("Apakah Anda Yakin Ingin Memperbarui Profile")) {
                    let form = document.querySelector('.profile-form');
                    form.setAttribute('action', 'profile-update.php');
                    form.submit();
                    button.innerHTML = 'Change Profile';
                  }
                } else {
                    alert('Password Tidak Sesuai');
                }
            }
        }

        // Tambahkan event listener ke tombol
        document.querySelector('.cta-btn').addEventListener('click', toggleProfileEdit);
        document.querySelector('.cancel-btn').addEventListener('click', function() {
            let ctaBTN = document.querySelector('.cta-btn');
            ctaBTN.innerHTML = "Change Profile";
            window.location.reload();
        });
    </script>
  </body>
</html>
<?php
if (isset($_SESSION["profile-update-message"])) {
  $msg = $_SESSION["profile-update-message"];
  echo "<script>alert('$msg')</script>";
  unset($_SESSION["profile-update-message"]);
}
?>