<?php
    require_once("php/action.php");
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Nurudin Lartey, Emmanuel Asaber, Infinixel">
    <title>Login | Daily Susu</title>
    <link rel="stylesheet" href="css/semantic.css">
    <link rel="stylesheet" href="css/entypo/css/entypo.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon"       href="img/fav.jpg">
</head>
<body>
    
    <div class="login">
        <h2 class="header">Login</h2>
        <form class="ui form" id="login" method="post" action="index.php" >
            <div class="field">
                <label for="">Username</label>
                <input type="text" name="username">
            </div>
            <div class="field">
                <label for="">Password</label>
                <input type="password" name="password">
            </div>

            <button class="ui button blue" name="login">Login</button>
        </form>

    </div>

<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/index.js"></script>

</body>
</html>