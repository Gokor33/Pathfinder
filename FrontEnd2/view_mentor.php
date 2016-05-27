<?php
include 'config.php';

$mentor = $client->query("SELECT * FROM Mentor");
echo "
	<style>
	table, th, td {
    border: 1px solid black;
	}
	</style>
	
	<table id='verifyTable'>
  <tr>
    <th>Name</th>
    <th>Gender</th>
    <th>Phone Number</th>
    <th>Date Of Birth</th>
    <th>Email</th>
    <th>verified</th>
  </tr>
	";

	try {
	foreach($mentor as $row){
	$gender = $row->Gender;
	$verified = $row->Verified;
	$fName = $row->First_Name;
	$lName = $row->Last_Name;
	$Pnumb = $row->Phone_Number;
	$DOB = $row->Date_Of_Birth;
	$email = $row->Email;
	echo "

  <tr>
    <td><a href='alluserdetails.php?email=".$email." '>  ".$fName." ".$lName."</a></td>
    <td>".$gender."</td>
	<td>".$Pnumb."</td>
	<td>".$DOB."</td>
	<td id='eID'>".$email."</td>
	<td id='ver'>";
	
	if($verified == "False"){echo "<a href='verify.php?eID=".$email." '>".$verified."</a>";}
	else{echo $verified;};

	echo "</td> </tr>";
}
	} catch (OutOfBoundsException $e) {
		$e->getMessage();
	}
 echo"</table>";



 //href='verify.php?eID=".$email."
?>