<?php
include '../config.php';

$rank = $_POST['Rank'];
$overall_rank = $_POST['Overall_Rank'];
$uni = $_POST['University'];
$town = $_POST['Town'];
$grad_sal= $_POST['Graduate_Salary'];


$sql = $client->command("INSERT INTO Grad_Salary set Rank = '$rank',
        Overall_Rank = '$overall_rank',University ='$uni', Town = '$town', Grad_Salary = '$grad_sal'");

        if($sql){
        	echo "Upload successfull";
        }else{
        	die("error inserting to database");
        } 
?>