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
      <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
      <link href="../../css/table.css" rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="../../css/admin.css">

  </head>
  <body>
    <?php
      // session_start();
      require('../../database/pdo.php');
      require('../../database/mysql.php');
      require "foodnav/nav.php";
      $sql = 'SELECT food.*,category.name,category.c_id
              FROM food
              LEFT JOIN category
              ON food.cart_id = category.c_id ';
      $query  = $pdoconn->prepare($sql);
      $query->execute();
      $arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
      $results_per_page = 6;
      $sql='SELECT food.*,category.name,category.c_id
      FROM food
      LEFT JOIN category
      ON food.cart_id = category.c_id ';
      $result = mysqli_query($conn, $sql);
      $number_of_results = mysqli_num_rows($result);
      $number_of_pages = ceil($number_of_results/$results_per_page);
      if (!isset($_GET['page'])) {
        $page = 1;
      } else {
        $page = $_GET['page'];
      }
      $this_page_first_result = ($page-1)*$results_per_page;
      $sql='SELECT food.*,category.name,category.c_id
      FROM food
      LEFT JOIN category
      ON food.cart_id = category.c_id LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
      $result = mysqli_query($conn, $sql);
      foreach ($arr_all as $key){}
    ?>
    <div class="col-lg-9 col-xl-10 col-md-8 ml-auto fixed-top py-2 top-navbar" style="background-color: #ffbf55;">
      <div class="row align-items-center">
        <div class="col-md-9">
          <h4 class="text-light text-uppercase mb-0">Food List</h4>
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
                      <h3 class="panel-title">Food list</h3>
                    </div>
                    <div class="col col-xs-6 text-right">
                    <a href="FoodList.php" class="btn btn-sm btn-primary btn-create" >Create New</a>
                    </div>
                  </div>
                </div>
                <div class="panel-body">
                  <table class="table table-bordered table-list" style="box-shadow: 5px 7px 25px #999;">
                    <thead>
                      <tr>
                          <th><em class="fa fa-cog"></em></th>
                          <th class="hidden-xs">Image</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Category</th> 
                          <th>Price</th>    
                      </tr> 
                    </thead>
                    <tbody>
                            <tr>
                            <?php
                              if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {  
                            ?>
                              <td align="center">
                                <a class="btn btn-default" href ="FoodList2.php? f_id=<?php echo $row['f_id'];?>"><em class="fa fa-pencil"></em></a>
                                <a class="btn btn-danger" href="deleteFood.php?f_id=<?php echo $row['f_id']; ?>"onclick="return confirm('Sure Want Delete?')"><span class="new badge" data-badge-caption="" ><em class="fa fa-trash"></em></span></a>
                              </td>
                              <td><img src="<?php echo $row['imageFood']; ?>" alt="image" style="width:150px; height:150px;object-fit: contain;" ></td>
                              <td><?php echo $row['nameFood'];?></td>
                              <td><?php echo $row['description']; ?></td>
                              <td><?php echo $row['name'];?></td>
                              <td><?php echo $row['price']; ?></td>
                            </tr>
                          </tbody>
                              <?php 
                              } 
                            }
                            else { 
                              echo "<tr><td class='text-center' colspan='7' >No food yet </td></tr>";
                            }
                              
                              ?>
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
    </div>
  </body>
</html>