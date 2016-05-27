<?php 
include 'config.php';
//$client->dbOpen( 'Pathfinder', 'root', 'root' );


$type = $_REQUEST["type"];
$type = strtolower($type);
$searchq = $_REQUEST["search_bar"];
//$searchq = strtolower($searchq);

if($searchq != NULL){
switch ($type) {
		
		//search by names
		case 'name':

		// search in mentor first
		$sql = $client->query("SELECT * FROM Mentor WHERE First_Name LIKE '$searchq' OR Last_Name LIKE '$searchq'");
		try{
		foreach ($sql as $row) 
		{       
    	$Fname = $row->First_Name;
    	$LName = $row->Last_Name;
    	$gender = $row->Gender;
    	$email = $row->Email;
    	$Pnumb = $row->Phone_Number;

    	echo "<a href='alluserdetails.php?email=".$email."' >".$Fname . " ".$LName."</a></br>";

		}
		}catch(OutOfBoundsException $e){
   		echo "out of bound exception error " . $e->getMessage();
		}

		//search in student
		$sql2 = $client->query("SELECT * FROM Student WHERE First_Name LIKE '$searchq' OR Last_Name LIKE '$searchq'");
		try{
		foreach ($sql2 as $row2) 
		{       
    	$Fname2 = $row2->First_Name;
    	$LName2 = $row2->Last_Name;
    	$gender2 = $row2->Gender;
    	$email2 = $row2->Email;
    	$Pnumb2 = $row2->Phone_Number;

    	echo "<a href='alluserdetails.php?email=".$email2."' >".$Fname2 . " ".$LName2."</a></br>";

		}
		}catch(OutOfBoundsException $e){
   		echo "out of bound exception error " . $e->getMessage();
		}
		

		$searchq = preg_replace("#[^0-9a-z]i#","",$searchq);

		if($sql == NULL && $sql2 == NULL){
			echo "No result found for '".$searchq."'' ";
		}
		

				
		
			break;

		//search by phone numbers	
		case 'phone number':
		$sql = $client->query("SELECT * FROM Mentor WHERE Phone_Number LIKE '$searchq'");
		try{
		foreach ($sql as $row) 
		{       
    	$Fname = $row->First_Name;
    	$LName = $row->Last_Name;
    	$gender = $row->Gender;
    	$email = $row->Email;
    	$Pnumb = $row->Phone_Number;

    	echo "<a href='alluserdetails.php?email=".$email."' >".$Fname . " ".$LName."</a></br>";

		}
		}catch(OutOfBoundsException $e){
   		echo "out of bound exception error " . $e->getMessage();
		}

		//search in student
		$sql2 = $client->query("SELECT * FROM Student WHERE Phone_Number LIKE '$searchq'");
		try{
		foreach ($sql2 as $row2) 
		{       
    	$Fname2 = $row2->First_Name;
    	$LName2 = $row2->Last_Name;
    	$gender2 = $row2->Gender;
    	$email2 = $row2->Email;
    	$Pnumb2 = $row2->Phone_Number;

    	echo "<a href='alluserdetails.php?email=".$email2."' >".$Fname2 . " ".$LName2."</a></br>";

		}
		}catch(OutOfBoundsException $e){
   		echo "out of bound exception error " . $e->getMessage();
		}
		

		$searchq = preg_replace("#[^0-9a-z]i#","",$searchq);

		if($sql == NULL && $sql2 == NULL){
			echo "No result found for '".$searchq."'' ";
		}
			break;

		//search by email 
		case 'email':
		$sql = $client->query("SELECT * FROM Mentor WHERE Email LIKE '$searchq'");
		try{
		foreach ($sql as $row) 
		{       
    	$Fname = $row->First_Name;
    	$LName = $row->Last_Name;
    	$gender = $row->Gender;
    	$email = $row->Email;
    	$Pnumb = $row->Phone_Number;

    	echo "<a href='alluserdetails.php?email=".$email."' >".$Fname . " ".$LName."</a></br>";

		}
		}catch(OutOfBoundsException $e){
   		echo "out of bound exception error " . $e->getMessage();
		}

		//search in student
		$sql2 = $client->query("SELECT * FROM Student WHERE Email LIKE '$searchq'");
		try{
		foreach ($sql2 as $row2) 
		{       
    	$Fname2 = $row2->First_Name;
    	$LName2 = $row2->Last_Name;
    	$gender2 = $row2->Gender;
    	$email2 = $row2->Email;
    	$Pnumb2 = $row2->Phone_Number;

    	echo "<a href='alluserdetails.php?email=".$email2."' >".$Fname2 . " ".$LName2."</a></br>";

		}
		}catch(OutOfBoundsException $e){
   		echo "out of bound exception error " . $e->getMessage();
		}
		

		$searchq = preg_replace("#[^0-9a-z]i#","",$searchq);

		if($sql == NULL && $sql2 == NULL){
			echo "No result found for '".$searchq."'' ";
		}
			break;

		case 'id':
		echo "haven't worked with IDs yet";
			break;
		default:
			echo " 'type' mismatch";
			break;
	}
	
}else{
	echo "empty search";
}

?>