<?php
include "config.php";
session_start();
if (isset($_SESSION['username'])) {
    header("Location: $url/admin/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <header>
            <div class="heading">
                <div><img src="../../image/logo.png" alt="#"></div>
                <h1>Book-Wala</h1>
            </div>
            <div class="admin">
                <h2>Admin-Panel</h2>
            </div>
            <div class="buttons">
                <span><button id="admin">Request</button></span>
            </div>
        </header>
    </div>
    <div class="add-admin" style="position:relative;height:90vh">
        <div class="form-info">
            <?php
                if(isset($_POST['submit'])) {
                    $email = mysqli_real_escape_string($conn,$_POST['email']);
                    $password = mysqli_real_escape_string($conn,sha1($_POST['password']));

                    $select = "select admin_id,admin_first_name,admin_email,admin_password,admin_verifyed from admin where admin_email = '{$email}' and admin_password = '{$password}' and admin_verifyed = 1";

                    $queary = mysqli_query($conn,$select) or die(mysqli_error($conn)."login failed");
                    if($queary){
                        if(mysqli_num_rows($queary)>0){
                            while($row = mysqli_fetch_assoc($queary)){
                                $_SESSION['id'] = $row['admin_id'];
                                $_SESSION['username'] = $row['admin_first_name'];
                            }
                        }
                        header("Location: $url/admin");
                    }else{
                        echo "admin not found or not verifed";
                        header('Location: $url/admin/php/login.php');
                    }
                }
            ?>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <h3>Login</h3>
                <div>
                    <input type="email" name="email" placeholder="Email id" required>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div>
                    <button name="submit">login</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <p>All rights reserved by <a href="#">krishna</a></p>
    </footer>
</body>

</html>