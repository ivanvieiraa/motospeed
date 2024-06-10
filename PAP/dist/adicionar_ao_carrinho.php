<?php
session_start();
include("ligacao.php");

// Verifica se o ID do produto, a quantidade e o tamanho foram enviados
if(isset($_POST['id_prod']) && isset($_POST['quantidade']) && isset($_POST['tamanho'])) {
    // Obtém o ID do produto, a quantidade e o tamanho
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

        // Verifica se o produto já está no carrinho, considerando também o tamanho
        $produto_existe = false;
        foreach ($_SESSION['carrinho'] as $key => $item) {
            if ($item['id_prod'] == $id_prod && $item['tamanho'] == $tamanho) {
                // Se o produto com o mesmo ID e tamanho já estiver no carrinho, atualiza apenas a quantidade
                $_SESSION['carrinho'][$key]['quantidade'] += $quantidade;
                $produto_existe = true;
                break;
            }
        }

        // Se o produto não existir no carrinho, adiciona um novo item
        if (!$produto_existe) {
            $_SESSION['carrinho'][] = $produto;
        }

        // Redireciona para a página do carrinho
        if(!isset($_SESSION['id_user']))
            header("Location: login_form.php");
        else
            header("Location: cart.php?produto_adicionado=true");
        exit;
    } else {
        // Se o produto não foi encontrado no banco de dados, redireciona para a página de produtos
        header('Location: produtos.php');
        exit;
    }
} else {
    // Se o ID do produto, a quantidade e o tamanho não foram enviados, redireciona para a página de produtos
    header('Location: produtos.php');
    exit;
}
?>
