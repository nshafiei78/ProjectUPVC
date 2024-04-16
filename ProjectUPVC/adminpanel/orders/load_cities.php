<?php
include("file:///C|/xampp/htdocs/functions/connect.php");
if(isset($_GET['submit'])) {
 $Productsid = mysqli_real_escape_string($conn,$_POST['Products']);
   
         header("location:orders.php?pid=$Productsid");
    exit();
   

}
?>