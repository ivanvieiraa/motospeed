<?php
session_start();
include 'ligacao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $id_categoria = $_POST['id_categoria'];
    $new_subcategoria = trim($_POST['new_subcategoria']);
    $id_subcategoria = $_POST['id_subcategoria'];

    // Verifica se uma nova subcategoria foi inserida
    if (!empty($new_subcategoria)) {
        // Insere a nova subcategoria na tabela subcategorias
        $stmt = $con->prepare("INSERT INTO subcategorias (subcategoria) VALUES (?)");
        $stmt->bind_param("s", $new_subcategoria);

        if ($stmt->execute()) {
            // Obtém o ID da nova subcategoria inserida
            $new_subcategoria_id = $stmt->insert_id;

            // Insere a relação na tabela categorias_subcategorias
            $stmt = $con->prepare("INSERT INTO categorias_subcategorias (id_categoria, id_subcategoria) VALUES (?, ?)");
            $stmt->bind_param("ii", $id_categoria, $new_subcategoria_id);

            if ($stmt->execute()) {
                $_SESSION['mensagem'] = 'Sub-categoria e relação adicionadas com sucesso!';
            } else {
                $_SESSION['mensagem'] = 'Erro ao inserir a relação na tabela categorias_subcategorias: ' . $stmt->error;
            }
        } else {
            $_SESSION['mensagem'] = 'Erro ao inserir a nova subcategoria: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        // Verifica se uma subcategoria existente foi escolhida
        if (!empty($id_subcategoria)) {
            // Insere a relação na tabela categorias_subcategorias
            $stmt = $con->prepare("INSERT INTO categorias_subcategorias (id_categoria, id_subcategoria) VALUES (?, ?)");
            $stmt->bind_param("ii", $id_categoria, $id_subcategoria);

            if ($stmt->execute()) {
                $_SESSION['mensagem'] = 'Relação adicionada com sucesso!';
            } else {
                $_SESSION['mensagem'] = 'Erro ao inserir a relação na tabela categorias_subcategorias: ' . $stmt->error;
            }

            $stmt->close();
        } else {
            $_SESSION['mensagem'] = 'Nenhuma subcategoria foi selecionada ou inserida.';
        }
    }

    // Redireciona de volta para a página de inserção de subcategorias
    header('Location: subcategorias.php');
    exit();
}
