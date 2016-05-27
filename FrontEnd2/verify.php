<?php 
include 'config.php';

$email = $_REQUEST['eID'];

$verify = $client->command("UPDATE Mentor SET Verified='True' WHERE Email = '$email'");
if($verify){
	echo "successful verification";
}
echo "</br>Returning back in few sec";
header('Refresh: 2; URL= ' . $_SERVER['HTTP_REFERER']);
?>