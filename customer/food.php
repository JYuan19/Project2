<?php
include "../database/connection.php";
session_start();
require '../database/pdo.php';
$sql = 'SELECT * FROM food';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
$result = $conn->query($sql); //run SQL
if (isset($_POST['search'])) {
    $keyword = $_POST['search'];
}
$search = "";
if (isset($_POST['search'])) {
    $search = " where nameFood like '%" . $keyword . "%'or description like '%" . $keyword . "%'";
}
if (isset($_GET['category'])) {
    $cart_id = $_GET['category'];
    $search = " where cart_id='" . $cart_id . "'";
}

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

        <div class="container" style="margin-top:3%;">
            <h2>Foods</h2>
            <form style="margin-top:3%;" action="food.php" method="POST">
                <input type="text" name="search" placeholder="Search..." id="search">
            </form>
        </div>

        <div class="col-md-8 mx-auto" style="margin-top:1%;margin-bottom:3%;">
            <div class="row">
                <?php
                if (isset($_SESSION['userEmail-foodtiger'])) {
                    $sql = "select * from food" . $search;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid9" style="text-align:center;">
                                    <div class="product-image9">
                                        <a href="fooddetails.php?f_id=<?php echo $row['f_id'];; ?>"><img src="image/<?php echo $row['imageFood']; ?>" class="img-fluid" style="width:400px; height:300px;object-fit: contain;"></a>
                                        <a href="#" class="product-full-view"></a>
                                    </div>
                                    <div class="product-content" style="text-align:left;">
                                        <h3 class="title"><a href="fooddetails.php?f_id=<?php echo $row['f_id'];; ?>"><?php echo $row['nameFood']; ?></a></h3>
                                        <div class="price">RM<?php echo $row['price']; ?></div>
                                        <a class="add-to-cart" href="fooddetails.php?f_id=<?php echo $row['f_id'];; ?>">VIEW PRODUCTS</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else { ?>
                        <div class="row">
                            <div class="container" style="width:1500px; height:500px;">
                                <h1 style="text-align: center;"></h1>
                                <h1 style="text-align: center;">No Result....</h1>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    $sql = "select * from food" . $search;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid9" style="text-align:center;">
                                    <div class="product-image9">
                                        <a href="#" data-toggle="modal" data-target="#login_form"><img src="image/<?php echo $row['imageFood']; ?>" class="img-fluid" style="width:400px; height:300px;object-fit: contain;"></a>
                                        <a href="#" class="product-full-view"></a>
                                    </div>
                                    <div class="product-content" style="text-align:left;">
                                        <h3 class="title"><a href="fooddetails.php?f_id=<?php echo $row['f_id'];; ?>"><?php echo $row['nameFood']; ?></a></h3>
                                        <div class="price">RM<?php echo $row['price']; ?></div>
                                        <a class="add-to-cart" href="fooddetails.php?f_id=<?php echo $row['f_id'];; ?>">VIEW PRODUCTS</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else { ?>
                        <div class="row">
                            <div class="container" style="width:1500px; height:500px;">
                                <h1 style="text-align: center;"></h1>
                                <h1 style="text-align: center;">No Result....</h1>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>

    </div>
    <footer style="margin-top:5%;">
        <?php
        require "navandfooter/footer.php";
        ?>
    </footer>
</body>

</html>
