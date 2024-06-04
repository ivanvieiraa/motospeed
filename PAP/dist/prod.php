<?php
session_start();
include("ligacao.php");
$id_prod = $_GET['id_prod'];
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null; // Verifica se $_SESSION['id_user'] está definido

if ($id_user === null) {
    // Redirecionar para página de login ou fazer alguma outra ação
}

$sqlTamanhos = "SELECT * FROM produtos_tamanhos WHERE id_prod = $id_prod";
$resultTamanhos = mysqli_query($con, $sqlTamanhos);

$tamanhosDisponivel = false;
if (mysqli_num_rows($resultTamanhos) > 0) {
    while ($tamanho = mysqli_fetch_array($resultTamanhos)) {
        if ($tamanho['stock'] > 0) {
            $tamanhosDisponivel = true;
            break;
        }
    }
}

// Verifica se o produto já está na lista de desejos do usuário apenas se o usuário estiver logado
$isInWishlist = false;
if ($id_user !== null) {
    $sqlWishlist = "SELECT * FROM wishlist WHERE id_user = $id_user AND id_prod = $id_prod";
    $resultWishlist = mysqli_query($con, $sqlWishlist);
    $isInWishlist = mysqli_num_rows($resultWishlist) > 0;
}

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

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
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
    <?php include('navbar.php'); ?>
    <!-- / Navbar-->

    <!-- Main Section-->
    <section class="mt-0">
        <!-- Page Content Goes Here -->
        <?php
        $sqlProd = "SELECT DISTINCT 
                        p.id_prod,
                        p.nome_prod,
                        c.nome_categoria,
                        c.id_categoria,
                        m.nome_marca,
                        m.id_marca,
                        p.preco_prod,
                        p.foto_prod,
                        p.desc_prod
                        FROM 
                        produtos p
                        INNER JOIN categorias c ON p.id_categoria = c.id_categoria
                        INNER JOIN marcas m ON p.id_marca = m.id_marca
                        WHERE id_prod = $id_prod";
        $result2 = mysqli_query($con, $sqlProd);

        $sqlTamanhos = "SELECT * FROM produtos_tamanhos WHERE id_prod = $id_prod";
        $resultTamanhos = mysqli_query($con, $sqlTamanhos);

        if (mysqli_num_rows($result2) > 0) {
            if (mysqli_num_rows($resultTamanhos) > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                    <!-- Breadcrumbs-->
                    <div class="bg-dark py-6">
                        <div class="container-fluid">
                            <nav class="m-0" aria-label="breadcrumb">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item breadcrumb-light"><a href="index.php">Início</a></li>
                                    <li class="breadcrumb-item breadcrumb-light"><a href="produtos.php">Produtos</a></li>
                                    <li class="breadcrumb-item breadcrumb-light"><a href="produtos.php?id_categoria=<?= $row2['id_categoria']; ?>"><?= $row2['nome_categoria']; ?></a></li>
                                    <li class="breadcrumb-item breadcrumb-light"><a href="produtos.php?id_marca=<?= $row2['id_marca']; ?>"><?= $row2['nome_marca']; ?></a></li>
                                    <li class="breadcrumb-item breadcrumb-light active" aria-current="page">
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
                                </div>
                            </div>
                            <!-- /Product Images-->

                            <!-- Product Information-->
                            <div class="col-12 col-md-6 col-lg-7">
                                <div class="sticky-top top-5">
                                    <div class="pb-3" data-aos="fade-in">
                                        <h1 class="mb-1 fs-2 fw-bold"><?= $row2['nome_prod'] ?>
                                            <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted">
                                                <a href="#" style="text-decoration: none;" class="wishlist-icon" data-id-prod="<?= $row2['id_prod']; ?>">
                                                    <i class="<?= $isInWishlist ? 'ri-heart-fill' : 'ri-heart-line'; ?>"></i>
                                                </a>
                                            </span>

                                        </h1>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="fs-4 m-0"><?= $row2['preco_prod'] ?>€</p>
                                        </div>
                                        <div class="border-top mt-4 mb-3 product-option" style="display: <?= ($tamanhosDisponivel === true) ? "block" : "none" ?>">
                                            <small class="text-uppercase pt-4 d-block fw-bolder">
                                                <span class="text-muted">Tamanhos disponíveis</span> :
                                            </small>
                                            <div class="mt-4 d-flex justify-content-start flex-wrap align-items-start">
                                                <?php
                                                $i = 0;
                                                while ($tamanho = mysqli_fetch_array($resultTamanhos)) { ?>
                                                    <div class="form-check-option form-check-rounded me-3 mb-3">
                                                        <input type="radio" name="product-option-sizes" value="<?= $tamanho['tamanho']; ?>" id="option-sizes-<?= $i; ?>" data-max="<?= $tamanho['stock'] ?>">
                                                        <label for="option-sizes-<?= $i; ?>">
                                                            <small><?= $tamanho['tamanho']; ?></small>
                                                        </label>
                                                    </div>
                                                <?php
                                                    $i++;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="border-top mt-4 mb-3 product-option">
                                            <small class="text-uppercase pt-4 d-block fw-bolder">
                                                <span class="text-muted" style="display: <?= ($tamanhosDisponivel === true) ? "block" : "none" ?>">Quantidade</span>
                                            </small>

                                            <form id="formAddToCart" action="adicionar_ao_carrinho.php" method="POST">
                                                <div class="mt-4 d-flex justify-content-start flex-wrap align-items-start">
                                                    <div class="form-check-option2 form-check-rounded" style="display: <?= ($tamanhosDisponivel === true) ? "block" : "none" ?>">
                                                        <input type="number" name="quantidade" value="1" min="1" max="1" id="quantidadeInput" onchange="checkQuantity(this)">
                                                    </div>
                                                </div>
                                                <div id="outOfStockMessage" class="mt-4 mb-3 product-option" style="display: <?= ($tamanhosDisponivel === false) ? "block" : "none" ?>">
                                                    <small class="text-uppercase pt-4 d-block fw-bolder text-danger">Fora de stock</small>
                                                </div>

                                                <button id="btnAddToCart" class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow" style="display: <?= ($tamanhosDisponivel === true) ? "block" : "none" ?>">Adicionar ao carrinho</button>

                                                <input type="hidden" name="id_prod" value="<?= $id_prod ?>">
                                                <input type="hidden" name="tamanho" id="tamanhoSelecionado"> <!-- Campo oculto para o tamanho -->
                                            </form>
                                            <script>
                                                document.getElementById('btnAddToCart').addEventListener('click', function(event) {
                                                    event.preventDefault();

                                                    var tamanhoSelecionado = document.querySelector('input[name="product-option-sizes"]:checked');
                                                    if (!tamanhoSelecionado) {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Oops...',
                                                            text: 'Selecione um tamanho!',
                                                        });
                                                        return;
                                                    }

                                                    var quantidadeInput = document.querySelector('input[name="quantidade"]');
                                                    var maxQuantidade = parseInt(tamanhoSelecionado.getAttribute('data-max'), 10);
                                                    var quantidade = parseInt(quantidadeInput.value, 10);

                                                    // Verifica se a quantidade selecionada excede o estoque disponível
                                                    if (quantidade > maxQuantidade) {
                                                        alert('A quantidade não pode exceder o stock disponível.');
                                                        quantidadeInput.value = maxQuantidade;
                                                        return;
                                                    }

                                                    // Verifica se o estoque disponível é zero
                                                    if (maxQuantidade === 0) {
                                                        alert('Este produto está fora de stock.');
                                                        return;
                                                    }

                                                    document.getElementById('tamanhoSelecionado').value = tamanhoSelecionado.value;
                                                    document.getElementById('formAddToCart').submit();
                                                });

                                                document.querySelectorAll('input[name="product-option-sizes"]').forEach(function(radio) {
                                                    radio.addEventListener('change', function() {
                                                        var maxQuantidade = parseInt(this.getAttribute('data-max'), 10);
                                                        var quantidadeInput = document.getElementById('quantidadeInput');
                                                        var btnAddToCart = document.getElementById('btnAddToCart');

                                                        // Define o valor máximo para o campo de entrada da quantidade
                                                        quantidadeInput.setAttribute('max', maxQuantidade);

                                                        // Se o estoque disponível for zero, oculta o campo de entrada da quantidade e o botão "Adicionar ao carrinho"
                                                        if (maxQuantidade === 0) {
                                                            quantidadeInput.style.display = 'none';
                                                            btnAddToCart.style.display = 'none';
                                                            document.getElementById('outOfStockMessage').style.display = 'block';
                                                        } else {
                                                            quantidadeInput.style.display = 'block';
                                                            btnAddToCart.style.display = 'block';
                                                            document.getElementById('outOfStockMessage').style.display = 'none';
                                                        }

                                                        // Se a quantidade selecionada exceder o estoque disponível, ajusta para o valor máximo
                                                        if (parseInt(quantidadeInput.value, 10) > maxQuantidade || parseInt(quantidadeInput.value, 10) < 1 || isNaN(parseInt(quantidadeInput.value, 10))) {
                                                            quantidadeInput.value = 1; // Define o valor padrão como 1 se for inválido
                                                        }
                                                    });
                                                });

                                                // Adiciona um evento ao campo de entrada da quantidade para garantir que apenas valores válidos sejam aceitos
                                                document.getElementById('quantidadeInput').addEventListener('input', function() {
                                                    var maxQuantidade = parseInt(this.getAttribute('max'), 10);
                                                    var minQuantidade = parseInt(this.getAttribute('min'), 10);
                                                    var quantidade = parseInt(this.value, 10);

                                                    // Se o valor estiver fora do intervalo permitido, ajusta para o valor mais próximo dentro do intervalo
                                                    if (quantidade < minQuantidade || isNaN(quantidade)) {
                                                        this.value = minQuantidade;
                                                    } else if (quantidade > maxQuantidade) {
                                                        this.value = maxQuantidade;
                                                    }
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
                    $i++;
                }
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.wishlist-icon').forEach(function(icon) {
                icon.addEventListener('click', function(event) {
                    event.preventDefault();

                    var idProd = this.getAttribute('data-id-prod');
                    var iconElement = this.querySelector('i');

                    fetch('add_to_wishlist.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'id_prod=' + idProd
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                if (data.action === 'added') {
                                    iconElement.classList.remove('ri-heart-line');
                                    iconElement.classList.add('ri-heart-fill');
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Sucesso!',
                                        text: 'Produto adicionado à lista de desejos!',
                                    });
                                } else if (data.action === 'removed') {
                                    iconElement.classList.remove('ri-heart-fill');
                                    iconElement.classList.add('ri-heart-line');
                                    Swal.fire({
                                        icon: 'success1',
                                        title: 'Sucesso!',
                                        text: 'Produto removido da lista de desejos!',
                                    });
                                }
                            } else {
                                alert(data.message || 'Falha ao atualizar lista de desejos');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>


</body>

</html>