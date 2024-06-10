<?php
session_start();
include("ligacao.php");

// Verifica se o utilizador está autenticado
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id_subcategoria']) && isset($_GET['nome'])) {
    $id_subcategoria = $_GET['id_subcategoria'];
    $nome = $_GET['nome'];

    // Atualiza a subcategoria
    $sql = "UPDATE subcategorias SET nome_subcategoria = '$nome' WHERE id_subcategoria = '$id_subcategoria'";
    if (mysqli_query($con, $sql)) {
        $_SESSION['mensagem'] = "Subcategoria atualizada com sucesso.";
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar a subcategoria.";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    $_SESSION['mensagem'] = "Dados inválidos.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
