<?php /*?><?php
include( "../../functions/connect.php" );
if(isset($_POST['submit']))
{    
     
     $FirstName = $_POST['FName'];
     $LastName = $_POST['LName'];
     $Phone = $_POST['Phone'];
     $Address = $_POST['َAddress'];
     require_once ('jdf.php');
     date_default_timezone_set('Asia/Tehran');
     $CreateDate = jdate('Y/m/d');
     $sql = "INSERT INTO projects (Id,FirstName,LastName,Phone,Address,CreateDate,Price) 
                            VALUES ('','$FirstName','$LastName','$Phone','$Address','$CreateDate','')";

     if (mysqli_query($conn, $sql)) {
        $MessageTrue = "";
           
           header("location:infocustomers.php");
         
     } else {
        $MessageFalse = "";
     }
                                
}     
    mysqli_close($conn);
?><?php */?>



<?php
include( "../../functions/connect.php" );
if(isset($_POST['submit'])) {    
    $FirstName = $_POST['FName'];
    $LastName = $_POST['LName'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['َAddress'];
    $file = $_FILES["FileProject"];
    $fileName = $file["name"]; // نام فایل
    $fileTmpName = $file["tmp_name"]; // 
    $uploadPath = "./files/" . $fileName;
    move_uploaded_file($fileTmpName, $uploadPath);
    require_once ('jdf.php');
    date_default_timezone_set('Asia/Tehran');
    $CreateDate = jdate('Y/m/d');
    $sql = "INSERT INTO projects (Id,FirstName,LastName,Phone,Address,CreateDate,Price,Discriptions) 
            VALUES ('','$FirstName','$LastName','$Phone','$Address','$CreateDate','','$uploadPath')";
    
    
    //به دست آوردن اخرین رکورد از جدول project
    
    if (mysqli_query($conn, $sql))
    {
        $MessageTrue = "";
       
        $sqlProjectId ="SELECT Id FROM projects ORDER BY id DESC LIMIT 1";
        $IdP="";
        $all_Item = mysqli_query( $conn, $sqlProjectId );
         while ( $Kind = mysqli_fetch_array($all_Item, MYSQLI_ASSOC )){
              $IdP= $Kind["Id"]; 
         }
        $images = $_FILES['Picture'];
        $uploaded_images = array();
        foreach($images['tmp_name'] as $key=>$tmp_name){
        $file_name = $images['name'][$key];
        $file_tmp = $images['tmp_name'][$key];

        // انجام عملیات بارگذاری فایل و جابجایی فایل به محل مورد نظر
            $filname = md5($file_name.microtime().substr($file_name,-5,5));
           $extension = pathinfo($file_name, PATHINFO_EXTENSION);
           $fileurl ='./images/' . $filname .".". $extension;
        if(move_uploaded_file($file_tmp, $fileurl)){
             $uploaded_images[] = $fileurl;  
        }
    }
        foreach($uploaded_images as $image)
        {
         $sqlPicture = "INSERT INTO pictursprojects (Id,ProjectId,Pictures)
                VALUES ('','$IdP',' $image')";
             mysqli_query($conn, $sqlPicture);
        } 
        header("location:infocustomers.php");     
    mysqli_close($conn);
}
}
?>