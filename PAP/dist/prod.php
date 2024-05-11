<?php
session_start();
include("ligacao.php");
$id_prod = $_GET['id_prod'];

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
    <title>Motospeed | Produto</title>

</head>

<body class="">

    <!-- Navbar -->
    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <!-- / Navbar--> <!-- / Navbar-->

    <!-- Main Section-->
    <section class="mt-0 ">
        <!-- Page Content Goes Here -->
        <?php
        $sqlProd = "SELECT DISTINCT 
                        p.id_prod,
                        p.nome_prod,
                        c.nome_categoria,
                        m.nome_marca,
                        p.preco_prod,
                        p.foto_prod,
                        p.desc_prod
                        FROM 
                        produtos p
                        INNER JOIN categorias c ON p.id_categoria = c.id_categoria
                        INNER JOIN marcas m ON p.id_marca = m.id_marca
                        WHERE id_prod = $id_prod";
        $result2 = mysqli_query($con, $sqlProd);
        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
        ?>
                <!-- Breadcrumbs-->
                <div class="bg-dark py-6">
                    <div class="container-fluid">
                        <nav class="m-0" aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item breadcrumb-light"><a href="index.php">Início</a></li>
                                <li class="breadcrumb-item breadcrumb-light"><a href="produtos.php">Produtos</a></li>
                                <li class="breadcrumb-item  breadcrumb-light active" aria-current="page">
                                    <?= $row2['nome_prod'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- / Breadcrumbs-->

                <div class="container-fluid mt-5">
                    <!-- Product Top Section-->
                    <div class="row g-9" data-sticky-container>

                        <!-- Product Images-->
                        <div class="col-12 col-md-12 col-xl-4">
                            <div class="row g-3" data-aos="fade-right">
                                <div class="col-12">
                                    <picture>
                                        <img class="img-fluid" data-zoomable src="<?= $row2['foto_prod'] ?>">
                                    </picture>
                                </div>
                                <!-- <div class="col-12">
                            <picture>
                                <img class="img-fluid" data-zoomable src="./assets/images/products/product-page-2.jpeg"
                                    alt="HTML Bootstrap Template by Pixel Rocket">
                            </picture>
                        </div> -->
                            </div>
                        </div>
                        <!-- /Product Images-->

                        <!-- Product Information-->
                        <div class="col-12 col-md-6 col-lg-7">
                            <div class="sticky-top top-5">
                                <div class="pb-3" data-aos="fade-in">
                                    <h1 class="mb-1 fs-2 fw-bold"><?= $row2['nome_prod'] ?></h1>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="fs-4 m-0"><?= $row2['preco_prod'] ?>€</p>
                                    </div>
                                    <div class="border-top mt-4 mb-3 product-option">
                                        <small class="text-uppercase pt-4 d-block fw-bolder">
                                            <span class="text-muted">Tamanhos disponíveis</span> :
                                        </small>
                                        <div class="mt-4 d-flex justify-content-start flex-wrap align-items-start">
                                            <div class="form-check-option form-check-rounded">
                                                <input type="radio" name="product-option-sizes" value="XS" id="option-sizes-0">
                                                <label for="option-sizes-0">

                                                    <small>XS</small>
                                                </label>
                                            </div>
                                            <div class="form-check-option form-check-rounded">
                                                <input type="radio" name="product-option-sizes" value="S" id="option-sizes-1">
                                                <label for="option-sizes-1">

                                                    <small>S</small>
                                                </label>
                                            </div>
                                            <div class="form-check-option form-check-rounded">
                                                <input type="radio" name="product-option-sizes" value="M" checked id="option-sizes-2">
                                                <label for="option-sizes-2">

                                                    <small>M</small>
                                                </label>
                                            </div>
                                            <div class="form-check-option form-check-rounded">
                                                <input type="radio" name="product-option-sizes" value="L" id="option-sizes-3">
                                                <label for="option-sizes-3">

                                                    <small>L</small>
                                                </label>
                                            </div>
                                            <div class="form-check-option form-check-rounded">
                                                <input type="radio" name="product-option-sizes" value="Xl" id="option-sizes-4">
                                                <label for="option-sizes-4">

                                                    <small>XL</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top mt-4 mb-3 product-option">
                                        <small class="text-uppercase pt-4 d-block fw-bolder">
                                            <span class="text-muted">Quantidade</span> :
                                        </small>
                                        <form id="formAddToCart" action="adicionar_ao_carrinho.php" method="POST">
                                            <div class="mt-4 d-flex justify-content-start flex-wrap align-items-start">
                                                <div class="form-check-option2 form-check-rounded">
                                                    <input type="number" name="quantidade" value="1">
                                                </div>
                                            </div>
                                            <button id="btnAddToCart" class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow">Adicionar ao carrinho</button>

                                            <input type="hidden" name="id_prod" value="<?= $id_prod ?>">
                                            <input type="hidden" name="tamanho" id="tamanhoSelecionado" value="M"> <!-- Campo oculto para o tamanho -->
                                        </form>
                                        <script>
                                            document.getElementById('btnAddToCart').addEventListener('click', function(event) {
                                                // Evitar o comportamento padrão do botão (submit do formulário)
                                                event.preventDefault();

                                                // Obter o tamanho selecionado pelo usuário
                                                var tamanhoSelecionado = document.querySelector('input[name="product-option-sizes"]:checked').value;
                                                // Atribuir o tamanho selecionado ao campo oculto
                                                document.getElementById('tamanhoSelecionado').value = tamanhoSelecionado;

                                                // Obter a quantidade digitada pelo usuário
                                                var quantidadeSelecionada = document.querySelector('input[name="quantidade"]').value;
                                                // Atribuir a quantidade selecionada ao campo oculto
                                                document.querySelector('input[name="quantidade"]').value = quantidadeSelecionada;

                                                // Enviar o formulário
                                                document.getElementById('formAddToCart').submit();
                                            });
                                        </script>
                                        <!-- Product Highlights-->
                                        <div class="my-5">
                                            <div class="row">
                                                <div class="col-12 col-md-4">
                                                    <div class="text-center px-2">
                                                        <i class="ri-24-hours-line ri-2x"></i>
                                                        <small class="d-block mt-1">Entrega amanhã !</small>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="text-center px-2">
                                                        <i class="ri-secure-payment-line ri-2x"></i>
                                                        <small class="d-block mt-1">Checkout Seguro</small>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="text-center px-2">
                                                        <i class="ri-service-line ri-2x"></i>
                                                        <small class="d-block mt-1">Boa Qualidade</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- / Product Highlights-->

                                        <!-- Product Accordion -->
                                        <div class="accordion" id="accordionProduct">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button open collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Descrição do produto
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionProduct">
                                                    <div class="accordion-body">
                                                        <p class="m-0"><?= $row2['desc_prod'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- / Product Accordion-->
                                    </div>
                                </div>
                            </div>
                            <!-- / Product Information-->
                        </div>
                        <!-- / Product Top Section-->
                <?php
            }
        }
                ?>
                    </div>

                    <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    <!-- Footer -->
    <?php include("footer.php"); ?>

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>