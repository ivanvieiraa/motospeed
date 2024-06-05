<?php
session_start();
include 'ligacao.php';

$sql = "SELECT id_categoria, nome_categoria FROM categorias";
$result = $con->query($sql);

$categorias = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
}

$sql2 = "SELECT id_subcategoria, subcategoria FROM subcategorias";
$result2 = $con->query($sql2);

$subcategorias = [];
if ($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) {
        $subcategorias[] = $row2;
    }
}

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motospeed | Dashboard</title>

    <link rel="apple-touch-icon" sizes="180x180" href="../../../assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/images/favicon/favicon-16x16.png">
    <link rel="mask-icon" href="./assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <script src="https://kit.fontawesome.com/d5954f6b26.js" crossorigin="anonymous"></script>
    <style>
        .checkbox-group {
            display: flex;
        }

        .checkbox-group div {
            margin-right: 20px;
            /* Adiciona espaço entre as checkboxes */
        }

        .content-wrapper {
            position: relative;
        }

        .alert {
            position: fixed;
            top: 1%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.2s ease;
        }

        .alert.hide {
            opacity: 0;
        }

        /* Custom CSS for form */
        form {
            width: 80%;
            height: auto;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: '';
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="date"],
        form input[type="password"] {
            width: 100%;
            padding: 5px;
            /* margin-bottom: 15px; */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Error message */
        .alert-danger,
        .alert-success {
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .error {
            border: 1px solid red !important;
        }

        select {
            width: 100%;
            padding: 5px;
            /* margin-bottom: 15px; */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index.php" class="brand-link">
                <img src="mstile-150x150.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Motospeed</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item menu-closed">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../index.php" class="nav-link">
                                        <p>Página principal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../../index.php" class="nav-link ">
                                        <p>Sair</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Gestão
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./utilizadores.php" class="nav-link">
                                        <p>Utilizadores</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./produtos.php" class="nav-link ">
                                        <p>Produtos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <li class="nav-item">
                                    <a href="marcas.php" class="nav-link ">
                                        <p>Marcas</p>
                                    </a>
                                </li>
                                </a>
                        </li>
                        <li class="nav-item">
                            <a href="categorias.php" class="nav-link">
                                <p>Categorias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="subcategorias.php" class="nav-link active">
                                <p>Sub-Categorias</p>
                            </a>
                        </li>
                    </ul>
                    </li>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Sub-Categorias
                            </h1>
                            <?php
                            // Verifica se a mensagem de erro está definida na sessão
                            if (isset($_SESSION['mensagem'])) {
                                echo '<div id="alert" class="alert alert-danger" role="alert">' . $_SESSION['mensagem'] . '</div>';
                                unset($_SESSION['mensagem']);
                            }
                            ?>
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Gestão</li>
                                <li class="breadcrumb-item active"><a href="subcategorias.php">Sub-Categorias</a></li>
                                <li class="breadcrumb-item active">
                                    Inserir sub-categoria
                                </li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="inserirSubCategoria.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

                                <label for="categoria">Categoria Mãe:</label>
                                <select name="id_categoria" id="categoria" oninput="clearErrorMessage('categoria-error')">
                                    <option value="">Selecione uma categoria</option>
                                    <?php foreach ($categorias as $categoria) : ?>
                                        <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nome_categoria']; ?></option>
                                    <?php endforeach; ?>
                                </select><br>
                                <span id="categoria-error" class="error-message"></span><br>

                                <div id="existingSubcategoryDiv">
                                    <label for="subcategoria">Sub-categoria:</label>
                                    <select name="id_subcategoria" id="subcategoria" oninput="clearErrorMessage('subcategoria-error')">
                                        <option value="">Selecione uma subcategoria</option>
                                        <?php foreach ($subcategorias as $subcategoria) : ?>
                                            <option value="<?php echo $subcategoria['id_subcategoria']; ?>"><?php echo $subcategoria['subcategoria']; ?></option>
                                        <?php endforeach; ?>
                                    </select><br>
                                    <span id="subcategoria-error" class="error-message"></span><br>
                                </div>

                                <div id="newSubcategoryDiv" style="display:none;">
                                    <label for="newSubcategory">Nova Sub-categoria:</label>
                                    <input type="text" name="new_subcategoria" id="newSubcategory" oninput="clearErrorMessage('newSubcategory-error')"><br>
                                    <span id="newSubcategory-error" class="error-message"></span><br>
                                </div>

                                <input type="checkbox" id="newSubcategoryCheckbox" onclick="toggleSubcategoryInput()"> Adicionar nova subcategoria
                                <br><br>

                                <input type="submit" value="Criar">
                                <li class="breadcrumb-item active" style="list-style: none;">
                                    <a href="subcategorias.php"> <i class="fas fa-arrow-left"></i> Voltar</a>
                                </li>
                            </form>


                        </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        function validateForm() {
            var nome = document.getElementById("nome").value;
            var categoria = document.getElementById("categoria").value;
            var isValid = true;

            if (nome.trim() == "") {
                document.getElementById("nome").classList.add("error");
                isValid = false;
            }

            if (categoria == "") {
                document.getElementById("categoria").classList.add("error");
                isValid = false;
            }

            return isValid;
        }

        function clearErrorMessage(id) {
            document.getElementById(id).innerText = "";
            document.getElementById("nome").classList.remove("error");
            document.getElementById("categoria").classList.remove("error");
        }
    </script>
    <script>
        function toggleSubcategoryInput() {
            var checkbox = document.getElementById("newSubcategoryCheckbox");
            var existingSubcategoryDiv = document.getElementById("existingSubcategoryDiv");
            var newSubcategoryDiv = document.getElementById("newSubcategoryDiv");

            if (checkbox.checked) {
                existingSubcategoryDiv.style.display = "none";
                newSubcategoryDiv.style.display = "block";
            } else {
                existingSubcategoryDiv.style.display = "block";
                newSubcategoryDiv.style.display = "none";
            }
        }

        function validateForm() {
            var categoria = document.getElementById("categoria").value;
            var isValid = true;
            var subcategoria = document.getElementById("subcategoria").value;
            var newSubcategoria = document.getElementById("newSubcategory").value;
            var checkbox = document.getElementById("newSubcategoryCheckbox");

            if (categoria == "") {
                document.getElementById("categoria").classList.add("error");
                isValid = false;
            }

            if (checkbox.checked) {
                if (newSubcategoria.trim() == "") {
                    document.getElementById("newSubcategory").classList.add("error");
                    isValid = false;
                }
            } else {
                if (subcategoria == "") {
                    document.getElementById("subcategoria").classList.add("error");
                    isValid = false;
                }
            }

            return isValid;
        }

        function clearErrorMessage(id) {
            document.getElementById(id).innerText = "";
            document.getElementById("categoria").classList.remove("error");
            if (document.getElementById("newSubcategoryCheckbox").checked) {
                document.getElementById("newSubcategory").classList.remove("error");
            } else {
                document.getElementById("subcategoria").classList.remove("error");
            }
        }
    </script>


</body>

</html>