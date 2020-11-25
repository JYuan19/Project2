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
        <script src="../js/picture.js"></script>
    </head>
    <body>
        <?php
            require('../database/pdo.php');
            require "nav/nav.php";
            $sql = 'SELECT id,Author FROM blog';

            $query  = $pdoconn->prepare($sql);
            $query->execute();
            $arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

            if(isset($_GET['id'])){
                $id=$_GET['id']; 
                $sql="select * from blog where id ='$id'";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){

                        $_SESSION['id']=$row['id'];
                        $_SESSION['description']=$row['description'];
                        $_SESSION['title']=$row['title'];
                        $_SESSION['contain']=$row['contain'];
                        $_SESSION['image']=$row['image'];
            
                    }
                }
            }
        ?>
        <div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
            <div class="row align-items-center">
                <div class="col-md-9">
                <h4 class="text-light text-uppercase mb-0">Update Blog</h4>
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

        <div class="container" style="margin-top:5%;margin-left:30%;">
            <div class="panel panel-info">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="../database/updateBlogCode.php" method="POST"
                        enctype="multipart/form-data">
                        <input name="id" type="text" class="form-control" placeholder="" value="<?php echo $_SESSION['id']; ?>" style="display: none;">
                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Title:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" id="title" value="<?php echo  $_SESSION['title'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-md-3 control-label">Image:</label>
                            <div class="col-md-offset-5 col-md-6">
                                <img src="../image/<?php echo $_SESSION['image'] ?>" onclick="triggerClick()" id="profileDisplay"
                                    style="width: 60%;">
                                <input name="blogUpload" type="file" id="image" onchange="displayImage(this)"
                                    style="display: none;">
                                <button  type="submit" name="pictureSave" class="btn btn-info "onclick="return confirm('Are you sure want to save?')">Save</button>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="contain" class="col-md-3 control-label">Description :</label>
                            <div class="col-md-9">
                                <textarea  name="description" id="description" 
                                    style=" overflow-y: scroll;height: 100px; width:100%;" ><?php echo  $_SESSION['description'] ?></textarea>  
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="contain" class="col-md-3 control-label">Contain :</label>
                            <div class="col-md-9">
                                <textarea  name="contain" id="contain" 
                                    style=" overflow-y: scroll;height: 400px; width:100%;" ><?php echo  $_SESSION['contain'] ?></textarea>   
                            </div>
                        </div>
                        <input name="Email" value="<?php echo $_SESSION['Email'] ?>" style="display: none;">
                        <input name="Author" value="<?php echo $_SESSION['Author'] ?>" style="display: none;">
                        
                        <div class="form-group">
                            <div class="row ml-1">
                                <div class=" col-md-4">
                                    <button id="btn-signup" type="submit" name="update" class="btn btn-info btn-block"onclick="return confirm('Are you sure want to save?')">Save</button>
                                </div>
                                <div class="col-md-4">
                                    <a href="Blogmanage.php" class="btn btn-info btn-block btn-danger">Cancel</a>
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
