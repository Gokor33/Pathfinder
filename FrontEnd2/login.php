<?php
   
    include 'config.php';
    //$client->dbOpen( 'Pathfinder', 'root', 'root' );
    
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $account = $_POST['rad'];
    //echo $_POST['Password'] ."| ". $_POST['Email']."| ";
    session_start();


    //PASSWORD VERIFICATION

    //search in student first
    $sql1 = $client->query("SELECT Password FROM student WHERE Email = '$Email' ");
    
    if($sql1 == NULL){

        echo "Incorrect email </br> <a href='javascript:history.back()'> Sign In </a> again ";

        $sql1 = $client->query("SELECT Password FROM Mentor WHERE Email = '$Email' ");

        if($sql1 == NULL){
        echo "Incorrect Email</br> <a href='javascript:history.back()'> Sign In </a> again ";
        die();
    }else{
    foreach ($sql1 as $row) 
    {   
    $pass = $row->Password;
    }

    if(password_verify($Password,$pass))
    {

            header('Location: mentordetails.php');
            echo "User";
            $_SESSION["email"] = $Email;
            $_SESSION["logged"] =1;
            $_SESSION["account"] = 'Mentor';
    
    }
    else
    {
        echo "invalid password";
    }
}
    }else{
    foreach ($sql1 as $row) 
    {   
    $pass = $row->Password;
    }

    if(password_verify($Password,$pass))
    {
            header('Location: userdetails.php');
            echo "user";
            $_SESSION["email"] = $Email;
            $_SESSION["logged"] =1; 
            $_SESSION["account"] = 'User'; 
    }else
    {
        echo "invalid password";
    }
}


?>