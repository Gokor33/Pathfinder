<?php
    
    //require_once 'Front_End/PHPMailer-master/PHPMailerAutoload.php';
    include 'config.php';
    
    //$client->dbOpen( 'Pathfinder', 'root', 'root' );
    session_start();

    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $gender = $_POST['radios'];
    $date_month = $_POST['DOBMonth'];
    $date_day = $_POST['DOBDay'];
    $date_year = $_POST['DOBYear'];
    $Email = $_POST['email'];
    $phoneNumber = $_POST['number'];
    $account = $_POST['rad'];    
    $Password = $_POST['cPassword'];
    
   // $crypted_password = password_hash($Password,PASSWORD_BCRYPT);
    // echo "Hello";
    
    //$confirmCode = md5(uniqid(rand()));
    
    //$sql1 = $client->query("SELECT Email FROM Student, Mentor  WHERE Email = '$Email'");

    if($sql1 == null){
        if($account == 'User')
    {
        // echo "$firstName";
        $client->command("INSERT INTO Student cluster student SET First_Name = '$firstName', Last_Name = '$lastName', Gender = '$gender', Phone_Number ='$phoneNumber', Date_Of_Birth = '$date_year', Email = '$Email', Password = '$crypted_password'"); 
        
        //$sesEmail = $client->query("SELECT e FROM conf_user WHERE Email=".$Email);
        //echo $rid;   
        
        $_SESSION["email"] = $Email;
        $_SESSION["logged"] = 1;
        echo $_SESSION["email"];

        echo "SESSION is : ---- ";
       header('Location: userdetails.php');
        
    }
    elseif($account == 'Mentor')
    {
        $client->command("INSERT INTO Mentor cluster mentor set First_Name = '$firstName',
        Last_Name = '$lastName',Phone_Number ='$phoneNumber', Gender = '$gender', Date_Of_Birth = '$date_year', Email = 
        '$Email',Password = '$crypted_password', Verified ='False' ");  
        
        $_SESSION["email"] = $Email;
        $_SESSION["logged"] = 1;
        echo $_SESSION["email"];

        //echo $account;  
        
        header('Location: mentordetails.php');
        
    }
    }else{
        echo "Sorry the Email Address entered already exist! Please sign up with a new Email Address! </br>";
        echo "<a href='javascript:history.go(-1)'>Go back</a";
    }

    
    
    /*$client->command("insert into conf_user cluster student set firstName = '.$firstName.',
        lastName = '.$lastName.', Sex = '.$sex.', date_Of_Birth = '.$dateofBirth.', Email = 
        '.$Email.', Account_Type = '.$account.', Password = '.$crypted_password.'");
    */
    
    //var_dump($Email);
    //phpMailer 
    /*
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 2;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'kraftlife8@gmail.com';                 // SMTP username
    $mail->Password = 'pathfinder@kraftlife';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('kraftlife8@gmail.com', 'Mailer');
    $mail->addAddress($Email);
    $mail->addReplyTo('reply@yahoo.com', 'Reply Address');
    
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'confirmation link';
    $mail->Body    = 'Your confirmation link \r\n
                Click on this link to activate your account \r\n
                http://www.pathfinder.com/confirmation.php?passkey=$confirmCode';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send())
    {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    else 
    {
        echo 'Message has been sent';
    }
    */
    
    
    
    
?>