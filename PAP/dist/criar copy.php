<?php
include ('ligacao.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $sql2 = "SELECT * FROM users WHERE email = '$email'";
    $result2 = mysqli_query($con, $sql2);

    if (mysqli_num_rows($result2) > 0) {
        $_SESSION['mensagem'] = "Este email já está registado !";
        header('refresh:0;URL=register.php'); // REDIRECIONAR PARA O INDEX
    } else {
        $sql = "INSERT INTO users (id_user,nome,apelido,email,pass,adm)
            VALUES (null,'$nome','$apelido','$email','$pass',0);";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $id_user = mysqli_insert_id($con);
            $_SESSION['id_user'] = $id_user;
            $_SESSION['nome'] = $nome;
            $_SESSION['apelido'] = $apelido;
            $_SESSION['email'] = $email;
            $_SESSION['pass'] = $pass;
            $_SESSION['adm'] = 0;
            header('refresh:0;URL=index.php');
        } else {
            echo "Erro ao criar conta !";
        }
    }
}
mysqli_close($con);
?>