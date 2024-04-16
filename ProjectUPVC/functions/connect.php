<?php
/*$servername="localhost";
$username="root";
$password="";
$dbname="upvc";
$dsn="mysql:host=$servername;dbname=$dbname;";
try
{
	$conneect=new PDO($dsn,$username,$password);
	//$conneect->exec("SET CHARCHTER SET UTF8");
	//$conneect->exec("set name utf8");
	//return $conneect;
	
}
catch(PDOException $Error)
{
	echo "در برقراری ارتباط با سرور خطا رخ داده است".$Error->__toString();
	
}
?>*/


    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "upvc";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>