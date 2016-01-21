

<?php
// include File config.inc
 include('includes/header.html'); 
 include('includes/config.inc.php'); 
 
 ?>

<!-- INSERT CODE -->

<?php
$fnameErr = $lnameErr ="";


if($_SERVER['REQUEST_METHOD']=='POST'){

  $fname= Secure_Data($_POST['fname']);
  $fname=substr($fname,0,11);
  $lname= Secure_Data($_POST['lname']);
  $lname=substr($lname,0,11);
  $date_birth= Secure_Data($_POST['date_birth']);
  $email= Secure_Data( $_POST['email']);

if (!empty($_POST['fname']) && !empty($_POST['lname']) ) {
  

 
  


  $req=$conn->prepare('INSERT INTO etudiant(fname,lname,date_birth,email)
  VALUES(:fname,:lname,:date_birth,:email) ');
   
  
    $req->bindParam(':fname', $fname);
    $req->bindParam(':lname', $lname);
    $req->bindParam(':date_birth', $date_birth);
    $req->bindParam(':email', $email);
    $req->execute();

    echo "<center> <br><h1> New Records Inserted Successfully :) </h1> </center>";

    echo "<meta http-equiv='refresh' content='1 , url=index.php'/>";
    
    


  
  $conn = null;
 
}else{
    echo "<center> <br><br> <h1> You Were Sent Empty DATA :( </h1> </center>";
    echo "<meta http-equiv='refresh' content='5 , url=index.php'/>";
  
}
}// END OF INSERT CODE




  ?>




<!-- END OF INSERT CODE -->

<center>
<div class="first-sec">
<br> <br><br><br>

<h1>CREATE ACCOUNT FOR NEW STUDENT</h1><br>

	<form method="post" action="<?php echo Secure_Data($_SERVER['PHP_SELF'])  ;  ?>">
	<table> <tbody>
	<tr><td>
	<label for="fname"> </label> </td> <td> <input type="text" id="fname" name="fname" placeholder=" Firstname" />
	<span class="error"> <?php echo $fnameErr; ?></span>
	</td></tr>
	<tr><td>
	<label for="lname"> </label> </td> <td><input type="text" id="lname" name="lname" placeholder=" Lastname" />
	<span class="error"> <?php echo $lnameErr; ?></span>
	</td></tr>
	<tr><td>
	<label for="date"> </label></td> <td><input type="date" id="date" name="date_birth" placeholder=" Date Birth example:2001/10/01" />
	</td></tr>
	<tr><td>
	   </td><td><input type="email"  name="email" cols="50" placeholder=" E-mail" /> 
	 </td></tr>
	 </tbody></table>
	<input type="submit" value="CREATE NOW !" name="submit"  />
		
	</form>
	<br>


</div>

<!-- liste des etudiants -->

<?php
    // DONT SHWO TABLE IF EMPTY DATA 

     
     
    $query= $conn->query("SELECT * FROM etudiant ");
    $numRows= $query->rowCount();
    
    if( $numRows >0 ){	
    
   
   ?> 
<div class="container"> 
<br><br> <br> 
<div class="second-sec">
   	
	<h1>  LIST OF STUDENTS ON DATA BASE</h1>
	<div style="border-bottom:1px solid #E1E1E1;"></div>
	<br>

	<table class="table" ><tbody><tr>

	<th> <b>Firstname </b> </th>
	<th> <b>Lastname</b> </th>
	<th> <b>Email</b> </th>
	<th> <b>DateBirth</b> </th>
	<th> <b> Delete </b></th>
	<th> <b> Edit</b></th> 
	<?php

    
    while($result= $query->fetch(PDO::FETCH_ASSOC)){

    
    
    ?>
    <tr >
    <td>
     <?php echo $result['fname'] ;?> 
    </td>
    <td>   
        <?php echo  $result['lname'] ;?> 
    </td>
    <td>   
        <?php echo  $result['email'] ;?> 
    </td>

    <td>   
        <?php echo  $result['date_birth'] ;?> 
    </td>

    <td>
    <!-- DELTET -->
    <?php echo ' <a href="delete.php?id='.$result['id'].'"> <button class="delete">Delete </button></a> '; ?>     

    </td>

    <td>
    <!-- UPDATE -->
    
    <?php echo ' <a href="update.php?id='.$result['id'].'"> <button type="submit" class="edit">Edit </button></a> '; ?>
   
  
    </td>
    
   <?php }}?> <!-- END OF CONDITION -->


</tr></tbody></table>
</center>






 
</div>


<footer>
	
	<p> Developed & Designed By <b> Xujik Yahik </b> | Copyright &copy 2016.<br> Get This Open Source Project  From <b style="font-size:19px;"><a href="#"> GitHub </a></b> </p>

</footer>

</div>





<!--close connection -->

<?php $conn = null;?>
<br> <br> <br> 




</body>
</html>
