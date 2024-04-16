<?php
include( "../../functions/connect.php" );

if(isset($_POST['submit']))
{    
     require_once ('jdf.php');
     $Page = $_GET['page'];
     $UserId = mysqli_real_escape_string($conn,$_POST['User']);
     $ProductsId = mysqli_real_escape_string($conn,$_POST['Products']);
     $TypeProductsId = mysqli_real_escape_string($conn,$_POST['TypeProducts']);
     $Dimensions = $_POST['Dimensions'];
     $Discription = $_POST['Discription'];
     date_default_timezone_set('Asia/Tehran');

     // بدست آوردن تاریخ و ساعت شمسی حال
     $currentDate = jdate('Y/m/d');
     $currentTime = date('H:i:s');
      $sql = "INSERT INTO orders (Id,UserId,KindId,TypeId,Dimensions,Discription,Date,ConditionId) 
      VALUES ('','$UserId','$ProductsId','$TypeProductsId','$Dimensions','$Discription','$currentDate $currentTime','1')";

     if (mysqli_query($conn, $sql)) {
        $MessageTrue = "";
           header("Refresh: 0; URL=orders.php");
         
     } else {
        $MessageFalse = "";
     }
                                
}     
    mysqli_close($conn);
?>

