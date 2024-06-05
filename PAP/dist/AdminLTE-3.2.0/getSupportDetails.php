<?php
include("../ligacao.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Consulta SQL para obter os detalhes do suporte
  $sql = "SELECT * FROM suporte WHERE id_suporte = $id";
  $result = mysqli_query($con, $sql);

  if ($result) {
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data);
  } else {
    echo json_encode(['error' => 'Erro ao buscar dados.']);
  }

  // Fechar a conexão
  mysqli_close($con);
} else {
  echo json_encode(['error' => 'ID não fornecido.']);
}
?>
