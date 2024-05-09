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
                            <?= $row2['nome_prod']?>
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
                        <div class="col-12 col-md-6 col-xl-7">
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
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="sticky-top top-5">
                                <div class="pb-3" data-aos="fade-in">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="d-flex justify-content-start align-items-center disable-child-pointer cursor-pointer" data-pixr-scrollto data-target=".reviews">
                                            <!-- Review Stars Small-->
                                            <div class="rating position-relative d-table">
                                                <div class="position-absolute stars" style="width: 80%">
                                                    <i class="ri-star-fill text-dark mr-1"></i>
                                                    <i class="ri-star-fill text-dark mr-1"></i>
                                                    <i class="ri-star-fill text-dark mr-1"></i>
                                                    <i class="ri-star-fill text-dark mr-1"></i>
                                                    <i class="ri-star-fill text-dark mr-1"></i>
                                                </div>
                                                <div class="stars">
                                                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                    <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                                </div>
                                            </div> <small class="text-muted d-inline-block ms-2 fs-bolder">(105 reviews)</small>
                                        </div>
                                    </div>

                                    <h1 class="mb-1 fs-2 fw-bold"><?= $row2['nome_prod'] ?></h1>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="fs-4 m-0"><?= $row2['preco_prod'] ?>€</p>
                                    </div>
                                    <div class="border-top mt-4 mb-3 product-option">
                                        <small class="text-uppercase pt-4 d-block fw-bolder">
                                            <span class="text-muted">Tamanhos disponíveis</span> : <span class="selected-option fw-bold" data-pixr-product-option="size">M</span>
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
                                    <button class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow">Adicionar ao
                                        carrinho</button>

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
                                                <button class="accordion-button open" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                    Descrição do produto
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse open" aria-labelledby="headingThree" data-bs-parent="#accordionProduct">
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
            <div class="row g-0">

                <!-- Related Products-->
                <div class="col-12" data-aos="fade-up">
                    <h3 class="fs-4 fw-bolder mt-7 mb-4">Produtos que poderá gostar</h3>
                    <!-- Swiper Latest -->
                    <div class="swiper-container" data-swiper data-options='{
                        "spaceBetween": 10,
                        "loop": true,
                        "autoplay": {
                          "delay": 5000,
                          "disableOnInteraction": false
                        },
                        "navigation": {
                          "nextEl": ".swiper-next",
                          "prevEl": ".swiper-prev"
                        },   
                        "breakpoints": {
                          "600": {
                            "slidesPerView": 2
                          },
                          "1024": {
                            "slidesPerView": 3
                          },       
                          "1400": {
                            "slidesPerView": 4
                          }
                        }
                      }'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!-- Card Product-->
                                <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                    <div class="card-img position-relative">
                                        <div class="card-badges">
                                            <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span>
                                                Sale</span>
                                        </div>
                                        <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                        <picture class="position-relative overflow-hidden d-block bg-light">
                                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-1.jpg" alt="">
                                        </picture>
                                        <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                            <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                                Add</button>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <a class="text-decoration-none link-cover" href="./prod.php">Nike Air VaporMax
                                            2021</a>
                                        <small class="text-muted d-block">4 colours, 10 sizes</small>
                                        <p class="mt-2 mb-0 small"><s class="text-muted">$329.99</s> <span class="text-danger">$198.66</span></p>
                                    </div>
                                </div>
                                <!--/ Card Product-->
                            </div>
                            <div class="swiper-slide">
                                <!-- Card Product-->
                                <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                    <div class="card-img position-relative">
                                        <div class="card-badges">
                                            <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span>
                                                New In</span>
                                        </div>
                                        <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                        <picture class="position-relative overflow-hidden d-block bg-light">
                                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-2.jpg" alt="">
                                        </picture>
                                        <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                            <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                                Add</button>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <a class="text-decoration-none link-cover" href="./prod.php">Nike ZoomX
                                            Vaporfly</a>
                                        <small class="text-muted d-block">2 colours, 4 sizes</small>
                                        <p class="mt-2 mb-0 small">$275.45</p>
                                    </div>
                                </div>
                                <!--/ Card Product-->
                            </div>
                            <div class="swiper-slide">
                                <!-- Card Product-->
                                <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                    <div class="card-img position-relative">
                                        <div class="card-badges">
                                            <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-secondary rounded-circle d-block me-1"></span>
                                                Sold Out</span>
                                        </div>
                                        <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                        <picture class="position-relative overflow-hidden d-block bg-light">
                                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-3.jpg" alt="">
                                        </picture>
                                    </div>
                                    <div class="card-body px-0">
                                        <a class="text-decoration-none link-cover" href="./prod.php">Nike Blazer Mid
                                            &#x27;77</a>
                                        <small class="text-muted d-block">5 colours, 6 sizes</small>
                                        <p class="mt-2 mb-0 small text-muted">Sold Out</p>
                                    </div>
                                </div>
                                <!--/ Card Product-->
                            </div>
                            <div class="swiper-slide">
                                <!-- Card Product-->
                                <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                    <div class="card-img position-relative">
                                        <div class="card-badges">
                                        </div>
                                        <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                        <picture class="position-relative overflow-hidden d-block bg-light">
                                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-4.jpg" alt="">
                                        </picture>
                                        <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                            <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                                Add</button>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <a class="text-decoration-none link-cover" href="./prod.php">Nike Air Force
                                            1</a>
                                        <small class="text-muted d-block">6 colours, 9 sizes</small>
                                        <p class="mt-2 mb-0 small">$425.85</p>
                                    </div>
                                </div>
                                <!--/ Card Product-->
                            </div>
                            <div class="swiper-slide">
                                <!-- Card Product-->
                                <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                    <div class="card-img position-relative">
                                        <div class="card-badges">
                                            <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span>
                                                Sale</span>
                                        </div>
                                        <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                        <picture class="position-relative overflow-hidden d-block bg-light">
                                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-5.jpg" alt="">
                                        </picture>
                                        <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                            <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                                Add</button>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <a class="text-decoration-none link-cover" href="./prod.php">Nike Air Max 90</a>
                                        <small class="text-muted d-block">4 colours, 10 sizes</small>
                                        <p class="mt-2 mb-0 small"><s class="text-muted">$196.99</s> <span class="text-danger">$98.66</span></p>
                                    </div>
                                </div>
                                <!--/ Card Product-->
                            </div>
                            <div class="swiper-slide">
                                <!-- Card Product-->
                                <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                    <div class="card-img position-relative">
                                        <div class="card-badges">
                                            <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span>
                                                Sale</span>
                                            <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span>
                                                New In</span>
                                        </div>
                                        <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                        <picture class="position-relative overflow-hidden d-block bg-light">
                                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-6.jpg" alt="">
                                        </picture>
                                        <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                            <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                                Add</button>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <a class="text-decoration-none link-cover" href="./prod.php">Nike Glide
                                            FlyEase</a>
                                        <small class="text-muted d-block">1 colour</small>
                                        <p class="mt-2 mb-0 small"><s class="text-muted">$329.99</s> <span class="text-danger">$198.66</span></p>
                                    </div>
                                </div>
                                <!--/ Card Product-->
                            </div>
                            <div class="swiper-slide">
                                <!-- Card Product-->
                                <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                    <div class="card-img position-relative">
                                        <div class="card-badges">
                                        </div>
                                        <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                        <picture class="position-relative overflow-hidden d-block bg-light">
                                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-7.jpg" alt="">
                                        </picture>
                                        <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                            <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                                Add</button>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <a class="text-decoration-none link-cover" href="./prod.php">Nike Zoom Freak</a>
                                        <small class="text-muted d-block">2 colours, 2 sizes</small>
                                        <p class="mt-2 mb-0 small">$444.99</p>
                                    </div>
                                </div>
                                <!--/ Card Product-->
                            </div>
                            <div class="swiper-slide">
                                <!-- Card Product-->
                                <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                    <div class="card-img position-relative">
                                        <div class="card-badges">
                                            <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span>
                                                New In</span>
                                        </div>
                                        <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                        <picture class="position-relative overflow-hidden d-block bg-light">
                                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-8.jpg" alt="">
                                        </picture>
                                        <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                            <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                                Add</button>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <a class="text-decoration-none link-cover" href="./prod.php">Nike Air
                                            Pegasus</a>
                                        <small class="text-muted d-block">3 colours, 10 sizes</small>
                                        <p class="mt-2 mb-0 small">$178.99</p>
                                    </div>
                                </div>
                                <!--/ Card Product-->
                            </div>
                            <div class="swiper-slide">
                                <!-- Card Product-->
                                <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                    <div class="card-img position-relative">
                                        <div class="card-badges">
                                            <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span>
                                                New In</span>
                                        </div>
                                        <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                        <picture class="position-relative overflow-hidden d-block bg-light">
                                            <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-1.jpg" alt="">
                                        </picture>
                                        <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                            <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                                Add</button>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <a class="text-decoration-none link-cover" href="./prod.php">Nike Air
                                            Jordans</a>
                                        <small class="text-muted d-block">3 colours, 10 sizes</small>
                                        <p class="mt-2 mb-0 small">$154.99</p>
                                    </div>
                                </div>
                                <!--/ Card Product-->
                            </div>
                        </div>

                        <!-- Add Arrows -->
                        <div class="swiper-prev top-50  start-0 z-index-30 cursor-pointer transition-all bg-white px-3 py-4 position-absolute z-index-30 top-50 start-0 mt-n8 d-flex justify-content-center align-items-center opacity-50-hover">
                            <i class="ri-arrow-left-s-line ri-lg"></i>
                        </div>
                        <div class="swiper-next top-50 end-0 z-index-30 cursor-pointer transition-all bg-white px-3 py-4 position-absolute z-index-30 top-50 end-0 mt-n8 d-flex justify-content-center align-items-center opacity-50-hover">
                            <i class="ri-arrow-right-s-line ri-lg"></i>
                        </div>


                    </div>
                    <!-- / Swiper Latest-->
                </div>
                <!-- / Related Products-->

                <!-- Reviews-->
                <div class="col-12" data-aos="fade-up">
                    <h3 class="fs-4 fw-bolder mt-7 mb-4 reviews">Reviews</h3>

                    <!-- Review Summary-->
                    <div class="bg-light p-5 justify-content-between d-flex flex-column flex-lg-row">
                        <div class="d-flex flex-column align-items-center mb-4 mb-lg-0">
                            <div class="bg-dark text-white f-w-24 f-h-24 d-flex rounded-circle align-items-center justify-content-center fs-2 fw-bold mb-3">
                                4.3</div>
                            <!-- Review Stars Medium-->
                            <div class="rating position-relative d-table">
                                <div class="position-absolute stars" style="width: 88%">
                                    <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                    <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                    <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                    <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                    <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                </div>
                                <div class="stars">
                                    <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                                    <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                                    <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                                    <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                                    <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-grow-1 flex-column ms-lg-8">
                            <div class="d-flex align-items-center justify-content-start mb-2">
                                <div class="f-w-20">
                                    <!-- Review Stars Small-->
                                    <div class="rating position-relative d-table">
                                        <div class="position-absolute stars" style="width: 100%">
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                        </div>
                                        <div class="stars">
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="fw-bold small d-block f-w-4 text-end">13</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-start mb-2">
                                <div class="f-w-20">
                                    <!-- Review Stars Small-->
                                    <div class="rating position-relative d-table">
                                        <div class="position-absolute stars" style="width: 80%">
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                        </div>
                                        <div class="stars">
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="fw-bold small d-block f-w-4 text-end">32</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-start mb-2">
                                <div class="f-w-20">
                                    <!-- Review Stars Small-->
                                    <div class="rating position-relative d-table">
                                        <div class="position-absolute stars" style="width: 60%">
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                        </div>
                                        <div class="stars">
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="fw-bold small d-block f-w-4 text-end">15</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-start mb-2">
                                <div class="f-w-20">
                                    <!-- Review Stars Small-->
                                    <div class="rating position-relative d-table">
                                        <div class="position-absolute stars" style="width: 40%">
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                        </div>
                                        <div class="stars">
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 8%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="fw-bold small d-block f-w-4 text-end">5</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-start mb-2">
                                <div class="f-w-20">
                                    <!-- Review Stars Small-->
                                    <div class="rating position-relative d-table">
                                        <div class="position-absolute stars" style="width: 20%">
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                            <i class="ri-star-fill text-dark mr-1"></i>
                                        </div>
                                        <div class="stars">
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                            <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 5%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="fw-bold small d-block f-w-4 text-end">1</span>
                            </div>
                            <p class="mt-3 mb-0 d-flex align-items-start"><i class="ri-chat-voice-line me-2"></i> 105
                                clientes fizeram review a este produto</p>
                        </div>
                    </div><!-- / Rewview Summary-->

                    <!-- Reviews-->
                    <div class="row g-6 g-md-8 g-lg-10 my-3">
                        <div class="col-12 col-lg-6 col-xxl-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- Review Stars Small-->
                                <div class="rating position-relative d-table">
                                    <div class="position-absolute stars" style="width: 80%">
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                    </div>
                                    <div class="stars">
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                    </div>
                                </div>
                                <div class="text-muted small">20th September 2020 by DaveD</div>
                            </div>
                            <p class="fw-bold mb-2">Great fit, great price</p>
                            <p class="fs-7">Worth buying this for value for money. But be warned: get one size larger as
                                the medium is closer to small medium!</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xxl-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- Review Stars Small-->
                                <div class="rating position-relative d-table">
                                    <div class="position-absolute stars" style="width: 40%">
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                    </div>
                                    <div class="stars">
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                    </div>
                                </div>
                                <div class="text-muted small">18th September 2020 by Sandra K</div>
                            </div>
                            <p class="fw-bold mb-2">Not worth the money</p>
                            <p class="fs-7">Loose and poor stiching on the sides. Won&#x27;t buy this again.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xxl-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- Review Stars Small-->
                                <div class="rating position-relative d-table">
                                    <div class="position-absolute stars" style="width: 90%">
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                    </div>
                                    <div class="stars">
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                    </div>
                                </div>
                                <div class="text-muted small">16th September 2020 by MikeS</div>
                            </div>
                            <p class="fw-bold mb-2">Decent for the price</p>
                            <p class="fs-7">I buy these often as they are good quality and value for money.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xxl-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- Review Stars Small-->
                                <div class="rating position-relative d-table">
                                    <div class="position-absolute stars" style="width: 85%">
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                    </div>
                                    <div class="stars">
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                    </div>
                                </div>
                                <div class="text-muted small">14th September 2020 by Frankie</div>
                            </div>
                            <p class="fw-bold mb-2">Great little T</p>
                            <p class="fs-7">Wore this to my local music festival - went down well.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xxl-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- Review Stars Small-->
                                <div class="rating position-relative d-table">
                                    <div class="position-absolute stars" style="width: 70%">
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                    </div>
                                    <div class="stars">
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                    </div>
                                </div>
                                <div class="text-muted small">20th September 2020 by Kevin</div>
                            </div>
                            <p class="fw-bold mb-2">Great for the BBQ</p>
                            <p class="fs-7">Bought this on the off chance it would work well with my skinny jeans, was a
                                great decision. Would recommend.</p>
                        </div>
                        <div class="col-12 col-lg-6 col-xxl-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- Review Stars Small-->
                                <div class="rating position-relative d-table">
                                    <div class="position-absolute stars" style="width: 20%">
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                        <i class="ri-star-fill text-dark mr-1"></i>
                                    </div>
                                    <div class="stars">
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                        <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                    </div>
                                </div>
                                <div class="text-muted small">20th September 2020 by Holly</div>
                            </div>
                            <p class="fw-bold mb-2">Nothing special but it&#x27;s okay</p>
                            <p class="fs-7">It&#x27;s a t-shirt. What can I say, it does the job.</p>
                        </div>
                    </div>
                    <!-- / Reviews-->

                    <!-- Review Pagination-->
                    <div class="d-flex flex-column f-w-44 mx-auto my-5 text-center">
                        <small class="text-muted">Showing 6 of 105 reviews</small>
                        <div class="progress f-h-1 mt-3">
                            <div class="progress-bar bg-dark" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <a href="#" class="btn btn-outline-dark btn-sm mt-5 align-self-center py-3 px-4 border-2">Load
                            More</a>
                    </div><!-- / Review Pagination-->
                </div>
                <!-- / Reviews-->
            </div>

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