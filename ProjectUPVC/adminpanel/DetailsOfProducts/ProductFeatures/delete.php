<?php
include("../../../functions/connect.php");
if(isset($_GET['id'])) {

    $Id = $_GET['id'];
    $Page = $_GET['page'];
	//echo $Page;
    $sql = "DELETE FROM `product_f` WHERE `Id`=?";
    $result = $conn->prepare($sql);
    $result->bind_param("i", $Id);
	$sql_product = "SELECT ProductsId from product_f where Id = $Id";
	//echo($sql_product);
	$result_product = mysqli_query( $conn, $sql_product );
	while ( $rows = $result_product->fetch_assoc() ) {
		//echo($rows['ProductsId']);
		$Id_product = $rows['ProductsId'];
	}
    if($result->execute()){
        header("location:$Page?id=$Id_product&page=$Page");
        exit();
    }
    else{

         header("location:$Page?id=$Id_product&page=$Page");
    }

}
?>