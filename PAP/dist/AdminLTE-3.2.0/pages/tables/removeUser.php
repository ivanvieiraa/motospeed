<?php
include("ligacao.php");
session_start();
// Verifica se o parâmetro id_user foi passado via GET
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];


    // Verifica se o usuário tem registros relacionados nas tabelas vendas ou detalhe_venda
    $sql_check_relations = "SELECT COUNT(*) AS total FROM vendas WHERE id_user = $id_user 
                            UNION 
                            SELECT COUNT(*) AS total FROM detalhe_venda d 
                            INNER JOIN vendas v ON d.id_venda = v.id_venda 
                            WHERE v.id_user = $id_user";

    $result = $con->query($sql_check_relations);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Se houver registros relacionados, não remover o usuário
            if ($row['total'] > 0) {
                $_SESSION['mensagem'] = "Este utilizador não pode ser removido, pois ele já efetuou compras!";
                header("Location: utilizadores.php");
            } else {
                // Se não houver registros relacionados, remover o usuário da tabela users
                $sql_remove_user = "DELETE FROM users WHERE id_user = $id_user";

                if ($con->query($sql_remove_user) === TRUE) {
                    $_SESSION['mensagem'] = "Utilizador removido com sucesso!";
                    header("Location: utilizadores.php");
                } else {
                    $_SESSION['mensagem'] = "Erro ao remover o utilizador: " . $con->error;
                }
            }
        }
    } else {
        $_SESSION['mensagem'] = "Erro ao verificar os registros relacionados.";
    }

} else {
    $_SESSION['mensagem'] = "ID do utilizador não especificado.";
}
?>
