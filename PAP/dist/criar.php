<?php
include('ligacao.php');
session_start();

$mensagem_erro = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
$nome_value = isset($_SESSION['nome_value']) ? $_SESSION['nome_value'] : '';
$apelido_value = isset($_SESSION['apelido_value']) ? $_SESSION['apelido_value'] : '';
$email_value = isset($_SESSION['email_value']) ? $_SESSION['email_value'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $sql2 = "SELECT * FROM users WHERE email = '$email'";
    $result2 = mysqli_query($con, $sql2);

    if (mysqli_num_rows($result2) > 0) {
        $_SESSION['mensagem'] = "Este email já está registado !";
        $_SESSION['nome_value'] = $nome;
        $_SESSION['apelido_value'] = $apelido;
        $_SESSION['email_value'] = $email;
        header('refresh:0;URL=register.php');
    } else {
        unset($_SESSION['mensagem']);
        unset($_SESSION['nome_value']);
        unset($_SESSION['apelido_value']);
        unset($_SESSION['email_value']);

        $sql = "INSERT INTO users (id_user,nome,apelido,email,pass,adm,status)
            VALUES (null,'$nome','$apelido','$email','$pass',0,1);";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $id_user = mysqli_insert_id($con);
            $_SESSION['id_user'] = $id_user;
            $_SESSION['nome'] = $nome;
            $_SESSION['apelido'] = $apelido;
            $_SESSION['email'] = $email;
            $_SESSION['pass'] = $pass;
            $_SESSION['adm'] = 0;
            $_SESSION['status'] = 1;
            $_SESSION['morada'] = "";
            $_SESSION['codigop'] = "";
            header('refresh:0;URL=perfil.php');
        } else {
            echo "Erro ao criar conta !";
        }
    }
}
mysqli_close($con);
