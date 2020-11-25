<!DOCTYPE html>
<html>

    <head>
        <title>FoodTiger</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../image/logo 256x256.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">	
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../../js/picture.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="../../css/pic.css" rel="stylesheet">
        <link rel="stylesheet" href="../../css/admin.css">
        
    </head>
    <body>
        <?php
            require('../../database/pdo.php');
            require "foodnav/nav.php";
            // session_start();
            $sql = 'SELECT c_id,name FROM category';

            $query  = $pdoconn->prepare($sql);
            $query->execute();
            $arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h4 class="text-light text-uppercase mb-0">Add Food</h4>
                </div>
                <div class="col-md-3">
                    <ul class="navbar-nav">
                        <li class="nav-item ml-md-auto ">
                            <a href="../adminlognout.php" class="nav-link" onclick="return confirm('Are you sure?')"><i class="fa fa-sign-out text-danger fa-lg"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top:5%;margin-left:30%;">    
            <div class="panel panel-info">  
                <div class="panel-body" > 
                    <form  class="form-horizontal" role="form" action="addFood.php" method="POST" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <label for="nameFood" class="col-md-3 control-label">Food Name:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  name="nameFood" id="nameFood" >
                            </div>
                        </div>
                               
                        <div class="form-group">
                            <label for="pendek" class="col-md-3 control-label">Categories:</label>
                            <div class="col-md-9">
                                <select name="cart_id" class="form-control">
                                    <?php  
                                        foreach ($arr_all as $key) {
                                            echo '<option value="'.$key['c_id'].'">'.$key['name'].'</option>';
                                        }   
                                    ?>
						        </select>	
                            </div>
                        </div>
                                    
                        <div class="form-group">
                            <label for="description" class="col-md-3 control-label">Description:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="description"  id="description" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-3 control-label">Price :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="price"  id="price" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-md-3 control-label">Image:</label>
                            <div class="col-md-9">
                                <img src="../../image/uknown.png" onclick="triggerClick()" id="profileDisplay" style="width:50%;">      
                                <input name="foodUpload" type="file"  id="image"  onchange="displayImage(this)" style="display: none;">  
                            </div>
                        </div>
                                
                        <div class="form-group">   
                            <div class="row ml-1">                                   
                                <div class="col-md-4">
                                    <button id="btn-signup" type="submit"  name="insert"class="btn btn-info btn-block"><i class="icon-hand-right"></i> Add New</button>   
                                </div>
                                <div class="col-md-4">
                                    <a href="food.php" class="btn btn-info btn-block btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>                   
                    </form>
                </div>                    
            </div> 
        </div> 
    </body>
</html>