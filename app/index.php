<?php
    if(empty($_POST['page'])){
        header("Location: pageChecker.php");
    } else {
        $page = $_POST['page'];
        include 'php/pageSwitch.php';
    }
?>

<!doctype html>
<html>
<head>
    <title><?php echo $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/<?php echo $pagina?>.css" rel="stylesheet">
</head>
<body>
    <div class="wrap">
        <?php include 'template/' . $pagina . '.php'?>
    </div>
    <script src="javascript/<?php echo $pagina?>.js"></script>
</body>
</html>