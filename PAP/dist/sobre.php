<?php
include("ligacao.php");
session_start();

?>
<!doctype html>
<html lang="en">

<!-- Head -->

<head>
    <!-- Page Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Custom Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon/favicon-16x16.png">
    <link rel="mask-icon" href="./assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/css/libs.bundle.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/theme.bundle.css" />



    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
            /**
          * Reinstate scrolling for non-JS clients
          */
            .simplebar-content-wrapper {
                overflow: auto;
            }
        </style>
    </noscript>

    <!-- Page Title -->
    <title>Motospeed | Sobre nós</title>

</head>

<body class="">

    <!-- Navbar -->
    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <!-- / Navbar--> <!-- / Navbar-->

    <!-- Main Section-->
    <section class="mt-0 overflow-hidden ">
        <!-- Page Content Goes Here -->
        <div class="container-fluid">
            <!-- Homepage Intro-->
            <div class="position-relative row my-lg-7 pt-5 pt-lg-0 g-8">
                <div class="col-12 col-md-6 position-relative z-index-20 mb-7 mb-lg-0" data-aos="fade-right">
                    <p class="text-muted title-small">sobre nós</p>
                    <h3 class="display-3 fw-bold mb-5"><span class="text-outline-dark">Motospeed</span> - Material de
                        proteção para motociclistas</h3>
                    <p class="lead">A Motospeed é uma grande empresa que trabalha com as melhores marcas do mercado como a <a href="./produtos.php?id_marca=1">Alpinestars</a>, <a href="./produtos.php?id_marca=4">Dainese</a>, <a href="./produtos.php?id_marca=2">Scorpion</a>, <a href="./produtos.php?id_marca=3">AGV</a> e muitas mais...</p>
                    <p class="lead">Trabalhamos arduamente todos os dias em busca de oferecer aos nossos clientes as
                        melhores marcas e produtos do mercado.</p>
                    <p class="lead">Priorizamos sempre os clientes, de modo a consquistar a melhor confiança alguma vez
                        vista no mundo dos Motards.</p>
                    <a href="./produtos.php" class="btn btn-psuedo" role="button">produtos</a>
                </div>
                <div class="col-12 col-md-6 position-relative z-index-20 pe-0" data-aos="fade-left">
                    <picture class="w-50 d-block position-relative z-index-10 border border-white border-4 shadow-lg">
                        <img class="img-fluid" src="./assets/images/banners/yzf.jpg">
                    </picture>
                    <picture class="w-60 d-block me-8 mt-n10 shadow-lg border border-white border-4 position-relative z-index-20 ms-auto">
                        <img class="img-fluid" src="./assets/images/banners/r6.jpeg">
                    </picture>
                    <picture class="w-50 d-block me-8 mt-n7 shadow-lg border border-white border-4 position-absolute top-0 end-0 z-index-0 ">
                        <img class="img-fluid" src="./assets/images/banners/cross.jpg">
                    </picture>
                </div>
            </div>
            <div class="position-relative row my-lg-7 pt-5 pt-lg-0 g-8">

                <div class="col-12 col-md-6 position-relative z-index-20 pe-0" data-aos="fade-left">
                    <picture class="w-50 d-block position-relative z-index-10 border border-white border-4 shadow-lg">
                        <img class="img-fluid" src="./assets/images/banners/ivann.jpeg">
                    </picture>
                    <picture class="w-60 d-block me-8 mt-n10 shadow-lg border border-white border-4 position-relative z-index-20 ms-auto">
                        <img class="img-fluid" src="./assets/images/banners/r6-2.jpg">
                    </picture>
                    <picture class="w-50 d-block me-8 mt-n7 shadow-lg border border-white border-4 position-absolute top-0 end-0 z-index-0 ">
                        <img class="img-fluid" src="./assets/images/banners/dirt2.jpg">
                    </picture>
                </div>
                <div class="col-12 col-md-6 position-relative z-index-20 mb-7 mb-lg-0" data-aos="fade-right" id="form-section">
                    <p class="text-muted title-small">suporte</p>
                    <h3 class="display-3 fw-bold mb-5"><span class="text-outline-dark"></span>Entre em contacto connosco</h3>
                    <div>
                        <?php
                        if (isset($_SESSION['mensagem'])) {
                            echo '<div class="alert alert-success" role="alert">' . $_SESSION['mensagem'] . '</div>';
                            unset($_SESSION['mensagem']);
                        }
                        ?>
                        <form name="support" action="suporte.php" method="POST" onsubmit="return validateForm()" novalidate>
                            <div class="form-group">
                                <label for="support-email" class="form-label">Email
                                    <span id="email-error" class="error-message" style="color: red;"></span>
                                </label>
                                <input type="email" class="form-control" name="support-email" id="support-email" placeholder="Introduza o seu email" oninput="clearErrorMessage('email-error')"> <br>

                                <label for="support-assunto" class="form-label">Assunto
                                    <span id="assunto-error" class="error-message" style="color: red;"></span>
                                </label>
                                <input type="text" class="form-control" name="support-assunto" id="support-assunto" placeholder="Introduza o assunto" oninput="clearErrorMessage('assunto-error')"><br>

                                <label for="support-msg" class="form-label">Mensagem
                                    <span id="msg-error" class="error-message" style="color: red;"></span>
                                </label>
                                <textarea name="support-msg" id="support-msg" placeholder="Escreva a sua mensagem" oninput="clearErrorMessage('msg-error')" class="form-control"></textarea><br>
                            </div>
                            <button type="submit" class="btn btn-dark d-block w-100 my-4">Enviar mensagem</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- / Homepage Intro-->
        </div>

        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    <!-- Footer -->
    <?php include("footer.php"); ?>


    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>
    <script>
        // Função para limpar mensagens de erro
        function clearErrorMessage(id) {
            document.getElementById(id).textContent = '';
        }

        // Função para exibir mensagens de erro
        function showErrorMessage(id, message) {
            document.getElementById(id).textContent = `* ${message}`;
        }

        // Função para validar o formulário
        function validateForm() {
            let isValid = true;

            // Validação do campo de email
            const email = document.getElementById('support-email').value;
            const emailError = document.getElementById('email-error');
            if (!email) {
                showErrorMessage('email-error', 'O campo de email é obrigatório.');
                isValid = false;
            } else if (!validateEmail(email)) {
                showErrorMessage('email-error', 'Por favor, insira um email válido.');
                isValid = false;
            } else {
                clearErrorMessage('email-error');
            }

            // Validação do campo de assunto
            const assunto = document.getElementById('support-assunto').value;
            const assuntoError = document.getElementById('assunto-error');
            if (!assunto) {
                showErrorMessage('assunto-error', 'O campo de assunto é obrigatório.');
                isValid = false;
            } else {
                clearErrorMessage('assunto-error');
            }

            // Validação do campo de mensagem
            const mensagem = document.getElementById('support-msg').value;
            const mensagemError = document.getElementById('msg-error');
            if (!mensagem) {
                showErrorMessage('msg-error', 'O campo de mensagem é obrigatório.');
                isValid = false;
            } else {
                clearErrorMessage('msg-error');
            }

            return isValid;
        }

        // Função para validar o formato do email
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.location.hash) {
                const element = document.querySelector(window.location.hash);
                if (element) {
                    element.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    </script>



</body>

</html>