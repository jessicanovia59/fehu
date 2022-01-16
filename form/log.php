<?php
    # menhubungkan koneksi dengan database
    include_once "../db/conn.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();

    if ($result->num_rows > 0 && $user = $result->fetch_object()) {
        $_SESSION['username'] = $user;
        header("Location: ./index.php");
    } else {
        header("Location: ./login.php?err=Invalid+Credentials");
    }
?>