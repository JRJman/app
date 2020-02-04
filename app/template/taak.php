<?php
    $day = date('j');
    $month = date('n');
    $year = date('Y');

    if(!empty($_POST['day'])){
        $day = $_POST['day'];
    }
    if(!empty($_POST['month'])){
        $month = $_POST['month'];
    }
    if(!empty($_POST['year'])){
        $year = $_POST['year'];
    }

    echo '<input type="hidden" id="day" value="' . $day . '">';
    echo '<input type="hidden" id="month" value="' . $month . '">';
    echo '<input type="hidden" id="year" value="' . $year . '">';
?>

<div class="aboveSection">
    <div class="aboveSection__toTaken" onclick="terugNaarTaken()">
        <img class="aboveSection__img" src="img/arrow_links.png" alt="arrow link">
        <div class="aboveSection__years">Terug naar list</div>
    </div>
    <div class="aboveSection__time" id="time"></div>
</div>

<div class="paniek">
    <input class="paniek__knop" type="button" value="Paniek" onclick="paniek()">
</div>

<div class="plaatje">
    <div class="plaatje__tekst">plaatje als instructie<br>voor de taak</div>
</div>

<div class="uitleg">
    Uitleg voor het plaatje
</div>

<div class="timer">
    <div class="timer__time" id="timer"></div>
    <div class="timer__lines">
        <div class="timer__line--white"></div>
        <div class="timer__line--black"></div>
    </div>
</div>

<div class="bottem">
    <div class="bottem__arrows" onclick="thisPage()">
        <img src="img/arrow_links.png" alt="pijl links">
        <p>Terug</p>
    </div>
    <div class="bottem__audio">
        <img src="img/volume.png" alt="audio">
        <p>Audio</p>
    </div>
    <div class="bottem__arrows" onclick="thisPage()">
        <p>Verder</p>
        <img src="img/arrow_rechts.png" alt="pijl rechts">
    </div>
</div>