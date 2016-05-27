<!DOCTYPE html>

<?php
//connecting to database
include 'config.php';
//$client->dbOpen( 'Pathfinder', 'root', 'root' );


//DISABLING ERRORS AND NOTICES
//error_reporting(0);


//session
session_start();
$semail = $_SESSION["email"];
if($_SESSION["logged"] == 1){
    //echo"welcome ".$_SESSION["email"];
    $Semail = $_SESSION["email"];
}else{
  echo "Error! You have to be logged in!! </br>";
  echo "<a href='signin.html'> Sign In </a> ";
  die;
}

//GETTING USER INFO
$sql1 = $client->query("SELECT * FROM Mentor WHERE Email = '$semail' ");
try{
foreach ($sql1 as $row) 
{
  $Fname = $row->First_Name;
    $LName = $row->Last_Name;
    $gender = $row->Gender;
    $email = $row->Email;
    $Pnumb = $row->Phone_Number;
    $summary = $row->Summary;
}
    }catch(OutOfBoundsException $e){
  
}



?>


<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mentor Update</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand">Pathfinder</div>
    <div class="address-bar">Shaping Your Future</div>

     <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Pathfinder</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="services.html">Services</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact Us </a>
                    </li>
                    <div class="dropdown">
                 <li class="dropbtn"></li>
                      
                       <?php 
                                             if(isset($_SESSION['logged'])){
                                                  echo '
                                                     <li> <a href="signout.php">Sign Out </a></li> ';
                                             }else{
                                                echo '
                                                    <li><a href="signup.html">Sign Up </a></li>
                                                    <li><a href="signin.html">Log In</a></li>';
                                            }
                                         ?>
                      </div>
                    </div>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">


<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<hr>
<h2 class="intro-text text-center"><strong>Edit</strong>
  Details  
</h2>
<hr>
<hr>
    <strong>Personal Details</strong>
<hr>

<!-- Text input-->
 <div class="form-group">
                                    <label class="col-md-4 control-label" for=
                                    "fullname">First Name</label>

                                    <div class="col-md-4">
                                        <input class="form-control input-md"
                                        id="firstName" value='<?php echo $Fname ?>' name="firstName"
                                        placeholder="" required="false" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for=
                                    "fullname">Last Name</label>

                                    <div class="col-md-4">
                                        <input class="form-control input-md"
                                        id="lastName" value='<?php echo $LName ?>' name="lastName"
                                        placeholder="" required="false" type="text">
                                    </div>
                                </div>

                              

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for=
                                    "number">Phone Number</label>

                                    <div class="col-md-4">
                                        <input class="form-control input-md"
                                        id="curriculum" value='<?php echo $Pnumb;?>' name="Pnumber"
                                        placeholder="" required="false" type="tel">
                                    </div>
                                </div>
                                <br>

                                <div class="form-group">
  <label class="col-md-4 control-label" for="radios">Gender</label>
  <div class= "form-control3"> 
    <label class="radio-inline" for="radios-0">
      <?php 
      if($gender == "male"){
  echo "
      <input type='radio' name='radios' id='radios-0' value='male' checked='checked'>
      Male
    </label> 
    <label class='radio-inline' for='radios-1'>
      <input type='radio' name='radios' id='radios-1' value='female'>
      Female
    </label>";
      }elseif($gender == "female"){
        echo "
      <input type='radio' name='radios' id='radios-0' value='male'>
      Male
    </label> 
    <label class='radio-inline' for='radios-1'>
      <input type='radio' name='radios' id='radios-1' value='female'  checked='checked'>
      Female
    </label>";

      }
    ?>
  </div>
</div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for=
                                    "summary">Summary</label>

                                    <div class="col-md-4">
                                        <textarea cols="46" rows="6" name="summary"><?php echo $summary; ?></textarea>
</textarea>
</div>
</div>

<hr>
   <strong>Education</strong>
<hr>

<div class="form-group">
  <label class="col-md-4 control-label" for="degree">Bachelor Degree</label>  
  <div class="col-md-4">
  <input id="degree" name="degree" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label" for="minors">Minors (if any)</label>  
  <div class="col-md-4">
  <input id="minors" name="minors" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="special">Specialization (if any)</label>  
  <div class="col-md-4">
  <input id="special" name="special" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="master">Master Degree</label>  
  <div class="col-md-4">
  <input id="master" name="master" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="other">Other Qualification</label>  
  <div class="col-md-4">
  <input id="other" name="other" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>
 
<br>
<div class="form-group">
  <label class="col-md-4 control-label" for="interest">Interested Subject</label>  
  <div class="col-md-4">
    <textarea rows="6" cols="46"></textarea>
</div>
</div>


<hr>
    <strong>Experience</strong>
<hr>

<div class="form-group">
  <label class="col-md-4 control-label" for="Company">Company</label>  
  <div class="col-md-4">
  <input id="Company" name="Company" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="position">Position</label>  
  <div class="col-md-4">
  <input id="position" name="position" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="field">Location</label>  
  <div class="col-md-4">
  <input id="locaiton" name="location" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="field">Time Period</label>  
<div class="col-md-8">  
   <select id="DOBYear" name="DOBYear" class="form-control2">
  <option> - Year - </option>
  <option value="2004">2004</option>
  <option value="2003">2003</option>
  <option value="2002">2002</option>
  <option value="2001">2001</option>
  <option value="2000">2000</option>
  <option value="1999">1999</option>
  <option value="1998">1998</option>
  <option value="1997">1997</option>
  <option value="1996">1996</option>
  <option value="1995">1995</option>
  <option value="1994">1994</option>
  <option value="1993">1993</option>
  <option value="1992">1992</option>
  <option value="1991">1991</option>
  <option value="1990">1990</option>
  <option value="1989">1989</option>
  <option value="1988">1988</option>
  <option value="1987">1987</option>
  <option value="1986">1986</option>
  <option value="1985">1985</option>
  <option value="1984">1984</option>
  <option value="1983">1983</option>
  <option value="1982">1982</option>
  <option value="1981">1981</option>
  <option value="1980">1980</option>
  <option value="1979">1979</option>
  <option value="1978">1978</option>
  <option value="1977">1977</option>
  <option value="1976">1976</option>
  <option value="1975">1975</option>
  <option value="1974">1974</option>
  <option value="1973">1973</option>
  <option value="1972">1972</option>
  <option value="1971">1971</option>
  <option value="1970">1970</option>
  <option value="1969">1969</option>
  <option value="1968">1968</option>
  <option value="1967">1967</option>
  <option value="1966">1966</option>
  <option value="1965">1965</option>
  <option value="1964">1964</option>
  <option value="1963">1963</option>
  <option value="1962">1962</option>
  <option value="1961">1961</option>
  <option value="1960">1960</option>
  <option value="1959">1959</option>
  <option value="1958">1958</option>
  <option value="1957">1957</option>
  <option value="1956">1956</option>
  <option value="1955">1955</option>
  <option value="1954">1954</option>
  <option value="1953">1953</option>
  <option value="1952">1952</option>
  <option value="1951">1951</option>
  <option value="1950">1950</option>
  <option value="1949">1949</option>
  <option value="1948">1948</option>
  <option value="1947">1947</option>
  
</select>

<select id="DOBYear" name="DOBYear" class="form-control2">
  <option> - Year - </option>
  <option value="2004">2004</option>
  <option value="2003">2003</option>
  <option value="2002">2002</option>
  <option value="2001">2001</option>
  <option value="2000">2000</option>
  <option value="1999">1999</option>
  <option value="1998">1998</option>
  <option value="1997">1997</option>
  <option value="1996">1996</option>
  <option value="1995">1995</option>
  <option value="1994">1994</option>
  <option value="1993">1993</option>
  <option value="1992">1992</option>
  <option value="1991">1991</option>
  <option value="1990">1990</option>
  <option value="1989">1989</option>
  <option value="1988">1988</option>
  <option value="1987">1987</option>
  <option value="1986">1986</option>
  <option value="1985">1985</option>
  <option value="1984">1984</option>
  <option value="1983">1983</option>
  <option value="1982">1982</option>
  <option value="1981">1981</option>
  <option value="1980">1980</option>
  <option value="1979">1979</option>
  <option value="1978">1978</option>
  <option value="1977">1977</option>
  <option value="1976">1976</option>
  <option value="1975">1975</option>
  <option value="1974">1974</option>
  <option value="1973">1973</option>
  <option value="1972">1972</option>
  <option value="1971">1971</option>
  <option value="1970">1970</option>
  <option value="1969">1969</option>
  <option value="1968">1968</option>
  <option value="1967">1967</option>
  <option value="1966">1966</option>
  <option value="1965">1965</option>
  <option value="1964">1964</option>
  <option value="1963">1963</option>
  <option value="1962">1962</option>
  <option value="1961">1961</option>
  <option value="1960">1960</option>
  <option value="1959">1959</option>
  <option value="1958">1958</option>
  <option value="1957">1957</option>
  <option value="1956">1956</option>
  <option value="1955">1955</option>
  <option value="1954">1954</option>
  <option value="1953">1953</option>
  <option value="1952">1952</option>
  <option value="1951">1951</option>
  <option value="1950">1950</option>
  <option value="1949">1949</option>
  <option value="1948">1948</option>
  <option value="1947">1947</option>
</select>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="field">Description</label>  
  <div class="col-md-4">
  <input id="Description" name="Description" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>


<br>
<div class="form-group">
  <label class="col-md-4 control-label" for="field">Languages</label>  
  <div class="col-md-4">
  <input id="Language" name="Language" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>

<br>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="update"></label>
  <div class="col-md-4">
    <button id="update" name="update" class="btn btn-primary">Update</button>
  <button id="return" name="return" class="btn btn-primary" href="mentordetails.php">Return to Profile</button>
  </div>
</div>





         </div>
        </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->


    
        
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div id="foot">
                            <br>The information contained in kraftlife.net may
                            not be published, broadcast, rewritten, or
                            redistributed without the prior written authority
                            of kraftlife.net<br><br>
                            Copyright © 2016 kraftlife.net All rights
                            reserved.<br>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
