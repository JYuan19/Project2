<!DOCTYPE html>
<html>
<?php
  session_start();
  include "../database/connection.php";
  if (isset($_POST['login'])) {
    $Email  = $_POST['Email'];
    $Password = $_POST['Password'];
    mysqli_real_escape_string($conn, $Email);
    mysqli_real_escape_string($conn, $Password);
  $query = "SELECT * FROM admin WHERE Email = '$Email' AND (Position = 'Deliver Man' OR Position = 'Super Admin')";
  $result = mysqli_query($conn , $query) or die (mysqli_error($conn));
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $cus_id = $row['ad_id'];
      $Name = $row['Name'];
      $Email = $row['Email'];
      $pass = $row['Password'];

  
      if (password_verify($Password, $pass )) {
        $_SESSION['ad_id'] = $cus_id;
        $_SESSION['Name'] = $Name;
        $_SESSION['Email'] = $Email;
        $_SESSION['DeliveryEmail'] = $row['Email'];
        header('location: delivery.php');
      }
      else {
        echo "<script>alert('invalid username/password !');
        window.location.href= 'deliverylogin.php';</script>";

      }
    }
  }
  else {
        echo "<script>alert('invalid username/password');
        window.location.href= 'deliverylogin.php';</script>";

      }
  }   
?>
  <head>
      <title>FoodTiger</title>
      <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">	
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
      <link href="../css/delivery.css" rel="stylesheet"> 
  </head>
  <body>
  <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <div class="login100-pic js-tilt" data-tilt>
            <img src="../image/deliveryman.png" alt="IMG">
          </div>

          <form class="login100-form validate-form" name="login" action="deliverylogin.php"method="POST">
            <span class="login100-form-title">
              Delivery Man Login
            </span>

            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
              <input class="input100" type="text" name="Email" placeholder="Email">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Password is required">
              <input class="input100" type="password" name="Password" placeholder="Password">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            </div>

            <div class="container-login100-form-btn">
              <button class="login100-form-btn" type="submit" name="login" id="login">
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
