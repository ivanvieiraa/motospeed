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

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table,
    th,
    td {
      border: 1px solid #ccc;
      cursor: pointer;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
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
                  <a href="./marcas.php" class="nav-link active">
                    <p>Marcas</p>
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
              <h1>Marcas
              </h1>
              <?php
              // Verifica se a mensagem de erro está definida na sessão
              if (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] != "Já existe uma marca com esse nome!") {
                echo '<div id="alert" class="alert alert-success" role="alert">' . $_SESSION['mensagem'] . '</div>';
                unset($_SESSION['mensagem']);
              } else {
                if (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] == "Já existe uma marca com esse nome!") {
                  echo '<div id="alert" class="alert alert-danger" role="alert">' . $_SESSION['mensagem'] . '</div>';
                  unset($_SESSION['mensagem']);
                }
              }
              ?>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Gestão</a></li>
                <li class="breadcrumb-item active">Marcas</li>
                <li class="breadcrumb-item active">
                  &nbsp;<a href="criarMarca.php"> <i class="fa-regular fa-square-plus fa-xl"></i></a>
                </li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="marcas" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID <img src="sort.png" width="12px" height="12px"></th>
                  <th>Marca <img src="sort.png" width="12px" height="12px"></th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Inclua o arquivo de conexão
                include 'ligacao.php';
                // Consulta SQL para obter os dados da tabela
                $sql = "SELECT * FROM marcas";
                $result = mysqli_query($con, $sql);
                // Loop através dos resultados da consulta e exibir cada linha na tabela
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id_marca"] . "</td>";
                    echo "<td style='text-align:left'>" . ($row["nome_marca"] ? $row["nome_marca"] : "<a href='editMarca.php?id_marca=" . $row['id_marca'] . "'><i>N/A</i></a>") . "</td>";
                    echo "<td style='text-align:left'><a href='editMarca.php?id_marca=" . $row['id_marca'] . "'><i class='fa-solid fa-pen-to-square'></i></a></td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='12' style='text-align:center'>Sem resultados encontrados</td></tr>";
                }
                // Fechar a conexão
                mysqli_close($con);
                ?>
              </tbody>
            </table>
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
    $(function() {
      $("#marcas").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        dom: '<lf<t>ip>',
        "language": {
          "decimal": "",
          "emptyTable": "Nenhum registro encontrado",
          "info": "A mostrar _START_ a _END_ de _TOTAL_ resultados",
          "infoEmpty": "A mostrar 0 a 0 of de resultados",
          "infoFiltered": "(filtrado de _MAX_ resultados)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Show _MENU_ entries",
          "loadingRecords": "A carregar...",
          "processing": "",
          "searchPlaceholder": 'Realizar pesquisa',
          "search": "Pesquisa:",
          "zeroRecords": "Não foram encontrados resultados",
          "paginate": {
            "first": "Primeiro",
            "last": "Último",
            "next": "Próximo",
            "previous": "Anterior"
          },
          "aria": {
            "orderable": "Ordenar por coluna",
            "orderableReverse": "Reverter ordenação"
          }
        }
      });
    });
  </script>
</body>

</html>