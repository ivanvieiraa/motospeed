<?php
session_start();
include ("ligacao.php");

// Verifica se o utilizador está autenticado
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

$id_subcategoria = $_GET['id_subcategoria'];

// Verifica se há produtos associados à subcategoria
$sql_check_produtos = "SELECT COUNT(*) as total FROM produtos WHERE id_subcategoria = '$id_subcategoria'";
$result_check = mysqli_query($con, $sql_check_produtos);
$row_check = mysqli_fetch_assoc($result_check);

if ($row_check['total'] > 0) {
    $_SESSION['mensagem'] = "Não é possível apagar a subcategoria porque há produtos associados a ela.";
} else {
    // Exclui a subcategoria se não houver produtos associados
    $sql_delete = "DELETE FROM subcategorias WHERE id_subcategoria = '$id_subcategoria'";
    if (mysqli_query($con, $sql_delete)) {
        $_SESSION['mensagem'] = "Subcategoria apagada com sucesso.";
    } else {
        $_SESSION['mensagem'] = "Erro ao apagar subcategoria.";
    }
}

header('Location: editCategoria.php?id_categoria='.$_SESSION['id_categoria'].'');
exit();
?>