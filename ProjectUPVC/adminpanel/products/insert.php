<?php
include( "../../functions/connect.php" );
if(isset($_POST['submit']))
{    
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
    echo($PictureName."____");
     $PictureType = $_FILES["Picture"]["type"];
    echo($PictureType."_____");
     $Picturetmp = $_FILES["Picture"]["tmp_name"];
    echo($Picturetmp."______");
     $PictureSize = $_FILES["Picture"]["size"];
    echo($PictureSize."____");
     $PictureError = $_FILES["Picture"]["error"];
    echo($PictureError."______");
     $allowtype = array("gif","png","jpg","jpeg");
     $explode = explode(".",$PictureName);
     $trueformat = end($explode);
     if($PictureType=="image/gif" || $PictureType=="image/png" || $PictureType=="image/jpg" || $PictureType=="image/jpeg")
         {
            $filname = md5($PictureName.microtime().substr($PictureName,-5,5));
            $extension = pathinfo($PictureName, PATHINFO_EXTENSION);
             $fileurl = "./images/" . $filname . "." . $extension;
         
         move_uploaded_file($Picturetmp, $fileurl);
          $sql = "INSERT INTO product (Id,KindId,TypesKind,TypId,Picture,Discription) 
          VALUES ('','$KindId','$TypesKind','$TypeId','$fileurl','$Discription')";
         }
        elseif($PictureType == "" or $PictureType== null)
        {
            $sql = "INSERT INTO product (Id,KindId,TypesKind,TypId,Discription) 
          VALUES ('','$KindId','$TypesKind','$TypeId','$Discription')";
        }
        else
        {
            $_SESSION["novalidformat"]="پسوند فایل مجاز به آپلود نمی باشد";
           header("location:$Page"); 
             exit();
        }
    
     if (mysqli_query($conn, $sql)) {
        $MessageTrue = "ثبت با موفقیت انجام شد.";
       header("location:$Page?message=$MessageTrue");
		 
         
     } else {
        $MessageFalse = "";
     }
                                
}     
    mysqli_close($conn);
?>

