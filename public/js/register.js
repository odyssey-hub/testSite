var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");
console.log('hello');


function validatePassword(){
    if(password.value != confirm_password.value) {
        console.log('no');
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        console.log('yes');
        confirm_password.setCustomValidity('');
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
