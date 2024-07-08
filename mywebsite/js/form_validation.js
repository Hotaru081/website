function validateForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username.trim().length < 8) {
        alert('Username should have at least 8 characters');
        return false;
    }

    if (password.trim().length < 8) {
        alert('Password should have at least 8 characters');
        return false;
    }

    return true;
}
