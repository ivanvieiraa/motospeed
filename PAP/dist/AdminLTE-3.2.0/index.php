<?php
session_start();
if ($_SESSION['adm'] != 1) {
  header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Motospeed | Dashboard</title>

  <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon/favicon-16x16.png">
  <link rel="mask-icon" href="./assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <script src="https://kit.fontawesome.com/d5954f6b26.js" crossorigin="anonymous"></script>


  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
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
  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">




    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="mstile-150x150.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Motospeed</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item menu-closed">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php" class="nav-link active">
                    <p>Página principal</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../index.php" class="nav-link ">
                    <p>Sair</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-closed">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Gestão
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./pages/tables/utilizadores.php" class="nav-link ">
                    <p>Utilizadores</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./pages/tables/produtos.php" class="nav-link ">
                    <p>Produtos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./pages/tables/marcas.php" class="nav-link">
                    <p>Marcas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./pages/tables/categorias.php" class="nav-link">
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
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Estatísticas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                <li class="breadcrumb-item active">Página principal</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>
                    <?php
                    include("../ligacao.php");
                    $sqlProd = "SELECT COUNT(*) FROM produtos";
                    $resultProd = mysqli_query($con, $sqlProd);
                    $rowProd = mysqli_fetch_array($resultProd);
                    $prods = $rowProd[0];
                    echo $prods;
                    ?>

                  </h3>

                  <p>Produtos</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>
                    <?php
                    include("../ligacao.php");
                    $sqlMarcass = "SELECT COUNT(*) FROM marcas";
                    $resultMarca = mysqli_query($con, $sqlMarcass);
                    $rowMarca = mysqli_fetch_array($resultMarca);
                    $marcas = $rowMarca[0];
                    echo $marcas;
                    ?>
                  </h3>

                  <p>Marcas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>
                    <?php
                    include("../ligacao.php");
                    $sql = "SELECT SUM(total) FROM vendas";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    $total = $row[0];
                    echo number_format($total, 2);
                    ?><sup style="font-size: 20px">€</sup></h3>

                  <p>Total de vendas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>
                    <?php
                    include("../ligacao.php");
                    $sql = "SELECT COUNT(*) FROM users";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    $users = $row[0];
                    echo $users;
                    ?>
                  </h3>
                  <p>Utilizadores registados</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <h3>Lista de pedidos de Suporte</h3>
          <?php
          // Verifica se a mensagem de erro está definida na sessão
          if (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] != "O Admin não pode ser desativado.") {
            echo '<div id="alert" class="alert alert-success" role="alert">' . $_SESSION['mensagem'] . '</div>';
            unset($_SESSION['mensagem']);
          } else {
            if (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] == "O Admin não pode ser desativado.") {
              echo '<div id="alert" class="alert alert-danger" role="alert">' . $_SESSION['mensagem'] . '</div>';
              unset($_SESSION['mensagem']);
            }
          }
          ?>
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
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Assunto</th>
                    <th>Email</th>
                    <th>Recebido a</th>
                    <th>Estado</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Inclua o arquivo de conexão
                  include("../ligacao.php");
                  // Consulta SQL para obter os dados da tabela
                  $sql = "SELECT * FROM suporte";
                  $result = mysqli_query($con, $sql);
                  // Loop através dos resultados da consulta e exibir cada linha na tabela
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row["id_suporte"] . "</td>";
                      echo "<td style='text-align:left'>" . $row["assunto"] . "</td>";
                      echo "<td style='text-align:left'>" . $row["email"] . "</td>";
                      echo "<td style='text-align:left'>" . $row["criado_a"] . "</td>";
                      if ($row['status'] == 0)
                        echo "<td style='text-align:left; color:red; font-weight: bold;'>Não resolvido</td>";
                      if ($row['status'] == 1)
                        echo "<td style='text-align:left; color:green; font-weight: bold;'>Resolvido</td>";
                      if ($row['status'] == 2)
                        echo "<td style='text-align:left; color:orange; font-weight: bold;'>Em análise</td>";
                      echo "<td style='cursor: pointer;'><i class='fa-solid fa-eye' onclick='showDetails(" . $row["id_suporte"] . "," . $row["status"] . ")'></i></td>";
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
          <!--  -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Modal HTML -->
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Use modal-lg or modal-xl for larger size -->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalhes do Suporte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p style="display: none;"><strong>ID:</strong> <span id="support-id"></span></p>
          <p><strong>Assunto:</strong> <span id="support-subject"></span></p>
          <p><strong>Email:</strong> <span id="support-email"></span></p>
          <p style="display: none;"><strong>Recebido a:</strong> <span id="support-date"></span></p>
          <p style="display: none;"><strong>Estado:</strong> <span id="support-status"></span></p>
          <p><strong>Mensagem:</strong> <span id="support-description"></span></p>

          <form id="responseForm" method="POST" action="resposta.php">
            <input type="hidden" name="support_id" id="form-support-id">
            <div class="form-group" style="display: none;">
              <label for="response-subject">Assunto</label>
              <input type="text" class="form-control" id="response-subject" name="subject" readonly>
            </div>
            <div class="form-group">
              <label for="response-message">Resposta:</label>
              <textarea class="form-control" id="response-message" name="message" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="btnEnviar">Enviar resposta</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>



  <script>
    function showDetails(id, status) {
      // Fetch details from the server using AJAX
      fetch(`getSupportDetails.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
          // Fill the modal with the fetched data
          document.getElementById('support-id').innerText = data.id_suporte;
          document.getElementById('support-subject').innerText = data.assunto;
          document.getElementById('support-email').innerText = data.email;
          document.getElementById('support-date').innerText = data.criado_a;
          document.getElementById('support-status').innerText = data.status == 0 ? 'Não resolvido' : data.status == 1 ? 'Resolvido' : 'Em análise';
          document.getElementById('support-description').innerText = data.mensagem;

          // Pre-fill the form in the modal
          document.getElementById('form-support-id').value = data.id_suporte;
          document.getElementById('response-subject').value = `Resposta: ${data.assunto}`;

          // Hide or show the response form based on the status
          if (status == 2 || status == 1) { // Se o status for "Em análise"
            document.getElementById('responseForm').style.display = 'none';
          } else {
            document.getElementById('responseForm').style.display = 'block';
          }

          // Show the modal
          $('#detailModal').modal('show');
        })
        .catch(error => console.error('Error:', error));
    }
    // Adicione um evento de escuta para o envio do formulário
    document.getElementById('responseForm').addEventListener('submit', function(event) {
      // Verifique se o campo de mensagem está vazio
      if (document.getElementById('response-message').value.trim() === '') {
        // Se estiver vazio, impeça o envio do formulário
        event.preventDefault();
        Swal.fire({
          icon: 'error',
          text: 'Escreva uma resposta!',
        });
      }
    });
  </script>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>