<?php
include("../../functions/connect.php");
if(isset($_GET['id'])) {

    $Id = $_GET['id'];
    $Page = $_GET['page'];
    $sql = "DELETE FROM `product` WHERE `Id`=?";
    $result = $conn->prepare($sql);
    $result->bind_param("i", $Id);
    if($result->execute()){
		$MessageTrue = "حذف با موفقیت انجام شد.";
        header("location:$Page?message=$MessageTrue");
        
        exit();
    }
    else{

       $Messagefalse = "حذف با موفقیت انجام نشد!";
       header("location:$Page?message=$Messagefalse");
    }

}