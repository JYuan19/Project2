<?php
include "../database/connection.php";
session_start(); 

if (isset($_SESSION['Email'])) {
	$Email = $_SESSION['Email'];
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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">   
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
                            <a href="delivery.php" class="navbar-brand text-white d-block mx-auto text-center mb-3 bottom-border pb-2">
                            FoodTiger Delivery 
                            </a>

                            <img src="../image/avatar6.png" width="50"height="50" alt="nice" class="rounded-circle mr-3 ml-2">
                            <a href="deliveryProfile.php" class="text-white ">Welcome, <?php echo $Name;?> </a>
                            <div class="border-bottom pb-3"></div>
                            <ul class="navbar-nav flex-column mt-4">
                                <li class="nav-item">
                                    <a href="delivery.php" class="nav-link text-light p-3 mb-2 sidebar-link"> <i class="fa fa-bars text-light fa-lg mr-3" aria-hidden="true"></i>
                                    Delivery List
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