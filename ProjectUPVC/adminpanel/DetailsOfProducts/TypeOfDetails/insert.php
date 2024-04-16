<?php
include( "../../../functions/connect.php" );
if(isset($_POST['submit']))
{    
     $Page = $_GET['page'];
     $Title = $_POST['Title'];
	 $GruopId = mysqli_real_escape_string($conn,$_POST['GruopId']);
     
	 $sql = "INSERT INTO typedetails (Id,Title,IdDetails) VALUES ('','$Title', '$GruopId')";
    
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