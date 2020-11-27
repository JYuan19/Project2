<!DOCTYPE html>
<html>

  <head>
    <title>FoodTiger</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">	
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="../css/table.css" rel='stylesheet' type='text/css'>
  </head>
  <body>
    <?php
      require('../database/pdo.php');
      require('../database/mysql.php');
      require "nav/nav.php";
      $sql = 'SELECT * FROM orders LEFT JOIN cus_order ON orders.cust_id = cus_order.custorder_id LEFT JOIN payment ON cus_order.order_id = payment.order_id';
      $query  = $pdoconn->prepare($sql);
      $query->execute();
      $arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
      $results_per_page = 6;
      $sql='SELECT * FROM orders';
      $result = mysqli_query($conn, $sql);
      $number_of_results = mysqli_num_rows($result);
      $number_of_pages = ceil($number_of_results/$results_per_page);
      if (!isset($_GET['page'])) {
        $page = 1;
      } else {
        $page = $_GET['page'];
      }
      $this_page_first_result = ($page-1)*$results_per_page;
      $sql='SELECT orders.order_id, orders.cust_id, orders.price, orders.foodname, orders.quantity, orders.email, orders.date_time, cus_order.msg, payment.receive FROM orders LEFT JOIN cus_order ON orders.cust_id = cus_order.order_id LEFT JOIN payment ON orders.cust_id = payment.order_id 
      WHERE payment.receive = "no" LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
      $result = mysqli_query($conn, $sql);
    ?>
		<div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
      <div class="row align-items-center">
        <div class="col-md-9">
          <h4 class="text-light text-uppercase mb-0">Order List</h4>
        </div>
        <div class="col-md-3">
          <ul class="navbar-nav">
            <li class="nav-item ml-md-auto ">
              <a href="adminlognout.php" class="nav-link" onclick="return confirm('Are you sure?')"><i class="fa fa-sign-out text-danger fa-lg"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>		
    		
    <div class="container" style="margin-top:5%;margin-left:30%;">
      <div class="row">
        <div class="col-md-12 col-md-offset-1">
          <div class="panel panel-default panel-table">
            <div class="panel-heading">
              <div class="row">
                <div class="col col-xs-6">
                  <h3 class="panel-title">Order List</h3>
                </div>
                <div class="col col-xs-6 text-right"></div>
              </div>
            </div>
            <div class="panel-body">
              <table class="table table-bordered" style="box-shadow: 5px 7px 25px #999;">
                <thead>
                  <tr>
                    <th>Num</th>
                    <th>Order Number</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Time & Date</th>            
                  </tr> 
                </thead>
                <tbody>
                  <tr>
                    <?php  
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {   
                    ?>
                    <td><?php echo $row['order_id'];?></td>
                    <td><?php echo $row['cust_id'];?></td>
                    <td><?php echo $row['foodname'];?></td>
                    <td>RM <?php echo $row['price'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['msg'];?></td>
                    <td><?php echo $row['date_time'];?></td>
                  </tr>
                  <?php
                      }
                    }
                      else { 
                        echo "<tr><td class='text-center' colspan='7'>No order yet </td></tr>";
                      }
                  ?>
                </tbody>
              </table>        
            </div>
            <div class="panel-footer">
              <div class="row">
                <div class="col col-xs-4"></div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">  
                      <?php
                        for ($page=1;$page<=$number_of_pages;$page++) {
                      ?>
                      <li class="page-item"><a class="page-link" href="viewhistoryOrder.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li> 
                      <?php  
                        }
                      ?>                
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>