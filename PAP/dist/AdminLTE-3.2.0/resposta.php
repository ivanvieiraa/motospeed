<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include "../ligacao.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $support_id = $_POST['support_id'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Fetch the email of the client based on support_id
    $sql = "SELECT email FROM suporte WHERE id_suporte = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('i', $support_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $client_email = $row['email'];
    $stmt->close();

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'motospeed2024@gmail.com';
        $mail->Password = 'buby vwvb uore lowr';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        //Recipients
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('motospeed2024@gmail.com', 'Motospeed');
        $mail->addAddress($client_email);
        $mail->addReplyTo('motospeed2024@gmail.com', 'Motospeed');

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "".nl2br($message)."<br><br>Com os melhores cumprimentos,<br>Motospeed!";

        $mail->send();
        $_SESSION['mensagem'] = "Resposta enviada!";
        
        $updateStatus = "UPDATE suporte SET status = 2 WHERE id_suporte = $support_id";
        $ok = mysqli_query($con,$updateStatus);
    } catch (Exception $e) {
        $_SESSION['mensagem'] = "Erro ao enviar email: {$mail->ErrorInfo}";
    }

    header('Location: index.php');
    exit;
}
?>
