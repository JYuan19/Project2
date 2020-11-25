<?php
session_start();
if(!isset($_SESSION['userEmail-foodtiger']))
{
	header("location:index.php");
}
require('database/connection.php');
require('database/pdo.php');
$Email = $_SESSION['Email'];
require('database/mysql.php');
$sql = 'SELECT orders.cust_id, orders.foodname,orders.price,orders.quantity, payment.order_id FROM orders LEFT JOIN cus_order ON orders.cust_id = cus_order.custorder_id LEFT JOIN payment ON cus_order.order_id = payment.order_id';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
if(isset($_GET['order_id'])){
	$order_id=$_GET['order_id']; 
	$sql="select * from payment where order_id ='$order_id'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
      $id = $row['id'];
      $order_id = $row['order_id'];
      $email = $row['email'];
      $Name = $row['Name'];
      $PhoneNo = $row['PhoneNo'];
      $Address = $row['Address'];
      $payment_way = $row['payment_way'];
      $price = $row['price'];
      $time_date = $row['time_date'];
      $status = $row['status'];
      $receive = $row['receive'];
      $msg = $row['msg'];
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger - Order Detail</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
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
    <div class="container" style="text-align:center;margin-top:100px;">
    <img src="image/done.png" alt="done" style="width:150px;height:150px;">
    <h3 style="margin-top:50px;font-weight:bold;">Thank You For Your Order</h3>
    <h4 style="margin-top:30px">You order number is <?php echo  $order_id; ?></h4>
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
                <td><h5><?php echo $Name; ?></h5></td>
              </tr>
              <tr>
                <td><h5>Phone Number:</h5</td>
                <td><h5><?php echo $PhoneNo; ?></h5</td>
              </tr>
              <tr>
                <td><h5>Address: </h5></td>
                <td><h5><?php echo $Address; ?></h5></td>
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
                <td><h5><?php echo $order_id; ?></h5></td>
              </tr>
              <tr>
                <td><h5>Time:</h5</td>
                <td><h5><?php echo $time_date; ?></h5</td>
              </tr>
              <tr>
                <td><h5>Price: </h5></td>
                <td><h5>RM <?php echo $price; ?></h5></td>
              </tr>
              <tr>
                <td><h5>Message: </h5></td>
                <td><h5><?php echo $msg; ?></h5></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-2"></div>
    </div>
    <hr>
    <?php
      $sql = 'SELECT * FROM orders';
      $query  = $pdoconn->prepare($sql);
      $query->execute();
      $arr_all = $query->fetchAll(PDO::FETCH_ASSOC);		
      $result=$conn->query($sql); //run SQL
      if(isset($_GET['order_id'])){
        $cust_id=$_GET['order_id'];
        $search=" where cust_id='".$cust_id."'";
      }
      $sql="select * from orders".$search;
      $result=$conn->query($sql);
      if($result->num_rows >0){
        while($row = $result -> fetch_assoc()){       
    ?>  
    <div class="row">
      <div class="col-md-2 col-lg-2 col-sm-2"></div>
        <div class="col-md-8 col-lg-8 col-sm-8">
          <div style="background-color:#F0F0F0;">
            <h4 style="margin-left:11px;">Food Detail</h4> 
          </div>
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td style="width:52%;"><h5>Food: </h5></td>
                <td><h5><?php echo $row['foodname']; ?></h5></td>
              </tr>
              <tr>
                <td><h5>Quantity:</h5</td>
                <td><h5><?php echo $row['quantity']; ?></h5</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-2"></div>
    </div>
    <hr>
    <?php
        } 
      }
    ?>
    <?php
      $sql = 'SELECT * FROM orders WHERE order_id = '.$order_id;
      $query  = $pdoconn->prepare($sql);	
      $result=$conn->query($sql); //run SQL
    ?>
    <div class="row">
      <div class="col-md-2 col-lg-2 col-sm-2"></div>
        <div class="col-md-8 col-lg-8 col-sm-8">
          <div style="background-color:#F0F0F0;">
            <h4 style="margin-left:11px;">Payment Detail </h4> 
          </div>
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td style="width:52%;"><h5>Payment Way: </h5></td>
                <td><h5><?php echo $payment_way; ?></h5></td>
              </tr>
              <tr>
                <td><h5>Status:</h5</td>
                <td><h5><?php echo $status; ?></h5</td>
              </tr>
              <tr>
                <td><h5>Receive: </h5></td>
                <td><h5><?php echo $receive; ?></h5></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-2"></div>
    </div>
    <hr>
  </div> 
  <div style="text-align: center;margin-bottom:3%;">
    <a href="paymenthistory.php"><button type="button" class="btn btn-warning" style="color:white;">Leave</button></a>&nbsp;&nbsp;&nbsp;
    
    <?php
      if($status == 'paid' && $receive == 'yes'){
    ?>
    
    <a href="return.php?order_id=<?php echo $order_id;?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure to return your order?')">Return Order</button></a>
    
    <?php
      }
    ?>
  </div>

</body>
</html>

