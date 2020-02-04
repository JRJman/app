<?php

function makeTableHead(){
    $array = ['ma', 'di', 'wo', 'do', 'vr', 'za', 'zo'];
    for ($i=0; $i<count($array); $i++) {
        echo '<th class="dayChooser__table--item_head">' . $array[$i] . '</th>';
    }
}

function makeTableInhoud($year,$month,$day){

    $dayAwayFromBeginWeek = date('N',mktime(1,1,1,$month,$day,$year))-1;

    $chosenDay = $day;
    $day = date('j',mktime(1,1,1,$month,$day-$dayAwayFromBeginWeek,$year));

    if($chosenDay-$dayAwayFromBeginWeek<0){
        $month -= 1;
    }

    $daysInMonth = date('t',mktime(1,1,1,$month,$day,$year));

    for ($i=0; $i<7; $i++) {
        if($day == $chosenDay) {
            echo '<td class="dayChooser__table--item dayChooser__table--item_chosen" onclick="goToDay('.$day.','.$month.','.$year.')">' . $day . '</td>';
        }else if($day == date('j') && $month == date('n') && date('Y')) {
            echo '<td class="dayChooser__table--item dayChooser__table--item_today" onclick="goToDay('.$day.','.$month.','.$year.')">' . $day . '</td>';
        } else {
            echo '<td class="dayChooser__table--item" onclick="goToDay('.$day.','.$month.','.$year.')">' . $day . '</td>';
        }
        $day++;
        if($day > $daysInMonth){
            $day = 1;
            $month += 1;
        }
    }
}

function pastWeek($year,$month,$day){

    $day -= 7;
    if($day<1){
        $month -= 1;
        if($month<1){
            $year -=1;
            $month = 12;
        }
        $day = date('t',mktime(1,1,1,$month,1,$year));
    }

    $daysAwayOfEndWeek = date('N',mktime(1,1,1,$month,$day,$year));

    if($daysAwayOfEndWeek >= 7){
        $daysAwayOfEndWeek = 0;
    }

    $day -= $daysAwayOfEndWeek;

    echo $day . ',' . $month . ',' . $year;
}

function nextWeek($year,$month,$day){

    $day += 7;
    $daysInMonth = date('t',mktime(1,1,1,$month,1,$year));

    if($day > $daysInMonth){
        $month += 1;
        $day = 1;
        if($month > 12){
            $year += 1;
            $month = 1;
        }
    }

    $daysAwayOfEndWeek = 8-date('N',mktime(1,1,1,$month,$day,$year));
    if($daysAwayOfEndWeek >= 7){
        $daysAwayOfEndWeek = 0;
    }

    $day += $daysAwayOfEndWeek;

    echo $day . ',' . $month . ',' . $year;
}

function makeTakenInhoud($day,$month,$year){
    include 'php/taken.php';

    $first = true;
    foreach($taken as $taak){
        $checker = timeTaakChecker($day,$month,$year,$taak,$first);
        if($checker){
            echo '<div class="taak" onclick="goToTaak()">';
        } else {
            echo '<div class="taak">';
        }
        if($day == date('j') && $month == date('n') && $year == date('Y')){
            $timeArray = str_split($taak['tijd'],1);
            $hours = 0;
            $minutes = 0;
            if(count($timeArray) == 4){
                $hours = $timeArray[0];
                $minutes = $timeArray[2] . $timeArray[3];
            } else {
                $hours = $timeArray[0] . $timeArray[1];
                $minutes = $timeArray[3] . $timeArray[4];
            }

            if($hours<=date('G') && $minutes<date('i')){
                echo '<div class="taak__accept"><img src="img/check.png" alt="done"></div>';
            } else if($first){
                echo '<div class="taak__accept"><img src="img/uitroepteken.png" alt="todo"></div>';
                $first = false;
            } else {
                echo '<div class="taak__accept"></div>';
            }

        } else if(date('U') > date('U',mktime(1,1,1,$month,$day,$year))){
            echo '<div class="taak__accept"><img src="img/check.png" alt="done"></div>';
        } else {
            echo '<div class="taak__accept"></div>';
        }
        echo '<div class="taak__titel">' . $taak['titel'] . '</div>';
        echo '<div class="taak__tijd">' . $taak['tijd'] . '</div>';
        echo '</div>';
    }
}

function timeTaakChecker($day,$month,$year,$taak,$first){
    $checker = false;

    if($day == date('j') && $month == date('n') && $year == date('Y')) {
        $timeArray = str_split($taak['tijd'], 1);
        $hours = 0;
        $minutes = 0;
        if (count($timeArray) == 4) {
            $hours = $timeArray[0];
            $minutes = $timeArray[2] . $timeArray[3];
        } else {
            $hours = $timeArray[0] . $timeArray[1];
            $minutes = $timeArray[3] . $timeArray[4];
        }
        if($hours<=date('G') && $minutes<date('i')) {
            $checker = false;
        } else if($first){
            $checker = true;
        }
    }

    return $checker;
}