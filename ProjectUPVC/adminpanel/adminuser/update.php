<?php
include( "../../../functions/connect.php" );
if(isset($_POST['submit']))
{    
     $Page = $_GET['page'];
     $FirstName = $_POST['edit_FirstName'];
	 $LastName = $_POST['edit_LastName'];
	 $UserName = $_POST['edit_UserName'];
	 $Password = $_POST['edit_Password'];
     $Id = $_GET['id'];
	 $sql = "UPDATE admin_users SET Id=$Id ,FirstName='$FirstName', LastName = '$LastName',  
	 UserName  = '$UserName',  Password = '$Password' WHERE Id = $Id ";
    
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