<?php session_start(); ?>
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
      height: 100%;
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
    form input[type="date"] {
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
                  <a href="./utilizadores.php" class="nav-link active">
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
            </li>>
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
              <h1>Utilizadores
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
                <li class="breadcrumb-item active"><a href="utilizadores.php">Utilizadores</a></li>
                <li class="breadcrumb-item active">
                  Editar utilizador
                </li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- /.card-header -->
        <div class="card-body">
          <?php
          include("ligacao.php");

          // Verifica se o utilizador está autenticado
          if (!isset($_SESSION['id_user'])) {
            header('Location: login.php');
            exit();
          }

          $id_user = $_GET['id_user'];

          // Consulta SQL para obter os dados do utilizador
          $sql = "SELECT * FROM users WHERE id_user = '$id_user'";
          $result = mysqli_query($con, $sql);

          // Verifica se o utilizador existe
          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
          } else {
            $_SESSION['mensagem'] = "Utilizador não encontrado";
            header('Location: utilizadores.php');
            exit();
          }
          ?>
          <form action="updateUser.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">

            <label for="nome">Nome:</label>
            <input type="text" placeholder="Insira um nome" name="nome" id="nome" value="<?php echo $row['nome']; ?>" oninput="clearErrorMessage('nome-error')"><br>
            <span id="nome-error" class="error-message"></span><br>

            <label for="apelido">Apelido:</label>
            <input type="text" placeholder="Insira um apelido" name="apelido" id="apelido" value="<?php echo $row['apelido']; ?>" oninput="clearErrorMessage('apelido-error')"><br>
            <span id="apelido-error" class="error-message"></span><br>

            <label for="email">Email:</label>
            <input type="email" placeholder="Insira um email" name="email" id="email" value="<?php echo $row['email']; ?>" oninput="clearErrorMessage('email-error')"><br>
            <span id="email-error" class="error-message"></span><br>

            <label for="data">Data de Nascimento:</label>
            <input type="date" name="data" id="data" value="<?php echo $row['data_nasc']; ?>" oninput="clearErrorMessage('data-error')"><br>
            <span id="data-error" class="error-message"></span><br>

            <label for="morada">Morada:</label>
            <input type="text" placeholder="Insira uma morada" name="morada" id="morada" value="<?php echo $row['morada']; ?>" oninput="clearErrorMessage('morada-error')"><br>
            <span id="morada-error" class="error-message"></span><br>

            <label for="codigo_postal">Código Postal:</label>
            <input type="text" placeholder="Insira um código postal (Ex:.1111-000)" id="codp" name="codp" value="<?php echo $row['codigop']; ?>"><br>
            <span id="codp-error" class="error-message"></span><br>

            <div class="form-group">
              <div class="checkbox-group">
                <div>
                  <label for="isActive">Estado:</label>
                  <input type="checkbox" name="status" id="statusCheckbox" value="1" <?php echo ($row['status'] == 1) ? "checked" : ""; ?>>
                  <span id="statusText">
                    <?php echo ($row['status'] == 1) ? "Ativo" : "Não ativo"; ?>
                  </span>
                  <input type="hidden" name="status" id="statusValue" value="<?php echo ($row['status'] == 1) ? 1 : 0; ?>">

                  <script>
                    // Função para atualizar o texto ao lado da checkbox de status
                    function updateStatusText() {
                      var statusCheckbox = document.getElementById('statusCheckbox');
                      var statusText = document.getElementById('statusText');
                      var statusValue = document.getElementById('statusValue');

                      if (statusCheckbox.checked) {
                        statusText.textContent = "Ativo";
                        statusValue.value = 1;
                      } else {
                        statusText.textContent = "Não ativo";
                        statusValue.value = 0;
                      }
                    }

                    document.getElementById('statusCheckbox').addEventListener('change', function() {
                      updateStatusText();
                    });
                  </script>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="checkbox-group">
                <div>
                  <label for="isAdmin">Administrador:</label>
                  <input type="checkbox" name="admin" id="admCheckbox" value="1" <?php echo ($row['adm'] == 1) ? "checked" : ""; ?>>
                  <span id="adminText">
                    <?php echo ($row['adm'] == 1) ? "Sim" : "Não"; ?>
                  </span>
                  <input type="hidden" name="admin" id="adminValue" value="<?php echo ($row['adm'] == 1) ? 1 : 0; ?>">

                  <script>
                    // Função para atualizar o texto ao lado da checkbox de admin
                    function updateAdminText() {
                      var admCheckbox = document.getElementById('admCheckbox');
                      var adminText = document.getElementById('adminText');
                      var adminValue = document.getElementById('adminValue');
                      var statusCheckbox = document.getElementById('statusCheckbox');

                      if (admCheckbox.checked) {
                        adminText.textContent = "Sim";
                        adminValue.value = 1;
                        // Marcar e desativar o checkbox de status
                        statusCheckbox.checked = true;
                        statusCheckbox.disabled = true;
                        updateStatusText();
                      } else {
                        adminText.textContent = "Não";
                        adminValue.value = 0;
                        // Ativar o checkbox de status
                        statusCheckbox.disabled = false;
                      }
                    }

                    document.getElementById('admCheckbox').addEventListener('change', function() {
                      updateAdminText();
                    });

                    // Inicialização ao carregar a página
                    window.onload = function() {
                      updateAdminText();
                    }
                  </script>
                </div>
              </div>
            </div>

            <input type="submit" value="Editar">
            <li class="breadcrumb-item active" style="list-style: none;">
              <a href="utilizadores.php"> <i class="fas fa-arrow-left"></i> Voltar</a>
            </li>
          </form>
          <script>
            function validateForm() {
              let isValid = true;
              let nome = document.getElementById('nome');
              let apelido = document.getElementById('apelido');
              let email = document.getElementById('email');
              let codigoPostal = document.getElementById('codp');

              // Reset borders to default
              nome.style.borderColor = '';
              apelido.style.borderColor = '';
              email.style.borderColor = '';
              codigoPostal.style.borderColor = '';

              if (nome.value.trim() === '') {
                nome.style.borderColor = 'red';
                isValid = false;
              }

              if (apelido.value.trim() === '') {
                apelido.style.borderColor = 'red';
                isValid = false;
              }

              if (!validateEmail(email.value)) {
                email.style.borderColor = 'red';
                isValid = false;
              }

              if (codigoPostal.value.trim() !== '' && !validateCodigoPostal(codigoPostal.value)) {
                codigoPostal.style.borderColor = 'red';
                isValid = false;
              }

              return isValid;
            }

            function validateEmail(email) {
              const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              return re.test(String(email).toLowerCase());
            }

            function validateCodigoPostal(codigoPostal) {
              const re = /^\d{4}-\d{3}$/;
              return re.test(codigoPostal);
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