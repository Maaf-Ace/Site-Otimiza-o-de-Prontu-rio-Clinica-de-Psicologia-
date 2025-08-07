document.addEventListener("DOMContentLoaded", function() {
    if (document.getElementById("cadastraBotao")) {
        setupRegisterForm();
    }
    if (document.getElementById("loginBotao")) {
        setupLoginForm();
    }
});

// essa eh a funcao pro alerta de registro, hehe
function setupRegisterForm() {
    document.getElementById("cadastraBotao").addEventListener("click", function(event) {
        event.preventDefault();

        const nome = document.querySelector('input[name="nome"]').value;
        const email = document.querySelector('input[name="email"]').value;
        const senha = document.querySelector('input[name="senha"]').value;
        const confirmaSenha = document.querySelector('input[name="confirmaSenha"]').value;

        if (nome === "" || email === "" || senha === "" || confirmaSenha === ""){ 
            alert("Todos os campos são obrigatórios!"); 
            return; 
        }

        if (senha !== confirmaSenha) {
            alert("As senhas não coincidem!"); 
            return; 
        }

        document.getElementById("formRegistro").submit();
    });
}

// Salvvv, funcao pro alerta de login, hehe
function setupLoginForm() {
    document.getElementById("loginBotao").addEventListener("click", function(event) {
        event.preventDefault();

        const email = document.querySelector('input[name="email"]').value;
        const senha = document.querySelector('input[name="senha"]').value;

        if (email === "" || senha === ""){ 
            alert("Todos os campos são obrigatórios!"); 
            return; 
        }

        //precisa puxar do banco pra colocar aqui
        if (email === "teste@unicuritiba.com" && senha === "123456") {
            alert("Login bem-sucedido!");

            //isso aqui vai jogar a gente la pra pagina principal mais adiante(depois q eu fizer, kkk)
            window.location.href = "pagina_principal.php";
        } else {
            alert("Email ou senha incorretos!");
        }
    });
}
