getTime1();

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

function terugNaarTaken(){
    let day = document.getElementById('day').value;
    let month = document.getElementById('month').value;
    let year = document.getElementById('year').value;
    window.location.href = 'pageChecker.php?newPage=5&day=' + day + '&month=' + month + '&year=' + year;
}
