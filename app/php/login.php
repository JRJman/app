<?php
session_start();

$username = $_GET['username'];
$password = $_GET['password'];
$eye = $_GET['eye'];

if($username == 'JRJman' && $password == 'JRJman'){
    header("Location: ../pageChecker.php?newPage=3");
    $_SESSION['wrong'] = 'goed';
    $_SESSION['username'] = '';
    $_SESSION['password'] = '';
    $_SESSION['eye'] = '1';
} else {
    header("Location: ../index.php");
    $_SESSION['wrong'] = 'fout';
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['eye'] = $eye;
}