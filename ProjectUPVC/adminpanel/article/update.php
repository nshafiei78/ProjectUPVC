<?php
include( "../../functions/connect.php" );
if(isset($_POST['submit']))
{    
     $Id = $_GET['id'];
    $Page = $_GET['page'];
     $Name = $_POST['NameArticle'];
     $KindId = mysqli_real_escape_string($conn,$_POST['TypeProduct']);
     $file = $_FILES["ArticleFile"];
     $fileName = $file["name"]; // نام فایل
     $fileTmpName = $file["tmp_name"]; // مسیر موقت فایل
        // انتقال فایل به مسیر دلخواه شما
    $uploadPath = "./files/" . $fileName;
    move_uploaded_file($fileTmpName, $uploadPath);
    
     require_once ('jdf.php');
     date_default_timezone_set('Asia/Tehran');
     $DateUpload = jdate('Y/m/d');
    
      $sql = "UPDATE articles SET Id='$Id', Name ='$Name',KindId='$KindId',Discription='$uploadPath',DateUpload='$DateUpload',View='2' 
      WHERE Id = $Id"; 


 if (mysqli_query($conn, $sql)) {
    $MessageTrue = "";
    header("Refresh: 0; URL=$Page");

 } else {
    $MessageFalse = "";
 }

}          
    mysqli_close($conn);
?>