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
    </head>
    <body>
    <?php
        require "nav/nav.php";

        if(isset($_GET['id'])){
            $id=$_GET['id']; 
            $sql="select * from requestjob where id ='$id'";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['firstName'] = $row['firstName'];
                    $_SESSION['lastName'] = $row['lastName'];
                    $_SESSION['PhoneNo'] = $row['PhoneNo'];
                    $_SESSION['Email'] = $row['Email'];
                    $_SESSION['years'] = $row['years'];
                    $_SESSION['language'] = $row['language'];
                    $_SESSION['citizen'] = $row['citizen'];
                    $_SESSION['validDriverLicense'] = $row['validDriverLicense'];
                    $_SESSION['vehicle'] = $row['vehicle'];
                    $_SESSION['City'] = $row['City'];
                    $_SESSION['time_date'] = $row['time_date'];
                }
            }
        }
    ?>
    <div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
        <div class="row align-items-center">
            <div class="col-md-9">
                <h4 class="text-light text-uppercase mb-0">Add Delivery Man </h4>
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
                            <input type="text" class="form-control"  name="Name" id="Name" value="<?php echo $_SESSION['firstName'];?> <?php echo  $_SESSION['lastName'];?>">
                        </div>
                    </div>
                               
                    <div class="form-group">
                        <label for="Email" class="col-md-3 control-label">Email:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="Email" id="Email" value="<?php echo $_SESSION['Email'];?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="Position" class="col-md-3 control-label">Positon:</label>
                        <div class="col-md-9">
                            <select name="Position"  class="form-control" style="height:30%;">
                                <option value="Deliver Man">Deliver Man</option>
                             </select>
                        </div>
                    </div>

                    <input type="text" class="form-control" name="Password" value="$2y$10$U4pkflE7x9vTSuZe7U6Inu.1/Aac4QGIbplbvyihNEHzGfFKrSj.m" style="display: none;" />                            
                    <!-- $2y$10$hsnlY8iBZ2ADuFVOAS3Em.Et1yA6VZqlMKOWXOx8QCqbW1XrR9xsK         -->
                    <div class="form-group">                                       
                        <div class="col-md-offset-3 col-md-6">
                            <button id="btn-signup" type="submit"  name="insert"class="btn btn-info btn-block"><i class="icon-hand-right"></i> Add New</button>              
                        </div>
                    </div>    
                </form>
            </div>     
        </div> 
    </body>
</html>