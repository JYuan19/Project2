<?php

session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$db="foodtiger";
$conn = mysqli_connect($servername, $username, $password,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$limit = 4;
$sql = "SELECT COUNT(id) FROM blog";  
$rs_result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit); 
?>


<!DOCTYPE html>
<html>
    <head>
        <title>FoodTiger - Blog</title>
        <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/nav-bar.css">
        <link rel="stylesheet" href="../css/index.css"> 
        <link rel="stylesheet" href="../css/aboutus.css">
        <link rel="stylesheet" href="../css/blog.css">
    </head>
    <body style="background-color:#f1f1f1;">
        <header>
            <?php
            require "navandfooter/nav.php"; 
            ?>
        </header>

        <div class="in1">
            <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="../image/food.jpg" alt="food" width="100%" height="100%">
                <div class="carousel-caption">
                    <h1>FoodTiger</h1>
                    <p class="p2">Hungry always Hungry</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="../image/food4.jpg" alt="food2" width="100%" height="100%">
                <div class="carousel-caption">
                    <h1>Quality Food</h1>
                    <p class="p2">We deliver Quality Food and deliver On Time!</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="../image/food3.jpg" alt="food3" width="100%" height="100%">
                <div class="carousel-caption">
                    <h1>Best Customer Service</h1>
                    <p class="p2">We deliver Best Customer Service and Support!</p>
                </div>
                </div>
            </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
        </div>
        
    <div class="header">
        <h2>Blog</h2>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="leftcolumn">
          <?php 
          if(isset($_SESSION['userEmail-foodtiger'])){
          ?>
          <div id="target-content">Loading...</div>
          <?php
          } else{
          ?>
          <div id="target-content2">Loading...</div>
          <?php
          }
          ?>
          <div class="col col-xs-8">
            <ul class="pagination" style="float: right;margin-top:10px">
            
            <?php 
                if(!empty($total_pages)){
                  for($i=1; $i<=$total_pages; $i++){
                      if($i == 1){
                ?>
                
                <li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i;?>" class="page-link"><?php echo $i;?></a></li>

                <?php 
                      }
                      else{
                ?>
                
                <li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" class="page-link" data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
                
                <?php
                      }
                    }
                  }
                ?>
                
              </ul>
              </div>
        </div>
        <div class="rightcolumn">
          <div class="card">
            <h2>About Me</h2>
            <div class="fakeimg" style="height:250px;"><img src="../image/logo 256x256.png" width="200" ></div>
            <h2 style="color:#FFBD00;"><b>We are FoodTiger.</b></h2>
            <p>FoodTiger is a convenient online food ordering website. Customers can browse through
            the system and place order easily. "Bringing good food into your everyday. That's our mission.</p>
            <a class="abutton" href="../aboutus.php"><button class="button3">Read More</button></a>
          </div>
          <div class="card">
            <h3 style="margin-bottom: 20px;">Popular Post</h3>
                <?php
                $query = "SELECT * FROM blog limit 3";
                $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
                if (mysqli_num_rows($run_query) > 0) {
                while ($row = mysqli_fetch_array($run_query)) {
                    $id = $row['id'];
                    $title = $row['title'];
                ?>
                <ul class="cat-list">
                  <li style="list-style-position: outside;">
                    <a href="blogDetail.php?id=<?php echo $row['id'];?>" style="color:grey;"><?php echo $row['title'];?></a>
                  </li>
                </ul>
                <?php
                } 
          }
                ?>
              </div>
          </div>
      </div>
    </div>

    <footer>
        <?php
        require "navandfooter/footer.php";
        ?>
    </footer>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function () {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.maxHeight) {
        content.style.maxHeight = null;
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
      };
    });
  };
  $(document).ready(function () {
    $("#target-content").load("../database/blogpagination.php?page=1");
    $(".page-link").click(function () {
      var id = $(this).attr("data-id");
      var select_id = $(this).parent().attr("id");
      $.ajax({
        url: "../database/blogpagination.php",
        type: "GET",
        data: {
          page: id
        },
        cache: false,
        success: function (dataResult) {
          $("#target-content").html(dataResult);
          $(".pageitem").removeClass("active");
          $("#" + select_id).addClass("active");

        }
      });
    });
  });


  $(document).ready(function () {
    $("#target-content2").load("../database/blogpagination2.php?page=1");
    $(".page-link").click(function () {
      var id = $(this).attr("data-id");
      var select_id = $(this).parent().attr("id");
      $.ajax({
        url: "../database/blogpagination2.php",
        type: "GET",
        data: {
          page: id
        },
        cache: false,
        success: function (dataResult) {
          $("#target-content2").html(dataResult);
          $(".pageitem").removeClass("active");
          $("#" + select_id).addClass("active");

        }
      });
    });
  });
</script>


