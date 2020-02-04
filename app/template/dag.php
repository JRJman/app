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

    include 'php/dag.php';
?>

<div class="aboveSection">
    <div class="aboveSection__toMonths" onclick="goToMonthPreview(<?php echo $month . ',' . $year ?>)">
        <img class="aboveSection__img" src="img/arrow_links.png" alt="arrow link">
        <div class="aboveSection__years"><?php echo date('F',mktime(1,1,1,$month,$day,$year))?></div>
    </div>
    <div class="aboveSection__time" id="time"></div>
</div>

<div class="aboveMonth">
    <?php echo date('F',mktime(1,1,1,$month,$day,$year))?>
</div>

<div class="dayChooser">
    <img class="dayChooser__img" src="img/arrow_links.png" alt="arrow link" onclick="goToDay(<?php pastWeek($year,$month,$day) ?>)">
    <table class="dayChooser__table">
        <tr>
            <?php
                makeTableHead();
            ?>
        </tr>
        <tr>
            <?php
                makeTableInhoud($year,$month,$day);
            ?>
        </tr>
    </table>
    <img class="dayChooser__img" src="img/arrow_rechts.png" alt="arrow rechts" onclick="goToDay(<?php nextWeek($year,$month,$day) ?>)">
</div>

<div class="taken">
    <?php
        makeTakenInhoud($day,$month,$year);
    ?>
</div>