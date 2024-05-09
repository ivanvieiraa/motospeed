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
    <style>
        /* CSS para sobreposições */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            filter: brightness(60%);
            border-radius: 50%;
            display: none;
            transition: opacity 0.3s;
            /* Adicionando uma transição suave */
        }

        .overlay:hover {
            filter: brightness(40%);
        }


        .editFoto:hover .overlay {
            display: block;
        }

        .editFoto:hover .editIcon {
            display: block;
        }

        .editFoto:hover .editText {
            display: block;
        }

        .editIcon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            display: none;
        }

        .editText {
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            color: white;
            font-size: 14px;
            display: none;
        }
    </style>
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
                                <label class="editFoto" for="inputFoto"
                                    style="cursor: pointer; position: relative; display: inline-block;">
                                    <!-- Imagem de perfil -->
                                    <img id="imagem-preview" src="<?php echo $user_data['foto']; ?>" width="250px"
                                        height="250px" style="border-radius: 50%;" alt="Foto">

                                    <!-- Sobreposições -->
                                    <div class="overlay"></div>
                                    <div class="editIcon">
                                        <i class="fas fa-pencil-alt" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="editText">Alterar foto</div>

                                    <!-- Input de arquivo oculto -->
                                    <input type="file" name="foto" id="inputFoto" style="display: none;"
                                        accept=".jpg, .jpeg, .png, .webp" onchange="previewImage(event)">
                                </label>

                            </div>
                        </div>
                        <h3 class="profile-username text-center">
                            <?php echo htmlspecialchars($user_data['nome']) . ' ' . htmlspecialchars($user_data['apelido']); ?>
                        </h3>
                        <p class="text-muted text-center">Informações</p>
                        <h1 class="fw-bold fs-3 mb-2 text-left">
                            <?php if ($_SESSION['adm'] == 1) { ?>
                                <a class="fw-bold fs-3 mb-2" href="./AdminLTE-3.2.0">Dashboard</a>
                            <?php } else { ?>
                                Perfil do utilizador
                            <?php } ?>
                            <a class="fw-bold fs-3 mb-2" href="logout.php" style="float:right;">Logout</a>
                        </h1>
                        <?php if (isset($_SESSION['mensagem'])) { ?>
                            <?php if ($_SESSION['mensagem'] == "Esse email já está registado !") { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_SESSION['mensagem']; ?>
                                </div>
                                <?php unset($_SESSION['mensagem']);
                            } else if ($_SESSION['mensagem'] == "Perfil atualizado com sucesso !") { ?>
                                    <div class="alert alert-success" role="alert">
                                    <?php echo $_SESSION['mensagem']; ?>
                                    </div>
                                <?php unset($_SESSION['mensagem']);
                            } else if ($_SESSION['mensagem'] == "A idade mínima é 16") { ?>
                                <div class="alert alert-danger" role="alert">
                                <?php echo $_SESSION['mensagem']; ?>
                                </div>
                            <?php unset($_SESSION['mensagem']);
                        } ?>
                    <?php } ?>
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
                                <?php
                                $readonly = (!empty($user_data['data_nasc']) && $user_data['data_nasc'] != "0000-00-00") ? 'readonly' : '';
                                ?>
                                <input type="date" name="data" class="form-control"
                                    value="<?php echo htmlspecialchars($user_data['data_nasc']); ?>"
                                    placeholder="Insira a data de Nascimento" <?php echo $readonly; ?>>

                            </li>
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
                            class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow">Atualizar perfil</button>
            </form>
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