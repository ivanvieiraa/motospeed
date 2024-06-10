<?php
session_start();
include("ligacao.php");

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
    <script src="https://kit.fontawesome.com/488af9d78f.js" crossorigin="anonymous"></script>
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
        form input[type="desc"],
        form input[type="date"],
        form input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 5px;
            /* margin-bottom: 15px; */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form input[type="number"] {
            width: 10%;
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

        /* Adicione esta seção no seu bloco de estilos CSS */
        .tamanho-container {
            margin-left: 7%;
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
        }

        .tamanho-input {
            margin-right: 20px;
            /* Espaçamento entre os inputs */
            margin-bottom: 10px;
            /* Espaçamento entre as linhas */
        }

        .tamanho-input label {
            margin-right: 5px;
            /* Espaçamento entre o rótulo e o input */
        }

        .tamanho-input input[type="number"] {
            width: 40%;
            /* Largura dos inputs dos tamanhos */
        }

        .campo-vazio {
            background-color: #ffcccc;
            /* Altera a cor de fundo para vermelho */
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
                    <ul class="nav nav-pills nav-sidebar flex-column" marca-widget="treeview" role="menu" marca-accordion="false">

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
                                    <a href="./produtos.php" class="nav-link active">
                                        <p>Produtos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="marcas.php" class="nav-link">
                                        <p>Marcas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="categorias.php" class="nav-link">
                                        <p>Categorias</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="subcategorias.php" class="nav-link">
                                        <p>Subcategorias</p>
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
                            <h1>Produtos
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
                                <li class="breadcrumb-item active"><a href="produtos.php">Produtos</a></li>
                                <li class="breadcrumb-item active">
                                    Inserir produto
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
                            <form id="myForm" action="inserirProd.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" id="nome" placeholder="Insira um nome" value="" oninput="clearErrorMessage('nome-error')"><br>
                                <span id="nome-error" class="error-message"></span><br>

                                <label for="desc">Descrição:</label><br>
                                <textarea name="desc" id="desc" rows="2" cols="50" oninput="clearErrorMessage('desc-error')" placeholder="Insira uma descrição"></textarea><br>
                                <span id="desc-error" class="error-message"></span><br>

                                <label for="marca">Marca:</label>
                                <select name="marca" id="marca" oninput="clearErrorMessage('marca-error')" placeholder="Insira uma marca">
                                    <option value="" disabled selected>Selecione uma marca</option>
                                    <?php
                                    // Consulta SQL para obter as marcas
                                    $sql = "SELECT * FROM marcas";
                                    $resultado = mysqli_query($con, $sql);
                                    // Exibir as opções
                                    while ($row = mysqli_fetch_assoc($resultado)) {
                                        echo "<option value='" . $row['id_marca'] . "'>" . $row['nome_marca'] . "</option>";
                                    }
                                    ?>
                                </select><br>
                                <span id="marca-error" class="error-message"></span><br>

                                <label for="categoria">Categoria:</label>
                                <select name="categoria" id="categoria" onchange="showSubcategoria(this); sendCategoria(this.value)" oninput="clearErrorMessage('categoria-error')">
                                    <option value="" disabled selected>Selecione uma categoria</option>
                                    <?php
                                    // Consulta SQL para obter as categorias
                                    $sql = "SELECT * FROM categorias";
                                    $resultado = mysqli_query($con, $sql);
                                    // Exibir as opções
                                    while ($row = mysqli_fetch_assoc($resultado)) {
                                        echo "<option value='" . $row['id_categoria'] . "'>" . $row['nome_categoria'] . "</option>";
                                    }
                                    ?>
                                </select><br>
                                <span id="categoria-error" class="error-message"></span><br>

                                <label for="subcategoria" id="subcategoria-label" style="display: none;">Subcategoria:</label>
                                <select name="subcategoria" id="subcategoria" style="display: none;" oninput="clearErrorMessage('subcategoria-error')">
                                    <option value="" disabled selected>Selecione uma subcategoria</option>
                                    <!-- As opções de subcategoria serão preenchidas dinamicamente com JavaScript -->
                                </select><br>
                                <span id="subcategoria-error" class="error-message"></span><br>

                                <script>
                                    function sendCategoria(valor) {
                                        var xhttp = new XMLHttpRequest();
                                        xhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("subcategoria").innerHTML = this.responseText;
                                                document.getElementById("subcategoria-label").style.display = "block";
                                                document.getElementById("subcategoria").style.display = "block";
                                            }
                                        };
                                        xhttp.open("GET", "get_subcategorias.php?id_categoria=" + valor, true);
                                        xhttp.send();
                                    }
                                </script>


                                <label for="tamanho">Stock:</label><br>
                                <!-- Container para os tamanhos -->
                                <div class="tamanho-container">
                                    <!-- Adicione rótulos para cada tamanho -->
                                    <?php
                                    // Consulta SQL para obter os tamanhos
                                    $sql = "SELECT * FROM tamanhos";
                                    $resultado = mysqli_query($con, $sql);
                                    // Exibir as opções
                                    while ($row = mysqli_fetch_assoc($resultado)) {
                                        echo "<div class='tamanho-input'>";
                                        echo "<label for='tamanho_" . $row['tamanho'] . "'>" . $row['tamanho'] . ":</label>";
                                        echo "<input type='number' min=0 value=0 name='tamanho[" . $row['tamanho'] . "]' id='tamanho_" . $row['tamanho'] . "'><br>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>
                                <span id="tamanho-error" class="error-message"></span><br>

                                <label for="preco">Preço:</label><br>
                                <input type="number" name="preco" id="preco" oninput="clearErrorMessage('preco-error')" step="any" placeholder="Valor">
                                <i class="fa-solid fa-euro-sign fa-lg" style="color: #000000;"></i><br>
                                <span id="preco-error" class="error-message"></span><br>


                                <div class="form-group">
                                    <div class="checkbox-group">
                                        <div>
                                            <label for="isActive">Estado :</label>
                                            <input type="checkbox" id="isActiveCheckbox" name="status">Não ativo
                                        </div>
                                    </div>
                                </div>

                                <label for="foto">Foto:</label>
                                <input type="file" name="foto" id="foto" oninput="clearErrorMessage('foto-error')"><br>
                                <span id="foto-error" class="error-message"></span><br>

                                <script>
                                    const checkbox = document.getElementById('isActiveCheckbox');

                                    checkbox.addEventListener('change', function() {
                                        const valueToSend = this.checked ? 1 : 0;
                                        const textToDisplay = this.checked ? 'Ativo' : 'Não ativo';

                                        // Aqui você pode enviar o valor para o backend ou fazer qualquer outra ação necessária
                                        console.log('Valor a enviar para o backend:', valueToSend);

                                        // Altera o texto ao lado da checkbox
                                        this.nextSibling.nodeValue = textToDisplay;
                                    });
                                </script>
                                <input type="submit" value="Criar">
                                <li class="breadcrumb-item active" style="list-style: none;">
                                    <a href="produtos.php"> <i class="fas fa-arrow-left"></i> Voltar</a>
                                </li>
                            </form>
                            <script>
                                function validateForm() {
                                    var nome = document.getElementById('nome').value;
                                    var apelido = document.getElementById('apelido').value;
                                    var desc = document.getElementById('desc').value;
                                    var marca = document.getElementById('marca').value;
                                    var categoria = document.getElementById('categoria').value;
                                    var codp = document.getElementById('codp').value;

                                    if (nome.trim() == '') {
                                        displayErrorMessage('nome-error', 'Insira um nome!');
                                        return false;
                                    }
                                    if (apelido.trim() == '') {
                                        displayErrorMessage('apelido-error', 'Insira um apelido!');
                                        return false;
                                    }
                                    if (desc.trim() == '') {
                                        displayErrorMessage('desc-error', 'Insira um desc!');
                                        return false;
                                    }
                                    // if (marca.trim() == '') {
                                    //   displayErrorMessage('marca-error', 'Insira uma marca de nascimento!');
                                    //   return false;
                                    // }
                                    // if (categoria.trim() == '') {
                                    //   displayErrorMessage('categoria-error', 'Insira uma categoria!');
                                    //   return false;
                                    // }
                                    // if (codp.trim() == '') {
                                    //   displayErrorMessage('codp-error', 'Insira um código postal!');
                                    //   return false;
                                    // }
                                    return true;
                                }

                                function displayErrorMessage(id, message) {
                                    document.getElementById(id).innerHTML = message;
                                }

                                function clearErrorMessage(id) {
                                    document.getElementById(id).innerHTML = '';
                                }
                            </script>
                        </div>
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
    <!-- marcaTables  & Plugins -->
    <script src="../../plugins/marcatables/jquery.marcaTables.min.js"></script>
    <script src="../../plugins/marcatables-bs4/js/marcaTables.bootstrap4.min.js"></script>
    <script src="../../plugins/marcatables-responsive/js/marcaTables.responsive.min.js"></script>
    <script src="../../plugins/marcatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/marcatables-buttons/js/marcaTables.buttons.min.js"></script>
    <script src="../../plugins/marcatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/marcatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/marcatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/marcatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('imagem-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsmarcaURL(input.files[0]);
            }
        }
    </script>
    <script>
        function showSubcategoria(selectElement) {
            var subcategoriaLabel = document.getElementById("subcategoria-label");
            var subcategoriaSelect = document.getElementById("subcategoria");
            if (selectElement.value !== "") {
                subcategoriaLabel.style.display = "inline-block";
                subcategoriaSelect.style.display = "inline-block";
            } else {
                subcategoriaLabel.style.display = "none";
                subcategoriaSelect.style.display = "none";
            }
        }

        // Função para atualizar o valor do input hidden com o ID da categoria selecionada
        function updateHiddenInput(value) {
            document.getElementById("id_categoria").value = value;
        }
    </script>
    <style>
        .campo-vazio {
            background-color: #ffcccc;
            /* Altera a cor de fundo para vermelho */
        }
    </style>

    <script>
        function validateForm() {
            var nome = document.getElementById('nome');
            var desc = document.getElementById('desc');
            var marca = document.getElementById('marca');
            var categoria = document.getElementById('categoria');
            var preco = document.getElementById('preco');
            var foto = document.getElementById('foto');
            var valido = true; // Variável para rastrear a validade do formulário

            if (nome.value.trim() === '') {
                nome.classList.add('campo-vazio');
                valido = false;
            } else {
                nome.classList.remove('campo-vazio');
            }
            if (desc.value.trim() === '') {
                desc.classList.add('campo-vazio');
                valido = false;
            } else {
                desc.classList.remove('campo-vazio');
            }
            if (marca.value === null || marca.value === '') {
                marca.classList.add('campo-vazio');
                valido = false;
            } else {
                marca.classList.remove('campo-vazio');
            }
            if (categoria.value === null || categoria.value === '') {
                categoria.classList.add('campo-vazio');
                valido = false;
            } else {
                categoria.classList.remove('campo-vazio');
            }
            if (preco.value.trim() === '') {
                preco.classList.add('campo-vazio');
                valido = false;
            } else {
                preco.classList.remove('campo-vazio');
            }
            if (foto.value.trim() === '') {
                foto.classList.add('campo-vazio');
                valido = false;
            } else {
                foto.classList.remove('campo-vazio');
            }

            if (!valido) {
                // Se algum campo estiver vazio, retorne false para impedir o envio do formulário
                return false;
            }

            // Se todos os campos estiverem preenchidos, retorne true para permitir o envio do formulário
            return true;
        }
    </script>


</body>

</html>