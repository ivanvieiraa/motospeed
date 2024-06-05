<?php
session_start();
include("ligacao.php");

$id_user = $_POST['id_user'];
$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$email = $_POST['email'];
$data = $_POST['data'];
$morada = $_POST['morada'];
$codigop = $_POST['codp'];
// $pass = $_POST['password'];
$status = $_POST['status'];

// Verificar se o email fornecido é diferente do email atual do usuário
$sql_email_atual = "SELECT email FROM users WHERE id_user = '$id_user'";
$result_email_atual = mysqli_query($con, $sql_email_atual);
$row_email_atual = mysqli_fetch_assoc($result_email_atual);
$email_atual = $row_email_atual['email'];

if ($email != $email_atual) {
    // Se o email fornecido for diferente do email atual do usuário, verifique se o email já está registrado
    $sql_email_existente = "SELECT * FROM users WHERE email = '$email'";
    $result_email_existente = mysqli_query($con, $sql_email_existente);

    if (mysqli_num_rows($result_email_existente) > 0) {
        $_SESSION['mensagem'] = "Este email já está registado!";
        header("Location: ./editUser.php?id_user=$id_user");
        exit();
    }
}

// Verificar se o usuário tem pelo menos 16 anos
$data_nascimento = new DateTime($data);
$data_atual = new DateTime();
$idade = $data_atual->diff($data_nascimento)->y;

if ($idade < 16 && $data != null) {
    $_SESSION['mensagem'] = "A idade miníma é 16 anos";
    header("Location: ./editUser.php?id_user=$id_user");
    exit();
}

// Verificar se o usuário é um administrador (supondo que "adm" seja o campo no banco de dados que indica se o usuário é um administrador)
$sql_verificar_adm = "SELECT adm FROM users WHERE id_user = '$id_user'";
$result_verificar_adm = mysqli_query($con, $sql_verificar_adm);
$row_verificar_adm = mysqli_fetch_assoc($result_verificar_adm);
$adm = $row_verificar_adm['adm'];

if ($adm == 1 && $status == 0) {
    $_SESSION['mensagem'] = "O admin não pode ser desativado.";
    header("Location: ./editUser.php?id_user=$id_user");
    exit();
}

// Atualize os dados do utilizador no banco de dados
$sql = "UPDATE users SET 
        nome = '$nome',
        apelido = '$apelido',
        email = '$email',
        data_nasc = '$data',
        morada = '$morada', 
        codigop = '$codigop',
        status = $status ";

if (!empty($pass)) {
    // Se uma nova senha foi fornecida, atualize-a
    $pass_new = md5($pass); // Ajuste o hash da senha conforme necessário
    $sql .= ", pass = '$pass_new'";
}

$sql .= " WHERE id_user = '$id_user'";

if (mysqli_query($con, $sql)) {
    $_SESSION['mensagem'] = "Registo atualizado com sucesso";

    // Se uma nova foto foi enviada, processe o upload e atualize o caminho da foto
    if ($_FILES['foto']['size'] > 0 && $_FILES['foto']['error'] == 0) {
        $foto_nome = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $diretorio_upload = "uploads/users/";

        // Verifica se o diretório de upload existe e é gravável
        if (!file_exists($diretorio_upload)) {
            mkdir($diretorio_upload, 0777, true);
        }

        // Move a nova foto para o diretório de upload
        if (move_uploaded_file($foto_tmp, $diretorio_upload . $foto_nome)) {
            // Atualiza o nome da foto na tabela users
            $sqlUpdateFoto = "UPDATE users SET foto = '$diretorio_upload$foto_nome' WHERE id_user = '$id_user'";
            mysqli_query($con, $sqlUpdateFoto);
        } else {
            $_SESSION['mensagem'] = "Erro ao fazer upload da foto.";
        }
    }
} else {
    $_SESSION['mensagem'] = "Erro ao atualizar perfil";
}

// Redirecione de volta para a página de perfil
header("Location: utilizadores.php");
exit();
