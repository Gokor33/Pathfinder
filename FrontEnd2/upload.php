<?php
include 'config.php';

$UNI_name = $_REQUEST['UNI_NAME'];
$UNI_prog = $_REQUEST['UNI_PROG'];
$HSD = $_REQUEST['HSD'];
if($HSD == "IGCSE" ){
$Subj = $_REQUEST['SUBJ'];
}elseif($HSD == "Pearson"){
$Subj = $_REQUEST['SUBJP'];
}
$grade = $_REQUEST['GRADE'];

$req = $client->command("INSERT INTO Requirements SET Uni_Name='$UNI_name', Uni_Prog ='$UNI_prog' , Highschool_Degree ='$HSD' , Subject ='$Subj' , Grade ='$grade' ");
if($req){
	echo "<h4><em><b>upload success</b></em></h4>";
}else{
	die("Error uploading");
}
?>