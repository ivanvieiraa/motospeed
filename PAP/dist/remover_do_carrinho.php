<?php
session_start();

// Verifica se o parâmetro produto_id foi enviado
if(isset($_GET['produto_id'])) {
    $produto_id = $_GET['produto_id'];

    // Verifica se a sessão do carrinho está definida e se há produtos no carrinho
    if(isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
        // Loop através dos produtos no carrinho
        foreach($_SESSION['carrinho'] as $indice => $produto) {
            // Se o ID do produto no carrinho for igual ao ID do produto a ser removido
            if($produto['id_prod'] == $produto_id) {
                // Remove o produto do carrinho
                unset($_SESSION['carrinho'][$indice]);
                // Redireciona de volta para a página do carrinho
                header('Location: cart.php');
                exit();
            }
        }
    }
}

// Se não houver produto_id ou se não for encontrado o produto no carrinho, redireciona para a página do carrinho
header('Location: cart.php');
exit();
?>
