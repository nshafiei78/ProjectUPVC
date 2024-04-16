<?php
include( "../../functions/connect.php" );
if(isset($_POST['submit']))
{    
     $Page = $_GET['page'];
     $Name = $_POST['Name'];
	 $LastName = $_POST['LastName'];
	 $Username = $_POST['Username'];
	 $password = $_POST['password'];
	 $sql = "INSERT INTO admin_users (Id,FirstName,LastName,UserName,`Password`,IsArchive)
	 VALUES ('','$Name', '$LastName','$Username', '$password',0)";
    
     if (mysqli_query($conn, $sql)) {
        $MessageTrue = "";
           header("Refresh: 0; URL=$Page"); 
     } 
	 else {
        $MessageFalse = "";
     }
                                
}     
    mysqli_close($conn);
?>