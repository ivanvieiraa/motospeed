<?php
// Verificar se o ID do produto foi enviado
if (isset($_GET['id_prod'])) {
    // Incluir o arquivo de conexão com o banco de dados
    include "ligacao.php";

    // Obter o ID do produto a ser removido da wishlist
    $produto_id = $_GET['id_prod'];

    // Verificar se o usuário está logado
    session_start();
    if (!isset($_SESSION['id_user'])) {
        header("Location: ../login_form.php");
        exit();
    }

    $id_user = $_SESSION['id_user'];

    // Excluir o produto da wishlist do usuário
    $sql = "DELETE FROM wishlist WHERE id_user = $id_user AND id_prod = $produto_id";

    if (mysqli_query($con, $sql)) {
        // Redirecionar de volta para a página da lista de desejos
        header("Location: desejos.php");
        exit();
    } else {
        echo "Erro ao remover o produto da lista de desejos: " . mysqli_error($con);
    }
} else {
    // Se o ID do produto não foi enviado, redirecionar de volta para a página da lista de desejos
    header("Location: desejos.php");
    exit();
}
?>
