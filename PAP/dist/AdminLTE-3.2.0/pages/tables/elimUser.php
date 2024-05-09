<?php
include("ligacao.php");

$id_user = $_GET['id_user'];

// Verifica se o usuário pode ser removido
$sql_check = "SELECT adm FROM users WHERE id_user = $id_user";
$result_check = mysqli_query($con, $sql_check);

if ($result_check) {
    $row = mysqli_fetch_assoc($result_check);
    $adm = $row['adm'];

    // Verifica se o usuário pode ser removido
    if ($adm == 0) {
        // Remove o usuário se o campo adm for 0
        $sql_delete = "DELETE FROM users WHERE id_user = $id_user";
        $result_delete = mysqli_query($con, $sql_delete);

        if ($result_delete) {
            header('refresh:0.5;url=utilizadores.php');
        } else {
            echo "Ocorreu um erro ao eliminar!";
        }
    } else {
        $_SESSION['mensagem'] = "Este utilizador não pode ser eliminado porque é ADMIN.";
        header('refresh:0.5;url=utilizadores.php');
    }
} else {
    echo "Ocorreu um erro ao verificar o utilizador.";
}
?>