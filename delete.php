<?php

// include File config.inc
 include('includes/header.html'); 
 include('includes/config.inc.php'); 

//DELETE CODE

if(isset($_GET['id'])){
$id=$_GET['id'];  
$del="DELETE FROM etudiant WHERE id='$id'";
$conn->exec($del);

 echo "<center><br><br> <h1> Data Deleted Successfully</h1> </center>";
 echo "<meta http-equiv='refresh' content='1 , url=index.php'/>";


}


?>

