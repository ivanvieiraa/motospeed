<?php
include 'ligacao.php';

// Verifica se o ID da categoria foi fornecido na requisição
if (isset($_GET['id_categoria'])) {
    $id_categoria = $_GET['id_categoria'];

    // Consulta as subcategorias associadas à categoria fornecida
    $sql = "SELECT s.id_subcategoria, s.subcategoria 
    FROM subcategorias s
    INNER JOIN categorias_subcategorias cs ON s.id_subcategoria = cs.id_subcategoria
    WHERE cs.id_categoria = $id_categoria";
    $result = $con->query($sql);

    // Constrói as opções de subcategorias
    $options = '';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $options .= '<option value="' . $row['id_subcategoria'] . '">' . $row['subcategoria'] . '</option>';
        }
    } else {
        $options .= '<option value="">Nenhuma subcategoria encontrada</option>';
    }

    echo $options;
} else {
    echo '<option value="">Erro: ID de categoria não fornecido</option>';
}
