<?php
// Inclua o arquivo de conexão
include("../ligacao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Atualize o status na tabela 'suporte'
    $update_sql = "UPDATE suporte SET status = ? WHERE id_suporte = ?";
    $stmt = mysqli_prepare($con, $update_sql);
    mysqli_stmt_bind_param($stmt, "ii", $status, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Status atualizado com sucesso.";
        header('refresh:0.5;url=index.php');
    } else {
        echo "Erro ao atualizar o status.";
    }

    mysqli_stmt_close($stmt);
}

// Fechar a conexão
mysqli_close($con);
