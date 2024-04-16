<?php
include( "../../../functions/connect.php" );
if(isset($_POST['submit']))
{    
     $Page = $_GET['page'];
     $Title = $_POST['edit_Title'];
	 $IdDetails = $_POST['edit_IdDetails'];
     $Id = $_GET['id'];
	 $sql = "UPDATE typedetails SET Id=$Id ,Title='$Title', IdDetails = $IdDetails WHERE Id = $Id";
    
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