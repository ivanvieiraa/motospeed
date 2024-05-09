<?php
// Inclua o arquivo de conexão com o banco de dados
include('ligacao.php');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $nome = $_POST['nome'];
    $descricao = $_POST['desc'];
    $marca = $_POST['marca'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $status = isset($_POST['status']) ? 1 : 0;

    // Upload da imagem
    $diretorio_upload = "uploads/produtos/";
    $nome_arquivo = basename($_FILES["foto"]["name"]);
    $caminho_arquivo = $diretorio_upload . $nome_arquivo;

    // Verifica se o upload foi bem-sucedido
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], "../../../$caminho_arquivo")) {
        // Insira os dados na tabela de produtos
        $sql = "INSERT INTO produtos (nome_prod, desc_prod, foto_prod, preco_prod, id_marca, id_categoria, status) 
                VALUES ('$nome', '$descricao', '$caminho_arquivo', $preco, $marca, $categoria, $status)";

        if (mysqli_query($con, $sql)) {
            // Obtenha o ID do produto recém-inserido
            $id_produto = mysqli_insert_id($con);

            // Insira os tamanhos na tabela de produtos_tamanhos
            foreach ($_POST['tamanho'] as $tamanho => $stock) {
                $sql_tamanho = "INSERT INTO produtos_tamanhos (id_prod, tamanho, stock) 
                                VALUES ($id_produto, '$tamanho', $stock)";
                mysqli_query($con, $sql_tamanho);
            }

            $_SESSION['mensagem'] = "Produto inserido com sucesso";
            header("Location: produtos.php");
        } else {
            echo "Erro ao inserir produto: " . mysqli_error($con);
        }
    } else {
        echo "Erro ao fazer upload do arquivo.";
    }
}
?>


