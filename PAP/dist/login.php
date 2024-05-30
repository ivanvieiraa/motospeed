<?php
include ('ligacao.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $linha = mysqli_fetch_assoc($result);
        if ($linha['status'] == 0) {
            $_SESSION['mensagem'] = "A sua conta está desativada! Para mais informações contacte o suporte";
            header('location:login_form.php');
        }
        else {
            $_SESSION['id_user'] = $linha['id_user'];
            $_SESSION['nome'] = $linha['nome'];
            $_SESSION['apelido'] = $linha['apelido'];
            $_SESSION['email'] = $linha['email'];
            $_SESSION['pass'] = $linha['pass'];
            $_SESSION['datanasc'] = $linha['data_nasc'];
            $_SESSION['foto'] = $linha['foto'];
            $_SESSION['morada'] = $linha['morada'];
            $_SESSION['codigop'] = $linha['codigop'];
            $_SESSION['adm'] = $linha['adm'];
            $_SESSION['status'] = $linha['status'];
            $_SESSION['criado'] = $linha['criado_a'];
            $_SESSION['alterado'] = $linha['alterado_a'];
            unset($_SESSION['email_value']);
            header('refresh:0;URL=index.php');
            if ($linha['adm'] == 1)
                header('refresh:0;URL=./AdminLTE-3.2.0');

        }
    } else {
        // CRIAR VARIAVEIS DE SESSAO
        $_SESSION['mensagem'] = "Credênciais inválidas !";
        $_SESSION['email_value'] = $email;
        header('refresh:0;URL=login_form.php');
    }
    mysqli_close($con);
}
