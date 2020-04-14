const signUpButton = document.getElementById('signUp')
const signInButton = document.getElementById('signIn')
const container = document.getElementById('container')

signUpButton.addEventListener('click', () =>
    container.classList.add('right-panel-active')
);

signInButton.addEventListener('click', () =>
    container.classList.remove('right-panel-active')
);

var form = document.getElementById("signIn_form");
// form.onsubmit = function(event) {
//     event.preventDefault();
//     console.log(form.uname.value);
//     console.log(form.psw.value);
//     form.reset();
// }

function signIn() {
    console.log(form.uname.value);
    // document.getElementById("Username").submit();
    // document.getElementById("psw").submit();
    // console.log(document.getElementById("Username"));
}