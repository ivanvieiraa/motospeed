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
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto"
        rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


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
    <title>Motospeed | Sobre nós</title>

</head>

<body class="">

    <!-- Navbar -->
    <!-- Navbar -->
    <?php include ('navbar.php'); ?>
    <!-- / Navbar--> <!-- / Navbar-->

    <!-- Main Section-->
    <section class="mt-0 overflow-hidden ">
        <!-- Page Content Goes Here -->
        <div class="container-fluid">
            <!-- Homepage Intro-->
            <div class="position-relative row my-lg-7 pt-5 pt-lg-0 g-8">
                <div class="bg-text bottom-0 start-0 end-0" data-aos="fade-up">
                    <h2 class="bg-text-title opacity-10"><span class="text-outline-dark">Moto</span>speed</h2>
                </div>
                <div class="col-12 col-md-6 position-relative z-index-20 mb-7 mb-lg-0" data-aos="fade-right">
                    <p class="text-muted title-small">sobre nós</p>
                    <h3 class="display-3 fw-bold mb-5"><span class="text-outline-dark">Motospeed</span> - Material de
                        proteção para motociclistas</h3>
                    <p class="lead">A Motospeed é uma grande empresa que trabalha com as melhores marcas do mercado como a <a
                            href="./produtos.php">Alpinestars</a>, <a href="./produtos.php">Dainese</a>, <a
                            href="./produtos.php">Scorpion</a>, <a href="./produtos.php">AGV</a> e muitas mais...</p>
                    <p class="lead">Trabalhamos arduamente todos os dias em busca de oferecer aos nossos clientes as
                        melhores marcas e produtos do mercado.</p>
                    <p class="lead">Priorizamos sempre os clientes, de modo a consquistar a melhor confiança alguma vez
                        vista no mundo dos Motards.</p>
                    <a href="./produtos.php" class="btn btn-psuedo" role="button">produtos mais recentes</a>
                </div>
                <div class="col-12 col-md-6 position-relative z-index-20 pe-0" data-aos="fade-left">
                    <picture class="w-50 d-block position-relative z-index-10 border border-white border-4 shadow-lg">
                        <img class="img-fluid" src="./assets/images/banners/yzf.jpg"
                            alt="HTML Bootstrap Template by Pixel Rocket">
                    </picture>
                    <picture
                        class="w-60 d-block me-8 mt-n10 shadow-lg border border-white border-4 position-relative z-index-20 ms-auto">
                        <img class="img-fluid" src="./assets/images/banners/r6.jpeg"
                            alt="HTML Bootstrap Template by Pixel Rocket">
                    </picture>
                    <picture
                        class="w-50 d-block me-8 mt-n7 shadow-lg border border-white border-4 position-absolute top-0 end-0 z-index-0 ">
                        <img class="img-fluid" src="./assets/images/banners/cross.jpg"
                            alt="HTML Bootstrap Template by Pixel Rocket">
                    </picture>
                </div>
            </div>
            <!-- / Homepage Intro-->
        </div>

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    <!-- Footer -->
    <?php include ("footer.php"); ?>


    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>