<?php
session_start();
include("ligacao.php");

$id_user = $_GET['id_user'];

$sql_check = "SELECT adm,status FROM users WHERE id_user = $id_user";
$result_check = mysqli_query($con, $sql_check);

if ($result_check) {
    $row = mysqli_fetch_assoc($result_check);
    $adm = $row['adm'];
    $status = $row['status'];

    // Verifica se o utilizador pode ser desativado
    if ($adm == 0 && $status == 1) {
        // Desativa o utilizador 
        $sql_desativar = "UPDATE users set status = 0 WHERE id_user = $id_user";
        $result_desativar = mysqli_query($con, $sql_desativar);
        
        if ($result_desativar) {
            $_SESSION['mensagem'] = "Utilizador desativado com sucesso!";
            header('refresh:0.5;url=utilizadores.php');
        } else {
            echo "Ocorreu um erro ao desativar!";
        }
    }else if ($adm == 0 && $status == 0){
        // Ativa o utilizador 
        $sql_ativar = "UPDATE users set status = 1 WHERE id_user = $id_user";
        $result_ativar = mysqli_query($con, $sql_ativar);
        
        if ($result_ativar) {
            $_SESSION['mensagem'] = "Utilizador ativado com sucesso!";
            header('refresh:0.5;url=utilizadores.php');
        } else {
            echo "Ocorreu um erro ao ativar!";
        }
    }else {
        $_SESSION['mensagem'] = "O Admin não pode ser desativado.";
        header('refresh:0.5;url=utilizadores.php');
    }
} else {
    echo "Ocorreu um erro ao verificar o utilizador.";
}
?>