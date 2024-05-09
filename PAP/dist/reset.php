<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include ("ligacao.php");
session_start();
$nome = $_SESSION['nome'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $reset_email = $_POST["reset_email"];

    $sql = "SELECT * FROM users WHERE email = '$reset_email'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $codigo = "";
        $numC = 12;
        $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!?()-%";
        for ($i = 0; $i < $numC; $i++) {
            $codigo .= substr($caracteres, rand(0, strlen($caracteres)), 1);
            $codigo1 = md5($codigo);
        }
        $alterar = "UPDATE users SET pass = '$codigo1' WHERE email = '$reset_email';";
        $result1 = mysqli_query($con, $alterar);
        if ($result1) {
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                $mail->Username = 'motospeed2024@gmail.com';                     //SMTP username
                $mail->Password = 'buby vwvb uore lowr';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port = 465;

                //Recipients
                $mail->setFrom('motospeed2024@gmail.com', 'Motospeed');
                $mail->addAddress($reset_email);     //Add a recipient
                $mail->addReplyTo('motospeed2024@gmail.com', 'Motospeed');

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Motospeed | Reset da password';
                $mail->Body = '<h4>Ola, a recuperacao da password foi concluida com sucesso!<br><br>
                Deves utilizar o codigo de confirmacao para definires a tua nova password.<br><br>
                Codigo de confirmacao: ' . $codigo . ' <br><br>
                Com os melhores cumprimentos,<br>Motospeed!</h4>';

                $mail->send();
                $_SESSION['mensagem'] = "Enviámos um email com o código de confirmação !";
                header('Location: reset-password.php');
                exit; // Para garantir que o código termina aqui e não continua a executar
            } catch (Exception $e) {
                $_SESSION['mensagem'] = "Erro ao enviar email: {$mail->ErrorInfo}";
                header('Location: forgotten-password.php');
                exit; // Para garantir que o código termina aqui e não continua a executar
            }
        }

    } else {
        $_SESSION['mensagem'] = "O email introduzido não está registado!";
        header('Location: forgotten-password.php');
        exit; // Para garantir que o código termina aqui e não continua a executar
    }
}
