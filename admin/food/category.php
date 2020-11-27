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
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="../../css/table.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/admin.css">
      
  </head>
  <body>
    <?php
      require "foodnav/nav.php";
      require('../../database/pdo.php');
      require('../../database/mysql.php');
      $sql = 'SELECT * FROM category';
      $query  = $pdoconn->prepare($sql);
      $query->execute();
      $arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
      $results_per_page = 6;
      $sql='SELECT * FROM category';
      $result = mysqli_query($conn, $sql);
      $number_of_results = mysqli_num_rows($result);
      $number_of_pages = ceil($number_of_results/$results_per_page);
      if (!isset($_GET['page'])) {
        $page = 1;
      } else {
        $page = $_GET['page'];
      }
      $this_page_first_result = ($page-1)*$results_per_page;
      $sql='SELECT * FROM category LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
      $result = mysqli_query($conn, $sql);
    ?>
    <div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
      <div class="row align-items-center">
        <div class="col-md-9">
          <h4 class="text-light text-uppercase mb-0">Category List</h4>
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
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Category List</h3>
                  </div>
                  <div class="col col-xs-6 text-right" >
                  <a href="CategoryList.php" class="btn btn-sm btn-primary btn-create" >Create New</a>
                  </div>
                </div>
              </div>
              
              <div class="panel-body">
                <table class="table  table-bordered table-list" style="box-shadow: 5px 7px 25px #999;">
                  <thead>
                    <tr>
                      <th><em class="fa fa-cog"></em></th>
                      <th class="hidden-xs">Image</th>
                      <th>Name</th>
                      <th>Description</th>
                    </tr> 
                  </thead>
                  <tbody>
                    <?php
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { 
                    ?>    
                    <tr>
                      <td align="center">
                        <a class="btn btn-default" href ="CategoryList2.php? c_id=<?php echo $row['c_id'];?>"><em class="fa fa-pencil"></em></a>
                        <a class="btn btn-danger"href="deleteCategory.php?c_id=<?php echo $row['c_id']; ?>" onclick="return confirm('Sure Want Delete? It Delete will include the food ')"><span class="new badge" data-badge-caption="" ><em class="fa fa-trash"></em></span></a>
                      </td>
                      <td ><img src="<?php echo $row['image']; ?>" alt="image" style="width:150px; height:150px;object-fit: contain;"></td>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['description']; ?></td>
                    </tr>
                    <?php 
                      } 
                    }
                    else { 
                      echo "<tr><td class='text-center' colspan='7' >No category yet </td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>

              <div class="panel-footer">
                  <div class="row">
                    <div class="col col-xs-4">
                    </div>
                    <div class="col col-xs-8">
                      <ul class="pagination hidden-xs pull-right">  
                        <?php
                          for ($page=1;$page<=$number_of_pages;$page++) {
                        ?>
                        <li class="page-item"><a class="page-link" href="food.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li> 
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
        </div>
      </div>
  </body>
</html>