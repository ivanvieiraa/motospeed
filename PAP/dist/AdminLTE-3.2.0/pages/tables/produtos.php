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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <script src="https://kit.fontawesome.com/d5954f6b26.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.7/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.js"></script>

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

        /* Styles for the modal */
        .modal-title {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: center;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        .modal-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .modal-text {
            text-align: center;
        }

        .modal-button {
            background-color: #D19C97;
            color: #FFFFFF;
            padding: 10px 20px;
            cursor: pointer;
        }

        .modal-button:hover {
            background-color: #EDF1FF;
            color: #1C1C1C;
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
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

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
                            if (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] != "Já existe um produto com esse nome!") {
                                echo '<div id="alert" class="alert alert-success" role="alert">' . $_SESSION['mensagem'] . '</div>';
                                unset($_SESSION['mensagem']);
                            } else {
                                if (isset($_SESSION['mensagem']) && $_SESSION['mensagem'] == "Já existe um produto com esse nome!") {
                                    echo '<div id="alert" class="alert alert-danger" role="alert">' . $_SESSION['mensagem'] . '</div>';
                                    unset($_SESSION['mensagem']);
                                }
                            }
                            ?>
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Gestão</a></li>
                                <li class="breadcrumb-item active">Produtos</li>
                                <li class="breadcrumb-item active">
                                    &nbsp;<a href="criarProd.php"> <i class="fa-regular fa-square-plus fa-xl"></i></a>
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
    <table id="produtos" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID <img src="sort.png" width="12px" height="12px"></th>
                <th>Foto</th>
                <th>Nome <img src="sort.png" width="12px" height="12px"></th>
                <th>Preço <img src="sort.png" width="12px" height="12px"></th>
                <th>Descrição <img src="sort.png" width="12px" height="12px"></th>
                <th>Marca <img src="sort.png" width="12px" height="12px"></th>
                <th>Categoria <img src="sort.png" width="12px" height="12px"></th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'ligacao.php';
            $sql = "SELECT p.*, s.nome_subcategoria, c.nome_categoria, m.nome_marca
                    FROM produtos AS p
                    INNER JOIN subcategorias AS s ON p.id_subcategoria = s.id_subcategoria
                    INNER JOIN categorias AS c ON s.id_categoria = c.id_categoria
                    INNER JOIN marcas AS m ON p.id_marca = m.id_marca";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id_prod"] . "</td>";
                    echo "<td style='text-align:left'><img style='border-radius:50%' src='../../../" . $row['foto_prod'] . "' width='50px' height='50px'></td>";
                    echo "<td style='text-align:left'>" . ($row["nome_prod"] ? $row["nome_prod"] : "<a href='editProd.php?id_prod=" . $row['id_prod'] . "'><i>N/A</i></a>") . "</td>";
                    echo "<td style='text-align:left'>" . ($row["preco_prod"] ? number_format($row["preco_prod"], 2, ',', '.') . '€' : "<a href='editProd.php?id_prod=" . $row['id_prod'] . "'><i>N/A</i></a>") . "</td>";
                    echo "<td style='text-align:left'>";
                    echo "<div class='description-cell'>";
                    echo "<span class='short-desc'>" . htmlspecialchars(substr($row['desc_prod'], 0, 20)) . "...</span>";
                    echo "<span class='full-desc' style='display: none;'>" . htmlspecialchars($row['desc_prod']) . "</span>";
                    echo "<button class='btn btn-link show-more-btn'>Ver Mais</button>";
                    echo "</div>";
                    echo "</td>";
                    echo "<td style='text-align:left'>" . ($row["nome_marca"] ? $row["nome_marca"] : "<a href='editProd.php?id_prod=" . $row['id_prod'] . "'><i>N/A</i></a>") . "</td>";
                    echo "<td style='text-align:left'>" . ($row["nome_categoria"] ? $row["nome_categoria"] : "<a href='editProd.php?id_prod=" . $row['id_prod'] . "'><i>N/A</i></a>") . "</td>";
                    if ($row['status'] == 1) {
                        echo "<td style='text-align:left'><a href='statusProd.php?id_prod=" . $row['id_prod'] . "' title='Desativar Produto'><i class='fa-solid fa-circle' style='color: #4dff00;'></i></a></td>";
                    }
                    if ($row['status'] == 0) {
                        echo "<td style='text-align:left'><a href='statusProd.php?id_prod=" . $row['id_prod'] . "' title='Ativar Produto'><i class='fa-solid fa-circle' style='color: #ff0000;'></i></a></td>  ";
                    }
                    echo "<td style='text-align:left'><a style='margin-right: 5px;' href='editProd.php?id_prod=" . $row['id_prod'] . "'><i class='fa-solid fa-pen-to-square'></i></a>";
                    echo "<a href='#' class='delete-prod-btn' data-id='" . $row['id_prod'] . "'>
                    <i class='fa-solid fa-trash' style='color: #ff0000;'></i>
                  </a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='12' style='text-align:center'>Sem resultados encontrados</td></tr>";
            }
            mysqli_close($con);
            ?>
        </tbody>
    </table>
    <!-- Modal for "Ver Mais" -->
    <div id="viewMoreModal" class="modal">
        <div class="modal-content">
            <span class="modal-close" style="cursor: pointer;">&times;</span>
            <h2 class="modal-title">Descrição Completa</h2>
            <p class="modal-text" id="viewMoreText"></p>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var showMoreBtns = document.querySelectorAll('.show-more-btn');
            var viewMoreModal = document.getElementById("viewMoreModal");
            var viewMoreText = document.getElementById("viewMoreText");

            showMoreBtns.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var container = this.parentElement;
                    var fullDesc = container.querySelector('.full-desc').textContent;

                    viewMoreText.textContent = fullDesc;
                    viewMoreModal.style.display = "block";
                });
            });

            var viewMoreModalClose = document.querySelector("#viewMoreModal .modal-close");
            viewMoreModalClose.onclick = function () {
                viewMoreModal.style.display = "none";
            };

            window.onclick = function (event) {
                if (event.target == viewMoreModal) {
                    viewMoreModal.style.display = "none";
                }
            };
        });
    </script>

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
                    Tem certeza de que deseja remover este produto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Remover</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.delete-prod-btn').on('click', function (event) {
                event.preventDefault();
                var id_prod = $(this).data('id');
                $('#confirmDeleteModal').modal('show');

                $('#confirmDeleteButton').off('click').on('click', function () {
                    window.location.href = 'removeProd.php?id_prod=' + id_prod;
                });
            });
        });
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
        $(function () {
            $("#produtos").DataTable({
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
</body>

</html>