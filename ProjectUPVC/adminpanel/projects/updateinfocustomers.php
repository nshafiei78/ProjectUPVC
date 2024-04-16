<?php
include( "../../functions/connect.php" );
if(isset($_POST['submit']))
{
    
     $Page = $_GET['page'];
     $FirstName = $_POST['FName'];
     $LastName = $_POST['LName'];
     $Phone = $_POST['Phone'];
     $Address = $_POST['َAddress'];
     
      $sql = "UPDATE projects 
      SET FirstName='$FirstName',LastName='$LastName',Phone='$Phone',
      Address='$Address'";
     if (mysqli_query($conn, $sql)) {
        $MessageTrue = "";
           header("location:$Page"); 
           exit();
         
     } else {
        $MessageFalse = "";
     }
 }
    mysqli_close($conn);
    
?>
