<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="scripts.js"></script>
    <title>Login</title>
</head>
<body>
    <div class = "divImg">
        <img src="logoUni.png" alt="unicuritiba logo" class="unicuritibaLogo">
        <p class="logoText">Clínica Psicologia</p>
    </div>

    <div class = "divForms">
        <h2>Login</h2>
        <form action="#" method = "post" id="formLogin"></form>
            <label for="email">Email: </label>
            <input type="text" name="email" placeholder="Digite seu Email" required><br><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" placeholder="Digite sua senha" required> <br><br>
            <input type="submit" value="Entrar" id="loginBotao" >
        </form>
        <p class="linkText">Não tem uma conta? <a href="index.php">Registre-se aqui</a>.</p>
    </div>
    
</body>
</html>