<?php 
include 'config.php';
$client->dbOpen( 'Pathfinder', 'root', 'root' );

if($try = $client->query = ("SELECT firstName FROM conf_user WHERE lastName = 'alam'")){

$q = $_REQUEST["q"];
$q = strtolower($q);
echo $q;

if($q !== ""){
	$sql = $client->query = ("SELECT firstName FROM conf_user WHERE firstName ='$q'");
}else{
	echo "No search found";
}
}else{
	echo "Error";
	die();
}

?>