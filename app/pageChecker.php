<?php
    $newpage = 1;

    if(!empty($_GET['newPage'])){
        $newpage = $_GET['newPage'];
    }
?>

<form action="index.php" method="post" id="submit">
    <input name="page" value="<?php echo $newpage; ?>" style="display: none">
</form>

<script>
    document.getElementById("submit").submit();
</script>


