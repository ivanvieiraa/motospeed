<?php
session_start();
include("ligacao.php");
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
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto" rel="stylesheet">

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
  <title>Motospeed | Checkout</title>

</head>

<body class="">
  <?php include("navbar.php"); ?>
  <!-- Main Section-->
  <section class="mt-0  vh-lg-100">
    <!-- Page Content Goes Here -->
    <div class="container">
      <div class="row g-0 vh-lg-100">
        <div class="col-lg-7 pt-5 pt-lg-10">
          <div class="pe-lg-5">
            <!-- Logo-->
            <a class="navbar-brand fw-bold fs-3 flex-shrink-0 mx-0 px-0" href="./index.php">
              <div class="d-flex align-items-center">
                <img src="mstile-150x150.png" alt="" height="100px" width="100px">
              </div>
            </a>
            <!-- / Logo-->
            <nav class="d-none d-md-block">
              <ul class="list-unstyled d-flex justify-content-start mt-4 align-items-center fw-bolder small">
                <li class="me-4"><a class="nav-link-checkout " href="./cart.php">Carrinho</a></li>
                <li class="me-4"><a class="nav-link-checkout active" href="./checkout.php">Checkout</a>
                </li>
                <li class="me-4"><a class="nav-link-checkout " href="./checkout-shipping.php?cart=true">Envio</a>
                </li>
                <li><a class="nav-link-checkout nav-link-last " href="./checkout-payment.php?cart=true">Método de
                    pagamento</a></li>
              </ul>
            </nav>
            <div class="mt-5">
              <!-- Checkout Panel Information-->
              <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-4">
                <h3 class="fs-5 fw-bolder m-0 lh-1">Informações pessoais</h3>
              </div>
              <div class="row">
                <!-- First Name-->
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="firstNameBilling" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="firstNameBilling" placeholder="" value="<?php echo $_SESSION['nome']; ?>" required="" readonly>
                  </div>
                </div>

                <!-- Last Name-->
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="lastNameBilling" class="form-label">Apelido</label>
                    <input type="text" class="form-control" id="lastNameBilling" placeholder="" value="<?php echo $_SESSION['apelido']; ?>" required="" readonly>
                  </div>
                </div>

                <!-- Email-->
                <div class="col-12">
                  <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $_SESSION['email']; ?>" readonly>
                  </div>

                </div>
              </div>

              <h3 class="fs-5 mt-5 fw-bolder mb-4 border-bottom pb-4">Dados de envio</h3>
              <div class="row">

                <!-- Address-->
                <div class="col-12">
                  <div class="form-group">
                    <label for="address" class="form-label">Morada</label>
                    <input type="text" class="form-control" id="address" placeholder="" value="<?php echo $_SESSION['morada']; ?>" required="">
                  </div>
                </div>


                <!-- Post Code-->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="zip" class="form-label">Código postal</label>
                    <input type="text" class="form-control" id="zip" placeholder="" value="<?php echo $_SESSION['codigop']; ?>" required="">
                  </div>
                </div>
              </div>

              <div class="pt-5 mt-5 pb-5 border-top d-flex flex-column flex-md-row justify-content-between align-items-center">
                <a href="./cart.php" class="btn ps-md-0 btn-link fw-bolder w-100 w-md-auto mb-2 mb-md-0" role="button">Voltar para carrinho</a>
                <a href="./checkout-shipping.php?cart=true" class="btn btn-dark w-100 w-md-auto" role="button">Proceder para envio</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
          <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
            <div class="pb-3">
              <!-- Cart Item-->
              <?php
              // Verifica se há dados do carrinho na URL
              if (isset($_GET['cart']) && $_GET['cart'] == "true") {
                // Verifica se a sessão do carrinho está definida e se há produtos no carrinho
                if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
                  $carrinho = $_SESSION['carrinho'];

                  // Loop através dos produtos no carrinho
                  foreach ($carrinho as $produto) {
                    // Aqui você pode exibir os dados do produto na seção de resumo do pedido
                    echo '<!-- Cart Item-->
              <div class="row mx-0 py-4 g-0 border-bottom">
                <div class="col-2 position-relative">
                  <picture class="d-block border">
                    <img class="img-fluid" src="' . $produto['foto'] . '">
                  </picture>
                </div>
                <div class="col-9 offset-1">
                  <div>
                    <h6 class="justify-content-between d-flex align-items-start mb-2">
                      ' . $produto['nome'] . '
                    </h6>
                    <span class="d-block text-muted fw-bolder text-uppercase fs-9">Tamanho: ' . $produto['tamanho'] . ' / Quantidade: ' . $produto['quantidade'] . '</span>
                  </div>
                  <p class="fw-bolder text-end text-muted m-0">' . $produto['preco'] . '€</p>
                </div>
              </div> <!-- / Cart Item-->';
                  }
                } else {
                  // Se não houver produtos no carrinho, exiba uma mensagem indicando isso
                  echo '<p>O seu carrinho está vazio.</p>';
                }
              }
              ?>
              <!-- / Cart Item-->
            </div>
            <div class="py-4 border-bottom">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="m-0 fw-bold fs-5">Total</p>
                  <span class="text-muted small">IVA incluído</span>
                </div>
                <?php
                // Inicializa o total como zero
                $total = 0;

                // Verifica se a sessão do carrinho está definida e se há produtos no carrinho
                if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
                  $carrinho = $_SESSION['carrinho'];
                  // Loop através dos produtos no carrinho
                  foreach ($carrinho as $produto) {
                    // Calcula o subtotal do produto (preço * quantidade)
                    $subtotal = $produto['preco'] * $produto['quantidade'];
                    // Adiciona o subtotal ao total
                    $total += $subtotal;
                  }
                }

                // Exibe o total formatado
                echo '<p class="m-0 fs-5 fw-bold">' . number_format($total, 2) . '€</p>';
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Page Content -->
  </section>
  <!-- / Main Section-->


  <!-- Theme JS -->
  <!-- Vendor JS -->
  <script src="./assets/js/vendor.bundle.js"></script>

  <!-- Theme JS -->
  <script src="./assets/js/theme.bundle.js"></script>


</body>

</html>