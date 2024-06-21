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
        <?php
        include('ligacao.php');

        $filtros_aplicados = false;

        if (isset($_GET['id_categoria']) || isset($_GET['id_subcategoria']) || isset($_GET['id_marca']) || isset($_GET['query']) || isset($_GET['preco_min']) || isset($_GET['preco_max'])) {
            $filtros_aplicados = true;
        }


        $produtos_por_pagina = 12;

        if (isset($_GET['pagina'])) {
            $pagina_atual = intval($_GET['pagina']);
        } else {
            $pagina_atual = 1;
        }

        $offset = ($pagina_atual - 1) * $produtos_por_pagina;

        $sql_count = "";
        $nome_categoria = "";
        $nome_subcategoria = "";
        $nome_marca = "";
        $filtros = [];

        if (isset($_GET['id_categoria'])) {
            $id_categoria = intval($_GET['id_categoria']);
            $sql_categoria = "SELECT nome_categoria FROM categorias WHERE id_categoria = $id_categoria";
            $result_categoria = mysqli_query($con, $sql_categoria);
            if (mysqli_num_rows($result_categoria) > 0) {
                $row_categoria = mysqli_fetch_assoc($result_categoria);
                $nome_categoria = $row_categoria['nome_categoria'];
            }
        }

        if (isset($_GET['id_subcategoria'])) {
            $id_subcategoria = intval($_GET['id_subcategoria']);
            $sql_subcategoria = "SELECT nome_subcategoria FROM subcategorias WHERE id_subcategoria = $id_subcategoria";
            $result_subcategoria = mysqli_query($con, $sql_subcategoria);
            if (mysqli_num_rows($result_subcategoria) > 0) {
                $row_subcategoria = mysqli_fetch_assoc($result_subcategoria);
                $nome_subcategoria = $row_subcategoria['nome_subcategoria'];
            }
        }

        if (isset($_GET['id_marca'])) {
            $id_marca = intval($_GET['id_marca']);
            $sql_marca = "SELECT nome_marca FROM marcas WHERE id_marca = $id_marca";
            $result_marca = mysqli_query($con, $sql_marca);
            if (mysqli_num_rows($result_marca) > 0) {
                $row_marca = mysqli_fetch_assoc($result_marca);
                $nome_marca = $row_marca['nome_marca'];
            }
        }

        if (isset($_GET['query'])) {
            $query = mysqli_real_escape_string($con, $_GET['query']);
            $filtros[] = "(nome_prod LIKE '%$query%' OR c.nome_categoria LIKE '%$query%' OR m.nome_marca LIKE '%$query%' OR s.nome_subcategoria LIKE '%$query%')";
        }

        if (isset($_GET['id_categoria'])) {
            $id_categoria = intval($_GET['id_categoria']);
            $filtros[] = "c.id_categoria = $id_categoria";
        }

        if (isset($_GET['id_subcategoria'])) {
            $id_subcategoria = intval($_GET['id_subcategoria']);
            $filtros[] = "s.id_subcategoria = $id_subcategoria";
        }

        if (isset($_GET['id_marca'])) {
            $id_marca = intval($_GET['id_marca']);
            $filtros[] = "m.id_marca = $id_marca";
        }

        if (isset($_GET['preco_min'])) {
            $preco_min = floatval($_GET['preco_min']);
            $filtros[] = "p.preco_prod >= $preco_min";
        }

        if (isset($_GET['preco_max'])) {
            $preco_max = floatval($_GET['preco_max']);
            $filtros[] = "p.preco_prod <= $preco_max";
        }
        $filtroSQL = "";
        if (count($filtros) > 0) {
            $filtroSQL = " AND " . implode(" AND ", $filtros);
        }

        $sql_count = "SELECT COUNT(*) as total_produtos
            FROM produtos p
            INNER JOIN subcategorias s ON p.id_subcategoria = s.id_subcategoria
            INNER JOIN categorias c ON s.id_categoria = c.id_categoria
            INNER JOIN marcas m ON p.id_marca = m.id_marca
            WHERE p.status = 1 $filtroSQL";

        $result_count = mysqli_query($con, $sql_count);
        // Verifica se a consulta foi bem-sucedida e manipula o resultado
        if ($result_count) {
            $row_count = mysqli_fetch_assoc($result_count);
            $total_produtos = $row_count['total_produtos'];
            // Calcula o número total de páginas
            $total_paginas = ceil($total_produtos / $produtos_por_pagina);
        } else {
            // Caso a consulta falhe, define $total_produtos como 0
            $total_produtos = 0;
            $total_produtos = $row_count['total_produtos'];
        }
        ?>


        <div class="container-fluid" data-aos="fade-in">
            <!-- Category Toolbar-->
            <div class="d-flex justify-content-between items-center pt-5 pb-4 flex-column flex-lg-row">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="produtos.php">Produtos</a>
                            </li>
                            <?php
                            if (isset($_GET['query'])) {
                                echo '<li class="breadcrumb-item active" aria-current="page"><a href="produtos.php?query=' . $query . '">Pesquisa</a></li>';
                                echo '<li class="breadcrumb-item active" aria-current="page"><a href="produtos.php?query=' . $query . '">' . $query . '</a></li>';
                            }
                            ?>
                            <?php
                            if (isset($id_categoria))
                                echo '<li class="breadcrumb-item active" aria-current="page"><a href="produtos.php?id_categoria=' . $id_categoria . '">' . $nome_categoria . '</a></li>';
                            ?>
                            <?php
                            if (isset($id_marca))
                                echo '<li class="breadcrumb-item active" aria-current="page"><a href="produtos.php?id_marca=' . $id_marca . '">' . $nome_marca . '</a></li>';
                            ?>
                            <?php
                            if (isset($id_subcategoria))
                                echo '<li class="breadcrumb-item active" aria-current="page"><a href="produtos.php?id_subcategoria=' . $id_subcategoria . '">' . $nome_subcategoria . '</a></li>';
                            ?>

                        </ol>
                    </nav>
                    <!-- Exibir a contagem de produtos -->
                    <h1 class="fw-bold fs-3 mb-2">Produtos (<?php echo $total_produtos; ?>)</h1>
                </div>
                <div class="d-flex justify-content-end align-items-center mt-4 mt-lg-0 flex-column flex-md-row">

                    <!-- Filter Trigger-->
                    <button class="btn bg-light p-3 me-md-3 d-flex align-items-center fs-7 lh-1 w-100 mb-2 mb-md-0 w-md-auto " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilters" aria-controls="offcanvasFilters">
                        <i class="ri-equalizer-line me-2"></i> Filtrar produtos
                    </button>
                    <!-- / Filter Trigger-->
                </div>
            </div> <!-- /Category Toolbar-->

            <div class="row g-4">
                <?php
                if (isset($_GET['query'])) {
                    $query = mysqli_real_escape_string($con, $_GET['query']);
                    $sqlProd = "SELECT DISTINCT 
                                p.id_prod,
                                p.nome_prod,
                                c.nome_categoria,
                                s.nome_subcategoria,
                                m.nome_marca,
                                p.preco_prod,
                                p.foto_prod,
                                p.desc_prod
                            FROM 
                                produtos p
                            INNER JOIN subcategorias s ON p.id_subcategoria = s.id_subcategoria 
                            INNER JOIN categorias c ON s.id_categoria = c.id_categoria
                            INNER JOIN marcas m ON p.id_marca = m.id_marca
                            WHERE status = 1 AND (nome_prod LIKE '%$query%' OR c.nome_categoria LIKE '%$query%' OR m.nome_marca LIKE '%$query%' OR s.nome_subcategoria LIKE '%$query%')";
                } else {
                    $sqlProd = "SELECT DISTINCT 
    p.id_prod,
    p.nome_prod,
    c.nome_categoria,
    s.nome_subcategoria,
    m.nome_marca,
    p.preco_prod,
    p.foto_prod,
    p.desc_prod
FROM 
    produtos p
INNER JOIN subcategorias s ON p.id_subcategoria = s.id_subcategoria 
INNER JOIN categorias c ON s.id_categoria = c.id_categoria
INNER JOIN marcas m ON p.id_marca = m.id_marca
WHERE p.status = 1 $filtroSQL
LIMIT $produtos_por_pagina OFFSET $offset";
                }
                $resultProd = mysqli_query($con, $sqlProd);

                // Exibir produtos
                if (mysqli_num_rows($resultProd) > 0) {
                    while ($dados = mysqli_fetch_array($resultProd)) {
                ?>
                        <div class="col-12 col-sm-4 col-lg-3">
                            <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                <div class="card-img position-relative">
                                    <div class="card-badges">
                                    </div>
                                    <picture class="position-relative overflow-hidden d-block bg-light">
                                        <img class="w-100 img-fluid position-relative z-index-10" title="" src="<?= $dados['foto_prod']; ?>" alt="">
                                    </picture>
                                    <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                        <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i>Ver detalhe do
                                            produto</button>
                                    </div>
                                </div>
                                <div class="card-body px-0">
                                    <a class="text-decoration-none link-cover" href="./prod.php?id_prod=<?= $dados['id_prod'] ?>"><?= $dados['nome_prod']; ?></a>
                                    <p class="mt-2 mb-0 large"><?= $dados['preco_prod']; ?>€</p>
                                </div>
                            </div>
                        </div>
                        <!-- / Product-->
                <?php
                    }
                } else {
                    echo "<p class='text-center'>Não foram encontrados produtos...</p>";
                }
                ?>
            </div>
            <!-- / Products-->


            <!-- /Page Content -->
    </section>
    <!-- / Main Section-->
    <!-- Pagination-->
    <!-- / Pagination-->
    <!-- Pagination Controls -->
    <?php if (!$filtros_aplicados) : ?>
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Navegação de página">
                <ul class="pagination">
                    <?php if ($pagina_atual > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?pagina=<?= $pagina_atual - 1 ?>" aria-label="Anterior">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
                        <li class="page-item <?= ($i == $pagina_atual) ? 'active' : '' ?>">
                            <a class="page-link" href="?pagina=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($pagina_atual < $total_paginas) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?pagina=<?= $pagina_atual + 1 ?>" aria-label="Próximo">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    <?php endif; ?>


    </div>
    <div class="d-flex flex-column f-w-44 mx-auto my-5 text-center">
        <a href="#" class="btn btn-outline-dark btn-sm mt-5 align-self-center py-3 px-4 border-2">Voltar ao topo</a>
    </div>

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
                                    <input type="number" min="0" max="5000" step="1" class="filter-min form-control-sm border flex-grow-1 text-muted border-0">
                                </div>
                                <div class="input-group mb-0 ms-2 border">
                                    <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">€</span>
                                    <input type="number" min="0" max="1000" step="1" class="filter-max form-control-sm flex-grow-1 text-muted border-0">
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
                                                <input type="checkbox" class="form-check-input marca-checkbox" id="marca_<?php echo $rowMarcas['id_marca']; ?>" value="<?php echo $rowMarcas['id_marca']; ?>" <?php if (isset($_GET['id_marca']) && $_GET['id_marca'] == $rowMarcas['id_marca'])
                                                                                                                                                                                                                    echo 'checked'; ?>>
                                                <label class="form-check-label fw-normal text-body flex-grow-1 d-flex align-items-center" for="marca_<?php echo $rowMarcas['id_marca']; ?>">
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
                    <!-- Brands Filter -->
                    <div class="py-4 widget-filter border-top">
                        <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron" data-bs-toggle="collapse" href="#filter-modal-category" role="button" aria-expanded="true" aria-controls="filter-modal-category">
                            Categorias
                        </a>
                        <div id="filter-modal-category" class="collapse show">
                            <div class="simplebar-wrapper">
                                <div class="filter-options" data-pixr-simplebar>
                                    <?php
                                    $sqlCategorias = "SELECT * FROM categorias";
                                    $resultCategorias = mysqli_query($con, $sqlCategorias);
                                    if (mysqli_num_rows($resultCategorias) > 0) {
                                        while ($rowCategorias = mysqli_fetch_assoc($resultCategorias)) {
                                    ?>
                                            <div class="form-group form-check-custom mb-1">
                                                <input type="checkbox" class="form-check-input categoria-checkbox" id="categoria_<?php echo $rowCategorias['id_categoria']; ?>" value="<?php echo $rowCategorias['id_categoria']; ?>" <?php if (isset($_GET['id_categoria']) && $_GET['id_categoria'] == $rowCategorias['id_categoria'])
                                                                                                                                                                                                                                            echo 'checked'; ?>>
                                                <label class="form-check-label fw-normal text-body flex-grow-1 d-flex align-items-center" for="categoria_<?php echo $rowCategorias['id_categoria']; ?>">
                                                    <?php echo $rowCategorias['nome_categoria']; ?>
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

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Verificar filtros aplicados via navbar e marcar checkboxes
                            <?php if (isset($_GET['id_categoria'])) : ?>
                                document.getElementById('categoria_<?php echo $_GET['id_categoria']; ?>').checked = true;
                            <?php endif; ?>
                            <?php if (isset($_GET['id_marca'])) : ?>
                                document.getElementById('marca_<?php echo $_GET['id_marca']; ?>').checked = true;
                            <?php endif; ?>

                            // Capturar valores dos filtros e atualizar a URL
                            document.querySelector('.btn[data-bs-dismiss="offcanvas"]').addEventListener('click', function() {
                                let filtros = [];

                                // Capturar categorias selecionadas
                                document.querySelectorAll('.categoria-checkbox:checked').forEach(function(checkbox) {
                                    filtros.push('id_categoria=' + checkbox.value);
                                });

                                // Capturar marcas selecionadas
                                document.querySelectorAll('.marca-checkbox:checked').forEach(function(checkbox) {
                                    filtros.push('id_marca=' + checkbox.value);
                                });

                                // Capturar intervalo de preço
                                let precoMin = document.querySelector('.filter-min').value;
                                let precoMax = document.querySelector('.filter-max').value;
                                if (precoMin) {
                                    filtros.push('preco_min=' + precoMin);
                                }
                                if (precoMax) {
                                    filtros.push('preco_max=' + precoMax);
                                }

                                // Atualizar a URL com os filtros
                                let queryString = filtros.join('&');
                                window.location.href = 'produtos.php?' + queryString;
                            });
                        });
                    </script>

                    <!-- / Brands Filter -->
                </div>
                <!-- / Filters-->

                <!-- Filter Button-->
                <div class="border-top pt-3">
                    <a href="#" class="btn btn-dark mt-2 d-block hover-lift-sm hover-boxshadow" data-bs-dismiss="offcanvas" aria-label="Close">Aplicar filtros</a>
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