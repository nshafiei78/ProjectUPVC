<?php
include("../../functions/connect.php");
if(isset($_GET['id'])) {

    $Id = $_GET['id'];
    $ID = $_GET['ID'];
    $Page = $_GET['page'];
    $sql = "DELETE FROM `project_p` WHERE `Id`=?";
    $result = $conn->prepare($sql);
    $result->bind_param("i", $Id);
    if($result->execute()){
        
         header("location:$Page?id=$ID");
        exit();
    }
    else{

         header("location:$Page");
    }

}