<?php  
    require('../database/pdo.php');
    require "nav/nav.php";
    $sql = 'SELECT * FROM returnorder';

    $query  = $pdoconn->prepare($sql);
    $query->execute();
    $arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['id'])){
        $id=$_GET['id']; 
        $sql="SELECT * FROM `returnorder` LEFT JOIN `payment` ON returnorder.order_id = payment.order_id ORDER BY returnorder.id = '$id'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $id = $_GET['id'];
                $name = $row['name'];
                $PhoneNo = $row['PhoneNo'];
                $Email = $row['email'];
                $Reason = $row['reason'];
                $Image = $row['image'];
                $StatusReturn = $row['statusreturn'];
                $Date = $row['date'];
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
                    <h4 class="text-light text-uppercase mb-0">Request Return Order Detail</h4>
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
                                    <h5><?php echo $name; ?></h5>
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
                                    <h5><?php echo $PhoneNo; ?></h5>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="Reason" class="col-md-3 control-label">Reason: </label>
                                <div class="col-md-9">
                                    <h5><?php echo  $Reason; ?></h5>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">       
                                <label for="Status" class="col-md-3 control-label">Status:</label>
                                <div class="col-md-9">
                                    <h5><?php echo $StatusReturn; ?></h5>
                                </div>
                            </div>
                        </div>      
                        
                        <div class="form-group">
                            <div class="row">       
                                <label for="Time and Date" class="col-md-3 control-label">Time and Date:</label>
                                <div class="col-md-9">
                                    <h5><?php echo $Date; ?></h5>
                                </div>
                            </div>
                        </div>
                                
                        <div class="form-group">
                            <div class="row">
                                <label for="Image" class="col-md-3 control-label">Image: </label>
                                <div class="col-md-9">
                                    <img src="<?php if (isset($_GET['id'])){echo $Image; }?>" id="profileDisplay" style="width:50%;">
                                </div>
                            </div>
                        </div>
                        
                        

                        <div class="form-group">                                       
                            <div class="col-md-offset-3 col-md-6">
                                <button  type="submit"  name="update" id="<?php echo $id; ?>"class="btn btn-info updatebut" >Approve</button>
                                <button  type="submit"  name="reject" id="<?php echo $id; ?>" class="btn btn-danger rejectbut" >Reject</button>                       
                            </div>
                        </div>
                    </div>                       
                </div>
            </div> 
        </div>           
    </body>
</html>
<script>
$(document).on('click', '.updatebut', function(){
		var update_id = $(this).attr('id');
		if(confirm("Are you sure you want to approve?"))
		{
			$.ajax({
				url:"../database/updateReturn.php",
				method:"POST",
				data:{update_id:update_id},
				success:function(data)
				{
                    window.location = "adminhome.php";
				}
			})
		}
	});

    $(document).on('click', '.rejectbut', function(){
		var reject_id = $(this).attr('id');
		if(confirm("Are you sure you want to reject?"))
		{
			$.ajax({
				url:"../database/updateReturn.php",
				method:"POST",
				data:{reject_id:reject_id},
				success:function(data)
				{
                    window.location = "returnorderlist.php";
				}
			})
		}
	});
</script>

