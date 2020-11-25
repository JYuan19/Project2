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
    <link href="../css/main.css" rel="stylesheet"> 

    
</head>
    <header>
        <?php
            include "../database/connection.php";
            require('nav/nav.php');
        ?>
    </header>
    <body>
        <div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h4 class="text-light text-uppercase mb-0">Admin Management</h4>
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
        <div class="container" style="text-align:center;margin-top:10%;">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-4"></div>
                <div class="col-md-4 col-lg-4 col-sm-4">
                    <label style="width:100%;">
                    <a href="viewadmin.php" class="img-fluid " style="text-decoration:none;color:black;" id="pic">
                        <div class="panel panel-default card-input card card-body bg-light">
                            <i class="fa fa-user-circle fa-lg mr-3 mt-3 mb-3 ml-3" aria-hidden="true" style="font-size:10em;"></i>
                        <hr>
                        <div class="panel-heading">
                            <h5>View Worker</h5>
                        </div>
                        </div>
                    </a>
                    </label>
                </div>

            <div class="col-md-4 col-lg-4 col-sm-4">
                <label style="width:100%;">
                <a href="addAdmin.php" class="img-fluid" style="text-decoration:none;color:black;">
                    <div class="panel panel-default card-input card card-body bg-light">
                        <i class="fa fa-address-card-o fa-lg mr-3 mt-3 mb-3 ml-3" aria-hidden="true" style="font-size:10em;"></i>
                    <hr>
                    <div class="panel-heading">
                        <h5>Add Admin</h5>
                    </div>
                    </div>
                </a>
                </label>
            </div>
            <div class="col-md-2 col-lg-2 col-sm-2"></div>
            </div>
        </div>
    </body>
</html>