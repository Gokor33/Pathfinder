<?php
	//connecting database
	include ('config.php');
    //$client->dbOpen( 'Pathfinder', 'root', 'root' );
    
    //session
    session_start();
    $Semail = $_SESSION["email"];
    

   	//error_reporting(0);

    //queries
    $sql1 =  $client->query(" SELECT * FROM Mentor WHERE Email like '$Semail' ");
	foreach ($sql1 as $row) 
    {   
    $Fname = $row->First_Name;
    $LName = $row->Last_Name;
    $gender = $row->Gender;
    $email = $row->Email;
    }
    
    //Feilds from previous form
	$Fname = strip_tags($_POST["firstName"]); //from sign-up
	$LName = strip_tags($_POST["lastName"]);
	$email = strip_tags($_POST["Email"]);// from sign-up

	$Pnumber = strip_tags($_POST["Pnumber"]);
	//$Nationailty = strip_tags($_POST[" "]);
	//$country = strip_tags($_POST[" "]);
	$gender = strip_tags($_POST["radios"]);
	$sum = strip_tags($_POST["summary"]);
	$summary = (preg_replace('/(\r+|\n+)/', ' ', $sum));
	// $HighSchoolDEgree = strip_tags($_POST[" "]);
	// $GraduationYear = strip_tags($_POST[" "]); //time
	// $classComplete = strip_tags($_POST[" "]);
	// $curriculum = strip_tags($_POST[" "]);
	// $Specialization = strip_tags($_POST[" "]);
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

	
	//UPDATE First Name
	$client->command("UPDATE Mentor SET First_Name ='$Fname' WHERE Email ='$Semail'");
	
	//UPDATE Last Name
	$client->command("UPDATE Mentor SET Last_Name ='$LName' WHERE Email ='$Semail'");
	
	//UPDATE PHONE NUMBER
	$client->command("UPDATE Mentor SET Phone_Number ='$Pnumber' WHERE Email ='$Semail'");
	
	//UPDATE GENDER
	$client->command("UPDATE Mentor SET Gender ='$gender' WHERE Email ='$Semail'");

	//UPDATE Summary
	$client->command("UPDATE Mentor SET Summary='$summary' WHERE Email ='$Semail'");

	

	//UPDATE 




	header('Location:mentordetails.php');

?>