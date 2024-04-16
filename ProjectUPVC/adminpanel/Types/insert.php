<?php
include( "../../functions/connect.php" );
if(isset($_POST['submit']))
{    
     $Page = $_GET['page'];
	 $KindId = mysqli_real_escape_string($conn,$_POST['KindId']);
	 $Title = $_POST['Title'];
     
	 $sql = "INSERT INTO Types (Id,KindId,Title) VALUES ('', $KindId, '$Title')";
    
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