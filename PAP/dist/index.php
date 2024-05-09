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
    <title>Motospeed | Início</title>

</head>

<body class="">

    <!-- Navbar -->
    <!-- Navbar -->
    <?php include ('navbar.php'); ?>
    <!-- / Navbar--> <!-- / Navbar-->

    <!-- Main Section-->
    <section class="mt-0 overflow-hidden ">
        <!-- Page Content Goes Here -->

        <!-- / Top banner -->
        <section class="vh-75 vh-lg-60 container-fluid rounded overflow-hidden" data-aos="fade-in">
            <!-- Swiper Info -->
            <div class="swiper-container overflow-hidden rounded h-100 bg-light" data-swiper data-options='{
              "spaceBetween": 0,
              "slidesPerView": 1,
              "effect": "fade",
              "speed": 1000,
              "loop": true,
              "parallax": true,
              "observer": true,
              "observeParents": true,
              "lazy": {
                "loadPrevNext": true
                },
                "autoplay": {
                  "delay": 5000,
                  "disableOnInteraction": false
              },
              "pagination": {
                "el": ".swiper-pagination",
                "clickable": true
                }
              }'>
                <div class="swiper-wrapper">

                    <!-- Slide-->
                    <div class="swiper-slide position-relative h-100 w-100">
                        <div
                            class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                            <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden"
                                data-swiper-parallax="-100"
                                style=" will-change: transform; background-image: url(./assets/images/banners/slide1.jpg)">
                            </div>
                        </div>
                        <div
                            class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                            <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100"></p>
                            <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white"
                                data-swiper-parallax="100">
                                Proteção<span class="text-outline-light"> Essencial</span>
                            </h2>
                            <div data-swiper-parallax-y="-25">
                                <a href="./produtos.php" class="btn btn-psuedo text-white" role="button">comprar
                                    produtos</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Slide-->

                    <!-- Slide-->
                    <div class="swiper-slide position-relative h-100 w-100">
                        <div
                            class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                            <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden"
                                data-swiper-parallax="-100"
                                style=" will-change: transform; background-image: url(./assets/images/banners/slide2.jpg)">
                            </div>
                        </div>
                        <div
                            class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                            <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">Coleção de
                                topo</p>
                            <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white"
                                data-swiper-parallax="100">
                                Alpine<span class="text-outline-light">Stars</span></h2>
                            <div data-swiper-parallax-y="-25">
                                <a href="./produtos.php" class="btn btn-psuedo text-white" role="button">Produtos |
                                    alpinestars</a>
                            </div>
                        </div>
                    </div>
                    <!--/Slide-->

                    <!-- Slide-->
                    <div class="swiper-slide position-relative h-100 w-100">
                        <div
                            class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                            <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden"
                                data-swiper-parallax="-100"
                                style=" will-change: transform; background-image: url(./assets/images/banners/slide3.jpg)">
                            </div>
                        </div>
                        <div
                            class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                            <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">A mais
                                requisitada</p>
                            <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white"
                                data-swiper-parallax="100">
                                <span class="text-outline-light">Scorpion</span>
                            </h2>
                            <div data-swiper-parallax-y="-25">
                                <a href="./produtos.php" class="btn btn-psuedo text-white" role="button">Produtos |
                                    Scorpion</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Slide-->

                    <!--Slide-->
                    <div class="swiper-slide position-relative h-100 w-100">
                        <div
                            class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                            <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden"
                                data-swiper-parallax="-100"
                                style=" will-change: transform; background-image: url(./assets/images/banners/slide4.jpg)">
                            </div>
                        </div>
                        <div
                            class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                            <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100">a clássica</p>
                            <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white"
                                data-swiper-parallax="100">
                                <span class="text-outline-light"></span> DAINESE
                            </h2>
                            <div data-swiper-parallax-y="-25">
                                <a href="./produtos.php" class="btn btn-psuedo text-white" role="button">produtos |
                                    Dainese
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--/Slide-->

                </div>

                <div class="swiper-pagination swiper-pagination-bullet-light"></div>

            </div>
            <!-- / Swiper Info-->
        </section>
        <!--/ Top Banner-->

        <!-- Featured Brands-->
        <div class="brand-section container-fluid" data-aos="fade-in">
            <div class="bg-overlay-sides-white-to-transparent bg-white py-5 py-md-7">
                <section class="marquee marquee-hover-pause">
                    <div class="marquee-body">
                        <div class="marquee-section animation-marquee-50">
                            <div class="mx-3 mx-lg-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/alpine.svg"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-3 mx-lg-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/scorpion.png"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-3 mx-lg-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/agv.png"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-3 mx-lg-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/dainese.png"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-3 mx-lg-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/shoei.png"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-3 mx-lg-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/shark.svg"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-3 mx-lg-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/alpine.svg"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-3 mx-lg-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/scorpion.png"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-3 mx-lg-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/agv.png"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                        </div>
                        <div class="marquee-section animation-marquee-50">
                            <div class="mx-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/dainese.png"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/shoei.png"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/shark.svg"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/alpine.svg"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/scorpion.png"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/agv.png"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/dainese.png"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/shoei.png"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                            <div class="mx-5 f-w-24">
                                <a class="d-block" href="./produtos.php">
                                    <picture>
                                        <img class="img-fluid d-table mx-auto" src="./assets/images/logos/shark.svg"
                                            alt="">
                                    </picture>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!--/ Featured Brands-->

        <div class="container-fluid">

            <!-- Featured Categories-->
            <div class="m-0">
                <!-- Swiper Latest -->
                <div class="swiper-container overflow-hidden overflow-lg-visible" data-swiper data-options='{
                        "spaceBetween": 25,
                        "slidesPerView": 1,
                        "observer": true,
                        "observeParents": true,
                        "breakpoints": {     
                          "540": {
                            "slidesPerView": 1,
                            "spaceBetween": 0
                          },
                          "770": {
                            "slidesPerView": 2
                          },
                          "1024": {
                            "slidesPerView": 3
                          },
                          "1200": {
                            "slidesPerView": 4
                          },
                          "1500": {
                            "slidesPerView": 5
                          }
                        },   
                        "navigation": {
                          "nextEl": ".swiper-next",
                          "prevEl": ".swiper-prev"
                        }
                      }'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                            <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="100">
                                <picture class="d-block mb-4 img-clip-shape-one">
                                    <img class="w-100" title="" src="./assets/images/categories/capacetes.jpeg"
                                        alt="HTML Bootstrap Template by Pixel Rocket">
                                </picture>
                                <p class="title-small mb-2 text-muted">Motospeed</p>
                                <h4 class="lead fw-bold">CAPACETES</h4>
                                <a href="./produtos.php" class="btn btn-psuedo align-self-start">Comprar capacetes</a>
                            </div>
                        </div>
                        <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                            <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="200">
                                <picture class="d-block mb-4 img-clip-shape-one">
                                    <img class="w-100" title="" src="./assets/images/categories/casacos.jpg"
                                        alt="HTML Bootstrap Template by Pixel Rocket">
                                </picture>
                                <p class="title-small mb-2 text-muted">Motospeed</p>
                                <h4 class="lead fw-bold">CASACOS</h4>
                                <a href="./produtos.php" class="btn btn-psuedo align-self-start">Comprar casacos</a>
                            </div>
                        </div>
                        <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                            <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="400">
                                <picture class="d-block mb-4 img-clip-shape-one">
                                    <img class="w-100" title="" src="./assets/images/categories/calcas.jpg"
                                        alt="HTML Bootstrap Template by Pixel Rocket">
                                </picture>
                                <p class="title-small mb-2 text-muted">Motospeed</p>
                                <h4 class="lead fw-bold">CALÇAS</h4>
                                <a href="./produtos.php" class="btn btn-psuedo align-self-start">Comprar calças</a>
                            </div>
                        </div>
                        <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                            <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="000">
                                <picture class="d-block mb-4 img-clip-shape-one">
                                    <img class="w-100" title="" src="./assets/images/categories/luvas.jpg"
                                        alt="HTML Bootstrap Template by Pixel Rocket">
                                </picture>
                                <p class="title-small mb-2 text-muted">Motospeed</p>
                                <h4 class="lead fw-bold">LUVAS</h4>
                                <a href="./produtos.php" class="btn btn-psuedo align-self-start">Comprar luvas</a>
                            </div>
                        </div>


                        <div class="swiper-slide align-self-stretch bg-transparent h-auto">
                            <div class="me-xl-n4 me-xxl-n5" data-aos="fade-up" data-aos-delay="300">
                                <picture class="d-block mb-4 img-clip-shape-one">
                                    <img class="w-100" title="" src="./assets/images/categories/botas.jpg"
                                        alt="HTML Bootstrap Template by Pixel Rocket">
                                </picture>
                                <p class="title-small mb-2 text-muted">Motospeed</p>
                                <h4 class="lead fw-bold">BOTAS</h4>
                                <a href="./produtos.php" class="btn btn-psuedo align-self-start">Comprar botas</a>
                            </div>
                        </div>


                    </div>

                    <div
                        class="swiper-btn swiper-prev swiper-disabled-hide swiper-btn-side btn-icon bg-white text-dark ms-3 shadow mt-n5">
                        <i class="ri-arrow-left-s-line "></i>
                    </div>
                    <div
                        class="swiper-btn swiper-next swiper-disabled-hide swiper-btn-side swiper-btn-side-right btn-icon bg-white text-dark me-3 shadow mt-n5">
                        <i class="ri-arrow-right-s-line ri-lg"></i>
                    </div>

                </div>
                <!-- / Swiper Latest--> <!-- SVG Used for Clipath on featured images above-->
                <svg width="0" height="0">
                    <defs>
                        <clipPath id="svg-slanted-one" clipPathUnits="objectBoundingBox">
                            <path
                                d="M0.822,1 H0.016 a0.015,0.015,0,0,1,-0.016,-0.015 L0.158,0.015 A0.016,0.015,0,0,1,0.173,0 L0.984,0 a0.016,0.015,0,0,1,0.016,0.015 L0.837,0.985 A0.016,0.015,0,0,1,0.822,1">
                            </path>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <!-- /Featured Categories-->


            <!-- Homepage Banners-->
            <div class="pt-7 mb-5 mb-lg-10">
                <div class="row g-4">
                    <div class="col-12 col-xl-6 position-relative" data-aos="fade-right">
                        <picture class="position-relative z-index-10">
                            <img class="w-100 rounded" src="./assets/images/banners/banner-promo.jpg"
                                alt="HTML Bootstrap Template by Pixel Rocket">
                        </picture>
                        <div
                            class="position-absolute top-0 bottom-0 start-0 end-0 d-flex justify-content-center align-items-center z-index-20">
                            <div class="py-6 px-5 px-lg-10 text-center w-100">
                                <h2 class="display-1 mb-3 fw-bold text-white"><span
                                        class="text-outline-light">Promoções</span> Especiais</h2>
                                <a href="./produtos.php" class="btn btn-psuedo text-white" role="button">ver promoções</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6" data-aos="fade-left">
                        <div class="row g-4 justify-content-end">
                            <div class="col-12 col-md-6 d-flex">
                                <div class="card position-relative overflow-hidden">
                                    <picture class="position-relative z-index-10 d-block bg-light">
                                        <img class="w-100 rounded" src="./assets/images/banners/banner8.jpg"
                                            alt="HTML Bootstrap Template by Pixel Rocket">
                                    </picture>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex">
                                <div class="card position-relative overflow-hidden">
                                    <picture class="position-relative z-index-10 d-block bg-light">
                                        <img class="w-100 rounded" src="./assets/images/banners/banner9.jpg"
                                            alt="HTML Bootstrap Template by Pixel Rocket">
                                    </picture>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex">
                                <div class="card position-relative overflow-hidden">
                                    <picture class="position-relative z-index-10 d-block bg-light">
                                        <img class="w-100 rounded" src="./assets/images/banners/banner10.jpg"
                                            alt="HTML Bootstrap Template by Pixel Rocket">
                                    </picture>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex">
                                <div class="card position-relative overflow-hidden">
                                    <picture class="position-relative z-index-10 d-block bg-light">
                                        <img class="w-100 rounded" src="./assets/images/banners/banner11.jpg"
                                            alt="HTML Bootstrap Template by Pixel Rocket">
                                    </picture>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Homepage Banners-->


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