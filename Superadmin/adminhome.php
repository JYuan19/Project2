
<!DOCTYPE html>
<html>
    <head>
        <title>FoodTiger</title>
        <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">	
        

        
    </head>
    <body>
        <?php
            include "../database/connection.php";
            require('nav/nav.php');
        ?>
        <div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h4 class="text-light text-uppercase mb-0">Dashboard</h4>
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
        <div class="container" style="text-align:center;margin-top:5%;">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <label style="width:100%;">
                        <a href="adminpage.php" class="img-fluid " style="text-decoration:none;color:black;" id="pic">
                            <div class="panel panel-default card-input card card-body bg-light">
                                <i class="fa fa-id-card-o fa-lg mt-3 mb-3" aria-hidden="true" style="font-size:10em;"></i>
                                <hr>
                                <div class="panel-heading">
                                    <h5>Admin Management</h5>
                                </div>
                            </div>
                        </a>
                    </label>
                </div>
               
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <label style="width:100%;">
                        <a href="viewCustomerAcc.php" class="img-fluid " style="text-decoration:none;color:black;" id="pic">
                            <div class="panel panel-default card-input card card-body bg-light">
                                <i class="fa fa-user fa-lg mt-3 mb-3" aria-hidden="true" style="font-size:8.5em;"></i>
                                <hr>
                                <div class="panel-heading">
                                    <h5>Customer Management</h5>
                                </div>
                            </div>
                        </a>
                    </label>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                    <label style="width:100%;">
                        <a href="food/food.php" class="img-fluid" style="text-decoration:none;color:black;">
                            <div class="panel panel-default card-input card card-body bg-light">
                                <i class="fa fa-shopping-cart fa-lg mt-3 mb-3" aria-hidden="true" style="font-size:10em;"></i>
                                <hr>
                                <div class="panel-heading">
                                    <h5>Food Management</h5>
                                </div>
                            </div>
                        </a>
                    </label>
                </div>
                
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <label style="width:100%;">
                        <a href="food/category.php" class="img-fluid " style="text-decoration:none;color:black;" id="pic">
                            <div class="panel panel-default card-input card card-body bg-light">
                                <i class="fa fa-table fa-lg mt-3 mb-3" aria-hidden="true" style="font-size:10em;"></i>
                                <hr>
                                <div class="panel-heading">
                                    <h5>Category Management</h5>
                                </div>
                            </div>
                        </a>
                    </label>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                    <label style="width:100%;">
                        <a href="viewReviewList.php" class="img-fluid " style="text-decoration:none;color:black;" id="pic">
                            <div class="panel panel-default card-input card card-body bg-light">
                                <i class="fa fa-comment fa-lg mt-3 mb-3" aria-hidden="true" style="font-size:10em;"></i>
                                <hr>
                                <div class="panel-heading">
                                    <h5>Review List</h5>
                                </div>
                            </div>
                        </a>
                    </label>
                </div>
                
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <label style="width:100%;">
                        <a href="Blogmanage.php" class="img-fluid " style="text-decoration:none;color:black;" id="pic">
                            <div class="panel panel-default card-input card card-body bg-light">
                                <i class="fa fa-file fa-lg mt-3 mb-3" aria-hidden="true" style="font-size:10em;"></i>
                                <hr>
                                <div class="panel-heading">
                                    <h5>Blog Management</h5>
                                </div>
                            </div>
                         </a>
                    </label>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-3">
                    <label style="width:100%;">
                        <a href="viewhistoryOrder.php" class="img-fluid" style="text-decoration:none;color:black;">
                            <div class="panel panel-default card-input card card-body bg-light">
                                <i class="fa fa-bars fa-lg mr-3 mt-3 mb-3 ml-3" aria-hidden="true" style="font-size:10em;"></i>
                                <hr>
                                <div class="panel-heading">
                                    <h5>Order List</h5>
                                </div>
                            </div>
                        </a>
                    </label>
                </div>
                    
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <label style="width:100%;">
                        <a href="viewPayhistory.php" class="img-fluid " style="text-decoration:none;color:black;" id="pic">
                            <div class="panel panel-default card-input card card-body bg-light">
                                <i class="fa fa-money fa-lg mt-3 mb-3" aria-hidden="true" style="font-size:10em;"></i>
                                <hr>
                                <div class="panel-heading">
                                    <h5>Payment List</h5>
                                </div>
                            </div>
                        </a>
                    </label>
                </div>
                        
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <label style="width:100%;">
                        <a href="viewChatList.php" class="img-fluid " style="text-decoration:none;color:black;" id="pic">
                            <div class="panel panel-default card-input card card-body bg-light">
                                <i class="fa fa-weixin fa-lg mr-3 mt-3 mb-3" aria-hidden="true" style="font-size:10em;"></i>
                                <hr>
                                <div class="panel-heading">
                                    <h5>Online Chat List</h5>
                                </div>
                            </div>
                        </a>
                    </label>
                </div>
                    
                        
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <label style="width:100%;">
                        <a href="viewfeedback.php" class="img-fluid" style="text-decoration:none;color:black;">
                            <div class="panel panel-default card-input card card-body bg-light">
                                <i class="fa fa-wrench fa-lg mr-3 mt-3 mb-3 ml-3" aria-hidden="true" style="font-size:10em;"></i>
                                <hr>
                                <div class="panel-heading">
                                    <h5>Feedback</h5>
                                </div>
                            </div>
                        </a>
                    </label>
                </div>
                        
                <div class="col-md-3 col-lg-3 col-sm-3">
                    <label style="width:100%;">
                        <a href="requestJob.php" class="img-fluid " style="text-decoration:none;color:black;" id="pic">
                            <div class="panel panel-default card-input card card-body bg-light">
                                <i class="fa fa-motorcycle fa-lg mt-4 mb-1 mr-5" aria-hidden="true" style="font-size:10em;"></i>
                                <hr>
                                <div class="panel-heading">
                                    <h5>Request Job List</h5>
                                </div>
                            </div>
                        </a>
                    </label>
                </div>  

                <div class="col-md-3 col-lg-3 col-sm-3">
                    <label style="width:100%;">
                        <a href="returnorderlist.php" class="img-fluid" style="text-decoration:none;color:black;">
                            <div class="panel panel-default card-input card card-body bg-light">
                                <i class="fa fa-envelope fa-lg mr-3 mt-3 mb-3 ml-3" aria-hidden="true" style="font-size:10em;"></i>
                                <hr>
                                <div class="panel-heading">
                                    <h5>Request Return List</h5>
                                </div>
                            </div>
                        </a>
                    </label>
                </div> 

            </div>          
        </div>
    </body>
</html>