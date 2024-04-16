<?php
include("../../../functions/connect.php");
if(isset($_POST['submit'])) {
    $Page = $_GET['page'];
    $Id = $_GET['id'];
    $feature = $_POST['insert_feature'];

    if(!empty($feature)) {
        // Retrieve current product features
        $sql_product = "SELECT * from product_f where ProductsId = $Id";
        $result_product = mysqli_query($conn, $sql_product);
        $currentFeatures = [];
        while($row = mysqli_fetch_assoc($result_product)) {
            $currentFeatures[] = $row['FeaturesId'];
        }

        $duplicateFeatures = [];
        foreach($feature as $selectedFeature) {
            if(!in_array($selectedFeature, $currentFeatures)) {
                $sql = "INSERT INTO product_f (Id, ProductsId, FeaturesId) VALUES ('', $Id, $selectedFeature)";
                mysqli_query($conn, $sql);
            } else {
                $duplicateFeatures[] = $selectedFeature;
            }
        }

        if(empty($duplicateFeatures)) {
            header("location:$Page?id=$Id");
        } else {
            $duplicateFeaturesStr = "";
            foreach($duplicateFeatures as  $FeatursId){
                     $sql_product_duplicate = "SELECT * from v_features where Id = $FeatursId";
        $result_product_duplicate = mysqli_query($conn, $sql_product_duplicate);
        $currentFeatures_duplicate = [];
        while($row = mysqli_fetch_assoc($result_product_duplicate)) {
            ////$currentFeatures_duplicate[] = 
            if($duplicateFeaturesStr != ""){
            $duplicateFeaturesStr .= " و ";
            }
            $duplicateFeaturesStr .=  $row['typedetails_Title'];
        }  
                
            }

            ////$duplicateFeaturesStr = implode(", ", $currentFeatures_duplicate);
            
            header("location:$Page?message=$duplicateFeaturesStr&id=$Id");
        }
    } else {
        echo "Please select at least one feature.";
    }
}

mysqli_close($conn);
?>