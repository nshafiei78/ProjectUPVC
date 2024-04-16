<?php
if(isset($_FILES['images'])){
    $images = $_FILES['images'];

    $uploaded_images = array();
    $uploaded_type = array();
    foreach($images['tmp_name'] as $key=>$tmp_name){
        $file_name = $images['name'][$key];
        $file_tmp = $images['tmp_name'][$key];
         $file_type = $images['type'][$key];
        // انجام عملیات بارگذاری فایل و جابجایی فایل به محل مورد نظر
            $filname = md5($file_name.microtime().substr($file_name,-5,5));
           $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $fileurl = './images/' . $filname . $extension;
        if(move_uploaded_file($file_tmp, $fileurl)){
            $uploaded_images[] = $fileurl;
            
        }
    }

    // نمایش نام عکس های بارگذاری شده
    echo "عکس های بارگذاری شده: <br>";
    foreach($uploaded_images as $image){
        echo $image . "<br>";
    }
    foreach($uploaded_type as $image){
        echo $image . "<br>";
    }
}
?>