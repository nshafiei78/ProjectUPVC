<?php
include( "../functions/connection.php" );
if(isset($_POST['submit']))
{ 
     $Page = $_GET['page'];
     $UserName = $_POST['username'];
     $Password = $_POST['password'];
      if (!$UserName == "" && !$UserName == "") {
          $sql = "SELECT Id,`UserName`,`Password` FROM `users` 
         WHERE `UserName`=? AND `Password`=?";
        $result = $conn->prepare($sql);
        $result->bind_param("ss", $UserName, $Password);
        $result->execute();
        $result->store_result();
        $rows = $result->num_rows;
          $sqlid = "SELECT Id FROM `users` 
         WHERE `UserName`='$UserName' AND `Password`='$Password'";
           $all_Item = mysqli_query( $conn,  $sqlid );
         while ( $Kind = mysqli_fetch_array($all_Item, MYSQLI_ASSOC )){
              $Id= $Kind["Id"]; 
         }
        if ($result->num_rows == 1) {
            header("Refresh: 0; URL=$Page");
            header("location:$Page?id=$Id&tmpid=2");
            
            exit();
        
        } else {
            echo "<script>alert('حساب کاربری با مشخصات وارد شده وجود ندارد')</script>";
        }
    } 
    
}     
    mysqli_close($conn);
?>

