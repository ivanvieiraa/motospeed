<?php
// Inclua o arquivo de conexão com o banco de dados
include("ligacao.php");

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere o nome da marca do formulário
    $nome = $_POST['nome'];

    // Inserir o nome da marca na tabela de marcas
    $sql = "INSERT INTO categorias (nome_categoria) VALUES ('$nome')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['mensagem'] = "Categoria inserida com sucesso!";
        header('refresh:0;URL=./categorias.php');
    } else {
        echo "Erro ao criar categoria: " . mysqli_error($con);
    }
}
?>
