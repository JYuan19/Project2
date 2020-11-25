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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  </head>
  <body>
    <?php
      require "nav/nav.php";
      $page = @$_GET['page'];			
      if($page == 0 || $page == 1){
          $page1 = 0;	
      }
      else {
          $page1 = ($page * 6) - 6;	
      }

      $sql="select * from requestjob where status='have not approve'  LIMIT ".$page1.", 6";
      $result=$conn->query($sql); 
    ?>
		<div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
      <div class="row align-items-center">
        <div class="col-md-9">
          <h4 class="text-light text-uppercase mb-0">Request Jobs List</h4>
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
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default panel-table">
            <div class="panel-heading">
              <div class="row">
                <div class="col col-xs-6">
                  <h3 class="panel-title">Request Jobs List</h3>
                </div>
                <div class="col col-xs-6 text-right"></div>
              </div>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered table-list" style="box-shadow: 5px 7px 25px #999;">
                <thead>
                  <tr>
                    <th>Email</th>        
                    <th>Name</th>   
                  </tr> 
                </thead>
              <tbody>
                <?php
                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { 
					      ?> 
                <tr>
                  <td><a class="btn btn-warning" href ="jobdetail.php? id=<?php echo $row['id'];?>"><?php echo $row['Email'];?></a></td>
                  <td><?php echo $row['firstName'];?><?php echo $row['lastName'];?></td>
                </tr>
                <?php
                    } 
                  } 
                  else { 
                    echo "<tr><td class='text-center' colspan='7' >No request yet </td></tr>";
                  }
                ?>  
              </tbody>
            </table>        
          </div>
          <div class="panel-footer">
            <div class="row">
              <div class="col col-xs-4"></div>
              <div class="col col-xs-8">
                <?php
                  $result = $conn->query("SELECT * FROM requestjob where status='have not approve' ");
                  $count = $result->num_rows;      
                  $a = $count / 9;
                  $a = ceil($a);
                ?>
                <ul class="pagination hidden-xs pull-right">  
                  <?php
                    for ($i = 1; $i <= $a; $i++) {
                  ?>
                  <li class="page-item"><a class="page-link" href="requestJob.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> 
                  <?php  
                    }
                  ?>                
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>                    
</html>