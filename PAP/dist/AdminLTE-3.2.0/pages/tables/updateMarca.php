<?php
session_start();
include("ligacao.php");

// Verifica se o utilizador está autenticado
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_marca = $_POST['id_marca'];
    $nome = $_POST['nome'];

    // Verifique se já existe uma marca com o mesmo nome (exceto a atual)
    $sql_verifica = "SELECT * FROM marcas WHERE nome_marca = '$nome' AND id_marca != '$id_marca'";
    $resultado = mysqli_query($con, $sql_verifica);

    if (mysqli_num_rows($resultado) > 0) {
        // Se já existir, exiba a mensagem de erro
        $_SESSION['mensagem'] = "Já existe uma marca com esse nome!";
    } else {
        // Atualiza a marca
        $sql = "UPDATE marcas SET nome_marca = '$nome' WHERE id_marca = '$id_marca'";
        if (mysqli_query($con, $sql)) {
            $_SESSION['mensagem'] = "Marca atualizada com sucesso.";
        } else {
            $_SESSION['mensagem'] = "Erro ao atualizar a marca: " . mysqli_error($con);
        }
    }
    header('Location: marcas.php');
    exit();
} else {
    $_SESSION['mensagem'] = "Requisição inválida.";
    header('Location: marcas.php');
    exit();
}
?>
