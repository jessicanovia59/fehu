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
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <?php
            function validate(){
                global $username, $password;
                if($username===''){
                    $_SESSION['error'] = 'Username must be filled!';
                    return false;
                }
                if($password===''){
                    $_SESSION['error']='Password must be filled!';
                    return false;
                }
                return true;
            }
            if(count($_POST)>0) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $rows = array();
                if(validate()) {
                    $res = $conn->query("SELECT * FROM user WHERE username LIKE '$username'");
                    while($row = mysqli_fetch_assoc($res)){
                        if(password_verify($password,$row['password'])){
                            $_SESSION['username'] = $row['username'];
                            break;
                        }
                        if(isset($_SESSION['username'])){
                            header('Location: index.php');
                        } else $_SESSION['error'] = 'Invalid credential';
                    }
                }
            }
        ?>
        <section class="container">
            <div class="card clogin">
                <div class="log-head">Login</div>
                <form class="login-form" method="POST" action="">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <div class="btn">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>