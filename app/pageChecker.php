<?php
    $newpage = 1;
    $day = date('j');
    $month = date('n');
    $year = date('Y');
    $method = 'days';

    if(!empty($_GET['newPage'])){
        $newpage = $_GET['newPage'];
    }
    if(!empty($_GET['day'])){
        $day = $_GET['day'];
    }
    if(!empty($_GET['month'])){
        $month = $_GET['month'];
    }
    if(!empty($_GET['year'])){
        $year = $_GET['year'];
    }
    if(!empty($_GET['method'])){
        $method = $_GET['method'];
    }

?>

<form action="index.php" method="post" id="submit">
    <input type="hidden" name="page" value="<?php echo $newpage; ?>">
    <input type="hidden" name="day" value="<?php echo $day; ?>">
    <input type="hidden" name="month" value="<?php echo $month; ?>">
    <input type="hidden" name="year" value="<?php echo $year; ?>">
    <input type="hidden" name="method" value="<?php echo $method; ?>">
</form>

<script>
    document.getElementById("submit").submit();
</script>


