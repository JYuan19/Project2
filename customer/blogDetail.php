<?php
include "../database/connection.php";
session_start(); 

if(isset($_GET['id'])){
	$id=$_GET['id']; 
	$sql="select * from blog where id ='$id'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){

            $_SESSION['id']=$row['id'];
            $_SESSION['title']=$row['title'];
            $_SESSION['description']=$row['description'];
            $_SESSION['contain']=$row['contain'];
            $_SESSION['image']=$row['image'];
            $_SESSION['Author']=$row['Author'];
            $_SESSION['time_date']=$row['time_date'];
 
		}
	}
}

if(!isset($_SESSION['userEmail-foodtiger'])){
	header("location:../index.php");
}


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
            <div class="card">
                <h2><?php echo  $_SESSION['title'] ?></h2>
                <h5>by <?php echo  $_SESSION['Author'] ?>, <?php echo  $_SESSION['time_date'] ?> </h5>
                <div class="fakeimg"><img src="<?php echo $_SESSION['image'];?>" style="width:max-content; height:200px;object-fit: contain;" ></div><br>
                <p>Contains: <?php echo  $_SESSION['contain'] ?></p>
                <p>Description: <?php echo  $_SESSION['description'] ?></p>
                <div style="margin-top:3%;">
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_CN/sdk.js#xfbml=1&version=v8.0&appId=2454460351522244&autoLogAppEvents=1" nonce="BsWdTF0x"></script>
                    <div class="fb-comments" data-href="http://localhost/foodtiger-master/customer/blogDetail.php?id=<?php echo $_SESSION['id'];?>" data-numposts="50" data-width="1000"></div>
                </div>
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


