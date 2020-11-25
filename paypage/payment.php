<?php
include "config/connection.php";
if (isset($_SESSION['userEmail-foodtiger'])) {
	$Email = $_SESSION['userEmail-foodtiger'];
	$query = "SELECT * FROM customer WHERE Email = '$Email'" ; 
	$result= mysqli_query($conn , $query) or die (mysqli_error($conn));
	if (mysqli_num_rows($result) > 0 ) {
		$row = mysqli_fetch_array($result);
		$userid = $row['cus_id'];
		$Email = $row['Email'];
		$Name = $row['Name'];
    $PhoneNo = $row['PhoneNo'];
    $Address = $row['Address'];

  }}
  session_start();  
if(!isset($_SESSION['userEmail-foodtiger']))
{
	header("location:../index.php");
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>FoodTiger</title>
  <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<body>
  <header>
    <?php 
          require "navandfooter/nav.php";
        ?>
  </header>
  <div class="container" style="text-align:center">
    <div class="jumbotron" style="margin-top:5%;">
      <h1>Choose your Payment Option</h1>
    </div>
    <div class="row">
      <div class="col-md-4 col-lg-4 col-sm-4">
        <label style="width:100%;">
          <a href="index.php" class="img-fluid " style="text-decoration:none;color:black;" id="pic">
            <div class="panel panel-default card-input card card-body bg-light">
              <img src=../image/images.png alt="CreditImage">
              <hr>
              <div class="panel-heading">
                <h5>Credit Card/Debit Card</h5>
              </div>
            </div>
          </a>
        </label>
      </div>

      <div class="col-md-4 col-lg-4 col-sm-4">
        <label style="width:100%;">
          <a href="payCash.php" class="img-fluid" style="text-decoration:none;color:black;">
            <div class="panel panel-default card-input card card-body bg-light">
              <img src=../image/cashondelivery.png alt="CashImage">
              <hr>
              <div class="panel-heading">
                <h5>Cash on Delivery</h5>
              </div>
            </div>
          </a>
        </label>
      </div>
      
      <div class="col-md-4 col-lg-4 col-sm-4">
        <label style="width:100%;">
          <a href="paypalpage.php" class="img-fluid" style="text-decoration:none;color:black;">
            <div class="panel panel-default card-input card card-body bg-light">
              <img src="../image/pay.png" alt="Paypal" class="">
              <hr>
              <div class="panel-heading">
                <h5>Paypal</h5>
              </div>
            </div>
          </a>
        </label>
      </div>
    </div>
  </div>
</body>
</html>

