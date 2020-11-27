<?php
session_start();
//fetch_comment.php
$f_id = $_SESSION["food_id"];
$connect = new PDO('mysql:host=localhost;dbname=foodtiger', 'root', '');
$query = "
    SELECT * FROM review 
    WHERE food_id = '".$f_id."'
    ORDER BY comment_id DESC
";


$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
 $output .= '
 <div class="panel panel-default">
 <div class="imgcontainer">
    <img src="../image/avatar6.png" alt="avatar" class="avatar" style="width:5%;margin-top:3%;">
 </div>
  <div class="panel-heading">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
  <div class="panel-body">'.$row["comment"].'</div>
 </div>
 ';
}

echo $output;

?>