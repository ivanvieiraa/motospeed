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
    SELECT vendas.id_venda, vendas.data_venda, vendas.total, detalhe_venda.id_prod, detalhe_venda.quantidade, detalhe_venda.preco_uni, produtos.nome_prod
    FROM vendas
    INNER JOIN detalhe_venda ON vendas.id_venda = detalhe_venda.id_venda
    INNER JOIN produtos ON detalhe_venda.id_prod = produtos.id_prod
    WHERE vendas.id_user = $id_user
    ORDER BY vendas.data_venda DESC";
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
        'preco_uni' => $row['preco_uni']
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
                        <h1 class="fw-bold fs-3 mb-2 text-left">
                            Histórico de compras
                        </h1>
                        <div class="table-responsive">
                            <?php if (empty($vendas)) : ?>
                                <p class="text-center">Não tem compras</p>
                            <?php else : ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nº de Venda</th>
                                            <th>Data</th>
                                            <th>Produtos</th>
                                            <th>Quantidade</th>
                                            <th>Preço Unitário</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($vendas as $id_venda => $venda) : ?>
                                            <?php foreach ($venda['produtos'] as $index => $produto) : ?>
                                                <tr>
                                                    <?php if ($index == 0) : ?>
                                                        <td rowspan="<?php echo count($venda['produtos']); ?>"><?php echo htmlspecialchars($id_venda); ?></td>
                                                        <td rowspan="<?php echo count($venda['produtos']); ?>"><?php echo htmlspecialchars($venda['data_venda']); ?></td>
                                                    <?php endif; ?>
                                                    <td><?php echo htmlspecialchars($produto['nome_prod']); ?></td>
                                                    <td><?php echo htmlspecialchars($produto['quantidade']); ?></td>
                                                    <td><?php echo htmlspecialchars(number_format($produto['preco_uni'], 2)); ?>€</td>
                                                    <?php if ($index == 0) : ?>
                                                        <td rowspan="<?php echo count($venda['produtos']); ?>"><?php echo htmlspecialchars(number_format($venda['total'], 2)); ?>€</td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </tbody>
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
    </script>

</body>

</html>
