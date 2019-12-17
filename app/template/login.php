<?php
    $mistakes = '';
    $username = '';
    $password = '';
    $eye = '1';
    $email = '';

    session_start();
    if(isset($_SESSION['wrong'])){
        $mistakes = $_SESSION['wrong'];
        if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['eye'])){
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
            $eye = $_SESSION['eye'];
        }
    } else if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
    }
    session_destroy();
?>

<div class="top"></div>
<section class="logo">
    <p class="logo__tekst">Logo</p>
</section>
<p class="appname">AutismeList</p>
<form class="login" action="php/login.php">
    <div class="login__mistake" id="mistake" style="display:<?php if($mistakes== 'fout'){echo 'block';}else{echo"none";} ?>">
        <p>Foute username of password</p>
    </div>
    <div class="login__email" id="email" style="display:<?php if($email== 'done'){echo 'block';}else{echo"none";} ?>">
        <p>Email verstuurd</p>
    </div>
    <label for="username" class="login__labels">Username</label><br>
    <input type="text" name="username" id="username" class="login__inputs" placeholder="Username" value="<?php echo $username?>" style="border:<?php if($mistakes == 'fout'){echo 'red';}else{echo"white";} ?> solid 1px"><br><br><br>
    <label for="wachtwoord" class="login__labels">Password</label><br>
    <input type="password" name="password" id="wachtwoord" class="login__inputs" value="<?php echo $password?>" style="border:<?php if($mistakes == 'fout'){echo 'red';}else{echo"white";} ?> solid 1px"><br>
    <input type="hidden" name="eye" value="<?php echo $eye;?>" id="hiddenEye">
    <img src="img/eye<?php echo $eye;?>.png" alt="reveal" class="login__img--eyes" id="eye" onclick="eyeChancer()">
    <a href="pageChecker.php?newPage=2" class="login__wachtwoord-vergeten">Wachtwoord Vergeten</a><br>
    <input type="submit" value="Login" class="login__submit">
</form>
