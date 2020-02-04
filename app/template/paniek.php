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
    <div></div>
    <div class="aboveSection__time" id="time"></div>
</div>

<div class="tekst">
    Een begeleider is op<br>
    wegheb geduld.
</div>

<div class="button__div">
    <button class="button" onclick="terugNaarTaken()">Terug naar dagoverzicht</button>
</div>