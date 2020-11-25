<?php
    $connect = new PDO("mysql:host=localhost;dbname=foodtiger", "root", "");
    if(isset($_POST['update_id'])) {
        $query="UPDATE returnorder 
        SET statusreturn = 'Approve' 
        WHERE id = '".$_POST["update_id"]."'";
        $statement = $connect->prepare($query);
        $statement->execute();
    }
    
    if(isset($_POST['reject_id'])) {
        $query="UPDATE returnorder 
        SET statusreturn = 'Reject' 
        WHERE id = '".$_POST["reject_id"]."'";
        $statement = $connect->prepare($query);
        $statement->execute();
     }  
?>