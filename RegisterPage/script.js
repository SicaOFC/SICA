document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('nascimento').max = new Date().toISOString().split("T")[0];
});

document.getElementById('rm').addEventListener('input', function () {
    const regex = /^\d{6}$/;
    if (!regex.test(this.value) && this.value.length > 0) {
        this.setCustomValidity("Insira exatamente 6 números.");
    } else {
        this.setCustomValidity("");
    }
});

document.getElementById('nome').addEventListener('input', function () {
    const regex = /^[A-Za-z]+( [A-Za-z]+)*$/;
    if (!regex.test(this.value) && this.value.length > 0) {
        this.setCustomValidity("Insira apenas letras e não insira mais que um espaço seguido.");
    } else {
        this.setCustomValidity("");
    }
});

document.getElementById('email').addEventListener('input', function () {
    const regex = /^(?=[A-Za-z0-9._]{3,}$)(?!.*[_.]{2})[A-Za-z0-9]+([._][A-Za-z0-9]+)*$/;
    if (!regex.test(this.value) && this.value.length > 0) {
        this.setCustomValidity("Insira pelo menos 3 letras, sem espaços e apenas os caracteres especiais são (.) e (_) permitidos.");
    } else {
        this.setCustomValidity("");
    }
});