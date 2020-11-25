<?php
require 'config/connection.php';
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
	header("location:../index.php");
}

  unset($_SESSION["cart"]);
  $Email = $_SESSION['userEmail-foodtiger'];
  $sql = "select * from payment where email = '$Email' ";
  $result=$conn->query($sql);
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $_SESSION['id']=$row['id'];
      $_SESSION['order_id']=$row['order_id'];
      $_SESSION['email']=$row['email'];
      $_SESSION['Name_foodtiger']=$row['Name'];
      $_SESSION['PhoneNo']=$row['PhoneNo'];
      $_SESSION['Address']=$row['Address'];
      $_SESSION['price']=$row['price'];
      $_SESSION['time_date']=$row['time_date'];
      $_SESSION['msg']=$row['msg'];
    }
  }else{
    $_SESSION['id']='';
    $_SESSION['order_id']='';
    $_SESSION['email']='';
    $_SESSION['Name_foodtiger']='';
    $_SESSION['PhoneNo']='';
    $_SESSION['Address']='';
    $_SESSION['price']='';
    $_SESSION['time_date']='';
    $_SESSION['msg']='';
  }

?>


<head>
    <title>FoodTiger - Receipt</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <script src="js/confirm.js"></script>
    <script src="js/cancel.js"></script>
</head>
<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>        
    </header>
<body>
  <div class="container" style="text-align:center;margin-top:100px;">
    <img src="../image/done.png" alt="done" style="width:150px;height:150px;">
    <h3 style="margin-top:50px;font-weight:bold;">Thank You For Your Order</h3>
    <h4 style="margin-top:50px">You order number is <?php echo  $_SESSION['order_id']?>. Please wait your order arrive.</h4>
    <hr>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-lg-2 col-sm-2"></div>
        <div class="col-md-8 col-lg-8 col-sm-8">
          <div style="background-color:#F0F0F0;">
            <h4 style="margin-left:11px;">Account Detail</h4> 
          </div>
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td><h5>Name: </h5></td>
                <td><h5><?php echo  $_SESSION['Name_foodtiger']?></h5></td>
              </tr>
              <tr>
                <td><h5>Phone Number:</h5</td>
                <td><h5><?php echo  $_SESSION['PhoneNo']?></h5</td>
              </tr>
              <tr>
                <td><h5>Address: </h5></td>
                <td><h5><?php echo  $_SESSION['Address']?></h5></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-2"></div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-2 col-lg-2 col-sm-2"></div>
        <div class="col-md-8 col-lg-8 col-sm-8">
          <div style="background-color:#F0F0F0;">
            <h4 style="margin-left:11px;">Order Detail</h4> 
          </div>
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td style="width:52%;"><h5>Order ID: </h5></td>
                <td><h5><?php echo  $_SESSION['order_id']?></h5></td>
              </tr>
              <tr>
                <td><h5>Time:</h5</td>
                <td><h5><?php echo  $_SESSION['time_date']?></h5</td>
              </tr>
              <tr>
                <td><h5>Price: </h5></td>
                <td><h5>RM <?php echo  $_SESSION['price']?></h5></td>
              </tr>
              <tr>
                <td><h5>Message: </h5></td>
                <td><h5><?php echo  $_SESSION['msg']?></h5></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-2"></div>
    </div>
  </div> 
  <div style="text-align: center;">
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg" style="color:white;">Leave</button>
  </div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Feedback?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
          <h5>Give us your feedback and suggestion now!</h5><br/>
          </div>
          <div class="form-group" style="text-align: center;">
           <img style="width: 100px;height:100px;" src="../image/logo Mad.png">
           <img style="width: 100px;height:100px;"src="../image/nor.png">
           <img style="width: 100px;height:100px;"src="../image/logo 256x256.png">
         
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <a href="../index.php" class="btn btn-danger mt-2">No Thanks</a>
        <a href="feedback.php" class="btn btn-warning mt-2" style="color:white;">Feedback</a> 
      </div>
    </div>
  </div>
</div>

</body>
</html>