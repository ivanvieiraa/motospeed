<?php
session_start();

include('ligacao.php');

// Se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do formulário
    $id_user = $_SESSION['id_user']; // Substitua por sua própria variável de sessão para o ID do usuário
    $data_venda = date("Y-m-d"); // Data atual
    // $opcaoEnvioSelecionada = $_POST['envio'];
    // $subtotal = $_POST['subtotal'];
    // $custoEnvio = $_POST['custoEnvio'];
    $total = $_POST['total'];
    // Inserir dados na tabela 'vendas'
    $sql_vendas = "INSERT INTO vendas (id_user, data_venda, total) VALUES ('$id_user', '$data_venda', '$total')";
    $result_vendas = mysqli_query($con, $sql_vendas);
    if ($result_vendas) {
        // Obter o ID da venda recém-inserida
        $id_venda = mysqli_insert_id($con);

        // Dados do carrinho
        $carrinho = $_SESSION['carrinho'];

        // Inserir detalhes da venda na tabela 'detalhe_venda'
        foreach ($carrinho as $produto) {
            $id_prod = $produto['id_prod']; // Substitua pela coluna correta na tabela 'produtos'
            $quantidade = $produto['quantidade'];
            $preco_uni = $produto['preco'];
            $tamanho = $produto['tamanho'];

            $sql_detalhe_venda = "INSERT INTO detalhe_venda (id_venda, id_prod, quantidade, tamanho, preco_uni) VALUES ('$id_venda', '$id_prod', '$quantidade', '$tamanho', '$preco_uni')";
            $result_detalhe_venda = mysqli_query($con, $sql_detalhe_venda);
            if (!$result_detalhe_venda) {
                echo "Erro ao inserir detalhe da venda: " . mysqli_error($con);
                exit();
            }
        }

        // Limpar carrinho após a conclusão da venda
        unset($_SESSION['carrinho']);

        // Redirecionar para página de confirmação ou exibir mensagem de sucesso
        header('location:confirmacao_compra.php?id_venda='.$id_venda.'');
        exit();
    } else {
        echo "Erro ao processar a compra: " . mysqli_error($con);
    }
}

// Fechar conexão
mysqli_close($con);
