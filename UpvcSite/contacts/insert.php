<?php
include( "../functions/connection.php" );
if(isset($_POST['submit']))
{ 
     $Page = $_GET['page'];
     $FirstName = $_POST['name'];
     $LastName = $_POST['familyname'];
     $email = $_POST['email'];
     $message = $_POST['message'];
     $sql = "INSERT INTO contactsmessage (Id,FirstName,LastName,Email,Message) 
      VALUES ('','$FirstName','$LastName','$email','$message')";

     if (mysqli_query($conn, $sql)) {
        $MessageTrue = "";
        header("Refresh: 0; URL=$Page");
         
     } else {
        $MessageFalse = "";
     }
                                
}     
    mysqli_close($conn);
?>