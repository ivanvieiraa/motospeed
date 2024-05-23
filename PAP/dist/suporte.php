<?php
include("ligacao.php");
session_start();
// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $email = mysqli_real_escape_string($con, $_POST['support-email']);
    $assunto = mysqli_real_escape_string($con, $_POST['support-assunto']);
    $mensagem = mysqli_real_escape_string($con, $_POST['support-msg']);

    // Inserir os dados na tabela `suporte`
    $sql = "INSERT INTO suporte (email, assunto, mensagem) VALUES ('$email', '$assunto', '$mensagem')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['mensagem'] = "Mensagem enviada com sucesso !";
        header('Location: sobre.php#form-section');
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($con);
    }

    // Fechar a conexão
    mysqli_close($con);
}
