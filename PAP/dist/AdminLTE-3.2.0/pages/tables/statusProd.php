<?php
session_start();
include("ligacao.php");

$id_prod = $_GET['id_prod'];

$sql_check = "SELECT status FROM produtos WHERE id_prod = $id_prod";
$result_check = mysqli_query($con, $sql_check);

if ($result_check) {
    $row = mysqli_fetch_assoc($result_check);
    $status = $row['status'];

    // Verifica se o produto pode ser desativado
    if ($status == 1) {
        // Desativa o produto 
        $sql_desativar = "UPDATE produtos set status = 0 WHERE id_prod = $id_prod";
        $result_desativar = mysqli_query($con, $sql_desativar);
        
        if ($result_desativar) {
            $_SESSION['mensagem'] = "Produto desativado com sucesso!";
            header('refresh:0.5;url=produtos.php');
        } else {
            echo "Ocorreu um erro ao desativar!";
        }
    }else if ($status == 0){
        // Ativa o produto 
        $sql_ativar = "UPDATE produtos set status = 1 WHERE id_prod = $id_prod";
        $result_ativar = mysqli_query($con, $sql_ativar);
        
        if ($result_ativar) {
            $_SESSION['mensagem'] = "Produto ativado com sucesso!";
            header('refresh:0.5;url=produtos.php');
        } else {
            echo "Ocorreu um erro ao ativar!";
        }
    }else {
        $_SESSION['mensagem'] = "Este produto não pode ser desativado porque é ADMIN.";
        header('refresh:0.5;url=produtos.php');
    }
} else {
    echo "Ocorreu um erro ao verificar o produto.";
}
?>