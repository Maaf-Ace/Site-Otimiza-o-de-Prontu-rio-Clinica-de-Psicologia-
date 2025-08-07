document.addEventListener("DOMContentLoaded", function() {
    if (document.getElementById("cadastraBotao")) {
        setupRegisterForm();
    }
    if (document.getElementById("loginBotao")) {
        setupLoginForm();
    }
});

//Função para alerta de registro
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

//Função para alerta de login
function setupLoginForm() {
    document.getElementById("loginBotao").addEventListener("click", function(event) {
        event.preventDefault();

        const email = document.querySelector('input[name="email"]').value;
        const senha = document.querySelector('input[name="senha"]').value;

        if (email === "" || senha === ""){ 
            alert("Todos os campos são obrigatórios!"); 
            return; 
        }

        document.getElementById("formLogin").submit();
    });
}
