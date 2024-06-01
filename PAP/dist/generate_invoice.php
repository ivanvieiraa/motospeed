<?php
include("ligacao.php");
session_start();

// Verificar se o ID da venda foi passado
if (!isset($_GET['id_venda'])) {
    // Redirecionar para a página inicial ou mostrar uma mensagem de erro
    header('location:index.php');
    exit();
}

$id_venda = $_GET['id_venda'];

// Obter os dados da venda
$sql_venda = "SELECT * FROM vendas WHERE id_venda = '$id_venda'";
$result_venda = mysqli_query($con, $sql_venda);
$venda = mysqli_fetch_assoc($result_venda);

// Obter os detalhes da venda
$sql_detalhes = "SELECT dv.*, p.nome_prod, p.foto_prod FROM detalhe_venda dv JOIN produtos p ON dv.id_prod = p.id_prod WHERE dv.id_venda = '$id_venda'";
$result_detalhes = mysqli_query($con, $sql_detalhes);

// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Create a new PDF document
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('Motospeed');
$pdf->SetAuthor('Motospeed');
$pdf->SetTitle('Fatura de Compra');
$pdf->SetSubject('Fatura');

// Add a page
$pdf->AddPage();

// Set the font
$pdf->SetFont('helvetica', '', 12);

// Write the HTML content
$html = '<table width="100%" cellpadding="5">';
$html .= '<tr><td align="center"><img src="mstile-150x150.png" alt="Logo da Empresa" style="width: 200px;"></td></tr>';
$html .= '<tr><td align="center"><h1>Fatura de Compra</h1></td></tr>';
$html .= '<tr><td><h2>Dados da Compra:</h2></td></tr>';
$html .= '<tr><td><b>Nome:</b> ' . $venda['nome'] . ' ' . $venda['apelido'] . '</td></tr>';
$html .= '<tr><td><b>Email:</b> ' . $venda['email'] . '</td></tr>';
$html .= '<tr><td><b>Morada:</b> ' . $venda['morada'] . '</td></tr>';
$html .= '<tr><td><b>Código Postal:</b> ' . $venda['codigop'] . '</td></tr>';
$html .= '<tr><td><h2>Detalhes da Compra:</h2></td></tr>';

if (mysqli_num_rows($result_detalhes) > 0) {
    $html .= '<tr><td><table width="100%" border="1" cellpadding="5">';
    $html .= '<thead><tr><th>Produto</th><th>Tamanho</th><th>Quantidade</th><th>Preço Unitário</th></tr></thead>';
    $html .= '<tbody>';
    while ($detalhe = mysqli_fetch_assoc($result_detalhes)) {
        $html .= '<tr>';
        $html .= '<td>' . $detalhe['nome_prod'] . '</td>';
        $html .= '<td>' . $detalhe['tamanho'] . '</td>';
        $html .= '<td>' . $detalhe['quantidade'] . '</td>';
        $html .= '<td>' . $detalhe['preco_uni'] . '€</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody></table></td></tr>';
} else {
    $html .= '<tr><td><p>Nenhum detalhe de compra encontrado.</p></td></tr>';
}

$html .= '<tr><td><h3>Total: ' . $venda['total'] . '€</h3></td></tr>';
$html .= '<tr><td><p>IVA incluído</p></td></tr>';
$html .= '</table>';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output the PDF document
$pdf->Output('fatura.pdf', 'D');
?>
