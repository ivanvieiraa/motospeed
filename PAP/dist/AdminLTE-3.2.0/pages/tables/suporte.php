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
                        <li class="nav-item menu-closed">
                            <a href="#" class="nav-link">
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
                                    <a href="marcas.php" class="nav-link">
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
                        <li class="nav-item menu-closed">
                            <a href="./suporte.php" class="nav-link active">
                               <i class="nav-icon fa-solid fa-phone"></i>
                                <p>
                                    Suporte
                                </p>
                            </a>
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
                            <h1>Pedidos de suporte
                            </h1>
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
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Suporte</a></li>
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
                                include 'ligacao.php';
                                // Consulta SQL para obter os dados da tabela
                                $sql = "SELECT * FROM suporte";
                                $result = mysqli_query($con, $sql);
                                // Loop através dos resultados da consulta e exibir cada linha na tabela
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row["id_suporte"] . "</td>";
                                        echo "<td style='text-align:left'>" . $row["assunto"]; "</td>";
                                        echo "<td style='text-align:left'>" . $row["email"]; "</td>";
                                        echo "<td style='text-align:left'>" . $row["criado_a"]; "</td>";
                                        if ($row['status'] == 0)
                                            echo "<td style='text-align:left; color:red; font-weight: bold;'>Não resolvido</td>";
                                        if ($row['status'] == 1)
                                            echo "<td style='text-align:left; color:green; font-weight: bold;'>Resolvido</td>";
                                        if ($row['status'] == 2)
                                            echo "<td style='text-align:left; color:orange; font-weight: bold;'>Em análise</td>";
                                        echo "<td><i class='fa-solid fa-eye'></i></td>";
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