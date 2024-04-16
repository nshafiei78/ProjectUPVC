<?php
include( "../../functions/connect.php" );
if(isset($_POST['submit']))
{    
     $Id = $_GET['id'];
     $Page = $_GET['page'];
     $UserId = mysqli_real_escape_string($conn,$_POST['UserId']);
     $ProductsId = mysqli_real_escape_string($conn,$_POST['ProductsId']);
     $TypeProductsId = mysqli_real_escape_string($conn,$_POST['TypeProductsId']);
     $Dimensions = $_POST['Dimensions'];
     $Discription = $_POST['Discription'];

      $sql = "UPDATE orders 
      SET Id='$Id',UserId='$UserId',KindId='$ProductsId',TypeId='$TypeProductsId',
      Dimensions='$Dimensions',Discription='$Discription'
      WHERE Id = $Id";
     if (mysqli_query($conn, $sql)) {
        $MessageTrue = "";
           header("Refresh: 0; URL=orders.php");
         
     } else {
        $MessageFalse = "";
     }
                                
}     
     
    mysqli_close($conn);
?>
