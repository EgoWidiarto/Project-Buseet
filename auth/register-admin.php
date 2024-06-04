<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Sign Up  - Admin</title>
    <link rel="icon" type="image/png" href="../assets/icon/logo-buseet.png">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Link CSS -->
    <link rel="stylesheet" href="../assets/style/login.css?v=<?= time(); ?>" />
    <link rel="stylesheet" href="../assets/style/component.css?v=<?= time(); ?>">
</head>

<body>
    <!-- Main Content Start -->
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-5">
            <img src="../assets/icon/logo-buseet.png" width="400px" alt="Logo BUSEET" />
        </div>
        <div class="col-5">
            <form action="../config/register-admin-validate.php" method="post" class="text-center">
                <!-- Input Full Name -->
                <div class="mb-3 col-12 text-start">
                    <label for="full-name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="full-name" name="full-name" aria-describedby="emailHelp" placeholder="Masukkan Nama Lengkap" required />
                </div>

                <!-- Input Email -->
                <div class="mb-3 col-12 text-start">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan Email" required />
                    <?php if (isset($_SESSION['email-usage-message'])): ?>
                    <p class="text-danger fw-semibold"><?php echo $_SESSION['email-usage-message']; ?></p>
                    <?php unset($_SESSION['email-usage-message']); ?>
                    <?php endif; ?>
                </div>

                <!-- Input Password -->
                <div class="mb-3 col-12 text-start">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required />
                    <p class="font-13 fw-semibold password-error" style="color: #FF0000;"></p>
                </div>
                <!-- Re-Input Password -->
                <div class="mb-3 col-12 text-start">
                    <label for="re-password" class="form-label">Ulangi Password</label>
                    <input type="password" class="form-control" id="re-password" name="re-password" placeholder="Ulangi Password" required />
                    <!-- Tempat untuk menampilkan pesan error -->
                    <p class="font-13 fw-semibold re-password-error" style="color: #FF0000;"></p>
                    <?php if (isset($_SESSION['password-error_message'])): ?>
                    <p class="text-danger text-start col-5 fw-semibold mb-3" style="margin-top: -1rem;"><?php echo $_SESSION['password-error_message']; ?></p>
                    <?php unset($_SESSION['password-error_message']); ?>
                    <?php endif; ?>
                </div>

                <!-- Sign up Button -->
                <button type="submit" name="sign-btn" class="btn btn-light btn-outline-primary d-block mt-4 mb-3 col-6 mt-5">Sign Up</button>
                <p>Sudah Punya Akun? <a href="login-admin.php" class="text-white fw-bold">Login</a></p>
            </form>
        </div>
    </div>
    <!-- Main Content End -->
    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Script JQuery -->
    <script src="../assets/js/jquery-3.7.1.min.js?v=<?= time() ?>"></script>
    <script>
    // Fungsi untuk memeriksa kesesuaian password dan re-password serta kriteria lainnya
    function validatePasswordMatch() {
        let password = document.querySelector('#password').value;
        let rePassword = document.querySelector('#re-password').value;
        let rePasswordError = document.querySelector('.re-password-error');
        let passwordError = document.querySelector('.password-error');
        let regex = /^(?=.*[a-zA-Z])(?=.*\d).{5,}$/; 

        // Validasi password
        if (!regex.test(password)) {
            passwordError.textContent = 'Password harus minimal 5 karakter dan mengandung huruf serta angka.';
        } else {
            passwordError.textContent = ''; 
        }

        // Validasi re-password
        if (password !== rePassword) {
            rePasswordError.textContent = 'Password tidak cocok.';
        } else {
            rePasswordError.textContent = ''; 
        }
    }

    // Tambahkan event listener untuk field password dan re-password
    document.querySelector('#password').addEventListener('keyup', validatePasswordMatch);
    document.querySelector('#re-password').addEventListener('keyup', validatePasswordMatch);
    </script>

</body>

</html>