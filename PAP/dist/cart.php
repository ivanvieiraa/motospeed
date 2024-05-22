<?php session_start(); ?>
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
    <title>Motospeed | Carrinho</title>

</head>

<body class="">
    <?php include("navbar.php"); ?>
    <!-- Main Section-->
    <section class="mt-0 overflow-lg-hidden  vh-lg-100">
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
                                <li class="me-4"><a class="nav-link-checkout active " href="./cart.php">Carrinho</a></li>
                                <li class="me-4"><a class="nav-link-checkout " href="./checkout.php">Checkout</a>
                                </li>
                                <li class="me-4"><a class="nav-link-checkout " href="./checkout-shipping.php">Envio</a>
                                </li>
                            </ul>
                        </nav>
                        <?php
                        // Verifica se o parâmetro produto_adicionado está presente na URL e é igual a "true"
                        if (isset($_GET['produto_adicionado']) && $_GET['produto_adicionado'] == "true") {
                            echo '<div class="alert alert-success mt-4" role="alert">
                                    Produto adicionado ao carrinho com sucesso!
                                </div>';
                        }
                        ?>
                        <!-- / Logo-->
                        <div class="mt-5">
                            <h3 class="fs-5 fw-bolder mb-0 border-bottom pb-4">Carrinho</h3>
                            <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                                <table class="table2 align-middle">
                                    <tbody class="border-0">
                                        <?php
                                        // Verifica se a sessão do carrinho está definida e se há produtos no carrinho
                                        if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
                                            $carrinho = $_SESSION['carrinho'];
                                        ?>
                                        <?php
                                            // Loop através dos produtos no carrinho
                                            foreach ($carrinho as $produto) {
                                                echo '<!-- Cart Item-->
                                                        <tr>
                                                            <td>
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
                                                                                <a style="text-decoration:none;" href="remover_do_carrinho.php?produto_id=' . $produto['id'] . '" >  <i class="ri-close-line ms-3"></i> </a>
                                                                            </h6>
                                                                            <span class="d-block text-muted fw-bolder text-uppercase fs-9">Tamanho: ' . $produto['tamanho'] . ' / Quantidade: ' . $produto['quantidade'] . '</span>
                                                                        </div>
                                                                        <p class="fw-bolder text-end text-muted m-0">' . $produto['preco'] . '€</p>
                                                                    </div>
                                                                </div> <!-- / Cart Item-->
                                                            </td>
                                                        </tr>';
                                            }
                                        } else {
                                            // Se não houver produtos no carrinho, exibe uma mensagem indicando isso
                                            echo '<td colspan="3">O seu carrinho está vazio</td>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) { ?>
                    <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                        <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                            <div class="pb-4 border-bottom">
                                <div class="d-flex flex-column flex-md-row justify-content-md-between mb-4 mb-md-2">
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
                                    <!-- <p class="m-0 fs-5 fw-bold">422.99€</p> -->
                                </div>
                            </div>
                            <a href="./checkout.php" class="btn btn-dark w-100 text-center" role="button">Proceder para checkout</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- /Page Content -->
    </section>
    <?php include('footer.php'); ?>
    <!-- / Main Section-->

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>