<?php
session_start();
include("ligacao.php");

// Verifica se o ID do produto e a quantidade foram enviados
if(isset($_POST['id_prod']) && isset($_POST['quantidade'])) {
    // Obtém o ID do produto e a quantidade
    $id_prod = $_POST['id_prod'];
    $quantidade = $_POST['quantidade'];
    $tamanho = $_POST['tamanho'];

    // Consulta SQL para obter os detalhes do produto
    $sqlProd = "SELECT * FROM produtos WHERE id_prod = $id_prod";
    $resultProd = mysqli_query($con, $sqlProd);

    // Verifica se o produto foi encontrado no banco de dados
    if(mysqli_num_rows($resultProd) > 0) {
        $rowProd = mysqli_fetch_assoc($resultProd);

        // Cria um array com os detalhes do produto
        $produto = array(
            'id_prod' => $id_prod,
            'nome' => $rowProd['nome_prod'],
            'preco' => $rowProd['preco_prod'],
            'foto' => $rowProd['foto_prod'],
            'quantidade' => $quantidade,
            'tamanho' => $tamanho
        );

        // Verifica se o carrinho de compras já está inicializado na sessão
        if(!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = array();
        }

        // Verifica se o produto já está no carrinho
        if(isset($_SESSION['carrinho'][$id_prod])) {
            // Se o produto já está no carrinho, apenas atualiza a quantidade
            $_SESSION['carrinho'][$id_prod]['quantidade'] += $quantidade;
        } else {
            // Se o produto ainda não está no carrinho, adiciona-o com os detalhes completos
            $_SESSION['carrinho'][$id_prod] = $produto;
        }

        // Redireciona para a página do carrinho
        header("Location: cart.php?produto_adicionado=true");
        exit;
    } else {
        // Se o produto não foi encontrado no banco de dados, redireciona para a página de produtos
        header('Location: produtos.php');
        exit;
    }
} else {
    // Se o ID do produto e a quantidade não foram enviados, redireciona para a página de produtos
    header('Location: produtos.php');
    exit;
}
?>
