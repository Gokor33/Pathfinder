<?php
include '../config.php';

$code = $_POST['Code'];
$title = $_POST['Title'];
$short_title = $_POST['Short_Title'];


$sql = $client->command("INSERT INTO Programme_Codes set Code = '$code',
        Title = '$title',Short_Title ='$short_title'");

        if($sql){
        	echo "Upload successfull";
        }else{
        	die("error inserting to database");
        } 
?>