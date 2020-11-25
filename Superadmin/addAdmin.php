<!DOCTYPE html>
<html>
    <head>
        <title>FoodTiger - Add Admin</title>
        <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">	
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
    </head>
    <body>
        <?php
            include "../database/connection.php";
            require "nav/nav.php";
        ?>
        <div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h4 class="text-light text-uppercase mb-0">Add Admin </h4>
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

        <div class="container" style="margin-top:10%;margin-left:30%;">    
            <div class="panel panel-info">
                <div class="panel-body" >
                    <form id="signupform" class="form-horizontal" role="form"action="addAdmincode.php" method="POST" >
                         <div class="form-group">
                            <label for="Name" class="col-md-3 control-label">Name:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  name="Name" id="Name" value="">
                            </div>
                        </div>
                                
                        <div class="form-group">
                            <label for="Email" class="col-md-3 control-label">Email:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="Email" id="Email" value="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="Position" class="col-md-3 control-label">Positon:</label>
                            <div class="col-md-9">
                                <select name="Position"  class="form-control" style="height:5%;">
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="Password" value="$2y$10$hsnlY8iBZ2ADuFVOAS3Em.Et1yA6VZqlMKOWXOx8QCqbW1XrR9xsK" style="display: none;" />
         
                        <div class="form-group">
                            <div class="row ml-1">                                     
                                <div class="col-md-4">
                                    <button id="btn-signup" type="submit"  name="update"class="btn btn-info btn-block">Add</button>
                                </div>
                                <div class="col-md-4">
                                    <a href="adminpage.php" class="btn btn-info btn-block btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>     
                    </form>
                 </div>      
            </div> 
        </div>
    </body>
</html>