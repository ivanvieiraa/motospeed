<?php
session_start();
include("ligacao.php");

if (!isset($_SESSION['id_user'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$id_user = $_SESSION['id_user'];
$id_prod = $_POST['id_prod'];

// Verificar se o produto já está na wishlist
$sqlCheck = "SELECT * FROM wishlist WHERE id_user = ? AND id_prod = ?";
$stmtCheck = $con->prepare($sqlCheck);
$stmtCheck->bind_param('ii', $id_user, $id_prod);
$stmtCheck->execute();
$resultCheck = $stmtCheck->get_result();

if ($resultCheck->num_rows > 0) {
    // Produto já está na wishlist, removê-lo
    $sqlRemove = "DELETE FROM wishlist WHERE id_user = ? AND id_prod = ?";
    $stmtRemove = $con->prepare($sqlRemove);
    $stmtRemove->bind_param('ii', $id_user, $id_prod);
    if ($stmtRemove->execute()) {
        echo json_encode(['success' => true, 'action' => 'removed']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to remove from wishlist']);
    }
} else {
    // Produto não está na wishlist, adicioná-lo
    $sqlAdd = "INSERT INTO wishlist (id_user, id_prod) VALUES (?, ?)";
    $stmtAdd = $con->prepare($sqlAdd);
    $stmtAdd->bind_param('ii', $id_user, $id_prod);
    if ($stmtAdd->execute()) {
        echo json_encode(['success' => true, 'action' => 'added']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add to wishlist']);
    }
}
?>
