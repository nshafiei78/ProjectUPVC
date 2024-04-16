<?php
include( "../../functions/connect.php" );
if(isset($_POST['submit']))
{    
     require_once ("../orders/jdf.php");
     $Id = $_GET['ID'];


     
       
     $ConditionId = 3;
    
      $sqlorders = "UPDATE orders 
      SET ConditionId=3
      WHERE Id = $Id";
    
     $Number = $_POST['Number'];
     
     $Price = $_POST['Price'];
     

    
     $sqlrequestedproducts = "INSERT INTO requestedproducts (Id,OrdersId,Number,Price) 
      VALUES ('','$Id','$Number','$Price')";
    
     if (mysqli_query($conn, $sqlorders)) {
        $MessageTrue = "";
         if(mysqli_query($conn, $sqlrequestedproducts)){
             header("Refresh: 0; URL=../index.php");
         }
           
         
     } else {
        $MessageFalse = "";
     }
                                
}     

 
      
      
                     
    mysqli_close($conn);
?>
