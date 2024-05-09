<?php
// Inclua o arquivo de conexão com o banco de dados
include("ligacao.php");

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere o nome da marca do formulário
    $nome = $_POST['nome'];

    // Inserir o nome da marca na tabela de marcas
    $sql = "INSERT INTO marcas (nome_marca) VALUES ('$nome')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['mensagem'] = "Marca inserido com sucesso!";
        header('refresh:0;URL=./marcas.php');
    } else {
        echo "Erro ao criar marca: " . mysqli_error($con);
    }
}
?>
