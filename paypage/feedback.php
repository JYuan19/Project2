<?php
include "config/connection.php";
if (isset($_SESSION['userEmail-foodtiger'])) {
	$Email = $_SESSION['userEmail-foodtiger'];
	$query = "SELECT * FROM customer WHERE Email = '$Email'" ; 
	$result= mysqli_query($conn , $query) or die (mysqli_error($conn));
	if (mysqli_num_rows($result) > 0 ) {
		$row = mysqli_fetch_array($result);
		$userid = $row['cus_id'];
		$Email = $row['Email'];
		$Name = $row['Name'];
        $PhoneNo = $row['PhoneNo'];
        $Address = $row['Address'];
    }
}
session_start();  
if(!isset($_SESSION['userEmail-foodtiger']))
{
	header("location:../index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger - Feedback</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/nav-bar.css">
    <link rel="stylesheet" href="../css/aboutus.css">
    
</head>

<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>        
    </header>
    <div class="container" style="margin-top:100px;">
    <h2>Feedback</h2><br/>
        <form action="../database/feedbackcode.php" method="post">
            <h5>Your feedback really matters</h5><br\>
            <h5>Please help us to serve you better by taking a couple of minutes.</h5>
            <hr>
            <h5>Rate this system</h5>
            <div class="row" style="margin-top:2%;">
                <div class="col-sm-3"><input type="radio" name="feedback" value="poor" id="poor"><br/><label for="poor"><h6>Poor</h6></label></div>
                <div class="col-sm-3"><input type="radio" name="feedback" value="neutral" id="neutral"><br/><label for="neutral"><h6>Neutral</h6></label></div>
                <div class="col-sm-3"><input type="radio" name="feedback" value="good" id="good"><br/><label for="good"><h6>Good</h6></label></div>
                <div class="col-sm-3"><input type="radio" name="feedback" value="excellent" id="excellent" required><br/><label for="excellent"><h6>Excellent</h6></label></div>
            </div>
            <br/>
            <h5>If you have specific Feedback, Please write to us (Limit 100 words)</h5>
            <textarea placeholder="Additional comments" class="w3l_summary" name="suggestions" rows="4" cols="50" maxlength="100" style="width:50%;"></textarea><br/><br/>
            <input type="Name" placeholder="Your Name (optional)" name="Name"  style="display: none;"/>
            <input type="Email" placeholder="Your Email (optional)" name="Email" style="display: none;"/>
            <input type="PhoneNo" placeholder="Your Number (optional)" name="PhoneNo"  style="display: none;"/><br>
            <div class="row">
                <input type="submit" value="submit" class="btn btn-warning text-uppercase text-white ml-3">
                <a href="../index.php" class="btn btn-danger text-uppercase text-white ml-2">Cancel</a>
            </div>
        </form>
        
    </div>
</body>
</html>