<?php
include("ligacao.php");
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login_form.php");
    exit();
}

$id_user = $_SESSION['id_user'];
$sql = "SELECT * FROM users WHERE id_user = $id_user";
$result = mysqli_query($con, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: ../login_form.php");
    exit();
}

$user_data = mysqli_fetch_assoc($result);

$sql_vendas = "
    SELECT vendas.id_venda, vendas.data_venda, vendas.total, detalhe_venda.id_prod, detalhe_venda.quantidade, detalhe_venda.tamanho, detalhe_venda.preco_uni, produtos.nome_prod, produtos.foto_prod
    FROM vendas
    INNER JOIN detalhe_venda ON vendas.id_venda = detalhe_venda.id_venda
    INNER JOIN produtos ON detalhe_venda.id_prod = produtos.id_prod
    WHERE vendas.id_user = $id_user
    ORDER BY vendas.id_venda DESC";
$result_vendas = mysqli_query($con, $sql_vendas);

if (!$result_vendas) {
    echo "Erro ao buscar vendas: " . mysqli_error($con);
    exit();
}

// Organizar os dados das vendas em um array
$vendas = [];
while ($row = mysqli_fetch_assoc($result_vendas)) {
    $vendas[$row['id_venda']]['data_venda'] = $row['data_venda'];
    $vendas[$row['id_venda']]['total'] = $row['total'];
    $vendas[$row['id_venda']]['produtos'][] = [
        'nome_prod' => $row['nome_prod'],
        'quantidade' => $row['quantidade'],
        'tamanho' => $row['tamanho'],
        'preco_uni' => $row['preco_uni'],
        'foto_prod' => $row['foto_prod'] // Adicionando a imagem do produto ao array
    ];
}
?>

<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <title>Motospeed | Perfil</title>

    <!-- Custom Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto" rel="stylesheet">
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
    <style>
        /* Estilo para a tabela */
        .table-responsive {
            /* Remover a propriedade overflow-x */
            overflow-x: hidden;
        }

        /* Outros estilos de tabela */
        .table thead th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .table tbody td {
            padding: 8px;
            text-align: left;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Estilo para os cards dos pedidos */
        .pedido-card {
            border: 2px solid lightgray;
            border-radius: 10px;
            /* Arredonda as bordas dos cards */
            transition: all 0.3s ease;
            /* Adiciona uma transição suave */
        }

        .pedido-card:hover {
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            /* Adiciona uma sombra ao passar o mouse */
        }

        /* Outros estilos vão aqui */
        .card-body.produtos-list {
            max-width: 100%;
            overflow-x: auto;
        }

        .card-body.produtos-list .row {
            flex-wrap: nowrap;
        }

        .card-body.produtos-list .col-md-3 {
            flex: 0 0 auto;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <!-- / Navbar -->

    <!-- Main Section-->
    <section class="mt-0 overflow-hidden">
        <div class="container-fluid">
            <!-- Profile-->
            <form name="alterarPerfil" action="alterarPerfil.php" method="POST" enctype="multipart/form-data">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <div>
                                <img id="imagem-preview" src="<?php echo $user_data['foto']; ?>" width="250px" height="250px" style="border-radius:50%" alt="Foto">
                            </div>
                        </div>
                        <h3 class="profile-username text-center">
                            <?php echo htmlspecialchars($user_data['nome']) . ' ' . htmlspecialchars($user_data['apelido']); ?>
                        </h3>
                        <p class="text-muted text-center">Histórico de compras</p>
                        <div class="table-responsive">
                            <?php if (empty($vendas)) : ?>
                                <p class="text-center">O seu Histórico de compras irá aparecer aqui ! <br><br><a href="./produtos.php">Comprar produtos</a></p>
                            <?php else : ?>
                                <table class="table table-bordered table-striped" style="overflow-x: hidden;">
                                    <?php foreach ($vendas as $id_venda => $venda) : ?>
                                        <div class="card mb-3 pedido-card"> <!-- Adicionando a classe pedido-card aqui -->
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="card-title mb-0">
                                                    <?php
                                                    $data_venda_formatada = date("d/m/Y", strtotime($venda['data_venda']));
                                                    ?>

                                                    Pedido #<?php echo htmlspecialchars($id_venda); ?> - <?php echo htmlspecialchars($data_venda_formatada); ?>
                                                </h5>
                                                <div class="d-flex align-items-center">
                                                    <a style="text-decoration: none; color: orangered; font-weight: bold; font-size: large; margin-right: 20px;" href="generate_invoice.php?id_venda=<?= $id_venda ?>">
                                                        Emitir fatura
                                                    </a>
                                                    <a style="color: green; font-size: large; font-weight: bold;">
                                                        Total do Pedido: <?php echo htmlspecialchars(number_format($venda['total'], 2)); ?>€
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body produtos-list">
                                                <div class="row">
                                                    <?php foreach ($venda['produtos'] as $produto) : ?>
                                                        <div class="col-md-3">
                                                            <div class="card">
                                                                <img src="<?php echo $produto['foto_prod']; ?>" height="200px" width="200px" alt="<?php echo htmlspecialchars($produto['nome_prod']); ?>">
                                                                <div class="card-body">
                                                                    <h6 class="card-title"><?php echo htmlspecialchars($produto['nome_prod']); ?></h6>
                                                                    <p class="card-text">Quantidade: <?php echo htmlspecialchars($produto['quantidade']); ?></p>
                                                                    <p class="card-text">Tamanho: <?php echo htmlspecialchars($produto['tamanho']); ?></p>
                                                                    <p class="card-text" style="">Preço Unitário: <?php echo htmlspecialchars(number_format($produto['preco_uni'], 2)); ?>€</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- / Profile -->
            </form>
        </div>
    </section>
    <!-- / Main Section -->

    <!-- Footer -->
    <?php include("footer.php"); ?>

    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>

    <!-- Script para pré-visualização da imagem -->
    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('imagem-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            var cards = document.querySelectorAll(".pedido-card");
            cards.forEach(function(card) {
                var cardBody = card.querySelector(".card-body");
                var produtos = cardBody.querySelectorAll(".col-md-3");
                var produtosWidth = 0;
                produtos.forEach(function(produto) {
                    produtosWidth += produto.offsetWidth;
                });

                if (produtosWidth > cardBody.clientWidth) {
                    cardBody.classList.add("produtos-list");
                } else {
                    cardBody.classList.remove("produtos-list");
                }
            });
        });
    </script>


</body>

</html>