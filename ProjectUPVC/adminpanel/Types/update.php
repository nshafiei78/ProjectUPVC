<?php
include( "../../functions/connect.php" );
if(isset($_POST['submit']))
{    
     $Id = $_GET['id'];
	 $Page = $_GET['page'];
	 $KindId = mysqli_real_escape_string($conn,$_POST['edit_KindId']);
	 $Title = $_POST['edit_title'];
	 $sql = "UPDATE types 
	 SET Id=$Id ,KindId = $KindId, Title = '$Title' WHERE Id = $Id";
			
    
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