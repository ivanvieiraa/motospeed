<?php
session_start();
if ($_SESSION['adm'] != 1) {
  header('Location: ../index.php');
}
include ('../ligacao.php');
// Consulta SQL para obter o total de produtos para cada categoria
$sqlMarcasG = "SELECT m.nome_marca AS marca, COUNT(p.id_prod) AS total_produtos
                  FROM marcas m
                  LEFT JOIN produtos p ON m.id_marca = p.id_marca
                  GROUP BY m.nome_marca";
$resultMarcasG = mysqli_query($con, $sqlMarcasG);

// Inicializar arrays para armazenar os totais de produtos e rótulos de categoria
$labels = [];
$totalProdutos = [];

// Loop através dos resultados da consulta e armazenar os totais de produtos e rótulos de categoria
while ($rowMarcaG = mysqli_fetch_assoc($resultMarcasG)) {
  $labels[] = $rowMarcaG['marca'];
  $totalProdutos[] = $rowMarcaG['total_produtos'];
}

// Consulta SQL para obter as estatísticas de vendas por mês
$sqlVendasMes = "SELECT MONTH(data_venda) AS mes, SUM(total) AS total_mes
                FROM vendas
                WHERE YEAR(data_venda) = YEAR(CURRENT_DATE())
                GROUP BY MONTH(data_venda)";
$resultVendasMes = mysqli_query($con, $sqlVendasMes);

// Array de nomes dos meses em português
$nomes_meses = array(
  1 => 'Janeiro',
  2 => 'Fevereiro',
  3 => 'Março',
  4 => 'Abril',
  5 => 'Maio',
  6 => 'Junho',
  7 => 'Julho',
  8 => 'Agosto',
  9 => 'Setembro',
  10 => 'Outubro',
  11 => 'Novembro',
  12 => 'Dezembro'
);


// Inicializar arrays para armazenar os nomes dos meses e os totais de vendas
$nomes_meses_vendas = array();
$totalVendasMes = array();

// Loop através dos resultados da consulta e armazenar os nomes dos meses e os totais de vendas
while ($rowVendasMes = mysqli_fetch_assoc($resultVendasMes)) {
  $nome_mes = $nomes_meses[intval($rowVendasMes['mes'])]; // Obtém o nome do mês
  $nomes_meses_vendas[] = $nome_mes;
  $totalVendasMes[] = $rowVendasMes['total_mes'];
}

// Consulta SQL para obter produtos com estoque baixo
$sqlEstoqueBaixo = "SELECT p.nome_prod AS produto, pt.tamanho, pt.stock, pt.id_prod
                    FROM produtos p
                    INNER JOIN produtos_tamanhos pt ON p.id_prod = pt.id_prod
                    WHERE pt.stock <= 20";
$resultEstoqueBaixo = mysqli_query($con, $sqlEstoqueBaixo);

// Inicializar arrays para armazenar os produtos, tamanhos e estoques com baixo estoque
$produtosEstoqueBaixo = [];
$tamanhosEstoqueBaixo = [];
$estoqueEstoqueBaixo = [];
$idProdutosEstoqueBaixo = [];

// Loop através dos resultados da consulta e armazenar os produtos, tamanhos, estoques e IDs com baixo estoque
while ($rowEstoqueBaixo = mysqli_fetch_assoc($resultEstoqueBaixo)) {
  $produtosEstoqueBaixo[] = $rowEstoqueBaixo['produto'] . ' (' . $rowEstoqueBaixo['tamanho'] . ')';
  $estoqueEstoqueBaixo[] = $rowEstoqueBaixo['stock'];
  $idProdutosEstoqueBaixo[] = $rowEstoqueBaixo['id_prod']; // Armazenar o ID do produto
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
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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

    /* Remover o estilo padrão do select */
    .customSelect {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background: none;
      border: none;
      padding: 1px;
      font-size: 16px;
      color: #333;
      border: none;
      border-radius: 4px;
      background-color: none;
      padding: 5px;
      outline: none;
      width: 100%;
    }

    /* Estilizar o select quando estiver focado */
    .customSelect:focus {
      border-color: #007BFF;
    }

    /* Estilizar as opções */
    .customSelect option {
      color: #333;
      background-color: none;
    }

    /* Estilo específico para cada valor de opção */
    .status-resolvido {
      color: green;
      font-weight: bold;
    }

    .status-nao-resolvido {
      color: red;
      font-weight: bold;
    }

    .status-analise {
      color: orange;
      font-weight: bold;
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
                    include ("../ligacao.php");
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
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>
                    <?php
                    include ("../ligacao.php");
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
                    include ("../ligacao.php");
                    $sql = "SELECT SUM(total) FROM vendas";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    $total = $row[0];
                    echo number_format($total, 2);
                    ?><sup style="font-size: 20px">€</sup>
                  </h3>

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
                    include ("../ligacao.php");
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
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <div class="row">


            <!-- Coluna da esquerda -->
            <div class="col-lg-6 col-12">
              <!-- PIE CHART -->
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Quantidade de produtos por marca</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button> -->
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="pieChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col-lg-6 -->

            <!-- Coluna da direita -->
            <div class="col-lg-6 col-12">
              <!-- SECOND CHART -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Total de vendas por mês</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button> -->
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="barChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col-lg-6 -->

            <!-- Novo gráfico de barras para produtos com estoque baixo -->
            <?php if (!empty($produtosEstoqueBaixo)): ?>
              <div class="col-lg-12 col-12">
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Produtos com stock baixo</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button> -->
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="estoqueBaixoChart"
                      style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
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
            document.addEventListener('DOMContentLoaded', function () {
              var alertBox = document.getElementById('alert');
              if (alertBox) {
                setTimeout(function () {
                  alertBox.classList.add('hide');
                }, 3000); // 5000 milissegundos = 5 segundos
              }
            });
          </script>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="listapedidos" class="table table-bordered table-hover">
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
                  include ("../ligacao.php");
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
                      echo "<td class='status-cell'>";
                      echo "<select class='customSelect' data-id='" . $row["id_suporte"] . "'>";
                      echo "<option value='0'" . ($row['status'] == 0 ? ' selected' : '') . ">Não resolvido</option>";
                      echo "<option value='1'" . ($row['status'] == 1 ? ' selected' : '') . ">Resolvido</option>";
                      echo "<option value='2'" . ($row['status'] == 2 ? ' selected' : '') . ">Em análise</option>";
                      echo "</select>";
                      echo "</td>";
                      echo "<td style='cursor: pointer;'><i style='margin-right: 5px;' class='fa-solid fa-eye' onclick='showDetails(" . $row["id_suporte"] . "," . $row["status"] . ")'></i>";
                      if ($row['status'] == 1) {
                        echo "<a href='#' class='delete-suporte-btn' data-id='" . $row['id_suporte'] . "'>
                        <i class='fa-solid fa-trash' style='color: #ff0000;'></i>
                      </a></td>";
                      }
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='12' style='text-align:center'>Não foram submetidos pedidos de suporte</td></tr>";
                  }
                  // Fechar a conexão
                  mysqli_close($con);
                  ?>
                </tbody>
              </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
              aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Tem certeza de que deseja remover este pedido de suporte ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Remover</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- JavaScript no final do corpo do documento -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <script>
              $(document).ready(function () {
                // Manipulador de clique para abrir o modal
                $('.delete-suporte-btn').on('click', function (event) {
                  event.preventDefault();
                  var id_suporte = $(this).data('id');
                  $('#confirmDeleteModal').modal('show');

                  // Manipulador de clique para o botão de confirmação dentro do modal
                  $('#confirmDeleteButton').off('click').on('click', function () {
                    // Redireciona para a página de remoção do usuário
                    window.location.href = 'removeSuporte.php?id_suporte=' + id_suporte;
                  });
                });
              });
            </script>
            <script>
              document.addEventListener('DOMContentLoaded', function () {
                var alertBox = document.getElementById('alert');
                if (alertBox) {
                  setTimeout(function () {
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
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
          <p><strong>Mensagem:</strong><br> <span id="support-description"></span></p>

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
    document.getElementById('responseForm').addEventListener('submit', function (event) {
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      function updateSelectColor(selectElement) {
        var status = selectElement.val();
        // Limpa as classes de cor existentes
        selectElement.removeClass('status-resolvido status-nao-resolvido status-analise');

        // Adiciona a classe de cor correspondente ao status selecionado
        if (status == 0) {
          selectElement.addClass('status-nao-resolvido');
        } else if (status == 1) {
          selectElement.addClass('status-resolvido');
        } else if (status == 2) {
          selectElement.addClass('status-analise');
        }

      }

      $('.customSelect').each(function () {
        updateSelectColor($(this));
      });

      $('.customSelect').change(function () {
        var id = $(this).data('id');
        var status = $(this).val();
        var selectElement = $(this);

        $.ajax({
          url: 'atualizar_status.php',
          method: 'POST',
          data: {
            id: id,
            status: status
          },
          success: function (response) {
            updateSelectColor(selectElement);
            window.location.reload();
          },
          error: function (xhr, status, error) {
            console.error('Erro ao atualizar status:', error);
          }
        });
      });
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

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.7/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.js"></script>
  <script>
    $(function () {
      $("#listapedidos").DataTable({
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
          "search": "Pesquisa:",
          "searchPlaceholder": 'Realizar pesquisa',
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

  <script>
    // Definir os dados do gráfico
    var donutData = {
      labels: <?php echo json_encode($labels); ?>,
      datasets: [{
        data: <?php echo json_encode($totalProdutos); ?>,
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#605ca8', '#ff851b', '#39cccc', '#01ff70'], // Cores dos segmentos do gráfico
      }]
    };

    // Renderizar o gráfico de pizza
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var pieOptions = {
      maintainAspectRatio: false,
      responsive: true,
    };
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: donutData,
      options: pieOptions
    });
  </script>

  <script>
    // Definir os dados do gráfico de barras
    var barData = {
      labels: <?php echo json_encode($nomes_meses_vendas); ?>,
      datasets: [{
        label: 'Total de vendas',
        backgroundColor: 'rgba(60, 141, 188, 0.8)', // Cor das barras
        borderColor: 'rgba(60,141,188,0.8)',
        borderWidth: 1,
        data: <?php echo json_encode($totalVendasMes); ?>,
      }]
    };
    // Renderizar o gráfico de barras
    var barChartCanvas = $('#barChart').get(0).getContext('2d');
    var barOptions = {
      maintainAspectRatio: false,
      responsive: true,
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      },
      tooltips: {
        callbacks: {
          label: function (tooltipItem, data) {
            var datasetLabel = data.datasets[tooltipItem.datasetIndex].label || '';
            var value = tooltipItem.yLabel.toFixed(2); // Formatar o número com duas casas decimais
            return datasetLabel + ': ' + value + ' €';
          }
        }
      }
    };
    new Chart(barChartCanvas, {
      type: 'bar',
      data: barData,
      options: barOptions
    });
  </script>

  <script>
    // Calcular o total máximo atual e adicionar 10 a ele
    var maxStock = <?php echo max($estoqueEstoqueBaixo); ?> + 10;

    // Definir os dados do gráfico de linhas para produtos com estoque baixo
    var estoqueBaixoData = {
      labels: <?php echo json_encode($produtosEstoqueBaixo); ?>,
      datasets: [{
        label: 'Qtd Stock',
        backgroundColor: 'rgba(255, 193, 7, 0.2)', // Cor da linha
        borderColor: 'rgba(255, 193, 7, 1)',
        borderWidth: 2,
        data: <?php echo json_encode($estoqueEstoqueBaixo); ?>,
        fill: false, // Não preencher abaixo da linha
        pointBackgroundColor: 'red',
        pointBorderColor: 'red',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: 'red',
        pointRadius: 3, // Aumentar o tamanho dos pontos
        pointHoverRadius: 4 // Aumentar o tamanho dos pontos ao passar o mouse
      }]
    };

    // Renderizar o gráfico de linhas para produtos com estoque baixo
    var estoqueBaixoChartCanvas = $('#estoqueBaixoChart').get(0).getContext('2d');
    var estoqueBaixoOptions = {
      maintainAspectRatio: false,
      responsive: true,
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true,
            stepSize: 1, // Definir o passo para 1
            max: maxStock // Definir o limite superior para 10 acima do total máximo
          }
        }]
      },
      plugins: {
        datalabels: {
          color: '#000',
          font: {
            weight: 'bold'
          },
          anchor: 'end',
          align: 'end',
          formatter: function (value, context) {
            return value + " (" + context.dataset.data[context.dataIndex] + ")";
          }
        }
      },
      onClick: function (evt, elements) {
        if (elements.length > 0) {
          var datasetIndex = elements[0]._datasetIndex;
          var index = elements[0]._index;
          var stock = <?php echo json_encode($estoqueEstoqueBaixo); ?>[index]; // Obter o estoque do produto clicado
          if (stock >= 0) { // Verificar se o estoque é maior que 0
            var id_prod = <?php echo json_encode($idProdutosEstoqueBaixo); ?>[index]; // Obter o ID do produto clicado
            window.location.href = "./pages/tables/editProd.php?id_prod=" + id_prod; // Redirecionar para a página editProd.php com o ID do produto
          }
        }
      }
    };

    new Chart(estoqueBaixoChartCanvas, {
      type: 'line',
      data: estoqueBaixoData,
      options: estoqueBaixoOptions
    });
  </script>


</body>

</html>