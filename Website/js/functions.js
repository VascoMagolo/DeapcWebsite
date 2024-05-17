function validateFormpass() {
    var oldpass = document.getElementById('oldpass').value;
    var newpass = document.getElementById('newpass').value;
    var confirmpass = document.getElementById('confirmpass').value;

    if (newpass !== confirmpass) {
        alert("Passwords do not match.");
        return false;
    }
    if (newpass === oldpass) {
        alert("New password cannot be the same as the old password.");
        return false;
    }
    return true;
}