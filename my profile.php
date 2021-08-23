<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>

    <!-- LINKS FOR STYLESHEETS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .BookWala-profile .card .card-header .profile_img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin: 10px auto;
    border: 10px black;
    border-radius: 50%;
}
        body {
    background: #0f0f0f;
    background: -webkit-linear-gradient(to right, #089afc, #054fee);
    background: linear-gradient(to right, #0717f5, #07ebf3); 
    padding: 0;
    margin: 0;
    font-family: 'Lato', sans-serif;
    color: #000;
    }
    .BookWala-profile .card h3 {
    font-size: 20px;
    font-weight: 700;
}
    .BookWala-profile .table th,
    .BookWala-profile .table td {
    font-size: 14px;
    padding: 5px 10px;
    color: #000;
}
    </style>
<!-- Bootstrap CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<!-- Font Awesome CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <title>Document</title>

</head>

<body>

    <div class="container-fluid" id="outermost-container">

        <!-- Header -->
        <?php
        include "include/header.php";
        ?>
        <div class="BookWala-profile py-4">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="card shadow-sm">
                <div class="card-header bg-transparent text-center">
                  <img class="profile_img" src="mukul.jpg" alt="image">
                  <h3><center><u>Mukul Mahajan</u></center></h3>
                </div> 
                <div class="card-body">
                  <p class="mb-0" align="center"><strong class="pr-1">BookWala ID:</strong>321000001</p>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card shadow-sm">
                <div class="card-header bg-transparent border-0">
                  <h3 class="mb-0" align="center"><i class="far fa-clone pr-1"></i>General Information</h3>
                </div>
                <div class="card-body pt-0">
                  <table class="table table-bordered" align="center"width="22%">
                    <tr>
                      <th width="30%">Email</th>
                      <td width="2%">:</td>
                      <td>mukul@gmail.com</td>
                    </tr>
                    <tr>
                      <th width="30%">Phone No.</th>
                      <td width="2%">:</td>
                      <td> 91+ 98XXXXXXX75</td>
                    </tr>
                    <tr>
                      <th width="30%">Address</th>
                      <td width="2%">:</td>
                      <td>XX data colony bhopal,madhya pradesh</td>
                    </tr>
                    <tr>
                      <th width="30%">Pincode</th>
                      <td width="2%">:</td>
                      <td>462030</td>
                    </tr>
                    <tr>
                      <th width="30%">City</th>
                      <td width="2%">:</td>
                      <td>Bhopal</td>
                    </tr>
                    <tr>
                      <th width="30%">State</th>
                      <td width="2%">:</td>
                      <td>Madhya Pradesh</td>
                    </tr>
                    <tr>
                      <th width="30%">Country</th>
                      <td width="2%">:</td>
                      <td>India</td>
                    </tr>
                     </table>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- Including Footer-->
        <?php
        include "include/footer.php";
        ?>

        


    </div> <!-- END OF OUTERMOST CONTAINER-->

</body>

<script src="js/jquery-3.6.0.js"></script>
<script>
</script>
</html>