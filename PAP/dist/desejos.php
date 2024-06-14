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

// Consulta para obter os produtos na lista de desejos do usuário
$sql_desejos = "SELECT produtos.id_prod, produtos.nome_prod, produtos.foto_prod, produtos.preco_prod FROM wishlist
                INNER JOIN produtos ON wishlist.id_prod = produtos.id_prod
                WHERE wishlist.id_user = $id_user";
$result_desejos = mysqli_query($con, $sql_desejos);

if (!$result_desejos) {
    echo "Erro ao buscar produtos na lista de desejos: " . mysqli_error($con);
    exit();
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
        /* Estilos para a lista de desejos */
        .wishlist-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-content: center;
            margin-top: 50px;
        }

        .wishlist-item {
            background-color: #f9f9f9;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 300px;
            /* Definindo uma largura máxima para os cards */
        }

        .wishlist-image {
            position: relative;
            overflow: hidden;
            height: 210px;
            background-color: white;
        }

        .wishlist-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .wishlist-details {
            padding: 15px;
            background-color: white;
        }

        .wishlist-details h6 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .price {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .remove-item {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .remove-item:hover {
            color: #ff0000;
        }

        a:hover{
            color: red;
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <!-- / Navbar -->

    <!-- Main Section -->
    <section class="mt-0 overflow-hidden">
        <div class="container-fluid">
            <!-- Profile -->
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
                        <p class="text-muted text-center">Lista de desejos</p>
                        <div class="wishlist-container">
                            <?php if (mysqli_num_rows($result_desejos) > 0) : ?>
                                <?php while ($row = mysqli_fetch_assoc($result_desejos)) : ?>
                                    <div class="wishlist-item">
                                        <div class="wishlist-image">
                                            <img class="img-fluid" src="<?= $row['foto_prod']; ?>" alt="<?= $row['nome_prod']; ?>">
                                            <a href="remove_wishlist.php?id_prod=<?= $row['id_prod']; ?>" class="remove-item" title="Remover da lista de desejos"><i class="ri-heart-fill"></i></a>
                                        </div>
                                        <div class="wishlist-details">
                                            <h6><a style="text-decoration: none;" href="prod.php?id_prod=<?=$row['id_prod'];?>"><?= $row['nome_prod']; ?></a></h6>
                                            <p class="price"><?= $row['preco_prod']; ?>€</p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <p class="text-center">A sua lista de desejos está vazia! <br><br><a href="./produtos.php">Explore a nossa loja</a></p>
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