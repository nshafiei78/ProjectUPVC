<?php
include("../../functions/connect.php");
if(isset($_GET['id'])) {

    $Id = $_GET['id'];
    $Page = $_GET['page'];
    $sql = "DELETE FROM `orders` WHERE `Id`=?";
    $result = $conn->prepare($sql);
    $result->bind_param("i", $Id);
    if($result->execute()){
        header("location:$Page");
        exit();
    }
    else{

         header("location:$Page");
    }

}
?>