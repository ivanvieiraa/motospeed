<?php
include ("../../../ligacao.php");
session_start();

$mensagem_erro = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
$nome_value = isset($_SESSION['nome_value']) ? $_SESSION['nome_value'] : '';
$apelido_value = isset($_SESSION['apelido_value']) ? $_SESSION['apelido_value'] : '';
$email_value = isset($_SESSION['email_value']) ? $_SESSION['email_value'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $data = $_POST['data'];
    $morada = $_POST['morada'];
    $codp = $_POST['codp'];
    $status = $_POST['status'];
    

    $sql2 = "SELECT * FROM users WHERE email = '$email'";
    $result2 = mysqli_query($con, $sql2);

    if (mysqli_num_rows($result2) > 0) {
        $_SESSION['mensagem'] = "Este email já está registado !";
        $_SESSION['nome_value'] = $nome;
        $_SESSION['apelido_value'] = $apelido;
        $_SESSION['email_value'] = $email;
        header('refresh:0;URL=./criarUser.php');
    } else {
        unset($_SESSION['mensagem']);
        unset($_SESSION['nome_value']);
        unset($_SESSION['apelido_value']);
        unset($_SESSION['email_value']);

        $sql = "INSERT INTO users (id_user,nome,apelido,email,pass,data_nasc,morada,codigop,status,adm)
                VALUES (null,'$nome','$apelido','$email','$pass','$data','$morada','$codp','$status',0);";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $id_user = mysqli_insert_id($con);
            $_SESSION['mensagem'] = "Utilizador inserido com sucesso!";
            header('refresh:0;URL=./utilizadores.php');
        } else {
            echo "Erro ao criar conta !";
        }
    }
}
mysqli_close($con);
?>
