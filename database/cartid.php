<?php 
require 'connection.php';
session_start();
if(isset($_POST['insert'])) {
   
  $order_id = $_POST['order_id'];
  $email = $_SESSION['userEmail-foodtiger'];
  $msg = $_POST['msg'];
  if($_POST['msg'] == ''){
    $msg = '-'; 
  }

  $sql="INSERT INTO `cus_order`(`custorder_id`, `order_id`, `email`,`status`,`msg`) VALUES ('','$order_id','$email','have not','$msg')";
  $query = mysqli_query($conn,$sql );
  echo "<script>alert('Please select Payment Option'); window.location.assign('paymentoptioncode.php');</script>";    
  } else {
    echo "<script>alert('Invalid !'); window.location.assign('../customer/confirmorder.php');</script>";
  }
?>

