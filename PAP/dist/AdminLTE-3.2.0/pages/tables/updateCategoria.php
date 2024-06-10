<?php
session_start();
include("ligacao.php");

// Verifica se o utilizador está autenticado
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_categoria = $_POST['id_categoria'];
    $nome = $_POST['nome'];
    $nova_subcategoria = $_POST['nova_subcategoria'];

    // Atualiza a categoria
    $sql = "UPDATE categorias SET nome_categoria = '$nome' WHERE id_categoria = '$id_categoria'";
    if (mysqli_query($con, $sql)) {
        // Verifica se uma nova subcategoria foi fornecida
        if (!empty($nova_subcategoria)) {
            $sql_subcategoria = "INSERT INTO subcategorias (nome_subcategoria, id_categoria) VALUES ('$nova_subcategoria', '$id_categoria')";
            if (!mysqli_query($con, $sql_subcategoria)) {
                $_SESSION['mensagem'] = "Erro ao adicionar a nova subcategoria.";
            }
        }
        $_SESSION['mensagem'] = "Categoria atualizada com sucesso.";
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar a categoria.";
    }
    header('Location: categorias.php');
    exit();
} else {
    $_SESSION['mensagem'] = "Requisição inválida.";
    header('Location: categorias.php');
    exit();
}
?>
