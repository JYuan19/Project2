<?php
    $connect = new PDO("mysql:host=localhost;dbname=foodtiger", "root", "");
    if(isset($_POST['update_id'])) {
        $query="UPDATE requestjob 
        SET statusreturn = 'approve' 
        WHERE id = '".$_POST["update_id"]."'";
        $statement = $connect->prepare($query);
        $statement->execute();
    }
    
    if(isset($_POST['reject_id'])) {
        $query="UPDATE requestjob 
        SET statusreturn = 'reject' 
        WHERE id = '".$_POST["reject_id"]."'";
        $statement = $connect->prepare($query);
        $statement->execute();
     }  
?>