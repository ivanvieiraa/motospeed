<?php
include("ligacao.php");
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $id_prod = $_POST['id_prod'];
    $nome_prod = $_POST['nome_prod'];
    $desc_prod = $_POST['desc_prod'];
    $id_marca = $_POST['id_marca'];
    $id_subcategoria = $_POST['id_subcategoria'];
    $preco_prod = $_POST['preco_prod'];
    $status = isset($_POST['isActive']) ? 1 : 0;

    // Atualize os dados na tabela de produtos
    $sql = "UPDATE produtos SET nome_prod='$nome_prod', desc_prod='$desc_prod', id_marca=$id_marca, id_subcategoria=$id_subcategoria, preco_prod=$preco_prod, status=$status WHERE id_prod=$id_prod";

    if (mysqli_query($con, $sql)) {
        // Atualize os tamanhos na tabela de produtos_tamanhos
        foreach ($_POST['tamanho'] as $tamanho => $stock) {
            $sql_update_tamanho = "UPDATE produtos_tamanhos SET stock=$stock WHERE id_prod=$id_prod AND tamanho='$tamanho'";
            mysqli_query($con, $sql_update_tamanho);
        }

        // Verifica se houve upload de nova imagem
        if ($_FILES['foto']['size'] > 0) {
            // Upload da nova imagem
            $diretorio_upload = "uploads/produtos/";
            $nome_arquivo = basename($_FILES["foto"]["name"]);
            $caminho_arquivo = $diretorio_upload . $nome_arquivo;

            // Verifica se o upload foi bem-sucedido
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], "../../../$caminho_arquivo")) {
                // Atualize o caminho da imagem na tabela de produtos
                $sql_update_imagem = "UPDATE produtos SET foto_prod='$caminho_arquivo' WHERE id_prod=$id_prod";
                mysqli_query($con, $sql_update_imagem);
            } else {
                echo "Erro ao fazer upload da nova imagem.";
            }
        }
        
        $_SESSION['mensagem'] = "Produto atualizado com sucesso";
        header("Location: produtos.php");
    } else {
        echo "Erro ao atualizar produto: " . mysqli_error($con);
    }
}
?>
