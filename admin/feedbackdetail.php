<?php  
    require('../database/pdo.php');
    require "nav/nav.php";
    $sql = 'SELECT * FROM returnorder';

    $query  = $pdoconn->prepare($sql);
    $query->execute();
    $arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['id'])){
        $id=$_GET['id']; 
        $sql="SELECT * FROM feedback WHERE id = '$id'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $id = $_GET['id'];
                $Email = $row['Email'];
                $Name = $row['Name'];
                $Phone = $row['phone'];
                $Feedback = $row['feedback'];
                $Suggestions = $row['suggestions'];
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
    </head>  
    <body>  
        <div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h4 class="text-light text-uppercase mb-0">Feedback Detail</h4>
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
                <div class="panel-heading">
                    <div class="panel-body" >                        
                        <div class="form-group">
                            <div class="row"> 
                                <label for="Name" class="col-md-3 control-label">Name: </label>
                                <div class="col-md-9">
                                    <h5><?php echo $Name; ?></h5>
                                </div>
                            </div>
                        </div>  
                        
                        <div class="form-group">
                            <div class="row">
                                <label for="Address" class="col-md-3 control-label">Email: </label>
                                <div class="col-md-9">
                                    <h5><?php echo $Email; ?></h5>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <label for="Contact Number" class="col-md-3 control-label">Phone Number: </label>
                                <div class="col-md-9">
                                    <h5><?php echo $Phone; ?></h5>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="Feedback" class="col-md-3 control-label">Feedback: </label>
                                <div class="col-md-9">
                                    <h5><?php echo  $Feedback; ?></h5>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">       
                                <label for="Suggestion" class="col-md-3 control-label">Suggestions:</label>
                                <div class="col-md-9">
                                    <h5><?php echo $Suggestions; ?></h5>
                                </div>
                            </div>
                        </div>      
                        <div class="form-group">                                       
                            <div class="col-md-6" style="text-align:center;margin-top:5%;">
                                <a href="viewfeedback.php" class="btn btn-info" style="width:100%;">Leave</a>               
                            </div>
                        </div>
                    </div>                       
                </div>
            </div> 
        </div>           
    </body>
</html>