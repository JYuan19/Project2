<?php  
include "database/connection.php";
session_start();  
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

  }
}

if(!isset($_SESSION['userEmail-foodtiger']))
{
	header("location:index.php");
}
?>
<!DOCTYPE html>  
<html>  
 <head>  
 <title>FoodTiger - User Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/profile.css">
 </head>  
 <body>  
  <header>        
    <?php 
      require "navandfooter/nav.php";
    ?>
  </header>
    <?php
      if(isset($_SESSION['userEmail-foodtiger']))
      {
        require "chat.php";
      }    
      ?>
    <div class="imgcontainer">
      <img src="image/avatar6.png" alt="Avatar" class="avatar" style="width:200px">
    </div>

    <div class="container">
      <h2 style="text-align:center;margin-top:30px;">Profile</h2><hr>
      <div style="text-align:right;">
        <a class="btn btn-warning" href="editprofile.php" style="text-align:right;">Edit <i class='fas fa-edit'></i></a>
      </div>
      <div class="container">
        <div class="row">
        <table class="table table-borderless" style="margin-top:3%;">
            <tbody>
              <tr>
                <td><h4 style="color:brown;">Username: </h4></td>
                <td><h4 style="font-weight: lighter;float:left;"><?php echo $Name ?></h4></td>
              </tr>
              <tr>
              <td><h4 style="color:brown;">Email: </h4></td>
                <td><h4 style="font-weight: lighter;float:left;"><?php echo $Email ?></h4></td>
              </tr>
              <tr>
                <td><h4 style="color:brown;">Phone Number: </h4></td>
                <td><h4 style="font-weight: lighter;float:left;"><?php echo $PhoneNo ?></h4></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div> 
    </div> 
    <footer style="margin-top:5%;">
        <?php 
          require "navandfooter/footer.php";
        ?>
    </footer>
  </body>  
</html>
