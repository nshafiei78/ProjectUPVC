<?php
include( "../../functions/connect.php" );
if(isset($_POST['submit']))
{
    
     $Page = $_GET['page'];
     $ID = $_GET['Projectid'];
     $Project_PId = $_GET['Project_pid'];
     $ProductId = mysqli_real_escape_string($conn,$_POST['Product']);
     $detailId = mysqli_real_escape_string($conn,$_POST['detailId']);
     $Dimensions = $_POST['Dimensions'];
     $Number = $_POST['Number'];
     $Cost = $_POST['Cost'];
    
      $sql = "UPDATE project_p 
      SET ProductId = '$ProductId',TypeDetailsId ='$detailId',Dimensions='$Dimensions',Number='$Number',Cost='$Cost' WHERE Id = $Project_PId";
     if (mysqli_query($conn, $sql)) {
        $MessageTrue = "";
           header("location:$Page?id=$ID"); 
           exit();
         
     } else {
        $MessageFalse = "";
     }
 }
    mysqli_close($conn);
    
?>
