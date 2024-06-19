<?php
// Incluir o arquivo de conexão com o banco de dados
require_once 'ligacao.php';
session_start();

// Verificar se foi enviado um ID de suporte via GET
if (isset($_GET['id_suporte'])) {
    $id_suporte = $_GET['id_suporte'];

    // Consulta para deletar o registro da tabela suporte
    $delete_query = "DELETE FROM suporte WHERE id_suporte = ?";
    $delete_stmt = $con->prepare($delete_query);
    $delete_stmt->bind_param('i', $id_suporte);
    
    // Executar a consulta de deleção
    if ($delete_stmt->execute()) {
        $_SESSION['mensagem'] = "Pedido de suporte eliminado com sucesso!";
        header("Location: index.php");
    } else {
        $_SESSION['$mensagem'] = "Erro ao eliminar o registro de suporte.";
        header("Location: index.php");
    }
} else {
    $_SESSION['mensagem'] = "ID do suporte não especificado.";
    header("Location: index.php");
}
?>
