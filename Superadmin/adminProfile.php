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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="../css/profile.css">
 </head>  
 <body>  
     <?php
        require "nav/nav.php";
     ?>
     <div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
        <div class="row align-items-center">
            <div class="col-md-9">
                <h4 class="text-light text-uppercase mb-0">Admin Profile </h4>
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
    <div class="container" style="margin-top:0%;margin-left:30%;">
        <div class="imgcontainer">
            <img src="../image/avatar6.png" alt="admin" class="avatar">
        </div>
        <h2 style="text-align:center;margin-top:5%;">Admin Profile</h2><hr>
      <div style="text-align:right;">
        <a class="btn btn-warning" href="editprofile.php" style="text-align:right;">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      </div>
        <div class="container" style="">
            <form id="signupform" class="form-horizontal" role="form">
                <div class="row">
                    <table class="table table-borderless" style="margin-top:3%;">
                        <tbody>
                            <tr>
                                <td><h4 >Username: </h4></td>
                                <td><h4 style="font-weight: lighter;float:left;"><?php echo $Name ?></h4></td>
                            </tr>
                            <tr>
                                <td><h4 >Email: </h4></td>
                                <td><h4 style="font-weight: lighter;float:left;"><?php echo $Email ?></h4></td>
                            </tr>
                            <tr>
                                <td><h4>Phone Number: </h4></td>
                                <td><h4 style="font-weight: lighter;float:left;"><?php echo $Position ?></h4></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
  

  </body>
 
</html>


