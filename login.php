<?php
    # menjaga agar tidak terjadi session hijack
    include_once "./secure/prevention.php";
    # menhubungkan koneksi dengan database
    include_once "./db/conn.php";
    global $conn;

    $username;
    $password;

    if(isset($_SESSION['username'])) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 ">

        <title>Fehu | Login Page</title>
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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