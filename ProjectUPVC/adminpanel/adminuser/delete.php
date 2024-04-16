<?php
include("../../functions/connect.php");
if(isset($_GET['id'])) {

    $Id = $_GET['id'];
    $Page = $_GET['page'];
    $sql = "UPDATE admin_users SET IsArchive = 1 WHERE Id = $Id ";
    
    if(mysqli_query($conn, $sql)){
        header("location:$Page");
        exit();
    }
    else{

         header("location:$Page");
    }

}
?>