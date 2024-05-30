<!doctype html>
<html lang="pt">
<?php
session_start();
// Verifica se a mensagem de erro está definida na sessão
if (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] == "Foi enviado um email com as instruções para repor a password!") {
  echo '<div class="alert alert-success" role="alert">' . $_SESSION['mensagem'] . '</div>';
  // Limpa a mensagem de erro da sessão após exibi-la
  unset($_SESSION['mensagem']);
} else {
  if (isset($_SESSION['mensagem']) && ($_SESSION['mensagem'] != "Inicie sessão com a sua nova password !" || $_SESSION['mensagem'] == "A sua conta está desativada! Para mais informações contacte o suporte" )) {
    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['mensagem'] . '</div>';
    // Limpa a mensagem de erro da sessão após exibi-la
    unset($_SESSION['mensagem']);
  }
}
?>
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

      .error-message {
        color: red !important;

      }
    </style>
  </noscript>

  <!-- Page Title -->
  <title> Motospeed | Login</title>

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
          <img src="mstile-150x150.png" alt="" height="90px" width="90px">
        </div>
      </a>
      <!-- / Logo-->
      <div class="shadow-xl p-4 p-lg-5 bg-white">
        <h1 class="text-center fw-bold mb-5 fs-2">Login</h1>
        <!--<a href="#" class="btn btn-facebook d-block mb-2"><i class="ri-facebook-circle-fill align-bottom"></i> Login
          with Facebook</a>
        <a href="#" class="btn btn-twitter d-block mb-2"><i class="ri-twitter-fill align-bottom"></i> Login with
          Twitter</a>
        <span class="text-muted text-center d-block fw-bolder my-4">OU</span>-->
        <form name="login_form" action="login.php" method="POST" onsubmit="return validateForm()" novalidate>
          <?php
          if (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] == "Inicie sessão com a sua nova password !") {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['mensagem'] . '</div>';
            // Limpa a mensagem de erro da sessão após exibi-la
            unset($_SESSION['mensagem']);
          }
          ?>
          <div class="form-group">
            <label class="form-label" for="email">Endereço de email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="nome@email.com"
              value="<?php echo isset($_SESSION['email_value']) ? $_SESSION['email_value'] : ''; ?>"
              oninput="clearErrorMessage('email-error')">
            <span id="email-error" class="error-message"></span>

          </div>

          <div class="form-group">
            <label for="password" class="form-label d-flex justify-content-between align-items-center">Password</label>
            <input type="password" class="form-control" name="password" id="password"
              placeholder="Insira a sua password" oninput="clearErrorMessage('pass-error')">
            <span id="pass-error" class="error-message"></span><br>
            <span id="login-error" class="error-message"></span><br>

            Não tem conta? <a href="./register.php">Criar conta</a>
            <a href="./forgotten-password.php" style="float: right;">Esqueci-me da password</a><br>
            <button type="submit" class="btn btn-dark d-block w-100 my-4">Login</button>
          </div>
          <div class="form-group">

          </div>
        </form>


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
      var email = document.forms["login_form"]["email"].value;
      var pass = document.forms["login_form"]["password"].value;
      // Validar o formato do email usando uma expressão regular
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (email === "" || !emailRegex.test(email)) {
        displayErrorMessage('email-error', '<br>Insira um email válido !');
        return false;
      }

      if (pass === "") {
        displayErrorMessage('pass-error', '<br>Insira uma password !');
        return false;
      }

      if (isset($_SESSION['mensagem'])) {
        displayErrorMessage('login-error', '<br>Credenciais inválidas !');
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