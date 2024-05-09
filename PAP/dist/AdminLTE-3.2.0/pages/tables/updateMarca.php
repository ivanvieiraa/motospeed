<?php
// Inclua o arquivo de conexão com o banco de dados
include("ligacao.php");

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere o ID da marca do formulário
    $id_marca = $_POST['id_marca'];
    
    // Recupere o nome da marca do formulário
    $nome = $_POST['nome'];

    // Atualizar o nome da marca na tabela de marcas
    $sql = "UPDATE marcas SET nome_marca='$nome' WHERE id_marca='$id_marca'";

    if (mysqli_query($con, $sql)) {
        $_SESSION['mensagem'] = "Marca atualizada com sucesso!";
        header('refresh:0;URL=./marcas.php');
    } else {
        echo "Erro ao atualizar marca: " . mysqli_error($con);
    }
}
?>
