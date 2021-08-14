  
<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'bookwala';

    $conn = mysqli_connect($host, $username, $password, $database) or die(mysqli_connect_error()."\nplease check your connection");

    /*
        folder stuctures
        create a folder bookWala in htdocs folder in xampp install folder
        xampp/htdocs/bookWala/
    */
    $url = 'http://localhost/bookWala/'
?>
