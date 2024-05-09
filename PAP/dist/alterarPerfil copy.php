<?php
include ("ligacao.php");
session_start();

$id_user = $_SESSION['id_user'];
$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$email = $_POST['email'];
$data = $_POST['data'];
$morada = $_POST['morada'];
$codigop = $_POST['codp'];
$pass = md5($_POST['password']);


$verifEmail = "SELECT email FROM users WHERE email = '$email'";
$runEmail = mysqli_query($con, $verifEmail);
if (mysqli_num_rows($runEmail) > 0 && $_POST['email'] != $_SESSION['email']) {
    $_SESSION['mensagem'] = "Esse email já está registado !";
    header('refresh:0;url=perfil.php');
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE users SET 
        nome = '$nome',
        apelido = '$apelido',
        email = '$email',
        pass = '$pass',
        data_nasc = '$data',
        morada = '$morada', 
        codigop = '$codigop'
        WHERE id_user = '$id_user'";

    if (mysqli_query($con, $sql)) {
        $_SESSION['nome'] = $nome;
        $_SESSION['apelido'] = $apelido;
        $_SESSION['email'] = $email;
        $_SESSION['mensagem'] = "Perfil atualizado com sucesso !";

        if ($_FILES['foto']['size'] > 0) {
            $foto_nome = $_FILES['foto']['name'];
            $foto_tmp = $_FILES['foto']['tmp_name'];
            $diretorio_upload = "uploads/users/";

            // Verifique se o diretório de upload existe
            if (!is_dir($diretorio_upload)) {
                echo "Erro: O diretório de upload não existe.";
                exit();
            }

            // Move a nova foto para o diretório de upload
            if (move_uploaded_file($foto_tmp, $diretorio_upload . $foto_nome)) {
                // Atualize o nome da foto na tabela users
                $sqlUpdateFoto = "UPDATE users SET foto = '$diretorio_upload$foto_nome' WHERE id_user = $id_user";
                mysqli_query($con, $sqlUpdateFoto);
            } else {
                echo "Erro ao fazer upload da foto.";
            }
        }
    } else {
        echo "Erro ao atualizar utilizador";
    }
}

header('refresh:0;url=perfil.php');

?>