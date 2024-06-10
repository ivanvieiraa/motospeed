<?php
// Conectar ao banco de dados
include 'ligacao.php';

// Verificar se o ID da categoria foi fornecido na solicitação
if(isset($_GET['id_categoria'])) {
    $id_categoria = $_GET['id_categoria'];

    // Consulta SQL para obter as subcategorias associadas à categoria selecionada
    $sql_subcategorias = "SELECT * FROM subcategorias WHERE id_categoria = $id_categoria";
    $resultado_subcategorias = mysqli_query($con, $sql_subcategorias);

    // Exibir as opções de subcategoria
    while ($row_subcategoria = mysqli_fetch_assoc($resultado_subcategorias)) {
        echo "<option value='" . $row_subcategoria['id_subcategoria'] . "'>" . $row_subcategoria['nome_subcategoria'] . "</option>";
    }
}
?>
