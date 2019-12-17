let loginInputs = document.getElementsByClassName('login__inputs');
let mistakeTekst = document.getElementById('mistake');
let eyeImg = document.getElementById('eye');
let eyeValue = document.getElementById('hiddenEye');

let eye = eyeValue.value;

for(let i=0;i<loginInputs.length;i++){
    loginInputs[i].addEventListener('focus', function() {
        loginInputs[i].placeholder = '';
        removeRed();
    });
}

eyeChecker();

function removeRed(){
    mistakeTekst.style.display = "none";
    for(let i=0;i<loginInputs.length;i++){
        loginInputs[i].style.borderColor = 'white';
    }
}

function eyeChancer() {
    if(eye == 1){
        eye = 2;
        eyeValue.value = 2;
        eyeImg.src = 'img/eye2.png';
        loginInputs[1].type = 'text';
    } else if(eye == 2) {
        eye = 1;
        eyeValue.value = 1;
        eyeImg.src = 'img/eye1.png';
        loginInputs[1].type = 'password';
    }
}

function eyeChecker() {
    if(eyeValue.value == "1"){
        loginInputs[1].type = 'password';
    } else {
        loginInputs[1].type = 'text';
    }
}