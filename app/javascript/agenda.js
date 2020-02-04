getTime1();

function goToDay(day, month, year){
    window.location.href = 'pageChecker.php?newPage=5&month='+month+'&year='+year+'&day='+day;
}

function goToDays(month, year){
    window.location.href = 'pageChecker.php?newPage=4&month='+month+'&year='+year+'&method=days';
}

function goToMonths(month, year) {
    window.location.href = 'pageChecker.php?newPage=4&month='+month+'&year='+year+'&method=months';
}

function goToYears(month, year) {
    window.location.href = 'pageChecker.php?newPage=4&month='+month+'&year='+year+'&method=years';
}

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