<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> Login - Admin </title>
    <link rel="icon" href="../assets/icon/logo-buseet.png">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Font CSS -->
    <link rel="stylesheet" href="../assets/style/font.css">
    <!-- Link CSS -->
    <link rel="stylesheet" href="../assets/style/login.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../assets/style/component.css" />
  </head>

  <body class="d-flex justify-content-center">
    <!-- Main Content -->
    <div class="container">
      <img src="../assets/icon/logo-buseet.png" width="200px" alt="" />
      <h2 class="fs-1">Login - Admin</h2>
      <form action="../config/login-admin-validate.php" method="post" class="text-center login-input">
        <!-- Email Input -->
        <div class="mb-3 col-5 text-start fs-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Your Email" required />
        </div>

        <!-- Password Input -->
        <div class="mb-3 col-5 text-start fs-6">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required />
          <p id="password-error" class="font-12 fw-semibold" style="color: #FF0060;"></p>
        </div>
        <?php if (isset($_SESSION['error_message'])): ?>
          <p class="text-danger text-start col-5 fw-semibold mb-3" style="margin-top: -1rem;"><?php echo $_SESSION['error_message']; ?></p>
        <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>
        <div class="mb-3 form-check col-5 text-start d-flex justify-content-between">
          <div>
            <input type="checkbox" class="form-check-input" id="rememberMe" />
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
          <div>
            <a href="">Forgot Password?</a>
          </div>
        </div>
        <!-- Login Button -->
        <button type="submit" class="btn btn-light btn-outline-primary d-block mb-4 col-3" id="login-btn" name="btn-login"> Login </button>
        <!-- Google And Facebook Login Icon End -->
        <p>Belum Mempunyai Akun? <a href="register-admin.php" class="text-white fw-bold ms-1">Sign up</a></p>
      </form>
    </div>
    <!-- Main Content End -->
    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script>
    const passwordInput = document.getElementById('password');
    const errorElement = document.getElementById('password-error');

    // Function to validate the password
    function validatePassword() {
        const password = passwordInput.value;
        const regex = /^(?=.*\d).{5,}$/; // At least 5 characters with at least one digit

        if (regex.test(password)) {
          errorElement.textContent = ''; // Clear error message
        } else {
          errorElement.textContent = 'Password harus setidaknya 5 kakter dan terdapat angka (0-9)';
        }
    }

    // Event listener for password input
    passwordInput.addEventListener('input', validatePassword);
    </script>

  </body>
</html>
