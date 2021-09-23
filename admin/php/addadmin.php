<?php
    include 'config.php';
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $deg = mysqli_real_escape_string($conn, $_POST['deg']);
    $password = mysqli_real_escape_string($conn, sha1($_POST['password']));
    $id="admin##".$fname.time();
    $verify=sha1(time().$fname.$dob);

    $insert = "insert into admin(admin_id,admin_first_name,admin_last_name,admin_email,admin_phone,admin_country,admin_date_of_birth,admin_degination,admin_password,admin_verifyed,admin_verify) values('{$id}','{$fname}','{$lname}','{$email}','{$phone}','{$country}','{$dob}','{$deg}','{$password}',0,'{$verify}')";

    $queary = mysqli_query($conn, $insert) or die(mysqli_error($conn)."admin insertion error");
    if($queary){
        $to = $email;
        $subject = "Verification email from Book-Wala";
        $message = "<a href = 'http://localhost/bookwala-1/admin/php/verify.php?verify={$verify}'>click to verify</a>";
        $headers = "From: bookwala@gmail.com" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($to, $subject, $message, $headers);
        echo 1;
    }else{
        echo 0;
    }
?>