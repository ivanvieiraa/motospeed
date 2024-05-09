<?php
include ("ligacao.php");
session_start();

?>

<!doctype html>
<html lang="en">

<!-- Head -->

<head>
  <!-- Page Meta Tags-->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="">

  <!-- Custom Google Fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto"
    rel="stylesheet">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon/favicon-16x16.png">
  <link rel="mask-icon" href="./assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="./assets/css/libs.bundle.css" />

  <!-- Main CSS -->
  <link rel="stylesheet" href="./assets/css/theme.bundle.css" />

  <!-- Fix for custom scrollbar if JS is disabled-->
  <noscript>
    <style>
      /**
          * Reinstate scrolling for non-JS clients
          */
      .simplebar-content-wrapper {
        overflow: auto;
      }
    </style>
  </noscript>

  <!-- Page Title -->
  <title>Motospeed | Recuperação</title>

</head>

<body class=" bg-light">

  <!-- Main Section-->
  <section class="mt-0 overflow-hidden  vh-100 d-flex justify-content-center align-items-center p-4">
    <!-- Page Content Goes Here -->

    <!-- Login Form-->
    <div class="col col-md-8 col-lg-6 col-xxl-5">
      <!-- Logo-->
      <a class="navbar-brand fw-bold fs-3 flex-shrink-0 order-0 align-self-center justify-content-center d-flex mx-0 px-0"
        href="./index.php">
        <div class="d-flex align-items-center">
          <img src="mstile-150x150.png" alt="" height="100px" width="100px">
        </div>
      </a>
      <!-- / Logo-->
      <div class="shadow-xl p-4 p-lg-5 bg-white">
        <h1 class="text-center fs-2 mb-5 fw-bold">Recuperação da password</h1>
        <p class="text-muted">Insira o seu endereço de email abaixo para repor a sua password.</p>
        <form name="forget_pass" action="reset.php" method="POST" onsubmit="return validateForm()" novalidate>
          <div class="form-group">
            <label for="forgot-password" class="form-label">Endereço de email </label>
            <input type="email" class="form-control" name="reset_email" id="forgot-password"
              placeholder="Endereço de email" oninput="clearErrorMessage('email-error')">
            <span id="email-error" class="error-message"></span>
            <?php
            // Verifica se a mensagem de erro está definida na sessão
            if (isset ($_SESSION['mensagem'])) {
              echo '<div class="alert alert-danger" role="alert">' . $_SESSION['mensagem'] . '</div>';
              // Limpa a mensagem de erro da sessão após exibi-la
              unset($_SESSION['mensagem']);
            }
            ?>
          </div>
          <button type="submit" class="btn btn-dark d-block w-100 my-4">Recuperar password</button>
        </form>
        <p class="d-block text-center text-muted"><a href="./login_form.php">Inicie sessão</a> | <a
            href="./register.php">Crie uma conta</a> </p>
      </div>

    </div>
    <!-- / Login Form-->

    <!-- /Page Content -->
  </section>
  <!-- / Main Section-->


  <!-- Theme JS -->
  <!-- Vendor JS -->
  <script src="./assets/js/vendor.bundle.js"></script>

  <!-- Theme JS -->
  <script src="./assets/js/theme.bundle.js"></script>

  <script>
    function validateForm() {
      var email = document.forms["forget_pass"]["reset_email"].value;
      // Validar o formato do email usando uma expressão regular
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (email === "" || !emailRegex.test(email)) {
        displayErrorMessage('email-error', '<br>Insira um email válido !');
        return false;
      }
      return true;
    }
    function displayErrorMessage(id, message) {
      document.getElementById(id).innerHTML = message;
    }

    function clearErrorMessage(id) {
      document.getElementById(id).innerHTML = '';
    }
  </script>
</body>

</html>