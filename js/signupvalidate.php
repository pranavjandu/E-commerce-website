function validate() {
    password = document.getElementById("t2").value;
    passwordconfirm = document.getElementById("t5").value;

    if (password != passwordconfirm)
        alert("Passwords doesn't match. Enter again")
}