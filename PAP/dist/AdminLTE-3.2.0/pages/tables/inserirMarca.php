<?php
// Inclua o arquivo de conexão com o banco de dados
include("ligacao.php");
session_start();

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere o nome da marca do formulário
    $nome = $_POST['nome'];

    // Verifique se já existe uma marca com o mesmo nome
    $sql_verifica = "SELECT * FROM marcas WHERE nome_marca = '$nome'";
    $resultado = mysqli_query($con, $sql_verifica);

    if (mysqli_num_rows($resultado) > 0) {
        // Se já existir, exiba a mensagem de erro
        $_SESSION['mensagem'] = "Já existe uma marca com esse nome!";
    } else {
        // Se não existir, insira a nova marca
        $sql = "INSERT INTO marcas (nome_marca) VALUES ('$nome')";
        
        if (mysqli_query($con, $sql)) {
            $_SESSION['mensagem'] = "Marca inserida com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao criar marca: " . mysqli_error($con);
        }
    }

    // Redirecione para a página de marcas
    header('Location: ./marcas.php');
    exit();
}
?>
