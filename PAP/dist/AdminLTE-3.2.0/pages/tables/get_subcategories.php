<?php
// Lógica para obter as subcategorias com base na categoria selecionada
$category_id = $_GET['category_id'];

// Consulta SQL para obter as subcategorias com base na categoria selecionada
$sql = "SELECT id_subcategoria, nome_subcategoria FROM subcategorias WHERE id_categoria = '$category_id'";
$result = mysqli_query($con, $sql);

$subcategories = [];
while ($row = mysqli_fetch_assoc($result)) {
  $subcategories[] = $row;
}

// Retorna as subcategorias como JSON
echo json_encode($subcategories);
?>
