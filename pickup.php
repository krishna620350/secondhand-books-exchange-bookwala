<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css"> 
<link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pickup</title>
    <style>


body{
    background: #f5f6fa;
}

.wrapper .sidebar{
    background:dodgerblue;
    position:absolute;
    top: 1;
    left:0;
    width: 400px;
    height: 100%;
    padding: 80px ;
}
table{
  border: 4px solid black;
    height:70%;
    width: 948px;
    padding: 50px 0;
    margin:1px;
}
    </style>
</head>
<body>
    <div class="container-fluid">
        <?php
            include "include/header.php";
            
        ?>
        </div>
        <div class="wrapper">
        <div class="sidebar">
</div>
    </div>
        </div>
        <div class="table" align="right">
            <table>
                <tbody>
                    <thead>
                        <th>s.no</th>
                        <th>order id</th>
                        <th>date of delivery</th>
                        <th>date of order</th>
                        <th>buttons</th>
                    </thead>
                    <tr>
                        <td>1</td>
                        <td>123456</td>
                        <td>12/02/2001</td>
                        <td>12/01/2001</td>
                        <td>
                            <button>view</button>
                            <button>accept</button>
                            <button>reject</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>qwerty</td>
                        <td>10/05/2021</td>
                        <td>12/06/2021</td>
                        <td>
                            <button>view</button>
                            <button>accept</button>
                            <button>reject</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php
     include "include/footer.php";
    ?>
</body>
</html>