<?php  
require "nav/nav.php";
require('../database/pdo.php');

$sql = 'SELECT id,order_id,Name,PhoneNo,Address,price,time_date,status,receive FROM payment';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id'])){
	$id=$_GET['id']; 
    $sql="select payment.id, payment.order_id, payment.email, payment.Name, payment.PhoneNo, payment.Address, payment.price, payment.time_date, payment.payment_way ,payment.status, payment.receive, cus_order.msg 
    FROM payment LEFT JOIN cus_order ON payment.order_id = cus_order.order_id ORDER BY payment.id = '$id'";
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
    <title>FoodTiger</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">	
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="../css/admin.css">
 </head>  
 <body>  
    <div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
      <div class="row align-items-center">
        <div class="col-md-9">
          <h4 class="text-light text-uppercase mb-0">Delivery Detail</h4>
        </div>
        <div class="col-md-3">
          <ul class="navbar-nav">
            <li class="nav-item ml-md-auto ">
              <a href="deliverylogout.php" class="nav-link" onclick="return confirm('Are you sure?')"><i class="fa fa-sign-out text-danger fa-lg"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container"  style="margin-top:10%;margin-left:30%;">    
        <div class="panel panel-info"> 
            <div class="panel-body">
                <form  class="form-horizontal" role="form" action="updatedelivery.php" method="POST">   

                    <div class="form-group">
                        <div class="row">
                            <label for="Order_id" class="col-md-3 control-label">Order ID:</label>
                            <div class="col-md-9">
                                <h5><?php if (isset($_GET['id'])){echo $order_id; }?></h5>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <label for="Name" class="col-md-3 control-label">Name:</label>
                            <div class="col-md-9">
                                <h5><?php if (isset($_GET['id'])){echo $Name; }?></h5>
                            </div>
                        </div>
                    </div>
                               
                    <div class="form-group">
                        <div class="row">
                            <label for="Address" class="col-md-3 control-label">Address:</label>
                            <div class="col-md-9">
                                <h5><?php if (isset($_GET['id'])){echo $Address; }?></h5>
                            </div>
                        </div>
                    </div>
                                
                    <div class="form-group">
                        <div class="row">
                            <label for="Contact Number" class="col-md-3 control-label">Phone:</label>
                            <div class="col-md-9">
                                <h5><?php if (isset($_GET['id'])){echo $PhoneNo; }?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="Price" class="col-md-3 control-label">Price:</label>
                            <div class="col-md-9">
                                <h5>RM <?php if (isset($_GET['id'])){echo $price; }?></h5>
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="Payment Way" class="col-md-3 control-label">Payment Method:</label>
                            <div class="col-md-9">
                                <h5><?php if (isset($_GET['id'])){echo $payment_way; }?></h5>
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="Status" class="col-md-3 control-label">Status:</label>
                            <div class="col-md-9">
                                <h5><?php if (isset($_GET['id'])){echo $status; }?></h5>
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="Message" class="col-md-3 control-label">Message:</label>
                            <div class="col-md-9">
                                <h5><?php if (isset($_GET['id'])){echo $msg; }?></h5>
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="Time_Date" class="col-md-3 control-label">Time & Date:</label>
                            <div class="col-md-9">
                                <h5><?php if (isset($_GET['id'])){echo $time_date; }?></h5>
                            </div>
                        </div>    
                    </div>
                        
                    <input name="id" type="text"  value="<?php if (isset($_GET['id'])){echo $id; }?>" style="display: none;">         
                    <input name="order_id" type="text"  value="<?php if (isset($_GET['id'])){echo $order_id; }?>" style="display: none;" >   
                    <input name="email" type="text"  value="<?php if (isset($_GET['id'])){echo $email; }?>"  style="display: none;">  
                    <input name="Name" type="text"  value="<?php if (isset($_GET['id'])){echo $Name; }?>"  style="display: none;">   
                    <input name="PhoneNo" type="text"  value="<?php if (isset($_GET['id'])){echo $PhoneNo; }?>"  style="display: none;">  
                    <input name="Address" type="text"  value="<?php if (isset($_GET['id'])){echo $Address; }?>"  style="display: none;">   
                    <input name="price" type="text"  value="<?php if (isset($_GET['id'])){echo $price; }?>"  style="display: none;">  
                    <input name="payment_way" type="text"  value="<?php if (isset($_GET['id'])){echo $payment_way; }?>"  style="display: none;"> 
                    <input name="time_date" type="text"  value="<?php if (isset($_GET['id'])){echo $time_date; }?>"  style="display: none;">  
                    <input name="status" type="text"  value="paid"  style="display: none;">  
                    <input name="receive" type="text"  value="yes"  style="display: none;">  
                    <input name="msg" type="text"  value="<?php if (isset($_GET['id'])){echo $msg; }?>"  style="display: none;">  
                    
                    <div class="form-group">                                       
                        <div class="col-md-offset-3 col-md-6 mt-5">
                            <button  type="submit"  name="update"class="btn btn-info btn-block" >Finish</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>            
  </body>
</html>


