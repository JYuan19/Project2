<?php  
    require "nav/nav.php";

    if (isset($_SESSION['Superadmin'])) {
        $Email = $_SESSION['Superadmin'];
        $query = "SELECT * FROM admin WHERE Email = '$Email'" ; 
        $result= mysqli_query($conn , $query) or die (mysqli_error($conn));
        if (mysqli_num_rows($result) > 0 ) {
            $row = mysqli_fetch_array($result);
            $userid = $row['ad_id'];
            $Email = $row['Email'];
            $userpassword = $row['Password'];
            $name = $row['Name'];
            $Position = $row['Position'];

        }

        if (isset($_POST['update'])) {
            require "../database/protect.php";
            $gump = new GUMP();
            $_POST = $gump->sanitize($_POST); 

            $gump->validation_rules(array(
                'Name'   => 'required|alpha_space|max_len,30|min_len,2',
                'currentpassword' => 'required|max_len,50|min_len,6',
                'newpassword'    => 'max_len,50|min_len,6',
            ));
            $gump->filter_rules(array(
                'Name' => 'trim|sanitize_string',
                'currentpassword' => 'trim',
                'newpassword' => 'trim',
                ));
            $validated_data = $gump->run($_POST);
            if($validated_data === false) {
?>
<script>alert(' <?php echo $gump->get_readable_errors(true); ?>  ');window.location.href='editProfile.php'</script>;
<?php
            }
            else if (!password_verify($validated_data['currentpassword'] ,  $userpassword))   
            {
            echo  "<script>alert('Current password is wrong! ');window.location.href='editProfile.php'</script>";
            }
            else if (empty($_POST['newpassword'])) {
                    $name = $validated_data['Name'];
                $updatequery1 = "UPDATE admin SET Name = '$name' ,  WHERE ad_id = '$userid' " ;
                $result2 = mysqli_query($conn , $updatequery1) or die(mysqli_error($conn));
                if (mysqli_affected_rows($conn) > 0) {
                    echo "<script>alert('PROFILE UPDATED SUCCESSFULLY');
                    window.location.href='editProfile.php';</script>";
                }
                else {
                echo "<script>alert('An error occured, Try again!');window.location.href='editProfile.php'</script>";
                }
            }
            else if (isset($_POST['newpassword']) &&  ($_POST['newpassword'] !== $_POST['confirmnewpassword'])) 
            {
                echo  "<script>alert(' New password and Confirm New password do not match ');window.location.href='editProfile.php'</script>";  
            }
            else {
                $name = $validated_data['Name'];
                $pass = $validated_data['newpassword'];
                $userpassword = password_hash("$pass" , PASSWORD_DEFAULT);

                $updatequery = "UPDATE admin SET password = '$userpassword', name='$name' WHERE ad_id='$userid'";
                $result1 = mysqli_query($conn , $updatequery) or die(mysqli_error($conn));
                if (mysqli_affected_rows($conn) > 0) {
                    echo "<script>alert('PROFILE UPDATED SUCCESSFULLY');
                    window.location.href='adminProfile.php';</script>";
                }
                else {
                    echo "<script>alert('An error occured, Try again!');</script>";
                }
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
        <header>        
            <div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h4 class="text-light text-uppercase mb-0">Edit Profile</h4>
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
        </header> 
        
        <div class="container" style="margin-top:10%;margin-left:30%;">    
            <div class="panel panel-info">
                <div class="panel-body" >
                    <form id="signupform" class="form-horizontal" role="form"action="editProfile.php" method="POST" >
                                    
                        <div class="form-group">
                            <label for="Name" class="col-md-3 control-label">Email :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  name="Email" id="Name" value="<?php echo $Email; ?>" disabled>
                            </div>
                        </div>
                                
                        <div class="form-group">
                            <label for="Email" class="col-md-3 control-label">Username :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="Name" id="Email" value="<?php echo $name; ?>" >
                            </div>
                        </div>
                                
                        <div class="form-group">
                            <label for="currentpassword" class="col-md-3 control-label">Current Password :</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="currentpassword" id="currentpassword" >
                            </div>
                        </div>
                                    
                        <div class="form-group">
                            <label for="newpassword" class="col-md-3 control-label">New Password :</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="newpassword" id="newpassword" >
                            </div>
                        </div>
                                    
                        <div class="form-group">
                            <label for="confirmnewpassword" class="col-md-3 control-label">Confirm New Password :</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="confirmnewpassword" id="confirmnewpassword" >
                            </div>
                        </div>
                                    
                        <div class="form-group">    
                            <div class="row ml-1">                           
                                <div class="col-md-4">
                                    <button id="btn-signup" type="submit"  name="update"class="btn btn-info btn-block"><i class="icon-hand-right"></i> Update</button>
                                </div>
                                <div class="col-md-4">
                                    <a href="adminProfile.php" class="btn btn-info btn-block btn-danger">Cancel</a>
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
  