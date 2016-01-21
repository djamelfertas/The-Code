<?php
$servername="localhost";
$username="root";
$password="";


try{
	$conn = new PDO("mysql:host=$servername; dbname=ma_base",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
}


catch( PDOException $e){
	 die("Connect Failed:".$e->getMessage());
}
//FOR SECURE DATA
function Secure_Data($data) {
  $data = trim($data);
  $data = strip_tags($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
