<?php
include( "../../../functions/connect.php" );
if(isset($_POST['submit']))
{    
     $Page = $_GET['page'];
	 $KindId = mysqli_real_escape_string($conn,$_POST['KindId']);
	 $TypeDetailsId = mysqli_real_escape_string($conn,$_POST['detailId']);
	 $Discription = $_POST['Discription'];
     
	 $sql = "INSERT INTO features (Id,KindId,TypeDetailsId,Discription) VALUES ('', $KindId, $TypeDetailsId,'$Discription')";
    
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