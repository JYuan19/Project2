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
    <script src="../../js/confirmUpdate.js"></script>
    <link rel="stylesheet" href="../../css/admin.css">
</head>
    <body>
        <?php
            require('../../database/pdo.php');
            require "foodnav/nav.php";
            $sql = 'SELECT c_id,name FROM category';

            $query  = $pdoconn->prepare($sql);
            $query->execute();
            $arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

            if(isset($_GET['f_id'])){
                $f_id=$_GET['f_id']; 
                $sql="select * from food where f_id ='$f_id'";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){

                        $_SESSION['f_id']=$row['f_id'];
                        $_SESSION['cart_id']=$row['cart_id'];
                        $_SESSION['nameFood']=$row['nameFood'];
                        $_SESSION['description']=$row['description'];
                        $_SESSION['image']=$row['imageFood'];
                        $_SESSION['price']=$row['price'];
                    }
                }
            }

        ?>
        <div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h4 class="text-light text-uppercase mb-0">Edit Food</h4>
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
                    <form  class="form-horizontal" role="form" action="updateFood.php" method="POST" enctype="multipart/form-data" id="edit-form" >
                        <input name="f_id" type="text" class="form-control" placeholder="" value="<?php echo  $_SESSION['f_id']; ?>" style="display: none;">
                        <input name="cart_id" type="text" class="form-control" placeholder="" value="<?php echo $_SESSION['cart_id']; ?>" style="display: none;">
                            <div class="form-group">
                                <label for="nameFood" class="col-md-3 control-label">Food :</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"  name="nameFood" id="nameFood" value="<?php echo  $_SESSION['nameFood']; ?>">
                                </div>
                            </div>
                                                                   
                            <div class="form-group">
                                <label for="description" class="col-md-3 control-label">Description :</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="description"  id="description" value="<?php echo $_SESSION['description']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price" class="col-md-3 control-label">Price :</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="price"  id="price" value="<?php echo $_SESSION['price']; ?>">
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <label for="image" class="col-md-3 control-label">Image :</label>
                                <div class="col-md-9">
                                    <img src="<?php if (isset($_GET['f_id'])){echo $_SESSION['image']; }?>"  onclick="triggerClick()" id="profileDisplay" style="width:70%;">
                                    <input name="foodUpload" type="file"  id="image"  onchange="displayImage(this)" style="display: none;">  
                                    <div style="text-align:center;">
                                        <button type="submit" name="foodpictureSave" class="btn btn-info "
                                        onclick="return confirm('Are you sure want to save?')" style="width:100%;">Save Image</button>
                                    </div>
                                </div>
                            </div>
                            <br>   
                            <div class="form-group">  
                                <div class="row">          
                                    <div class="col-md-4 ml-3" >
                                        <button id="btn-signup" type="submit"  name="update" class="btn btn-info btn-block" style="width:110%;" onclick="return ConfirmUpdate();">Update</button>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="food.php" class="btn btn-info btn-block btn-danger" style="width:110%;margin-left:35px;">Cancel</a>
                                    </div>
                                </div>     
                            </div>        
                        </form>
                    </div>  
                </div> 
            </div>
        </div> 
    </body>
</html>