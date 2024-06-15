<?php
include './ligacao.php'; // Inclua a conexão com o banco de dados

if (isset($_POST['id_categoria'])) {
    $id_categoria = intval($_POST['id_categoria']);
    $sql_subcategorias = "SELECT * FROM subcategorias WHERE id_categoria = $id_categoria";
    $resultado_subcategorias = mysqli_query($con, $sql_subcategorias);
    $subcategorias = [];

    while ($row_subcategoria = mysqli_fetch_assoc($resultado_subcategorias)) {
        $subcategorias[] = [
            'id_subcategoria' => $row_subcategoria['id_subcategoria'],
            'nome_subcategoria' => $row_subcategoria['nome_subcategoria']
        ];
    }

    echo json_encode($subcategorias);
}
?>
