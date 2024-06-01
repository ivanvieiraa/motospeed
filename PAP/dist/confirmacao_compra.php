<?php
include("ligacao.php");
session_start();

// Verificar se o ID da venda foi passado
if (!isset($_GET['id_venda'])) {
  // Redirecionar para a página inicial ou mostrar uma mensagem de erro
  header('location:index.php');
  exit();
}

$id_venda = $_GET['id_venda'];

// Obter os dados da venda
$sql_venda = "SELECT * FROM vendas WHERE id_venda = '$id_venda'";
$result_venda = mysqli_query($con, $sql_venda);
$venda = mysqli_fetch_assoc($result_venda);

// Obter os detalhes da venda
$sql_detalhes = "SELECT dv.*, p.nome_prod, p.foto_prod FROM detalhe_venda dv JOIN produtos p ON dv.id_prod = p.id_prod WHERE dv.id_venda = '$id_venda'";
$result_detalhes = mysqli_query($con, $sql_detalhes);
?>

<!doctype html>
<html lang="en">

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
            <div class="mt-5">
              <h3 class="fs-5 fw-bolder mb-4 border-bottom pb-4" style="color: green;">Compra efetuada com sucesso !</h3>
              <div class="row">
                <div class="col-12">
                  <h5 class="justify-content-between d-flex align-items-start mb-2">Dados da compra:</h5>
                  <br>
                  <p><?= $venda['nome'] ?> <?= $venda['apelido'] ?></p>
                  <p><?= $venda['email'] ?></p>
                  <p><?= $venda['morada'] ?></p>
                  <p><?= $venda['codigop'] ?></p>
                </div>
              </div>
              <div class="pt-5 mt-5 pb-5 border-top d-flex flex-column flex-md-row justify-content-between align-items-center">
                <a href="./produtos.php" class="btn ps-md-0 btn-link fw-bolder w-100 w-md-auto mb-2 mb-md-0" role="button">Ver mais produtos</a>
                <a href="./pedidos.php" class="btn ps-md-0 btn-link fw-bolder w-100 w-md-auto mb-2 mb-md-0" role="button">Ver histórico de compras</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
          <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
            <div class="pb-3">
              <h5 class="justify-content-between d-flex align-items-start mb-2 mt-4">Detalhes da Compra:</h5>
              <?php
              if (mysqli_num_rows($result_detalhes) > 0) {
                while ($detalhe = mysqli_fetch_assoc($result_detalhes)) {
              ?>
                  <div class="row mx-0 py-4 g-0 border-bottom">
                    <div class="col-2 position-relative">
                      <picture class="d-block border">
                        <img class="img-fluid" src="<?= $detalhe['foto_prod'] ?>">
                      </picture>
                    </div>
                    <div class="col-9 offset-1">
                      <div>
                        <h6 class="justify-content-between d-flex align-items-start mb-2">
                          <?= $detalhe['nome_prod'] ?>
                        </h6>
                        <span class="d-block text-muted fw-bolder text-uppercase fs-9">Tamanho: <?= $detalhe['tamanho'] ?> / Quantidade: <?= $detalhe['quantidade'] ?></span>
                      </div>
                      <p class="fw-bolder text-end text-muted m-0"><?= $detalhe['preco_uni'] ?>€</p>
                    </div>
                  </div>
              <?php
                }
              } else {
                echo '<p>Nenhum detalhe de compra encontrado.</p>';
              }
              ?>
            </div>
            <div class="py-4 border-bottom">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="m-0 fw-bold fs-5">Total</p>
                  <span class="text-muted small">IVA incluído</span>
                </div>
                <p class="m-0 fw-bold fs-5"><?= $venda['total'] ?>€</p>
              </div>
            </div>
            <div class="py-4">
              <div class="input-group mb-0">
              </div>
              <a href="generate_invoice.php?id_venda=<?= $id_venda ?>" class="btn btn-dark w-100 text-center" role="button">Emitir fatura</a>
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