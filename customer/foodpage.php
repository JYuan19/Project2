<?php
include "../database/connection.php";
session_start();
require '../database/pdo.php';
$sql = 'SELECT * FROM food';
$query  = $pdoconn->prepare($sql);
$query->execute();

$page = @$_GET['page'];
if ($page == 0 || $page == 1) {
  $page1 = 0;
} else {
  $page1 = ($page * 6) - 6;
}
$search = "";
if (isset($_REQUEST['search'])) {
  $search = " and nameFood like '%" . $_REQUEST['search'] . "%'or description like '%" . $_REQUEST['search'] . "%'";
}
$sql = "select f_id,nameFood,description,imageFood,price from food where " . $search . " LIMIT " . $page1 . ", 6";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
  <title>FoodTiger - Foods</title>
  <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/nav-bar.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/food.css">

</head>

<body>
  <header>
    <?php
    require "navandfooter/nav.php";

    if (isset($_SESSION['userEmail-foodtiger'])) {
      require "chat.php";
    }
    ?>
  </header>
  <div class="in1">
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../image/food.jpg" alt="food" width="1100" height="500">
          <div class="carousel-caption">
            <h1>FoodTiger</h1>
            <p class="p2">Hungry always Hungry</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../image/food4.jpg" alt="food2" width="1100" height="500">
          <div class="carousel-caption">
            <h1>Quality Food</h1>
            <p class="p2">We deliver Quality Food and deliver On Time!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../image/food3.jpg" alt="food3" width="1100" height="500">
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
    <?php
    if (isset($_SESSION['userEmail-foodtiger'])) {
    ?>
      <div class="container" style="margin-top:3%;">
        <h2>Foods</h2>
        <form style="margin-top:3%;" action="food.php" method="POST">
          <input type="text" name="search" placeholder="Search..." id="search">
        </form>
      </div>
      <div id="food"></div>
    <?php
    } else {
    ?>
      <div class="container" style="margin-top:3%;">
        <h2>Foods</h2>
        <form style="margin-top:3%;" action="food.php" method="POST">
          <input type="text" name="search" placeholder="Search..." id="search2">
        </form>
      </div>
      <div id="foodneedlogin"></div>
    <?php
    }
    ?>

  </div>


  <footer style="margin-top:5%;">
    <?php
    require "navandfooter/footer.php";
    ?>
  </footer>
</body>

</html>

<script>
  $(document).ready(function() {

    load_data(1);

    function load_data(page, query = '') {
      $.ajax({
        url: "AjaxFood.php",
        method: "POST",
        data: {
          page: page,
          query: query
        },
        success: function(data) {
          $('#food').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function() {
      var page = $(this).data('page_number');
      var query = $('#search').val();
      load_data(page, query);
    });

    $('#search').keyup(function() {
      var query = $('#search').val();
      load_data(1, query);
    });

  });
  $(document).ready(function() {

    load_data(1);

    function load_data(page, query = '') {
      $.ajax({
        url: "AjaxFood2.php",
        method: "POST",
        data: {
          page: page,
          query: query
        },
        success: function(data) {
          $('#foodneedlogin').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function() {
      var page = $(this).data('page_number');
      var query = $('#search2').val();
      load_data(page, query);
    });

    $('#search2').keyup(function() {
      var query = $('#search2').val();
      load_data(1, query);
    });

  });
</script>
