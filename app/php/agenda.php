<?php

    $month = date('n');
    $year = date('Y');
    $method = 'days';

    if(!empty($_POST['month'])){
        $month = $_POST['month'];
    }
    if(!empty($_POST['year'])){
        $year = $_POST['year'];
    }
    if(!empty($_POST['method'])){
        $method = $_POST['method'];
    }
    switch ($method){
        case 'days':
            makeAgendaDays($month,$year);
            break;

        case 'months':
            makeAgendaMonths($month,$year);
            break;

        case 'years':
            makeAgendaYears($month,$year);
            break;
    }

    function makeAboveSection($month, $year, $method){
        echo '<div class="aboveSection">';
        switch ($method){
            case 'days':
                echo '<div class="aboveSection__toYears" onclick="goToMonths('. $month .','. $year .')"><img class="aboveSection__img" src="img/arrow_links.png" alt="arrow link"><div class="aboveSection__years">'.$year.'</div></div>';
                break;

            case 'months':
                echo '<div class="aboveSection__toYears" onclick="goToYears('. $month .','. $year .')"><img class="aboveSection__img" src="img/arrow_links.png" alt="arrow link"><div class="aboveSection__years">'.$year.'</div></div>';
                break;

            case 'years':
                echo '<div></div>';
                break;
        }
        echo '<div class="aboveSection__time" id="time"></div>';
        echo '</div>';
    }

    function makeAgendaDays($month, $year){
        makeAboveSection($month,$year,'days');
        makeButtonsDays($month,$year);

        $dagen = ['ma', 'di', 'wo', 'do', 'vr', 'za', 'zo'];

        echo '<table class="table">';
        echo '<tr>';
        for($i=0; $i<count($dagen); $i++){
            echo '<th class="table__item--head">' . $dagen[$i] . '</th>';
        }
        echo '</tr>';

        if($month == 1){
            $daysPreviousMonth = date('t', mktime(0,0,0,12,1,$year-1));
        } else {
            $daysPreviousMonth = date('t', mktime(0,0,0,$month-1,1,$year));
        }
        $nextMonthBoolean = false;
        $previusMonthBoolean = true;
        $dayMonthName = date('N', mktime(0,0,0,$month,1,$year))-1;
        $daysPreviousMonthNumber = $daysPreviousMonth-$dayMonthName;
        $daysThisMonth = date('t', mktime(0,0,0,$month,1,$year));
        $daysNextMonth = 1;
        $days = 1;

        for($i1=0; $i1<6; $i1++){
            echo '<tr class="table__row">';
            for($i2=0; $i2<7; $i2++){

                if($daysPreviousMonthNumber >= $daysPreviousMonth){
                    $previusMonthBoolean = false;
                }
                if($days > $daysThisMonth){
                    $nextMonthBoolean = true;
                }

                $vars = getGoToVariables($month, $year);
                $previousMonth = $vars[0];
                $previousYear = $vars[1];
                $nextMonth = $vars[2];
                $nextYear = $vars[3];

                if($previusMonthBoolean){
                    $daysPreviousMonthNumber++;
                    echo '<td class="table__item table__item--grey" onclick="goToDays('.$previousMonth.','.$previousYear.')">' . $daysPreviousMonthNumber . '</td>';
                } else if($nextMonthBoolean) {
                    echo '<td class="table__item table__item--grey" onclick="goToDays('.$nextMonth.','.$nextYear.')">' . $daysNextMonth . '</td>';
                    $daysNextMonth++;
                } else {
                    if($days == date('j') && $month == date('n') && $year == date('Y')){
                        echo '<td class="table__item--today" onclick="goToDay(' . $days . ',' . $month . ','. $year .')">' . $days . '</td>';
                    } else {
                        echo '<td class="table__item" onclick="goToDay(' . $days . ',' . $month . ','. $year .')">' . $days . '</td>';
                    }
                    $days++;
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    }
    function makeButtonsDays($month, $year){

        $monthName = date('F', mktime(0,0,0,$month,1,$year));
        $vars = getGoToVariables($month, $year);

        $previousMonth = $vars[0];
        $previousYear = $vars[1];
        $nextMonth = $vars[2];
        $nextYear = $vars[3];

        echo '<section class="above">';
        echo '<img class=above__img src="img/arrow_links.png" alt="pijl links" onclick="goToDays('.$previousMonth.','.$previousYear.')">';
        echo '<div class="above__tekst">' . $monthName . ' ' . $year .  '</div>';
        echo '<img class=above__img src="img/arrow_rechts.png" alt="pijl rechts" onclick="goToDays('.$nextMonth.','.$nextYear.')">';
        echo '</section>';
    }
    function getGoToVariables($month, $year){

        $previousYear = $year;
        $nextYear = $year;

        if($month == 1){
            $previousMonth = date('n',mktime(0,0,0,12,1,$year-1));
            $nextMonth = date('n',mktime(0,0,0,$month+1,1,$year));
            $previousYear--;
        } else if($month == 12){
            $previousMonth = date('n',mktime(0,0,0,$month-1,1,$year-1));
            $nextMonth = date('n',mktime(0,0,0,1,1,$year+1));
            $nextYear++;
        } else {
            $previousMonth = date('n',mktime(0,0,0,$month-1,1,$year));
            $nextMonth = date('n',mktime(0,0,0,$month+1,1,$year));
        }

        $array = array($previousMonth,$previousYear,$nextMonth,$nextYear);
        return $array;
    }


    function makeAgendaMonths($month, $year){
        makeAboveSection($month,$year,'months');
        makeButtonsMonths($year);

        $maanden = ['jan', 'feb', 'mrt', 'apr', 'mei', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'dec'];
        $jaar = $year;
        $number = 0;
        $after = false;

        echo '<table class="table-month">';
        for($i1=0; $i1<4; $i1++){
            echo '<tr>';
            for($i2=0; $i2< 4;$i2++) {
                $extraNumber = $number+1;
                if($jaar == date('Y') && $number+1 == date('n')){
                    echo '<td class="table-month__item--today" onclick="goToDays('.$extraNumber.','.$jaar.')">' . $maanden[$number] . '</td>';
                } else if(!$after){
                    echo '<td class="table-month__item" onclick="goToDays('.$extraNumber.','.$jaar.')">' . $maanden[$number] . '</td>';
                } else {
                    echo '<td class="table-month__item table-month__item--after" onclick="goToMonths('.$extraNumber.','.$jaar.')">' . $maanden[$number] . '</td>';
                }
                $number++;
                if($number == 12){
                    $number = 0;
                    $after = true;
                    $jaar += 1;
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    }
    function makeButtonsMonths($year){


    $previousYear = $year-1;
    $nextYear = $year+1;

    echo '<section class="above--months">';
    echo '<img class=above__img src="img/arrow_links.png" alt="pijl links" onclick="goToMonths(1,'.$previousYear.')">';
    echo '<div class="above__tekst">' . $year .  '</div>';
    echo '<img class=above__img src="img/arrow_rechts.png" alt="pijl rechts" onclick="goToMonths(1,'.$nextYear.')">';
    echo '</section>';
}


    function makeAgendaYears($month, $year){
        makeAboveSection($month,$year,'years');
        makeButtonsYears($year);

        $jaar = $year;
        $jaarEnd = 0;

        $checker = false;
        while (!$checker){
            $array = str_split($jaar,1);
            if($array[3] == 0){
                $jaarEnd = $jaar+10;
                $checker = true;
            } else {
                $jaar--;
            }
        }

        $after = false;

        echo '<table class="table-years">';
        for($i1=0;$i1<4;$i1++){
            echo '<tr>';
            for($i2=0;$i2<4;$i2++){
                if($jaar == date('Y') && !$after){
                    echo '<td class="table-years__item--today" onclick="goToMonths(1,' . $jaar . ')">' . $jaar . '</td>';
                } else if($after){
                    echo '<td class="table-years__item table-years__item--after" onclick="goToYears(1,' . $jaar . ')">' . $jaar . '</td>';
                } else {
                    echo '<td class="table-years__item" onclick="goToMonths(1,' . $jaar . ')">' . $jaar . '</td>';
                }
                $jaar++;

                if($jaarEnd <= $jaar){
                    $after = true;
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    }
    function makeButtonsYears($year){

        $jaar1 = $year;
        $jaar2 = $year;
        $checker = false;

        while (!$checker){
            $array = str_split($jaar1,1);
            if($array[3] == 0){
                $jaar2 = $jaar1 + 9;
                $checker = true;
            } else {
                $jaar1--;
            }
        }

        $yearText = $jaar1 . '-' . $jaar2;

        $previousYear = $year-10;
        $nextYear = $year+10;

        echo '<section class="above--years">';
        echo '<img class=above__img src="img/arrow_links.png" alt="pijl links" onclick="goToYears(1,'.$previousYear.')">';
        echo '<div class="above__tekst">' . $yearText .  '</div>';
        echo '<img class=above__img src="img/arrow_rechts.png" alt="pijl rechts" onclick="goToYears(1,'.$nextYear.')">';
        echo '</section>';
    }
