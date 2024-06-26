<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light bg-white flex-column border-0  ">
    <div class="container-fluid">
        <div class="w-100">
            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <!-- Logo-->
                <a class="navbar-brand fw-bold fs-3 m-0 p-0 flex-shrink-0 order-0" href="./index.php">
                    <div class="d-flex align-items-center">
                        <img src="mstile-150x150.png" alt="" height="100px" width="100px">
                    </div>
                </a>
                <h1>Motospeed</h1>
                <!-- / Logo-->

                <!-- Navbar Icons-->
                <ul class="list-unstyled mb-0 d-flex align-items-center order-1 order-lg-2 nav-sidelinks">

                    <!-- Mobile Nav Toggler-->
                    <li class="d-lg-none">
                        <span class="nav-link text-body d-flex align-items-center cursor-pointer" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><i class="ri-menu-line ri-lg me-1"></i> Menu</span>
                    </li>
                    <!-- /Mobile Nav Toggler-->

                    <!-- Navbar Search-->
                    <li class="d-none d-sm-block">
                        <span class="nav-link text-body search-trigger cursor-pointer"><i class="fas fa-search"></i></span>

                        <!-- Search navbar overlay-->
                        <div class="navbar-search d-none">
                            <div class="input-group mb-3 h-100">
                                <form class="d-flex" style="width:100%;" action="produtos.php" method="GET">
                                    <input class="form-control me-2" style="border: none;" type="search" placeholder="Introduza a sua pesquisa ... " aria-label="Pesquisar" name="query">
                                    <button class="btn btn-outline-success" style="border: none;" type="submit"><i class="ri-search-line ri-lg"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="search-overlay"></div>
                        <!-- / Search navbar overlay-->

                    </li>
                    <!-- /Navbar Search-->

                    <!-- Navbar Login-->
                    <?php
                    if (isset($_SESSION['nome'])) {
                    ?>
                        <li class="ms-1 d-none d-lg-inline-block dropdown">
                            <a class="nav-link text-body dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> <i class="fas fa-chevron-down"></i>

                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li>
                                    <h5>Olá, <?= $_SESSION['nome'] ?></h5>
                                </li>
                                <hr>
                                <li><a class="dropdown-item" href="./perfil.php">Editar Perfil</a></li>
                                <li><a class="dropdown-item" href="./pedidos.php">Histórico de compras</a></li>
                                <li><a class="dropdown-item" href="./desejos.php">Lista de desejos</a></li>
                                <?php
                                if ($_SESSION['adm'] == 1)
                                    echo '<li><a class="dropdown-item" href="./AdminLTE-3.2.0">Dashboard</a></li>
                                    ';
                                ?>

                                <li><a class="dropdown-item" href="./logout.php" style="color:red">Log out</a></li>
                            </ul>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="ms-1 d-none d-lg-inline-block">
                            <a class="nav-link text-body" href="./login_form.php">
                                <i class="fas fa-sign-in-alt"></i>

                            </a>
                        </li>
                    <?php
                    }
                    ?>
                    <!-- /Navbar Login-->

                    <?php
                    if (isset($_SESSION['nome'])) {
                    ?>
                        <li class="ms-1 d-none d-lg-inline-block">
                            <a class="nav-link text-body" href="./cart.php">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="ms-1 d-none d-lg-inline-block">
                            <a class="nav-link text-body" href="./login_form.php">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </li>
                    <?php
                    }
                    ?>


                    </li>
                    <!-- /Navbar Cart Icon-->

                </ul>
                <!-- Navbar Icons-->

                <!-- Main Navigation-->
                <div class="flex-shrink-0 collapse navbar-collapse navbar-collapse-light w-auto flex-grow-1 order-2 order-lg-1" id="navbarNavDropdown">

                    <!-- Menu-->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="./index.php" role="button">
                                início
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown position-static">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                categorias
                            </a>
                            <!-- Menswear dropdown menu-->
                            <div class="dropdown-menu dropdown-megamenu">
                                <div class="container-fluid">
                                    <div class="row g-0 g-lg-3">
                                        <!-- Menswear Dropdown Menu Links Section-->
                                        <div class="col col-lg-8 py-lg-5">
                                            <div class="row py-3 py-lg-0 flex-wrap gx-4 gy-6">
                                                <!-- menu row-->
                                                <div class="col">
                                                    <h6 class="dropdown">Capacetes</h6>
                                                    <ul class="list-unstyled">
                                                        <li class="dropdown-list-item"><a class="dropdown-item" href="./produtos.php?id_subcategoria=1">Corrida</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item" href="./produtos.php?id_subcategoria=2">Motocross</a>
                                                        </li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item dropdown-link-all" href="./produtos.php?id_categoria=1">Ver todos</a></li>
                                                    </ul>
                                                </div>
                                                <!-- / menu row-->

                                                <!-- menu row-->
                                                <div class="col">
                                                    <h6 class="dropdown">Casacos</h6>
                                                    <ul class="list-unstyled">
                                                        <li class="dropdown-list-item"><a class="dropdown-item" href="./produtos.php?id_subcategoria=3">Cabedal</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item" href="./produtos.php?id_subcategoria=4">Tecido</a></li>

                                                        <li class="dropdown-list-item"><a class="dropdown-item dropdown-link-all" href="./produtos.php?id_categoria=2">Ver todos</a></li>
                                                    </ul>
                                                </div>
                                                <!-- / menu row-->

                                                <!-- menu row-->
                                                <div class="col">
                                                    <h6 class="dropdown">Luvas</h6>
                                                    <ul class="list-unstyled">
                                                        <li class="dropdown-list-item"><a class="dropdown-item" href="./produtos.php?id_subcategoria=7">Cabedal</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item" href="./produtos.php?id_subcategoria=8">Tecido</a></li>

                                                        <li class="dropdown-list-item"><a class="dropdown-item dropdown-link-all" href="./produtos.php?id_categoria=4">Ver todas</a></li>
                                                    </ul>
                                                </div>
                                                <!-- / menu row-->

                                                <!-- menu row-->
                                                <div class="col">
                                                    <h6 class="dropdown">Calças</h6>
                                                    <ul class="list-unstyled">
                                                        <li class="dropdown-list-item"><a class="dropdown-item" href="./produtos.php?id_subcategoria=5">Cabedal</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item" href="./produtos.php?id_subcategoria=6">Tecido</a></li>

                                                        <li class="dropdown-list-item"><a class="dropdown-item dropdown-link-all" href="./produtos.php?id_categoria=3">Ver todas</a></li>
                                                    </ul>
                                                </div>
                                                <!-- / menu row-->

                                                <!-- menu row-->
                                                <div class="col">
                                                    <h6 class="dropdown">Botas</h6>
                                                    <ul class="list-unstyled">
                                                        <li class="dropdown-list-item"><a class="dropdown-item" href="./produtos.php?id_subcategoria=9">Cabedal</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item" href="./produtos.php?id_subcategoria=10">Tecido</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item dropdown-link-all" href="./produtos.php?id_categoria=5">Ver todas</a></li>
                                                    </ul>
                                                </div>
                                                <!-- / menu row-->
                                            </div>

                                            <div class="align-items-center justify-content-between mt-5 d-none d-lg-flex">
                                                <div class="me-5 f-w-20">
                                                    <a class="d-block" href="./produtos.php?id_marca=1">
                                                        <picture>
                                                            <img class="img-fluid d-table mx-auto" src="./assets/images/logos/alpine.svg" alt="">
                                                        </picture>
                                                    </a>
                                                </div>
                                                <div class="me-5 f-w-20">
                                                    <a class="d-block" href="./produtos.php?id_marca=2">
                                                        <picture>
                                                            <img class="img-fluid d-table mx-auto" src="./assets/images/logos/scorpion.png" alt="">
                                                        </picture>
                                                    </a>
                                                </div>
                                                <div class="me-5 f-w-20">
                                                    <a class="d-block" href="./produtos.php?id_marca=3">
                                                        <picture>
                                                            <img class="img-fluid d-table mx-auto" src="./assets/images/logos/agv.png" alt="">
                                                        </picture>
                                                    </a>
                                                </div>
                                                <div class="me-5 f-w-20">
                                                    <a class="d-block" href="./produtos.php?id_marca=4">
                                                        <picture>
                                                            <img class="img-fluid d-table mx-auto" src="./assets/images/logos/dainese.png" alt="">
                                                        </picture>
                                                    </a>
                                                </div>
                                                <div class="me-5 f-w-20">
                                                    <a class="d-block" href="./produtos.php?id_marca=6">
                                                        <picture>
                                                            <img class="img-fluid d-table mx-auto" src="./assets/images/logos/shoei.png" alt="">
                                                        </picture>
                                                    </a>
                                                </div>
                                                <div class="me-5 f-w-20">
                                                    <a class="d-block" href="./produtos.php?id_marca=7">
                                                        <picture>
                                                            <img class="img-fluid d-table mx-auto" src="./assets/images/logos/shark.svg" alt="">
                                                        </picture>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menswear Dropdown Menu Links Section-->
                                        <!-- Menswear Dropdown Menu Images Section-->
                                        <div class="col-lg-4 d-none d-lg-block">
                                            <div class="vw-50 border-start h-100 position-absolute"></div>
                                            <div class="py-lg-5 position-relative z-index-10 px-lg-4 align-items-center text-center">
                                                <div class="row g-4 justify-content-center"> <!-- Adicionado justify-content-center -->
                                                    <div class="col-12 col-md-6">
                                                        <div class="card justify-content-center d-flex align-items-center bg-transparent">
                                                            <picture class="w-100 d-block mb-2 mx-auto">
                                                                <a href="sobre.php#form-section"><img class="w-50 rounded " title=""  src="./assets/images/banners/suporte.png"></a>
                                                            </picture>
                                                        </div>
                                                    </div>
                                                    <!-- Outros col-md-6 removidos para simplificação -->
                                                </div>
                                                <a href="./sobre.php#form-section" class="btn btn-link p-0 fw-bolder text-link-border mt-5 text-dark mx-auto d-table" style="text-decoration: none;">Apoio ao cliente</a>
                                            </div>
                                        </div>
                                        <!-- Menswear Dropdown Menu Images Section-->
                                    </div>
                                </div>
                            </div>
                            <!-- / Menswear dropdown menu-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./produtos.php" role="button">
                                Produtos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sobre.php" role="button">
                                sobre nós
                            </a>
                        </li>

                    </ul> <!-- / Menu-->
                </div>
                <!-- / Main Navigation-->

            </div>
        </div>
    </div>
</nav>