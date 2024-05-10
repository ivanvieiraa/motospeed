<?php
session_start();
?>

<!doctype html>
<html lang="pt">

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
    <title>MotoSpeed | Produtos</title>

</head>

<body class="">

    <!-- Navbar -->
    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <!-- / Navbar--> <!-- / Navbar-->

    <!-- Main Section-->
    <section class="mt-0 ">
        <!-- Page Content Goes Here -->

        <div class="container-fluid" data-aos="fade-in">
            <!-- Category Toolbar-->
            <div class="d-flex justify-content-between items-center pt-5 pb-4 flex-column flex-lg-row">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="produtos.php">Produtos</a>
                            </li>

                        </ol>
                    </nav>
                    <h1 class="fw-bold fs-3 mb-2">Produtos
                        (
                        <?php
                        include('ligacao.php');

                        $sql = "SELECT COUNT(*) as produtos FROM produtos WHERE status =1";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $produtos = $row[0];
                        echo $produtos;
                        ?>)
                    </h1>
                    <p class="m-0 text-muted small">Páginas 1 a 9 de 121</p>
                </div>
                <div class="d-flex justify-content-end align-items-center mt-4 mt-lg-0 flex-column flex-md-row">

                    <!-- Filter Trigger-->
                    <button class="btn bg-light p-3 me-md-3 d-flex align-items-center fs-7 lh-1 w-100 mb-2 mb-md-0 w-md-auto " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilters" aria-controls="offcanvasFilters">
                        <i class="ri-equalizer-line me-2"></i> Filtros
                    </button>
                    <!-- / Filter Trigger-->

                    <!-- Sort Options-->
                    <select class="form-select form-select-sm border-0 bg-light p-3 pe-5 lh-1 fs-7">
                        <option selected>Ordenar por</option>
                        <option value="1">Crescente</option>
                        <option value="2">Decrescente</option>
                        <option value="3">Nome</option>
                    </select>
                    <!-- / Sort Options-->
                </div>
            </div> <!-- /Category Toolbar-->

            <div class="row g-4">
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
                        WHERE status = 1";
                $result2 = mysqli_query($con, $sqlProd);
                if (mysqli_num_rows($result2) > 0) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                        <div class="col-12 col-sm-4 col-lg-3">
                            <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                <div class="card-img position-relative">
                                    <div class="card-badges">
                                    </div>
                                    <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                                    <picture class="position-relative overflow-hidden d-block bg-light">
                                        <img class="w-100 img-fluid position-relative z-index-10" title="" src="<?= $row2['foto_prod']; ?>" alt="">
                                    </picture>
                                    <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                        <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Adicionar ao
                                            carrinho</button>
                                    </div>
                                </div>
                                <div class="card-body px-0">
                                    <a class="text-decoration-none link-cover" href="./prod.php?id_prod=<?= $row2['id_prod'] ?>"><?= $row2['nome_prod']; ?></a>
                                    <small class="text-muted d-block">9 tamanhos disponíveis</small>
                                    <p class="mt-2 mb-0 large"><?= $row2['preco_prod']; ?>€</p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- <div class="col-12 col-sm-4 col-lg-3">
                    <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                        <div class="card-img position-relative">
                            <div class="card-badges">
                                <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span>
                                    Promoção</span>
                            </div>
                            <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                            <picture class="position-relative overflow-hidden d-block bg-light">
                                <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-1.jpg" alt="">
                            </picture>
                            <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Adicionar ao
                                    carrinho</button>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-decoration-none link-cover" href="./prod.php">Air Jordan 1</a>
                            <small class="text-muted d-block">4 colours, 10 sizes</small>
                            <p class="mt-2 mb-0 small"><s class="text-muted">329.99€</s> <span class="text-danger">198.66€</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-lg-3">
                    <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                        <div class="card-img position-relative">
                            <div class="card-badges">
                                <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span> Novo</span>
                            </div>
                            <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                            <picture class="position-relative overflow-hidden d-block bg-light">
                                <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-2.jpg" alt="">
                            </picture>
                            <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Adicionar ao
                                    carrinho</button>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-decoration-none link-cover" href="./prod.php">Nike ZoomX Vaporfly</a>
                            <small class="text-muted d-block">2 colours, 4 sizes</small>
                            <p class="mt-2 mb-0 small">275.45€</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-lg-3">
                    <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                        <div class="card-img position-relative">
                            <div class="card-badges">
                                <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-secondary rounded-circle d-block me-1"></span> Sem
                                    stock</span>
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
                            <p class="mt-2 mb-0 small text-muted">Sem stock</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-lg-3">
                    <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                        <div class="card-img position-relative">
                            <div class="card-badges">
                            </div>
                            <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                            <picture class="position-relative overflow-hidden d-block bg-light">
                                <img class="w-100 img-fluid position-relative z-index-10" title="" src="./assets/images/products/product-4.jpg" alt="">
                            </picture>
                            <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Adicionar ao
                                    carrinho</button>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-decoration-none link-cover" href="./prod.php">Nike Air Force 1</a>
                            <small class="text-muted d-block">6 colours, 9 sizes</small>
                            <p class="mt-2 mb-0 small">$425.85</p>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- / Products-->

            <!-- Pagination-->
            <div class="d-flex flex-column f-w-44 mx-auto my-5 text-center">
                <small class="text-muted"> 9 de
                    <?php echo $produtos; ?> produtos
                </small>
                <div class="progress f-h-1 mt-3">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <a href="#" class="btn btn-outline-dark btn-sm mt-5 align-self-center py-3 px-4 border-2">Ver mais</a>
            </div> <!-- / Pagination-->
        </div>

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    <!-- Footer -->
    <?php include("footer.php"); ?>

    <!-- Offcanvas Imports-->
    <!-- Filters Offcanvas-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasFilters" aria-labelledby="offcanvasFiltersLabel">
        <div class="offcanvas-header pb-0 d-flex align-items-center">
            <h5 class="offcanvas-title" id="offcanvasFiltersLabel">Filtrar produtos</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="d-flex flex-column justify-content-between w-100 h-100">

                <!-- Filters-->
                <div>

                    <!-- Price Filter -->
                    <div class="py-4 widget-filter widget-filter-price border-top">
                        <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron" data-bs-toggle="collapse" href="#filter-modal-price" role="button" aria-expanded="true" aria-controls="filter-modal-price">
                            Preço
                        </a>
                        <div id="filter-modal-price" class="collapse show">
                            <div class="filter-price mt-6"></div>
                            <div class="d-flex justify-content-between align-items-center mt-7">
                                <div class="input-group mb-0 me-2 border">
                                    <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">€</span>
                                    <input type="number" min="00" max="1000" step="1" class="filter-min form-control-sm border flex-grow-1 text-muted border-0">
                                </div>
                                <div class="input-group mb-0 ms-2 border">
                                    <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">€</span>
                                    <input type="number" min="00" max="1000" step="1" class="filter-max form-control-sm flex-grow-1 text-muted border-0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Price Filter -->
                    <!-- Brands Filter -->
                    <div class="py-4 widget-filter border-top">
                        <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron" data-bs-toggle="collapse" href="#filter-modal-brands" role="button" aria-expanded="true" aria-controls="filter-modal-brands">
                            Marcas
                        </a>
                        <div id="filter-modal-brands" class="collapse show">
                            <div class="simplebar-wrapper">
                                <div class="filter-options" data-pixr-simplebar>
                                    <?php
                                    $sqlMarcas = "SELECT * FROM marcas";
                                    $resultMarcas = mysqli_query($con, $sqlMarcas);
                                    if (mysqli_num_rows($resultMarcas) > 0) {
                                        while ($rowMarcas = mysqli_fetch_assoc($resultMarcas)) {
                                    ?>
                                            <div class="form-group form-check-custom mb-1">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label fw-normal text-body flex-grow-1 d-flex align-items-center">
                                                    <?php echo $rowMarcas['nome_marca']; ?>
                                                </label>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Brands Filter -->
                    <!-- Sizes Filter -->
                    <div class="py-4 widget-filter border-top">
                        <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron" data-bs-toggle="collapse" href="#filter-modal-sizes" role="button" aria-expanded="false" aria-controls="filter-modal-sizes">
                            Tamanhos
                        </a>
                        <div id="filter-modal-sizes" class="collapse show">
                            <div class="filter-options mt-3">
                                <?php
                                $sqlTamanhos = "SELECT * FROM tamanhos";
                                $resultTamanhos = mysqli_query($con, $sqlTamanhos);
                                if (mysqli_num_rows($resultTamanhos) > 0)
                                    while ($rowTamanhos = mysqli_fetch_assoc($resultTamanhos)) {
                                ?>

                                    <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                                        <input type="checkbox" class="form-check-bg-input" id="filter-sizes-modal-0">
                                        <label class="form-check-label fw-normal" for="filter-sizes-modal-0">
                                            <?php echo $rowTamanhos['tamanho']; ?>
                                        </label>
                                    </div>
                                <?php

                                    }

                                ?>


                            </div>
                        </div>
                    </div>
                    <!-- / Sizes Filter -->
                </div>
                <!-- / Filters-->

                <!-- Filter Button-->
                <div class="border-top pt-3">
                    <a href="#" class="btn btn-dark mt-2 d-block hover-lift-sm hover-boxshadow" data-bs-dismiss="offcanvas" aria-label="Close">Done</a>
                </div>
                <!-- /Filter Button-->
            </div>
        </div>
    </div>
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>