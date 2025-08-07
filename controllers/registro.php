<?php
require '../includes/config.php';

// +----------------+-------------+------+-----+---------+----------------+
// | Field          | Type        | Null | Key | Default | Extra          |
// +----------------+-------------+------+-----+---------+----------------+
// | id             | int(11)     | NO   | PRI | NULL    | auto_increment |
// | Nome           | varchar(70) | YES  |     | NULL    |                |
// | email          | varchar(60) | YES  | UNI | NULL    |                |
// | senha          | varchar(80) | YES  |     | NULL    |                |
// | Nivel          | char(1)     | YES  |     | NULL    |                |
// | id_responsavel | int(11)     | YES  | MUL | NULL    |                |
// | data_cadastro  | datetime    | YES  |     | NULL    |                |
// +----------------+-------------+------+-----+---------+----------------+

//Função para validar e-mails institucionais
function isInstitutionalEmail($email) {
    $institutionalDomain = "@ulife.com.br";
    return str_ends_with($email, $institutionalDomain);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = filter_var($_POST["nome"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $senha = $_POST["senha"];
    $confirmaSenha = $_POST["confirmaSenha"];

    //Validação do email da Anima
    if (!isInstitutionalEmail($email)) {
        $mensagemErro = "E-mail deve ser institucional!";
        header("Location: ../views/index.php?erro=" . urlencode($mensagemErro));
        exit;
    }

    if ($senha !== $confirmaSenha) {
        $mensagemErro = "As senhas não coincidem.";
        header("Location: ../views/index.php?erro=" . urlencode($mensagemErro));
        exit;
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $confereEmail = "SELECT * FROM Usuario WHERE email = ?";
    $ConfirmaChecagem = $conn->prepare($confereEmail);
    $ConfirmaChecagem->bind_param("s", $email);
    $ConfirmaChecagem->execute();
    $resultadoChecagem = $ConfirmaChecagem->get_result();

    if ($resultadoChecagem->num_rows > 0) {
        $mensagemErro = "Email já cadastrado.";
        $ConfirmaChecagem->close();
        $conn->close();
        header("Location: ../views/index.php?erro=" . urlencode($mensagemErro));
        exit;
    }

    $ConfirmaChecagem->close();

    $q = "INSERT INTO Usuario (Nome, email, senha, data_cadastro) VALUES (?, ?, ?, NOW())";
    $qConfirmada = $conn->prepare($q);

    if ($qConfirmada) {
        $qConfirmada->bind_param("sss", $nome, $email, $senhaHash);

        if ($qConfirmada->execute()) {
            header("Location: ../views/index.php?success=true");
        } else {
            $mensagemErro = "Erro ao cadastrar usuário: " . $qConfirmada->error;
            header("Location: ../views/index.php?erro=" . urlencode($mensagemErro));
        }

        $qConfirmada->close();
    } else {
        $mensagemErro = "Erro na preparação da consulta: " . $conn->error;
        header("Location: ../views/index.php?erro=" . urlencode($mensagemErro));
    }

    $conn->close();
    exit;
}
?>
