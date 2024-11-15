document.getElementById('rm').addEventListener('input', function () {
    const regex = /^\d{6}$/;
    if (!regex.test(this.value) && this.value.length > 0) {
        this.setCustomValidity("Insira exatamente 6 números.");
    } else {
        this.setCustomValidity("");
    }
});