<?php
    include 'config.php';
    session_start();
    session_unset();
    session_destroy();
    // header("location: $url/admin/php/login.php");
    echo $url. "/admin/php/login.php";
?>