<?php
// include File config.inc
 include('includes/header.html'); 
 include('includes/config.inc.php'); 
 
 ?>

<?php 

if(isset($_GET['id']) && $conn ){
 $id=$_GET['id'];
 $sql="SELECT * FROM etudiant WHERE id= '$id'";
 
 $query=$conn->query($sql);
 $result=$query->fetch(PDO::FETCH_ASSOC);

 /*====PUT INFO ON VARIABE TO MAKE IT EASY WHEN YOU GONNA USE IT AT THE FORM ===========*/

 $Firstname=$result['fname'];
 $Lastname=$result['lname'];
 $date_birth=$result['date_birth'];
 $email=$result['email'];
 
 


?>
<center>
<div class="first-sec">
<br> <br>
<h1>UPDATE INFO</h1><br>
	<form method="post" action=" <?php echo Secure_Data($_SERVER['PHP_SELF'])  ;?>" class="update" >
	<table> <tbody>
	<tr><td>
	 </td> <td> <input value="<?php echo $Firstname ;?>" type="text"  name="fname"  />
	</td></tr>
	<tr><td>
	 </td> <td><input value="<?php echo $Lastname ; ?>" type="text"  name="lname"  />
	</td></tr>
	<tr><td>
	</td> <td><input value="<?php echo $date_birth; ?>" type="date" id="date" name="date_birth" />
	</td></tr>
	<tr><td>
	   </td><td><input value="<?php echo $email ; ?>" type="email"  name="email"  /> 
	 </td></tr>
	 <tr><td>
	   </td><td><input value="<?php echo $id ; ?>" type="hidden" name="id"  /> 
	 </td></tr>
	 
	 </tbody></table>
	  <input  type="submit"  name="update" value="Update" class="update"  /> 
      <a href="index.php" class="cancel"> Cancel </a>
   
	</form>
	
	<br>


</div>
</center>
<?php /* END OF IF => */ } ?>


<!--#########################[UPDATE PART]###########################-->

<?php
/*======== SCRIPT TO UPDATE DATA   */

if(isset($_POST['update'])){
	/*============ Recive Data From POST =============*/

	$id=$_POST['id'];
	$firstname=Secure_Data($_POST['fname']);
	$firstname=substr($firstname,0,11);
	$lastname=Secure_Data($_POST['lname']);
	$lastname=substr($lastname,0,11);
	$date_birth=Secure_Data($_POST['date_birth']);
	$email=Secure_Data($_POST['email']);
    $conn->exec("UPDATE etudiant SET fname='$firstname', lname='$lastname' ,date_birth='$date_birth', email='$email' WHERE id='$id'
	");
    

echo"<center><br><br> <h1> Updated Successfully </h1></center>";

echo"<meta http-equiv='refresh' content='1 , url=index.php'/>";

}
 
 ?>

<?php $conn = null;?>
 


