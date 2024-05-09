<?php
session_start();
include ('ligacao.php');

$confirmacao = md5($_POST['reset_code']);
$new_pass = md5($_POST['new-password']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM users WHERE pass = '$confirmacao'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['id_user']; // Aqui estamos armazenando o ID do usuário selecionado
            $resetPass = "UPDATE users SET pass = '$new_pass' WHERE id_user = $user_id";
            // Execute a query para redefinir a senha para o usuário com o ID armazenado
            mysqli_query($con, $resetPass);
            $_SESSION['mensagem'] = "Inicie sessão com a sua nova password !";
            header('refresh:0;URL=login_form.php');
        } else {
            $_SESSION['mensagem'] = "Código de confirmação inválido !";
            header('refresh:0;URL=reset-password.php');
        }
    }
}
?>