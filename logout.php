<?php
    include_once "conn.php";
    session_unset($_SESSION['username']);
    session_destroy($_SESSION['username']);
    header("Location: index.php");
?>