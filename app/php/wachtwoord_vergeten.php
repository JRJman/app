<?php
    session_start();
    $_SESSION['email'] = "done";
    header('Location: ../pageChecker.php?newPage=1');