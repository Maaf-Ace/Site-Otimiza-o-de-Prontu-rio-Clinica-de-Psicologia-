<?php
session_start();
require '../includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $senha = $_POST["senha"];

    if ($email === false) {
        $mensagemErro = "Email inválido.";
        header("Location: ../views/login.php?erro=" . urlencode($mensagemErro));
        exit;
    }

    if ($email && $senha) {
        $query = "SELECT id, Nome, senha FROM Usuario WHERE email = ?";
        $confirmaQuery = $conn->prepare($query);
        $confirmaQuery->bind_param("s", $email);
        $confirmaQuery->execute();
        $resultado = $confirmaQuery->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();

            //Verifica a senha
            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['user_name'] = $usuario['Nome'];
                header("Location: ../views/dashboard.php");
                exit;
            } else {
                $mensagemErro = "Senha incorreta.";
                header("Location: ../views/login.php?erro=" . urlencode($mensagemErro));
                exit;
            }
        } else {
            $mensagemErro = "Email não encontrado.";
            header("Location: ../views/login.php?erro=" . urlencode($mensagemErro));
            exit;
        }
    } else {
        $mensagemErro = "Por favor, preencha todos os campos.";
        header("Location: ../views/login.php?erro=" . urlencode($mensagemErro));
        exit;
    }
} else {
    header("Location: ../views/login.php");
    exit;
}
?>
