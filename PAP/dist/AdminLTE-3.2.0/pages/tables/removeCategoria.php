<?php
// Incluir arquivo de conexão
include 'ligacao.php';
session_start();

// Verificar se o id_categoria foi passado via GET
if (!isset($_GET['id_categoria'])) {
    die("ID de categoria não especificado.");
}

$id_categoria = $_GET['id_categoria'];

// Verificar se a categoria tem subcategorias associadas
$sql_subcategorias = "SELECT COUNT(*) AS total FROM subcategorias WHERE id_categoria = $id_categoria";
$result_subcategorias = $con->query($sql_subcategorias);
$row_subcategorias = $result_subcategorias->fetch_assoc();
$total_subcategorias = $row_subcategorias['total'];

if ($total_subcategorias > 0) {
    // Se houver subcategorias associadas, exibir mensagem e não deletar a categoria
    $_SESSION['mensagem'] = "Esta categoria não pode ser eliminada, porque tem subcategorias associadas!";
    header("Location: categorias.php");
} else {
    // Se não houver subcategorias associadas, deletar a categoria
    $sql_delete = "DELETE FROM categorias WHERE id_categoria = $id_categoria";

    if ($con->query($sql_delete) === TRUE) {
        $_SESSION['mensagem']  = "Categoria eliminada com sucesso!";
        header("Location: categorias.php");
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar categoria: " . $con->error;
        header("Location: categorias.php");
    }
}
?>
