<?php
// session_start();
include "connection.php";
include "pdo.php";

function upload_food($path, $file)
{
    $targetDir = $path;
    // get the filename
    $filename = basename($file['name']);
    $targetFilePath = $targetDir . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($filename)) {
        // allow certain file format
        $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowType)) {
            // upload file to the server
            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                return $targetFilePath;
            }
        }
    }
}

if(isset($_POST['insert'])) {
    $order_id = $_POST['order_id'];
    $Name = $_POST['Name'];
    $reason = $_POST['reason'];
    $files = $_FILES['foodUpload'];
    $foodImage = upload_food('../image/return/', $files);
    $statusreturn = $_POST['statusreturn'];
    
    if(!empty($foodImage)){
        $sql = "INSERT into returnorder (id, order_id, name, reason, image, statusreturn)values('','$order_id', '$Name', '$reason', '$foodImage','$statusreturn')";
        $query = mysqli_query($conn,$sql );
        echo "<script>alert('Congratulations,Insert Succesful!!!'); window.location.assign('../paymenthistory.php');</script>";
    }else{
        echo "<script>alert('Invalid !!! Please put picture! '); window.location.assign('../return,php?order_id='".$order_id."');</script>";
    }	 	  	

} else {
    echo "<script>alert('Invalid !'); window.location.assign('../return.php?order_id='".$order_id."');</script>";
}


?>