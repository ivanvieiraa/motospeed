<?php
// Inclua o arquivo de conexão com o banco de dados
include("ligacao.php");
session_start();

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere o nome da categoria do formulário
    $nome = $_POST['nome'];

    // Verifique se já existe uma categoria com o mesmo nome
    $sql_verifica = "SELECT * FROM categorias WHERE nome_categoria = '$nome'";
    $resultado = mysqli_query($con, $sql_verifica);

    if (mysqli_num_rows($resultado) > 0) {
        // Se já existir, exiba a mensagem de erro
        $_SESSION['mensagem'] = "Já existe uma categoria com esse nome!";
    } else {
        // Se não existir, insira a nova categoria
        $sql = "INSERT INTO categorias (nome_categoria) VALUES ('$nome')";
        
        if (mysqli_query($con, $sql)) {
            $_SESSION['mensagem'] = "Categoria inserida com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao criar categoria: " . mysqli_error($con);
        }
    }

    // Redirecione para a página de categorias
    header('Location: ./categorias.php');
    exit();
}
?>
