<?php
    include "config.php";
    $verify = mysqli_real_escape_string($conn, $_GET['verify']);
    $update = "update admin set admin_verifyed = 1 where admin_verify = '{$verify}'";
    if(mysqli_query($conn,$update)){
        header("location: $url/admin/php/login.php");
    }else{
        echo "verification code not match any redord";
    }
?>