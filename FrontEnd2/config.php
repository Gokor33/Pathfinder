<?php
    
    require "vendor/autoload.php";
    use PhpOrient\PhpOrient;

    $client = new PhpOrient();
    $client->hostname = 'localhost';
    $client->port     = 2424;
    $client->username = 'root';
    $client->password = 'root';
    $client->connect();
    $client->dbOpen( 'Project', 'root', 'root' );
    
?>