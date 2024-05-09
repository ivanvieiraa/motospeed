<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <!-- Meta tags -->
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
      .simplebar-content-wrapper {
        overflow: auto;
      }

      .error-message {
        color: red;
      }
    </style>
  </noscript>

  <!-- Page Title -->
  <title>Motospeed | Criar conta</title>
</head>

<body class="bg-light">
  <!-- Main Section-->
  <section class="mt-0  d-flex justify-content-center align-items-center p-4">
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
        <h1 class="text-center fw-bold mb-5 fs-2">Criar conta</h1>
        <form name="criar_form" method="POST" action="criar.php" onsubmit="return validateForm()">
          <div class="form-group">
            <label class="form-label" for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o seu primeiro nome"
              value="<?php echo isset($_SESSION['nome_value']) ? $_SESSION['nome_value'] : ''; ?>"
              oninput="clearErrorMessage('nome-error')">
            <span id="nome-error" class="error-message"></span>
          </div>

          <div class="form-group">
            <label class="form-label" for="apelido">Apelido</label>
            <input type="text" class="form-control" name="apelido" id="apelido" placeholder="Insira o seu apelido"
              value="<?php echo isset($_SESSION['apelido_value']) ? $_SESSION['apelido_value'] : ''; ?>"
              oninput="clearErrorMessage('apelido-error')">
            <span id="apelido-error" class="error-message"></span>

          </div>

          <div class="form-group">
            <label class="form-label" for="email">Endereço de email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="nome@email.com"
              value="<?php echo isset($_SESSION['email_value']) ? $_SESSION['email_value'] : ''; ?>"
              oninput="clearErrorMessage('email-error')">
            <span id="email-error" class="error-message"></span>

            <?php
            if (isset($_SESSION['mensagem'])) {
              echo '<div class="alert alert-danger" role="alert">' . $_SESSION['mensagem'] . '</div>';
              unset($_SESSION['mensagem']);
            }
            ?>
          </div>

          <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password"
              placeholder="Insira a sua password" oninput="clearErrorMessage('pass-error')">
            <span id="pass-error" class="error-message"></span><br>
            <br>Já é cliente? <a href="./login_form.php">Inicie sessão</a>
            <a href="./index.php" style="float: right;">Voltar</a>

          </div>

          <button type="submit" class="btn btn-dark d-block w-100 my-4">Criar conta</button>
        </form>

      </div>
    </div>
    <!-- / Login Form-->
  </section>
  <!-- / Main Section-->

  <!-- Vendor JS -->
  <script src="./assets/js/vendor.bundle.js"></script>

  <!-- Theme JS -->
  <script src="./assets/js/theme.bundle.js"></script>

  <script>
    function validateForm() {
      var nome = document.forms["criar_form"]["nome"].value;
      var apelido = document.forms["criar_form"]["apelido"].value;
      var email = document.forms["criar_form"]["email"].value;
      var pass = document.forms["criar_form"]["password"].value;
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (nome === "") {
        displayErrorMessage('nome-error', '<br>Insira um nome!');
        return false;
      }

      if (apelido === "") {
        displayErrorMessage('apelido-error', '<br>Insira um apelido!');
        return false;
      }

      if (email === "" || !emailRegex.test(email)) {
        displayErrorMessage('email-error', '<br>Insira um email válido!');
        return false;
      }

      if (pass === "") {
        displayErrorMessage('pass-error', '<br>Insira uma password!');
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