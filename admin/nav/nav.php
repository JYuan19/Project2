<?php
include "../database/connection.php";
session_start(); 

if (isset($_SESSION['adminEmail'])) {
	$Email = $_SESSION['adminEmail'];
	$query = "SELECT * FROM admin WHERE Email = '$Email'" ; 
	$result= mysqli_query($conn , $query);
	if (mysqli_num_rows($result) > 0 ) {
        $row = mysqli_fetch_array($result);
        $ad_id = $row['ad_id'];
		$Email = $row['Email'];
		$Name = $row['Name'];
        $Position = $row['Position'];
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">	
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">  
    </head>
    <body>
        <nav class="navbar navbar-expand-md  navbar-light">
            <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse " id="myNavbar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-xl-2 col-md-4 sidebar fixed-top">
                            <a href="adminhome.php" class="navbar-brand text-white d-block mx-auto text-center mb-3 bottom-border pb-2">
                            FoodTiger
                            </a>

                            <img src="../image/avatar6.png" width="50"height="50" alt="nice" class="rounded-circle mr-3 ml-2">
                            <a href="adminProfile.php" class="text-white ">Welcome, <?php echo $Name;?> </a>
                            <div class="border-bottom pb-3"></div>
                            <ul class="navbar-nav flex-column mt-4">
                                <li class="nav-item">
                                    <a href="adminhome.php" class="nav-link text-light p-3 mb-2 sidebar-link "> <i class="fa fa-home text-light fa-lg mr-3" aria-hidden="true"></i> Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="viewCustomerAcc.php" class="nav-link text-light p-3 mb-2 sidebar-link"><i class="fa fa-user text-light fa-lg mr-3" aria-hidden="true"></i> 
                                    Customer Management
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="food/food.php" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-shopping-cart text-light fa-lg mr-3" aria-hidden="true"></i> 
                                    Food Management
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="food/category.php" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-table text-light fa-lg mr-3" aria-hidden="true"></i> 
                                    Category Management
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Blogmanage.php" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-file text-light fa-lg mr-3" aria-hidden="true"></i> 
                                    Blog Management
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="viewhistoryOrder.php" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-bars text-light fa-lg mr-3" aria-hidden="true"></i>
                                    Order List
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="viewPayhistory.php" class="nav-link text-light p-3 mb-2 sidebar-link"><i class="fa fa-money text-light fa-lg mr-3" aria-hidden="true"></i>
                                    Payment List
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="viewChatList.php" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-weixin text-light fa-lg mr-3" aria-hidden="true"></i>
                                    Online Chat List
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="viewfeedback.php" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-wrench text-light fa-lg mr-3" aria-hidden="true"></i> 
                                    Feedback
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="returnorderlist.php" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-envelope text-light fa-lg mr-3" aria-hidden="true"></i>
                                    Request Return List
                                    </a>
                                </li>
                            </ul>
                        </div>               
                    </div>
                </div>
            </div>
        </nav>
    </body>
</html>