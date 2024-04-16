<?php
//include page
function includepage($page){
	include $page.".php";
}

//Redirect function

function Rdirect($page){
    header("location:$page");
    exit();
}
?>


