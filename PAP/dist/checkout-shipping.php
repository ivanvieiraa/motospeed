<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeVenda = $_POST['firstNameBilling'];
    $apelidoVenda = $_POST['lastNameBilling'];
    $emailVenda = $_POST['emailBilling'];
    $morada = $_POST['address'];
    $codigop = $_POST['zip'];
}

// Função para calcular o subtotal do carrinho
function calcularSubtotal($carrinho)
{
    $subtotal = 0;
    foreach ($carrinho as $produto) {
        $subtotal += $produto['preco'] * $produto['quantidade'];
    }
    return $subtotal;
}

// Definir opções de envio
$opcoesEnvio = [
    'levantamento' => 0.00,
    'padrao' => 4.99,
    'rapido' => 9.99
];

// Verificar se a opção de envio foi selecionada
if (isset($_POST['envio'])) {
    $opcaoEnvioSelecionada = $_POST['envio'];
    $custoEnvio = $opcoesEnvio[$opcaoEnvioSelecionada];
} else {
    // Definir opção de envio padrão
    $opcaoEnvioSelecionada = 'levantamento';
    $custoEnvio = $opcoesEnvio[$opcaoEnvioSelecionada];
}

// Calcular subtotal
$subTotal = calcularSubtotal($_SESSION['carrinho']);

// Calcular total
$total = $subTotal + $custoEnvio;
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
                                <li class="me-4"><a class="nav-link-checkout " href="./checkout.php">Checkout</a>
                                </li>
                                <li class="me-4"><a class="nav-link-checkout active" href="./checkout-shipping.php">Envio</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="mt-5">
                            <!-- Checkout Information Summary -->
                            <ul class="list-group mb-5 d-none d-lg-block rounded-0">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <span class="text-muted small me-2 f-w-36 fw-bolder">Dados de</span>
                                        <span class="small"><?php echo $emailVenda ?></span>
                                    </div>
                                    <a href="./checkout.php" class="text-muted small" role="button">Alterar</a>
                                </li>
                            </ul><!-- / Checkout Information Summary-->

                            <!-- Checkout Panel Information-->
                            <h3 class="fs-5 fw-bolder mb-4 border-bottom pb-4">Método de envio</h3>

                            <!-- Shipping Option-->
                            <div class="form-check form-group form-check-custom form-radio-custom form-radio-highlight mb-3">
                                <input class="form-check-input" type="radio" name="checkoutShippingMethod" id="checkoutShippingMethodOne" value="levantamento" checked>
                                <label class="form-check-label" for="checkoutShippingMethodOne">
                                    <span class="d-flex justify-content-between align-items-start">
                                        <span>
                                            <span class="mb-0 fw-bolder d-block">Levantamento na loja</span>
                                            <small class="fw-bolder">7 dias úteis para efetuar o levantamento</small>
                                        </span>
                                        <span class="small fw-bolder text-uppercase">Grátis</span>
                                    </span>
                                </label>
                            </div>

                            <!-- Shipping Option-->
                            <div class="form-check form-group form-check-custom form-radio-custom form-radio-highlight mb-3">
                                <input class="form-check-input" type="radio" name="checkoutShippingMethod" id="checkoutShippingMethodThree" value="padrao">
                                <label class="form-check-label" for="checkoutShippingMethodThree">
                                    <span class="d-flex justify-content-between align-items-start">
                                        <span>
                                            <span class="mb-0 fw-bolder d-block">Envio padrão</span>
                                            <small class="fw-bolder">Receberá a sua encomenda dentro de 5-7 dias úteis</small>
                                        </span>
                                        <span class="small fw-bolder text-uppercase">4.99€</span>
                                    </span>
                                </label>
                            </div>

                            <!-- Shipping Option-->
                            <div class="form-check form-group form-check-custom form-radio-custom form-radio-highlight mb-3">
                                <input class="form-check-input" type="radio" name="checkoutShippingMethod" id="checkoutShippingMethodTwo" value="rapido">
                                <label class="form-check-label" for="checkoutShippingMethodTwo">
                                    <span class="d-flex justify-content-between align-items-start">
                                        <span>
                                            <span class="mb-0 fw-bolder d-block">Envio rápido </span>
                                            <small class="fw-bolder">Receberá a sua encomenda dentro de 24 horas</small>
                                        </span>
                                        <span class="small fw-bolder text-uppercase">9.99€</span>
                                    </span>
                                </label>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const opcoesEnvio = <?php echo json_encode($opcoesEnvio); ?>;
                                    const custoEnvioElement = document.getElementById('custoEnvio');
                                    const totalElement = document.getElementById('total');
                                    const totalInputElement = document.getElementById('totalInput');

                                    // Função para atualizar o custo de envio e o total
                                    function atualizarCustoEnvioETotal(valor) {
                                        const custoEnvio = parseFloat(opcoesEnvio[valor]);
                                        custoEnvioElement.textContent = custoEnvio.toFixed(2) + '€';
                                        const subTotal = <?php echo json_encode($subTotal); ?>;
                                        const total = subTotal + custoEnvio;
                                        totalElement.textContent = total.toFixed(2) + '€';
                                        totalInputElement.value = total.toFixed(2); // Atualiza o valor do campo input
                                    }

                                    const inputsEnvio = document.querySelectorAll('input[name="checkoutShippingMethod"]');
                                    inputsEnvio.forEach(function(input) {
                                        input.addEventListener("change", function() {
                                            atualizarCustoEnvioETotal(this.value);
                                        });
                                    });

                                    // Inicializar o custo de envio com a opção padrão
                                    // Use document.querySelector para selecionar o input de envio padrão e obter o seu valor
                                    const opcaoEnvioPadrao = document.querySelector('input[name="checkoutShippingMethod"]:checked').value;
                                    atualizarCustoEnvioETotal(opcaoEnvioPadrao);
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                    <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                        <div class="pb-3">
                            <?php
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

                            ?>
                        </div>
                        <div class="py-4 border-bottom">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="m-0 fw-bolder fs-6">Subtotal</p>
                                <p class="m-0 fs-6 fw-bolder"><?php echo number_format($subTotal, 2); ?>€</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center ">
                                <p class="m-0 fw-bolder fs-6">Envio</p>
                                <!-- Adicione um ID para exibir o custo de envio -->
                                <p id="custoEnvio" class="m-0 fs-6 fw-bolder"><?php echo number_format($custoEnvio, 2); ?>€</p>
                            </div>
                        </div>
                        <div class="py-4 border-bottom">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="m-0 fw-bold fs-5">Total</p>
                                    <span class="text-muted small">IVA incluído</span>
                                </div>
                                <!-- Adicione um ID para exibir o total -->
                                <p id="total" class="m-0 fs-5 fw-bold"><?php echo $total; ?>€</p>
                            </div>
                        </div>
                        <form method="post" action="finalizarcompra.php">
                            <!-- Adicione os campos ocultos para enviar os dados necessários -->
                            <input type="hidden" name="subtotal" value="<?php echo $subTotal; ?>">
                            <input type="hidden" name="custoEnvio" id="custoEnvio" value="<?php echo number_format($custoEnvio, 2); ?>">
                            <input type="hidden" name="total" id="totalInput" value="<?php echo $total; ?>">
                            <input type="hidden" name="nomeVenda" value="<?php echo $nomeVenda; ?>">
                            <input type="hidden" name="apelidoVenda" value="<?php echo $apelidoVenda; ?>">
                            <input type="hidden" name="emailVenda" value="<?php echo $emailVenda; ?>">
                            <input type="hidden" name="moradaVenda" value="<?php echo $morada; ?>">
                            <input type="hidden" name="codigopVenda" value="<?php echo $codigop; ?>">

                            <!-- Adicione outros campos do formulário, se necessário -->
                            <button type="submit" class="btn btn-dark w-100 text-center">Finalizar compra</button>
                        </form>
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