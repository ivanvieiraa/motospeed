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
  <script src="https://kit.fontawesome.com/d5954f6b26.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.7/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.js"></script>

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
      margin-bottom: 15px;
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

    .error-input {
      border-color: red;
    }

    .error-message {
      color: red;
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
                  <a href="./produtos.php" class="nav-link active">
                    <p>Produtos</p>
                  </a>
                </li>
                <li class="nav-item">
                <li class="nav-item">
                  <a href="marcas.php" class="nav-link">
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
              <h1>Editar produto
              </h1>
              <?php
              // Verifica se a mensagem de erro está definida na sessão
              if (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] != "Este email já está registado !") {
                echo '<div id="alert" class="alert alert-success" role="alert">' . $_SESSION['mensagem'] . '</div>';
                unset($_SESSION['mensagem']);
              } else {
                if (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] == "Este email já está registado !") {
                  echo '<div id="alert" class="alert alert-danger" role="alert">' . $_SESSION['mensagem'] . '</div>';
                  unset($_SESSION['mensagem']);
                }
              }
              ?>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Gestão</li>
                <li class="breadcrumb-item"><a href="produtos.php">Produtos</a></li>
                <li class="breadcrumb-item active">Editar produto</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- /.card-header -->
          <div class="row">
            <div class="col-md-12">
              <?php
              include("ligacao.php");

              // Verifica se o utilizador está autenticado
              if (!isset($_SESSION['id_user'])) {
                header('Location: login.php');
                exit();
              }

              $id_prod = $_GET['id_prod'];

              // Consulta SQL para obter os dados do produto
              $sql = "SELECT * FROM produtos p
                      INNER JOIN subcategorias s ON p.id_subcategoria = s.id_subcategoria 
                      INNER JOIN categorias c ON s.id_categoria = c.id_categoria WHERE id_prod = '$id_prod'";
              $result = mysqli_query($con, $sql);

              // Verifica se o produto existe
              if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
              } else {
                $_SESSION['mensagem'] = "Produto não encontrado";
                header('Location: produtos.php');
                exit();
              }
              ?>
              <form action="updateProduto.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="hidden" name="id_prod" value="<?php echo $id_prod; ?>">

                <label for="nome_prod">Nome:</label>
                <input type="text" placeholder="Insira um nome" name="nome_prod" id="nome_prod" value="<?php echo $row['nome_prod']; ?>" oninput="clearErrorMessage('nome-prod-error', this)">
                <span id="nome-prod-error" class="error-message"></span><br>

                <label for="desc_prod">Descrição do Produto:</label>
                <textarea placeholder="Insira uma descrição" name="desc_prod" id="desc_prod" rows="5" oninput="clearErrorMessage('desc-prod-error', this)"><?php echo $row['desc_prod']; ?></textarea>
                <span id="desc-prod-error" class="error-message"></span><br>

                <label for="id_marca">Marca:</label>
                <select name="id_marca" id="id_marca" oninput="clearErrorMessage('marca-error', this)">
                  <?php
                  $sql_marcas = "SELECT * FROM marcas";
                  $resultado_marcas = mysqli_query($con, $sql_marcas);
                  while ($row_marca = mysqli_fetch_assoc($resultado_marcas)) {
                    $selected = $row_marca['id_marca'] == $row['id_marca'] ? 'selected' : '';
                    echo "<option value='" . $row_marca['id_marca'] . "' $selected>" . $row_marca['nome_marca'] . "</option>";
                  }
                  ?>
                </select>
                <span id="marca-error" class="error-message"></span><br>

                <label for="id_categoria">Categoria:</label>
                <select name="id_categoria" id="id_categoria" oninput="updateSubcategories(this.value)">
                  <?php
                  $sql_categorias = "SELECT * FROM categorias";
                  $resultado_categorias = mysqli_query($con, $sql_categorias);
                  while ($row_categoria = mysqli_fetch_assoc($resultado_categorias)) {
                    $selected = $row_categoria['id_categoria'] == $row['id_categoria'] ? 'selected' : '';
                    echo "<option value='" . $row_categoria['id_categoria'] . "' $selected>" . $row_categoria['nome_categoria'] . "</option>";
                  }
                  ?>
                </select>
                <span id="categoria-error" class="error-message"></span><br>

                <label for="id_subcategoria">Subcategoria:</label>
                <select name="id_subcategoria" id="id_subcategoria" oninput="clearErrorMessage('subcategoria-error', this)">
                  <?php
                  $sql_subcategorias = "SELECT * FROM subcategorias WHERE id_categoria = " . $row['id_categoria'];
                  $resultado_subcategorias = mysqli_query($con, $sql_subcategorias);
                  while ($row_subcategoria = mysqli_fetch_assoc($resultado_subcategorias)) {
                    $selected = $row_subcategoria['id_subcategoria'] == $row['id_subcategoria'] ? 'selected' : '';
                    echo "<option value='" . $row_subcategoria['id_subcategoria'] . "' $selected>" . $row_subcategoria['nome_subcategoria'] . "</option>";
                  }
                  ?>
                </select>
                <span id="subcategoria-error" class="error-message"></span><br>

                <script>
                  function updateSubcategories(id_categoria) {
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'get_subcategoriass.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        const subcategorias = JSON.parse(xhr.responseText);
                        const subcategoriaSelect = document.getElementById('id_subcategoria');
                        subcategoriaSelect.innerHTML = ''; // Limpa as opções atuais

                        subcategorias.forEach(function(subcategoria) {
                          const option = document.createElement('option');
                          option.value = subcategoria.id_subcategoria;
                          option.textContent = subcategoria.nome_subcategoria;
                          subcategoriaSelect.appendChild(option);
                        });
                      }
                    };
                    xhr.send('id_categoria=' + id_categoria);
                  }
                </script>


                <label for="tamanho">Stock:</label><br>
                <div class="tamanho-container">
                  <?php
                  $sql_estoque_tamanho = "SELECT pt.tamanho, t.tamanho, pt.stock FROM produtos_tamanhos pt INNER JOIN tamanhos t ON pt.tamanho = t.tamanho WHERE pt.id_prod = $id_prod ORDER BY pt.tamanho DESC";
                  $resultado_estoque_tamanho = mysqli_query($con, $sql_estoque_tamanho);
                  while ($row_estoque_tamanho = mysqli_fetch_assoc($resultado_estoque_tamanho)) {
                    echo "<div class='tamanho-input'>";
                    echo "<label for='tamanho_" . $row_estoque_tamanho['tamanho'] . "'>" . $row_estoque_tamanho['tamanho'] . ":</label>";
                    echo "<input type='number' min='0' name='tamanho[" . $row_estoque_tamanho['tamanho'] . "]' id='tamanho_" . $row_estoque_tamanho['tamanho'] . "' value='" . $row_estoque_tamanho['stock'] . "' oninput='clearErrorMessage(\"tamanho-error\", this)'><br>";
                    echo "</div>";
                  }
                  ?>
                </div>
                <span id="tamanho-error" class="error-message"></span><br>


                <label for="preco_prod">Preço do Produto:</label>
                <input placeholder="Preço" step="any" type="number" name="preco_prod" id="preco_prod" value="<?php echo $row['preco_prod']; ?>" oninput="clearErrorMessage('preco-prod-error', this)">
                <i class="fa-solid fa-euro-sign fa-lg" style="color: #000000;"></i>
                <span id="preco-prod-error" class="error-message"></span><br>

                <div style="display: flex; align-items: center;">
                  <label for="showFoto" style="margin-right: 10px;">Foto do produto:</label>
                  <input type="checkbox" id="showFoto" onchange="toggleFotoPreview()">
                </div>
                <br>
                <!-- Preview da foto do produto -->
                <div id="fotoContainer" style="position: relative; display: none;"> <!-- Removendo o display: none; -->
                  <label class="editFoto" for="inputFoto" style="cursor: pointer; position: relative;">
                    <!-- Imagem de perfil -->
                    <img id="imagem-preview" src="../../../<?php echo $row['foto_prod']; ?>" width="250px" height="250px" style="border-radius: 50%;" alt="Foto">

                    <!-- Input de arquivo oculto -->
                    <input type="file" name="foto" id="inputFoto" style="display: none;" accept=".jpg, .jpeg, .png, .webp" onchange="previewImage(event)">
                  </label>
                </div>
                <script>
                  // Função para mostrar/ocultar a preview da foto do produto
                  function toggleFotoPreview() {
                    var fotoPreview = document.getElementById('fotoContainer');
                    var showFotoCheckbox = document.getElementById('showFoto');

                    if (showFotoCheckbox.checked) {
                      fotoPreview.style.display = 'block'; // Mostra a preview quando a checkbox está marcada
                    } else {
                      fotoPreview.style.display = 'none'; // Oculta a preview quando a checkbox está desmarcada
                    }
                  }

                  document.getElementById('fotoContainer').addEventListener('mouseover', function() {
                    var overlay = document.querySelector('.overlay');
                    var editIcon = document.querySelector('.editIcon');

                    // Exibir o overlay e o ícone de edição quando o cursor passar sobre a imagem
                    overlay.style.display = 'block';
                    editIcon.style.display = 'block';
                  });

                  document.getElementById('fotoContainer').addEventListener('mouseout', function() {
                    var overlay = document.querySelector('.overlay');
                    var editIcon = document.querySelector('.editIcon');

                    // Ocultar o overlay e o ícone de edição quando o cursor sair da imagem
                    overlay.style.display = 'none';
                    editIcon.style.display = 'none';
                  });


                  function previewImage(event) {
                    var input = event.target;
                    var reader = new FileReader();

                    reader.onload = function() {
                      var fotoPreview = document.getElementById('imagem-preview');
                      fotoPreview.src = reader.result;
                    };

                    reader.readAsDataURL(input.files[0]);
                  }
                </script>

                <div class="form-group">
                  <div class="checkbox-group">
                    <div>
                      <label for="isActive">Estado :</label>
                      <input type="checkbox" id="isActive" name="isActive" <?php echo $row['status'] == 1 ? 'checked' : ''; ?>>
                      <span id="statusLabel"><?php echo $row['status'] == 1 ? 'Ativo' : 'Não ativo'; ?></span>
                    </div>
                    <script>
                      // Obtém a referência para a checkbox e para o elemento de texto
                      var checkbox = document.getElementById('isActive');
                      var statusLabel = document.getElementById('statusLabel');

                      // Adiciona um ouvinte de evento para a checkbox
                      checkbox.addEventListener('change', function() {
                        // Atualiza o texto com base no estado da checkbox
                        if (checkbox.checked) {
                          statusLabel.textContent = 'Ativo';
                        } else {
                          statusLabel.textContent = 'Não ativo';
                        }
                      });
                    </script>

                  </div>
                </div>
                <input type="submit" value="Editar">
                <li class="breadcrumb-item active" style="list-style: none;">
                  <a href="produtos.php"> <i class="fas fa-arrow-left"></i> Voltar</a>
                </li>


              </form>

              <script>
                function validateForm() {
                  var isValid = true;
                  var nome_prod = document.getElementById('nome_prod');
                  var desc_prod = document.getElementById('desc_prod');
                  var id_marca = document.getElementById('id_marca');
                  var id_categoria = document.getElementById('id_categoria');
                  var id_subcategoria = document.getElementById('id_subcategoria');
                  var preco_prod = document.getElementById('preco_prod');
                  var tamanho_inputs = document.querySelectorAll('.tamanho-input input[type="number"]');

                  // Clear all previous errors
                  clearAllErrors();

                  if (nome_prod.value.trim() == '') {
                    displayErrorMessage('nome-prod-error', 'Insira o nome do produto!', nome_prod);
                    isValid = false;
                  }

                  if (desc_prod.value.trim() == '') {
                    displayErrorMessage('desc-prod-error', 'Insira a descrição do produto!', desc_prod);
                    isValid = false;
                  }

                  if (id_marca.value.trim() == '') {
                    displayErrorMessage('marca-error', 'Selecione a marca!', id_marca);
                    isValid = false;
                  }

                  if (id_categoria.value.trim() == '') {
                    displayErrorMessage('categoria-error', 'Selecione a categoria!', id_categoria);
                    isValid = false;
                  }

                  if (id_subcategoria.value.trim() == '') {
                    displayErrorMessage('subcategoria-error', 'Selecione a subcategoria!', id_subcategoria);
                    isValid = false;
                  }

                  if (preco_prod.value.trim() == '' || parseFloat(preco_prod.value) <= 0) {
                    displayErrorMessage('preco-prod-error', 'Insira um preço válido!', preco_prod);
                    isValid = false;
                  }

                  return isValid;
                }

                function displayErrorMessage(id, message, input) {
                  document.getElementById(id).innerHTML = message;
                  input.classList.add('error-input');
                }

                function clearErrorMessage(id, input) {
                  document.getElementById(id).innerHTML = '';
                  input.classList.remove('error-input');
                }

                function clearAllErrors() {
                  var errorMessages = document.querySelectorAll('.error-message');
                  var errorInputs = document.querySelectorAll('.error-input');

                  errorMessages.forEach(function(message) {
                    message.innerHTML = '';
                  });

                  errorInputs.forEach(function(input) {
                    input.classList.remove('error-input');
                  });
                }
              </script>
            </div>
            <script>
              document.addEventListener('DOMContentLoaded', function() {
                var alertBox = document.getElementById('alert');
                if (alertBox) {
                  setTimeout(function() {
                    alertBox.classList.add('hide');
                  }, 3000); // 5000 milissegundos = 5 segundos
                }
              });
            </script>

            <!-- /.card-body -->
          </div>
      </section>
      <!-- /.content -->
    </div>

  </div>


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
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
    $(document).ready(function() {
      $('#example2').DataTable();
    });
  </script>
</body>

</html>