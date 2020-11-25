<?php

session_start(); 
require('database/connection.php');
require('database/pdo.php');
$Email = $_SESSION['userEmail-foodtiger'];
require('database/mysql.php');
$sql = 'SELECT * FROM orders';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
if(isset($_GET['order_id'])){
	$order_id=$_GET['order_id']; 
	$sql="select * from payment where order_id ='$order_id' ";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
            $id = $row['id'];
            $order_id = $row['order_id'];
            $email = $row['email'];
            $Name = $row['Name'];
            $PhoneNo = $row['PhoneNo'];
            $Address = $row['Address'];
		}
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FoodTiger - Apply Return</title>
        <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/job.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="css/pic.css" rel="stylesheet">
        <script src="js/picture.js"></script>
        <link rel="stylesheet" href="css/nav-bar.css">
    </head>
    <body>
        <header>        
            <?php 
            require "navandfooter/nav.php";
            ?>        
        </header>
        <div class="container" style="margin-top:100px;">
            <form class="form-horizontal" role="form" action="database/returncode.php" method="POST" enctype="multipart/form-data">
                <h2>Apply Return Order</h2><br/>
                <h5>Fill in your information to apply return order.</h5>
                <hr>
                               
                <label for="order_id"><b>Order ID</b></label>
                <input type="text" name="order_id" id="order_id" value="<?php echo $order_id; ?>" readonly>
                
                <label for="Name"><b>Name</b></label>
                <input type="text" name="Name" id="Name" value="<?php echo $Name; ?>" readonly>

                <label for="reason"><b>Reason (Require)</b></label></br>
                <textarea placeholder=" Reason" class="w3l_summary" name="reason" rows="4" cols="50" maxlength="100" style="width:100%;" required></textarea></br>

                <label for="image"><b>Image (Require)</b></label>
                <img src="image/uknown.png" onclick="triggerClick()" id="profileDisplay" style="width:20%;">      
                <input name="foodUpload" type="file"  id="image"  onchange="displayImage(this)" style="display: none;" required> 

                <input type="hidden" name="statusreturn" id="statusreturn" value="Pending" style="display: none;"> 
                
                <div class="form-group">   
                    <div class="row ml-1">                                   
                        <div class="col-md-4">
                            <button type="submit" name="insert" id="insert" class="btn btn-info btn-block"><i class="icon-hand-right"></i>Apply</button>   
                        </div>
                        <div class="col-md-4">
                            <a href="orderdetail.php?order_id=<?php echo $order_id;?>" class="btn btn-info btn-block btn-danger">Cancel</a>
                        </div>
                    </div>
                </div> 
            </form>
        </div> 
    </body>
</html>