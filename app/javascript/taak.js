let timer = 10;
let first = true;

getTime1();
getTimer1();

function getTime1(){
    let d = new Date();
    let m = d.getMinutes();
    let h = d.getHours();
    if(m < 10){
        m = '0'+m;
    }

    document.getElementById('time').innerHTML = h +'<span>:</span>'+ m;
    setTimeout(getTime2, 500);
}

function getTime2(){
    let d = new Date();
    let m = d.getMinutes();
    let h = d.getHours();
    if(m < 10){
        m = '0'+m;
    }

    document.getElementById('time').innerHTML = h +'<span style="visibility: hidden">:</span>'+ m;
    setTimeout(getTime1, 500);
}

function getTimer1(){
    if(first){
        first = false;
    } else {
       timer -= 1;
    }
    if(timer < 10){
        document.getElementById('timer').innerHTML = '00<span>:</span>0'+ timer;
    } else {
        document.getElementById('timer').innerHTML = '00<span>:</span>'+ timer;
    }
    if(timer == 0){
        endTaak();
    } else {
        setTimeout(getTimer2, 500);
    }
}

function getTimer2(){
    if(timer < 10){
        document.getElementById('timer').innerHTML = '00<span style="visibility: hidden">:</span>0'+ timer;
    } else {
        document.getElementById('timer').innerHTML = '00<span style="visibility: hidden">:</span>'+ timer;
    }
    setTimeout(getTimer1, 500);
}

function endTaak(){
    let achtergrond = document.createElement('div');
    achtergrond.className = 'achtergrond';

    let tekst = document.createElement('div');
    tekst.className = 'achtergrond__tekst';
    tekst.innerHTML = 'Taak gedaan <br> klik om terug te gaan';

    achtergrond.appendChild(tekst);
    document.getElementById('wrapper').appendChild(achtergrond);

    achtergrond.addEventListener('click', terugNaarTaken);
}

function terugNaarTaken(){
    let day = document.getElementById('day').value;
    let month = document.getElementById('month').value;
    let year = document.getElementById('year').value;
    window.location.href = 'pageChecker.php?newPage=5&day=' + day + '&month=' + month + '&year=' + year;
}

function paniek(){
    let day = document.getElementById('day').value;
    let month = document.getElementById('month').value;
    let year = document.getElementById('year').value;
    window.location.href = 'pageChecker.php?newPage=7&day=' + day + '&month=' + month + '&year=' + year;
}

function thisPage(){
    window.location.href = 'pageChecker.php?newPage=6';
}