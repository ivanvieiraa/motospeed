<?php
session_start();
include ("ligacao.php");

// Verifica se o utilizador está autenticado
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_categoria = $_POST['id_categoria'];
    $nome = $_POST['nome'];
    $nova_subcategoria = $_POST['nova_subcategoria'];
    $subcategorias = $_POST['subcategorias'];
    $subcategoria_ids = $_POST['subcategoria_ids'];

    // Verifica se já existe uma categoria com o mesmo nome (exceto a atual)
    $sql_verifica = "SELECT * FROM categorias WHERE nome_categoria = '$nome' AND id_categoria != '$id_categoria'";
    $resultado = mysqli_query($con, $sql_verifica);

    if (mysqli_num_rows($resultado) > 0) {
        // Se já existir, exiba a mensagem de erro
        $_SESSION['mensagem'] = "Já existe uma categoria com esse nome!";
    } else {
        // Atualiza a categoria
        $sql = "UPDATE categorias SET nome_categoria = '$nome' WHERE id_categoria = '$id_categoria'";
        if (mysqli_query($con, $sql)) {
            // Atualiza subcategorias existentes
            foreach ($subcategoria_ids as $index => $id_subcategoria) {
                $nome_subcategoria = $subcategorias[$index];

                // Verifica se já existe uma subcategoria com o mesmo nome (exceto a atual)
                $sql_verifica_subcategoria = "SELECT * FROM subcategorias WHERE nome_subcategoria = '$nome_subcategoria' AND id_subcategoria != '$id_subcategoria' AND id_categoria = '$id_categoria'";
                $resultado_subcategoria = mysqli_query($con, $sql_verifica_subcategoria);

                if (mysqli_num_rows($resultado_subcategoria) > 0) {
                    $_SESSION['mensagem'] = "Já existe uma subcategoria com esse nome!";
                    header('Location: editCategoria.php?id_categoria=' . $id_categoria . '');
                    exit();
                } else {
                    // Atualiza a subcategoria
                    $sql_update_subcategoria = "UPDATE subcategorias SET nome_subcategoria = '$nome_subcategoria' WHERE id_subcategoria = '$id_subcategoria'";
                    mysqli_query($con, $sql_update_subcategoria);
                }
            }

            // Verifica se uma nova subcategoria foi fornecida
            if (!empty($nova_subcategoria)) {
                // Verifica se já existe uma subcategoria com o mesmo nome na mesma categoria
                $sql_verifica_subcategoria = "SELECT * FROM subcategorias WHERE nome_subcategoria = '$nova_subcategoria' AND id_categoria = '$id_categoria'";
                $resultado_subcategoria = mysqli_query($con, $sql_verifica_subcategoria);

                if (mysqli_num_rows($resultado_subcategoria) > 0) {
                    // Se já existir, exiba a mensagem de erro
                    $_SESSION['mensagem'] = "Já existe uma subcategoria com esse nome!";
                    header('Location: editCategoria.php?id_categoria=' . $id_categoria . '');
                    exit();
                } else {
                    // Insere a nova subcategoria
                    $sql_subcategoria = "INSERT INTO subcategorias (nome_subcategoria, id_categoria) VALUES ('$nova_subcategoria', '$id_categoria')";
                    if (!mysqli_query($con, $sql_subcategoria)) {
                        $_SESSION['mensagem'] = "Erro ao adicionar a nova subcategoria.";
                    } else {
                        $_SESSION['mensagem'] = "Categoria e subcategoria atualizadas com sucesso.";
                    }
                }
            } else {
                $_SESSION['mensagem'] = "Categoria atualizada com sucesso.";
            }
        } else {
            $_SESSION['mensagem'] = "Erro ao atualizar a categoria.";
        }
    }
    header('Location: categorias.php');
    exit();
} else {
    $_SESSION['mensagem'] = "Requisição inválida.";
    header('Location: categorias.php');
    exit();
}
?>