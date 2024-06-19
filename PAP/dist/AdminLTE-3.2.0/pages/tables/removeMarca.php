<?php
// Incluir arquivo de conexão
include 'ligacao.php';
session_start();

// Verificar se o id_marca foi passado via GET
if (!isset($_GET['id_marca'])) {
    die("ID de marca não especificado.");
}

$id_marca = $_GET['id_marca'];

// Verificar se a marca tem produtos associados
$sql = "SELECT COUNT(*) AS total FROM produtos WHERE id_marca = $id_marca";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$total_produtos = $row['total'];

if ($total_produtos > 0) {
    // Se houver produtos associados, exibir mensagem e não deletar a marca
    $_SESSION['mensagem'] = "Esta marca não pode ser eliminada porque tem produtos associados!";
    header("Location: marcas.php");
} else {
    // Se não houver produtos associados, deletar a marca
    $sql_delete = "DELETE FROM marcas WHERE id_marca = $id_marca";

    if ($con->query($sql_delete) === TRUE) {
        $_SESSION['mensagem'] = "Marca removida com sucesso!";
        header("Location: marcas.php");
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar marca: " . $con->error;
        header("Location: marcas.php");
    }
}

?>
