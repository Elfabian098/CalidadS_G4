const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
    var alerta = document.getElementById("miAlerta");
    alerta.style.display = "none";
});

loginBtn.addEventListener('click', () => {
    var alerta = document.getElementById("miAlerta");
    container.classList.remove("active");
});