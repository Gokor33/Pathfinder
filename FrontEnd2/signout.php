<?php 
session_start();
echo $_SESSION['email'];
session_destroy();
header('Location:signin.html');
?>