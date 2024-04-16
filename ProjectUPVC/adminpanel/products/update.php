<?php
include( "../../functions/connect.php" );
if(isset($_POST['submit']))
{    
     $Id = $_GET['id'];
     $KindId = $_GET['kind_id'];
     $Page = $_GET['page'];
      if (isset($_POST['TypesKind'])) {
        $TypesKind = mysqli_real_escape_string($conn, $_POST['TypesKind']);
    } else {
        $TypesKind = 3;
    }
     $TypeId = mysqli_real_escape_string($conn,$_POST['TypeId']);
     $Discription = $_POST['Discription'];
     $PictureName = $_FILES["Picture"]["name"];
     $PictureType = $_FILES["Picture"]["type"];
     $Picturetmp = $_FILES["Picture"]["tmp_name"];
     $PictureSize = $_FILES["Picture"]["size"];
     $PictureError = $_FILES["Picture"]["error"];
     $allowtype = array("gif","png","jpg","jpeg");
     $explode = explode(".",$PictureName);
     $trueformat = end($explode);
     if($PictureType=="image/gif" || $PictureType=="image/png" || $PictureType=="image/jpg" || $PictureType=="image/jpeg")
         {
            $filname = md5($PictureName.microtime().substr($PictureName,-5,5));
            $extension = pathinfo($PictureName, PATHINFO_EXTENSION);
             $fileurl = "./images/" . $filname . "." . $extension;
         
         move_uploaded_file($Picturetmp, $fileurl);
        
          $sql = "UPDATE product 
          SET Id ='$Id',KindId ='$KindId',TypesKind = '$TypesKind',TypId ='$TypeId',Picture ='$fileurl',Discription ='$Discription'
          WHERE Id = $Id";
          
         }
        else
        {
            $_SESSION["novalidformat"]="پسوند فایل مجاز به آپلود نمی باشد";
             header("location:$Page"); 
             exit();
        }
    
     if (mysqli_query($conn, $sql)) {
        $MessageTrue = "";
     header("Refresh: 0; URL=$Page");
         
     } else {
        $MessageFalse = "";
     }
                                
}     
    mysqli_close($conn);
?>