<?php
include ("ligacao.php");
session_start();


// Verificar se o usuário está logado
if (isset ($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $sql = "SELECT * FROM users WHERE id_user = $id_user";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $user_data = mysqli_fetch_assoc($result);
    } else {
        // Se o usuário não for encontrado, redirecionar para a página de login
        header("Location: ../login_form.php");
        exit();
    }
    mysqli_close($con);
} else {
    // Se o usuário não estiver logado, redirecionar para a página de login
    header("Location: ../login_form.php");
    exit();
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
    <title>Motospeed | Perfil</title>

</head>

<body class="">

    <!-- Navbar -->
    <!-- Navbar -->
    <?php include ('navbar.php'); ?>
    <!-- / Navbar--> <!-- / Navbar-->

    <!-- Main Section-->
    <section class="mt-0 overflow-hidden ">
        <!-- Page Content Goes Here -->
        <div class="container-fluid">
            <!-- Progile-->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <div class="text-center">
                        <img class="profile-user-img img img-circle"
                            src="<?php echo htmlspecialchars($user_data['foto']); ?>" alt="Foto de perfil" width="150px"
                            height="150px">
                    </div>
                    <h3 class="profile-username text-center">
                        <?php echo htmlspecialchars($user_data['nome']) . ' ' . htmlspecialchars($user_data['apelido']); ?>
                    </h3>
                    <?php
                    if ($_SESSION['adm'] == 1) {
                        ?>
                        <p class="text-muted text-center">Informações</p>
                        <h1 class="fw-bold fs-3 mb-2 text-left">
                            Perfil do admin |
                            <a class="fw-bold fs-3 mb-2" style="float:right" href="./AdminLTE-3.2.0">Dashboard</a>
                            <a class="fw-bold fs-3 mb-2" style="float:center" href="logout.php">Log out</a>
                        </h1>
                        <?php
                    } else if ($_SESSION['admin'] == 0) { ?>

                            <p class="text-muted text-center">Informações</p>
                            <h1 class="fw-bold fs-3 mb-2 text-left">
                                Perfil do utilizador
                                <a class="fw-bold fs-3 mb-2" style="float:right" href="logout.php">Log out</a>
                            </h1>
                        <?php
                    }
                    ?>
                    <form name="alterarPerfil" action="alterarPerfil.php" method="POST" enctype="multipart/form-data" >
                        <?php
                        // Verifica se a mensagem de erro está definida na sessão
                        if ($_SESSION['mensagem'] == "Esse email já está registado !") {
                            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['mensagem'] . '</div>';
                            // Limpa a mensagem de erro da sessão após exibi-la
                            unset($_SESSION['mensagem']);
                        }
                        // Verifica se a mensagem de erro está definida na sessão
                        if ($_SESSION['mensagem'] == "Perfil atualizado com sucesso !") {
                            echo '<div class="alert alert-success" role="alert">' . $_SESSION['mensagem'] . '</div>';
                            // Limpa a mensagem de erro da sessão após exibi-la
                            unset($_SESSION['mensagem']);
                        }
                        ?>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nome</b> <input type="text" name="nome" class="form-control"
                                    value="<?php echo htmlspecialchars($user_data['nome']); ?>" required
                                    placeholder="Insira o seu nome">
                            </li>
                            <li class="list-group-item">
                                <b>Apelido</b> <input type="text" name="apelido" class="form-control"
                                    value="<?php echo htmlspecialchars($user_data['apelido']); ?>" required
                                    placeholder="Insira o seu apelido">
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <input type="email" name="email" class="form-control"
                                    value="<?php echo htmlspecialchars($user_data['email']); ?>" required
                                    placeholder="Insira o seu email">
                            </li>
                            <li class="list-group-item">
                                <b>Data de Nascimento</b>
                                <input type="date" name="data" class="form-control"
                                    value="<?php echo htmlspecialchars($user_data['data_nasc']); ?>"
                                    placeholder="Insira a data de Nascimento" required <?php
                                    if ($user_data['data_nasc'] != "") {
                                        ?>readonly ><?php }
                                    ?>
                            </li>
                            <li class="list-group-item">
                                <b>Foto de perfil</b>
                                
                                <input type="file" name="foto" id="inputFoto" placeholder="Foto"
                                    onchange="previewImage(event)" accept=".jpg, .jpeg, .png, .webp">
                                <br>Atual :<br><img id="imagem-preview" src="<?php echo $user_data['foto'];?>" width="250px"
                                    height="250px" alt="A foto aparecerá aqui"><br><br>
                            </li>
                            <script>
                                function previewImage(event) {
                                    var input = event.target;
                                    var preview = document.getElementById('imagem-preview');

                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            preview.src = e.target.result;
                                            preview.style.display = 'block';
                                        }

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                            <li class="list-group-item">
                                <b>Morada</b> <input type="text" name="morada" class="form-control"
                                    value="<?php echo htmlspecialchars($user_data['morada']); ?>"
                                    placeholder="Insira a sua morada">
                            </li>
                            <li class="list-group-item">
                                <b>Código Postal</b> <input type="text" name="codp" class="form-control"
                                    value="<?php echo htmlspecialchars($user_data['codigop']); ?>"
                                    placeholder="Insira o seu código postal">
                            </li>
                            <li class="list-group-item">
                                <b>Password</b> <input type="password" name="password" class="form-control"
                                    value="<?php echo htmlspecialchars($user_data['pass']); ?>" required
                                    placeholder="Insira a sua password">
                            </li>
                        </ul>
                        <button type="submit"
                            class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow">Atualizar
                            perfil</button>
                    </form>
                </div>
            </div>
            <!-- / Profile-->

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