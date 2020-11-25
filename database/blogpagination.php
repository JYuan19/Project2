<?php

$servername = "localhost";
$username = "root";
$password = "";
$db="foodtiger";
$conn = mysqli_connect($servername, $username, $password,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$limit = 3;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM blog ORDER BY Author ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql);  
?>
 
<?php  
while ($row = mysqli_fetch_array($rs_result)) {  
?>
  <link rel="stylesheet" href="../css/blog.css">
        <div class="card">
          <h2><?php echo $row['title']?></h2>
          <h5>by <?php echo $row['Author']?>,<?php echo $row['time_date']?></h5>
          <div class="fakeimg" style="height:200px;"><a href="blogDetail.php?id=<?php echo $row['id'];?>"><img src="<?php echo $row['image'];?>"
        style="width:max-content; height:200px;object-fit: contain;" ></a></div><br><br>
          <p><?php echo $row['description']?></p>
        </div>



<?php  
};  
?>

