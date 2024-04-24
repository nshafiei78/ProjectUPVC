<?php
include( "../functions/connection.php" );
if(isset($_POST['submit']))
{ 
     $Page = $_GET['page'];
     $FirstName = $_POST['name'];
     $LastName = $_POST['familyname'];
     $UserName = $_POST['username'];
     $Password = $_POST['password'];
     $RepeatPassword = $_POST['repeatpassword'];
     $Email = $_POST['email'];
     
     $sql = "INSERT INTO users (Id,FirstName,LastName,UserName,Password,Email) 
      VALUES ('','$FirstName','$LastName','$UserName','$Password','$Email')";
    
     if (mysqli_query($conn, $sql)) {
        $MessageTrue = "";
        header("Refresh: 0; URL=$Page");
     } else {
        $MessageFalse = "";
     }
}     
    mysqli_close($conn);
?>