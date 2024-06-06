<?php
// Incluir o arquivo de conexão com o banco de dados
include("ligacao.php");

// Iniciar a sessão
session_start();

// Verificar se o ID da venda foi passado
if (!isset($_GET['id_venda'])) {
    header('location:index.php');
    exit();
}

$id_venda = $_GET['id_venda'];

// Obter os dados da venda
$sql_venda = "SELECT * FROM vendas WHERE id_venda = '$id_venda'";
$result_venda = mysqli_query($con, $sql_venda);
$venda = mysqli_fetch_assoc($result_venda);

// Verificar se os dados da venda foram encontrados
if (!$venda) {
    header('location:index.php');
    exit();
}

// Obter os detalhes da venda
$sql_detalhes = "SELECT dv.*, p.nome_prod, p.foto_prod FROM detalhe_venda dv JOIN produtos p ON dv.id_prod = p.id_prod WHERE dv.id_venda = '$id_venda'";
$result_detalhes = mysqli_query($con, $sql_detalhes);

// Include the TCPDF library
require_once('TCPDF-main/tcpdf.php');

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

// Write the header
$pdf->writeHTML('<table cellpadding="5" cellspacing="0" border="0">
                    <tr>
                        <td colspan="2" align="center">
                            <img src="mstile-150x150.png" alt="Logo da Empresa" />
                            <h1>Motospeed</h1>
                        </td>
                    </tr>
                </table>');

// Write the address and purchase details
$html = '<table cellpadding="5" cellspacing="0" border="0">
            <tr>
                <td style="width: 50%;">
                    <h2 style="color: #333;">Morada de entrega</h2>
                    <p>' . $venda['nome'] . ' ' . $venda['apelido'] . '<br>' . $venda['morada'] . '<br>' . $venda['codigop'] . '</p>
                </td>
                <td style="width: 50%;">
                    <h2 style="color: #333;">Detalhes de compra</h2>
                    <p><strong>Número de compra:</strong> ' . $venda['id_venda'] . '<br><strong>Data da compra:</strong> ' . date("d.m.Y") . '</p>
                </td>
            </tr>
        </table>';

$pdf->writeHTML($html);

$html = '<table cellpadding="5" cellspacing="0" border="0" style="width: 100%; background-color: #f2f2f2;">
            <thead>
                <tr style="background-color: #ddd;">
                    <th style="color: #333; padding: 8px;">Descrição</th>
                    <th style="color: #333; padding: 8px;">Qtd</th>
                    <th style="color: #333; padding: 8px;">Preço unitário</th>
                    <th style="color: #333; padding: 8px;">Valor</th>
                </tr>
            </thead>
            <tbody>';

// Write the products details
$total_liquido = 0;
$oddRow = true;
while ($detalhe = mysqli_fetch_assoc($result_detalhes)) {
    $valor_total_liquido = $detalhe['preco_uni'] * $detalhe['quantidade'];
    $total_liquido += $valor_total_liquido;
    $html .= '<tr style="background-color: ' . ($oddRow ? '#fff' : '#f9f9f9') . ';">';
    $oddRow = !$oddRow;
    $html .= '<td style="color: #333; padding: 8px;">' . $detalhe['nome_prod'] . '</td>';
    $html .= '<td style="color: #333; padding: 8px;">' . $detalhe['quantidade'] . '</td>';
    $html .= '<td style="color: #333; padding: 8px;">' . number_format($detalhe['preco_uni'],2) . '€</td>';
    $html .= '<td style="color: #333; padding: 8px;">' . number_format($valor_total_liquido, 2) . '€</td>';
    $html .= '</tr>';
}
$html .= '</tbody></table>';


$pdf->writeHTML($html);

// Write the total amount
$pdf->writeHTML('<p style="text-align:right; margin-top:20px; color: #333;"><strong>Subtotal:</strong> ' . number_format($total_liquido, 2) . '€</p>');
$pdf->writeHTML('<p style="text-align:right; margin-top:20px; color: #333;"><strong>Taxa de envio:</strong> ' . number_format($venda['envio'], 2) . '€</p>');
$pdf->writeHTML('<p style="text-align:right; color: #333;"><strong>Total:</strong> ' . number_format($total_liquido + $venda['envio'], 2) . '€</p>');

// Add space before "Obrigado pela sua compra!"
$pdf->writeHTML('<br>');

// Write the footer with a different color and increased bottom margin
$pdf->writeHTML('<p style="text-align:center; margin-top:50px; margin-bottom: 150px; font-size:16px;">Obrigado pela sua compra!</p>');

// Output the PDF
$pdf->Output('fatura.pdf', 'D');
