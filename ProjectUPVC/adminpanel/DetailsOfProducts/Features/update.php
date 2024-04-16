<?php
include( "../../../functions/connect.php" );
if(isset($_POST['submit']))
{    
     $Id = $_GET['id'];
	 $Page = $_GET['page'];
	 $KindId = mysqli_real_escape_string($conn,$_POST['edit_KindId']);
	 $TypeDetailsId = mysqli_real_escape_string($conn,$_POST['edit_detailId']);
	 $Discription = $_POST['Discription'];
	 $sql = "UPDATE features 
	 SET Id=$Id ,KindId = $KindId, TypeDetailsId = $TypeDetailsId, Discription = '$Discription' WHERE Id = $Id";
			
    
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