<?php
// Incluir o arquivo de conexão com o banco de dados
require_once 'ligacao.php';
session_start();

// Verificar se foi enviado um ID de produto via GET
if (isset($_GET['id_prod'])) {
    $id_prod = $_GET['id_prod'];

    // Consulta para verificar se há vendas associadas ao produto
    $query = "SELECT COUNT(*) AS total FROM detalhe_venda WHERE id_prod = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('i', $id_prod);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $total_vendas = $row['total'];

    // Verificar se há vendas associadas
    if ($total_vendas > 0) {
        // Se houver vendas associadas, mostrar mensagem e não deletar
        $_SESSION['mensagem'] = "Este produto não pode ser eliminado, porque já foi comprado!";
        header("Location: produtos.php");
    } else {
        // Se não houver vendas associadas, deletar o produto
        $delete_query = "DELETE FROM produtos WHERE id_prod = ?";
        $delete_stmt = $con->prepare($delete_query);
        $delete_stmt->bind_param('i', $id_prod);
        
        if ($delete_stmt->execute()) {
            $_SESSION['mensagem'] = "Produto eliminado com sucesso!";
            header("Location: produtos.php");
        } else {
            $_SESSION['mensagem'] = "Erro ao eliminar o produto.";
            header("Location: produtos.php");
        }
    }
} else {
    $_SESSION['mensagem'] = "ID do produto não especificado.";
    header("Location: produtos.php");
}
?>
