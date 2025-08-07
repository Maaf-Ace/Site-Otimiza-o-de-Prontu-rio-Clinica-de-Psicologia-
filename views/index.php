<?php
    require "../controllers/registro.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <script defer src="../assets/scripts.js"></script>    
    <title>Index</title>
</head>
<body>
    <div class = divImg>
        <img src="logoUni.png" alt="unicuritiba logo" class = "unicuritibaLogo">
        <p class = "logoText">Clínica Psicologia</p>
    </div>
    <div class = "divForms">
        <h2>Cadastro</h2>
        <form action="#" method = "post" id = "formRegistro">

            <label for="nome">Nome: </label>
            <input type="text" name = "nome" placeholder= "Digite seu nome" required> <br><br>

            <label for="email">Email: </label>
            <input type="text" name = "email" placeholder= "Digite seu Email" required> <br><br>

            <label for="senha">Senha: </label>
            <input type= "password" name = "senha" placeholder= "Digite sua senha" required> <br><br>

            <label for="confirmaSenha">Confirme sua Senha: </label>
            <input type="password" name = "confirmaSenha" placeholder= "Confirme sua senha" required> <br><br>

            <input type="submit" value = "Cadastrar" id = "cadastraBotao">

        </form>
        <p class="linkText">Já tem uma conta? <a href="login.php">Faça login aqui</a>.</p>
    </div>


</body>
</html>