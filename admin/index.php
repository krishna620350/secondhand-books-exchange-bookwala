<?php
include "php/config.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: $url/admin/php/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin-Panel</title>

</head>

<body>
    <div class="container-fluid">
        <header>
            <div class="heading">
                <div><img src="../image/logo.jpg" alt="#"></div>
                <h1>Book-Wala</h1>
            </div>
            <div class="admin">
                <h2>Admin-Panel</h2>
            </div>
            <div class="buttons">
                <span><button id="admin">Add-Admin</button></span>
                <span>
                    <p><?php echo $_SESSION['username']; ?><button id="hide">Logout</button></p>
                </span>
            </div>
        </header>
    </div>
    <div class="add-admin">
        <div class="form-info">
            <button id="close">close</button>
            <form>
                <h3>Admin-Sign Up</h3>
                <div>
                    <input type="text" placeholder="Enter admin first Name" id="fname" required>
                </div>
                <div>
                    <input type="text" placeholder="Enter admin last Name" id="lname" required>
                </div>
                <div>
                    <input type="email" placeholder="Enter admin email" id="email" required>
                </div>
                <div>
                    <input type="phone" placeholder="Enter admin phone number" id="phone" required>
                </div>
                <div>
                    <input type="text" placeholder="Enter admin country" id="country" required>
                </div>
                <div>
                    <input type="date" placeholder="Enter date of birth" id="dob" required>
                </div>
                <div id="degination">

                </div>
                <div>
                    <input type="password" placeholder="Enter password" id="password" required>
                </div>
                <div>
                    <input type="password" placeholder="Enter confirm password" id="cpassword" required>
                </div>
                <div>
                    <button id="add-admin">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <nav>
        <div class="links">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Book</a>
                    <div class="sublist">
                        <ul>
                            <li><a href="#" id="add-book">Add-Book</a></li>
                            <li><a href="#">Search-Book</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#">Store</a>
                    <div class="sublist">
                        <ul>
                            <li><a href="#">Add-To-Store</a></li>
                            <li><a href="#">Search-Book-In-Store</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#">Profile</a>
                    <div class="sublist">
                        <ul>
                            <li><a href="#" id="admin-profile">Admin-profile</a></li>
                            <li><a href="#">Accounts</a></li>
                            <li><a href="#">Manager</a></li>
                            <li><a href="#">Book-Inventry_officer</a></li>
                            <li><a href="#">Book-Store_manager</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="search">
            <form>
                <input type="text" id="search" placeholder="Search by Id only">
                <button id="submit">Search</button>
            </form>
        </div>
    </nav>
    <section>
        <div class="sidebar">
            <h2>Database</h2>
            <div class="database">
                <ul>
                    <li><button class="upper">Book-Wala</button>
                        <div class="table">
                            <ul>
                                <li><button class="below" id="customer">Customer</button>
                                    <div class="column">
                                        <ul>
                                            <?php
                                            $query = mysqli_query($conn, "SHOW COLUMNS FROM customber") or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo "<li class='sub-below'>{$row['Field']}</li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                                <li><button class="below" id="book-store">Book Store</button>
                                    <div class="column">
                                        <ul>
                                            <?php
                                            $query = mysqli_query($conn, "SHOW COLUMNS FROM store") or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo "<li class='sub-below'>{$row['Field']}</li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                                <li><button class="below" id="order">Order</button>
                                    <div class="column">
                                        <ul>
                                            <?php
                                            $query = mysqli_query($conn, "SHOW COLUMNS FROM order_manage") or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo "<li class='sub-below'>{$row['Field']}</li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                                <li><button class="below" id="payment">Payment</button>
                                    <div class="column">
                                        <ul>
                                            <!-- <?php
                                                    // $query = mysqli_query($conn, "SHOW COLUMNS FROM payment") or die(mysqli_error($conn));
                                                    // while ($row = mysqli_fetch_array($query)) {
                                                    //     echo "<li class='sub-below'>{$row['Field']}</li>";
                                                    // }
                                                    ?> -->
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="contant">
            <div id="table-head">
                <div class="messege">
                    <p>All tables are shown Hear</p>
                </div>
            </div>
            <div id="tables"></div>
        </div>
    </section>
    <div class="view">
        <div class="view-contant">
            <button class="close-button">close</button>
            <div class="view-data"></div>
        </div>
    </div>
    <footer>
        <p>All rights reserved by <a href="#">krishna</a></p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> <!-- this is a cdn link of jquery-3.6.0-->
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/script.js"></script>
</body>

</html>