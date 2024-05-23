<?php
include("ligacao.php");

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $email = mysqli_real_escape_string($con, $_POST['support-email']);
    $assunto = mysqli_real_escape_string($con, $_POST['support-assunto']);
    $mensagem = mysqli_real_escape_string($con, $_POST['support-msg']);

    // Inserir os dados na tabela `suporte`
    $sql = "INSERT INTO suporte (email, assunto, mensagem) VALUES ('$email', '$assunto', '$mensagem')";

    if (mysqli_query($con, $sql)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($con);
    }

    // Fechar a conexão
    mysqli_close($con);
}
