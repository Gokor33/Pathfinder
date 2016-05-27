<?php
include '../config.php';

$code = $_POST['Code'];
$mode_study = $_POST['Mode_Study'];
$level= $_POST['Level'];
$activity = $_POST['Activity'];
$location = $_POST['Location'];
$emp_code= $_POST['Emp_Code'];
$job_Title= $_POST['Job_Title'];
$salary= $_POST['Salary'];
$course_name= $_POST['Course_Name'];
$study_subject= $_POST['Study_Subject'];
$study_UName = $_POST['Study_UName'];
$emp_name= $_POST['Emp_Name'];

$sql = $client->command("INSERT INTO Grad_Placement set Code = '$code',
        Mode_Study = '$mode_study',Level ='$level', Activity = '$activity', Emp_Code = '$emp_code', Job_Title = 
        '$job_Title',Salary = '$salary', Course_name ='$course_name',Study_Subject ='$study_subject',Study_UName ='$study_UName',Emp_Name ='$emp_name'");

        if($sql){
        	echo "Upload successfull";
        }else{
        	die("error inserting to database");
        }  
        

?>