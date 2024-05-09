<?php
include ("ligacao.php");
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
</head>

<body>

    <!-- Navbar -->
    <?php include ('navbar.php'); ?>
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

                                <img id="imagem-preview" src="<?php echo $user_data['foto']; ?>" width="250px"
                                    height="250px" style="border-radius:50%" alt="Foto">

                            </div>
                        </div>
                        <h3 class="profile-username text-center">
                            <?php echo htmlspecialchars($user_data['nome']) . ' ' . htmlspecialchars($user_data['apelido']); ?>
                        </h3>
                        <p class="text-muted text-center">Histório de pedidos</p>
                        <h1 class="fw-bold fs-3 mb-2 text-left">
                            Histórico de pedidos 
                            <a class="fw-bold fs-3 mb-2" href="logout.php" style="float:right;">Logout</a>
                        </h1>
                    </div>
                </div>
                <!-- / Profile -->
        </div>
    </section>
    <!-- / Main Section -->

    <!-- Footer -->
    <?php include ("footer.php"); ?>

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

                reader.onload = function (e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>

</html>