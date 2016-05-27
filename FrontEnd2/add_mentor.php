<?php
include 'config.php';
session_start();
$user_email = $_SESSION['email'];
$mentor_email = $_REQUEST['email'];
$edg = $client->command("create edge Student_Mentor from (SELECT  FROM Student WHERE Email= '$user_email') to (SELECT FROM Mentor WHERE email ='$mentor_email' )");

if($edg){
	echo "request sent..";
}else{
	echo "eroor";
}
	
?>