<?php
	//connecting database
	include ('config.php');
    //$client->dbOpen( 'Pathfinder', 'root', 'root' );
    
    //session
    session_start();
    $Semail = $_SESSION["email"];
    

   	 //error_reporting(0);

    //queries
    $sql1 =  $client->query(" SELECT * FROM Student WHERE Email like '$Semail' ");
	try{
	foreach ($sql1 as $row) 
    {   
    $Fname = $row->First_Name;
    $LName = $row->Last_Name;
    $gender = $row->Gender;
    $email = $row->Email;
    $phoneNumber = $row->Phone_Number;
    }
    }catch(OutOfBoundsException $e){

    }
    //Feilds from previous form
	$Fname = strip_tags($_POST["firstName"]); //from sign-up
	$LName = strip_tags($_POST["lastName"]);

	$Pnumber = strip_tags($_POST["Pnumber"]);
	$gender = strip_tags($_POST["radios"]);
	$sum = strip_tags($_POST["summary"]);
	$summary = (preg_replace('/(\r+|\n+)/', ' ', $sum));

	$HSD = strip_tags($_POST["HSD"]); //high school degree
	$GraduationYear = strip_tags($_POST["DOBYear"]); //time
	$NoOfSubj = strip_tags($_POST["NoSubj"]);
	$SubjI = strip_tags($_POST["SUBJ"]); //IGCSE subjects
	$SubjP = strip_tags($_POST["SUBJP"]); // Pearson subjects
	$grade = strip_tags($_POST["GRADE"]);
	// $FieldOfStudy = strip_tags($_POST[" "]);
	// $Societies = strip_tags($_POST[" "]);
	// $Description = strip_tags($_POST[" "]);
	// $Company = strip_tags($_POST[" "]);
	// $position = strip_tags($_POST[" "]);
	// $location = strip_tags($_POST[" "]);
	// $timePeriod = strip_tags($_POST[" "]); //Time
	// $Description = strip_tags($_POST[" "]);
	// $Languages = strip_tags($_POST[" "]);
	// $Hobbies = strip_tags($_POST[" "]);
	// $City = strip_tags($_POST[" "]);
	// $industry = strip_tags($_POST[" "]);
	// $SubjectInterest = strip_tags($_POST[" "]);
	// $StudyBudget = strip_tags($_POST[" "]);
	// $SpecificOccupation = strip_tags($_POST[" "]);
	// $ExpectedSalararies = strip_tags($_POST[" "]);
	// $workType = strip_tags($_POST[" "]);

	
	//UPDATE PHONE NUMBER
	$client->command("UPDATE Student SET Phone_Number ='$Pnumber' WHERE Email ='$Semail'");
	

	//UPDATE GENDER
	$client->command("UPDATE Student SET Gender ='$gender' WHERE Email= '$Semail'");

	//Update Summary
	$client->command("UPDATE Student SET Summary='$summary' WHERE Email ='$Semail'");
	

	//Update subj
	if($HSD == 'IGCSE'){

	$client->command("create edge Subject from (SELECT FROM Student WHERE Email ='$Semail') to (SELECT FROM Cambridge_IGCSE WHERE Subjects ='$SubjI' )"); 
	$client->command("INSERT INTO Subject SET Grade='$grade'");

	}elseif($HSD == 'Pearson'){

	$client->command("create edge subject from (SELECT FROM Student WHERE Email ='$Semail') to (SELECT FROM Pearson WHERE Subjects ='$SubjP')");
}



	header('Location:userdetails.php');

?>