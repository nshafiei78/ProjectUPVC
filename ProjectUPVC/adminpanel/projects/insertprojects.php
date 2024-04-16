<?php
include( "../../functions/connect.php" );
if(isset($_POST['submit']))
{    
    
     $Projectid = $_GET['Projectid'];
  
    
     $ProductId = mysqli_real_escape_string($conn,$_POST['Product']);
     $detailId = mysqli_real_escape_string($conn,$_POST['detailId']);
     $Dimensions = $_POST['Dimensions'];
     $Number = $_POST['Number'];
     $Cost = $_POST['Cost'];
     $sql = "INSERT INTO project_p (Id,ProjectId,ProductId,TypeDetailsId,Dimensions,Number,Cost) 
                            VALUES ('','$Projectid','$ProductId','$detailId','$Dimensions','$Number','$Cost')";

     if (mysqli_query($conn, $sql)) {
        $MessageTrue = "";
           
           header("location:projects.php?id=$Projectid");
         
     } else {
        $MessageFalse = "";
     }
                                
}     
    mysqli_close($conn);
?>