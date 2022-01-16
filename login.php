<?php
    # menjaga agar tidak terjadi session hijack
    include_once "prevention.php";
    # menhubungkan koneksi dengan database
    include_once "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 ">

        <title>Fehu | Login Page</title>
        <link rel="stylesheet" type="text/css" href="navbar.css">
        <link rel="stylesheet" type="text/css" href="style.css">
`</head>
    <body>
        <nav class="navbar">
            <div class="container">
                <button type="button" class="navbar-toogle" data-toggle="collapse" data-target="#mynavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="brand"><img src="./img/logo.png" alt="./img/logo.png"></a>
            </div>
            <div class="collapse nav-col" id="mynavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                <? if(!isset($_SESSION["username"])){ ?>
                    <li><a href="login.php"><span class="log-in"></span>Login</a></li>
                <? } else { ?>
                    <li><a href="logout.php"><span class="log-out"></span>Logout</a></li>
                <? } ?>
                </ul>
            </div>
        </nav>
    </head>
    <body>
        <section class="Login">
            <div class=container>
                <form class="login-form" method="POST" action="">>
                    <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username">
                    <input type="password" name="uassword" id="inputUsername" class="form-control" placeholder="Password">
                    <button class="btn" type="submit">Login</button>
                </form>
            </div>
        </section>
    </body>
</html>