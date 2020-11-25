<?php
session_start();
include "../database/connection.php";
if (isset($_POST['login'])) {
  $Email  = $_POST['Email'];
  $Password = $_POST['Password'];
  mysqli_real_escape_string($conn, $Email);
  mysqli_real_escape_string($conn, $Password);
  $query = "SELECT * FROM admin WHERE Email = '$Email'";
  $result = mysqli_query($conn , $query) or die (mysqli_error($conn));
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $ad_id = $row['ad_id'];
      $Name = $row['Name'];
      $Email = $row['Email'];
      $pass = $row['Password'];

  
      if (password_verify($Password, $pass )) {
        $_SESSION['ad_id'] = $ad_id;
        $_SESSION['Name'] = $Name;
        $_SESSION['Email'] = $Email;
        $_SESSION['Superadmin'] = $row['Email'];
        $_SESSION['SuperadminName'] = $row['Email'];
        header('location: adminhome.php');
      }
      else {
        echo "<script>alert('invalid username/password !');
        window.location.href= 'adminlogin.php';</script>";

      }
    }
  }
  else {
        echo "<script>alert('invalid username/password');
        window.location.href= 'adminlogin.php';</script>";

      }
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FoodTiger</title>
  <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/adminlogin.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <img src="../image/logo 256x256.png" alt="logo" class="logo" style="width:8%;height:auto;">
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Super Admin Login</h1>
            <form name="login" action="adminlogin.php" method="POST">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="Email" id="Email" class="form-control" placeholder="email@example.com">
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="Password" id="Password" class="form-control" placeholder="enter your passsword">
              </div>
              <button name="login" id="login" class="btn btn-block login-btn" type="submit" >Login</button>
            </form>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="../image/login.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
