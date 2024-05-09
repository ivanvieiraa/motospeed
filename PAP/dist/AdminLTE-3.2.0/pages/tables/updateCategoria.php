<?php
// Inclua o arquivo de conexão com o banco de dados
include("ligacao.php");

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere o ID da marca do formulário
    $id_categoria = $_POST['id_categoria'];
    
    // Recupere o nome da marca do formulário
    $nome = $_POST['nome'];

    // Atualizar o nome da marca na tabela de categorias
    $sql = "UPDATE categorias SET nome_categoria='$nome' WHERE id_categoria='$id_categoria'";

    if (mysqli_query($con, $sql)) {
        $_SESSION['mensagem'] = "Categoria atualizada com sucesso!";
        header('refresh:0;URL=./categorias.php');
    } else {
        echo "Erro ao atualizar marca: " . mysqli_error($con);
    }
}
?>
