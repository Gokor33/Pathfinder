<?php
include '../config.php';

$subject = $_POST['Subject'];
$rank = $_POST['Rank'];
$inst = $_POST['Institution'];
$teach_qual = $_POST['Teaching_Quality'];
$teach_qual_rank = $_POST['Teaching_Quality_Rank'];
$overall_score = $_POST['Overall_Score'];
$stud_exp_rank = $_POST['Student_Experience_Rank'];
$research_rate = $_POST['Research_Rating'];
$researh_rate_rank = $_POST['Researh_Rating_Rank'];
$entry_point = $_POST['Entry_Points'];
$entry_rank = $_POST['Entry_Rank'];
$grad_pros = $_POST['Graduate_Prospects'];
$grad_pros_rank = $_POST['Graduate_Prospects_Rank'];
$student_exp = $_POST['Student_Experience'];


$sql = $client->command("INSERT INTO Subject_Rankings set Subject = '$subject', Rank = '$rank',Institution ='$inst', Teaching_Quality = '$teach_qual', Teaching_Quality_Rank = '$teach_qual_rank', Overall_Score = 
        '$overall_score',Student_Experience_Rank = '$stud_exp_rank', Research_Rating ='$research_rate',Researh_Rating_Rank ='$researh_rate_rank',Entry_Points ='$entry_point',Entry_Rank ='$entry_rank',Graduate_Prospects ='$grad_pros',Graduate_Prospects_Rank ='$grad_pros_rank',Student_Experience ='$student_exp'");

        if($sql){
        	echo "Upload successfull";
        }else{
        	die("error inserting to database");
        } 
?>