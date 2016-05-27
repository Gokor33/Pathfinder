<!DOCTYPE html>
<?php 


//CONNECTING TO DATABASE
include 'config.php';
//$client->dbOpen( 'Pathfinder', 'root', 'root' );


//SESSION 
session_start();
if($_SESSION["logged"] == 1){
    //echo"welcome ".$_SESSION["email"];
    $Semail = $_SESSION["email"];
}


echo "Welcome ".$Fname;
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">

    <title>User Details</title><!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"><!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet"><!-- Fonts -->
    <link href=
    "http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
    rel="stylesheet" type="text/css">
    <link href=
    "http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic"
    rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- MY SCRIPT -->

<script>
        function connect() {
            var orientdb = new ODatabase("http://localhost:2480/Pathfinder");
            var orientdbinfo = orientdb.open('root','root');
        }
    </script>

    <script type="text/javascript" src="jquery-1.3.2.min.js"></script>
    <script type="text/javascript">
    var xmlhttp;
    if (window.XMLHttpRequest) {
    //creating an XMLHttpRequest object for IE7+, Firefox, Chrome, Opera, Safari 
    xmlhttp=new XMLHttpRequest();
    } else {
    // creating an XMLHttpRequest object for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    

    function search(){
        var val = document.getElementById("search_bar").value;
       var type = document.getElementById("mySelect").value; 
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("searchResult").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", "search.php?search_bar=" + val +"&type="+type, true);
        xmlhttp.send();
        } 

    function getUserDetails(){
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("user_details").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", "AD_userDetails.php", true);
        xmlhttp.send();
        }

    function setPlaceholder(){
    var x = document.getElementById("mySelect").value;
    document.getElementById("search_bar").placeholder = x;
    }

    function check(){
    var x = document.getElementById("mySelect").value;
    var y = document.getElementById("search_bar").value;
    }
    </script>



    <!--END OF MY SCRIPT -->

</head>

<body>

    <div id="check">
        <div class="brand">
            Pathfinder
        </div>


        <div class="address-bar">
            Shaping Your Future
        </div>


        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->


                <div class="navbar-header">
                    <button class="navbar-toggle" data-target=
                    "#bs-example-navbar-collapse-1" data-toggle="collapse"
                    type="button"><span class="sr-only">Toggle
                    navigation</span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span> <span class=
                    "icon-bar"></span></button> 
                    <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                     <a class="navbar-brand" href=
                    "indexCopy.html">Pathfinder</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->


                <div class="collapse navbar-collapse" id=
                "bs-example-navbar-collapse-1">
                    <nav>
                        <ul class="nav navbar-nav">
                            <li>
                        <a href="indexcopy.html">Home</a>
                            </li>


                            <li>
                                <a href="about.html">About</a>
                            </li>


                            <li>
                                <a href="services.html">Services</a>
                            </li>


                            <li>
                                <a href="contact.html">Contact Us</a>
                            </li>


                            <li>
                                <a>Sign Up/Log In</a>

                                <div>
                                    <ul>
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
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>


        <div class="container target">
            <div class="row">
                <div class="col-sm-3">
                    <!--left col-->


                    <div class="panel-default">
                        <div class="nameofuser">
                            <?php echo $Fname." ".$LName; ?>
                        </div>


                        <div class="">
                            <img alt="" class="img-responsive" src=
                            "http://placehold.it/750x450">

                            <div class="caption">
                            </div>
                        </div>


                        <ul class="list-group">
                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class=
                            "">Joined:</strong></span> 2.13.2014</li>


                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class="">Full
                            Name:</strong></span><?php echo $Fname." ".$LName; ?></li>


                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class="">Email:</strong></span>
                            <?php echo $email; ?></li>


                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class="">Phone
                            Number:</strong></span> <?php if($Pnumb == null){ echo "No numbers added";}else{echo $Pnumb;} ?></li>


                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class="">Gender:</strong></span>
                            <?php echo $gender; ?></li>
                        </ul>
                        <button class="btn btn-success" type="button"><a href=
                        "userupdate.php">Update Your Profile</a></button><br>
                        <br>
                    </div>
                </div>
                <!--/col-3-->


                <div class="col-sm-9" contenteditable="false" style="">
                    <div class="panel panel-default">
                        
    <br>
    <div class="panel-heading">
Search User
</div>
<div class="panel-body">
    <select id="mySelect" >
        <option>Name</option>
        <option>Phone Number</option>
        <option>ID</option>
        <option>Email</option>
    </select>

    <input type="search" name="search_bar" id="search_bar" placeholder="search" onfocusout="check()">
    <button id="searchBttn" onclick="search()">Search</button><br>
</div>
Search Result:
<div class="search-result" id="searchResult">
    
<p> <span id="txtHint"></span></p></div>
User Details:
<div class="user-Details" id="user_details"> </div>

                        


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Education
                        </div>


                        <ul class="list-group">
                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class="">High School
                            Degree:</strong></span> 125</li>


                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class="">Graduation
                            Year:</strong></span> 13</li>
                            <!--            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Specialization (if any):</strong></span>     37</li> -->


                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class=
                            "">Subjects:</strong></span> 78</li>
                            <!--            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Societies</strong></span>     78</li> -->
                        </ul>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Experience
                        </div>


                        <ul class="list-group">
                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class=
                            "">Company:</strong></span> 125</li>


                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class=
                            "">Position:</strong></span> 13</li>


                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class=
                            "">Location:</strong></span> 37</li>


                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class="">Time
                            Period:</strong></span> 78</li>


                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class=
                            "">Description</strong></span> 78</li>
                        </ul>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Languages
                        </div>


                        <div class="panel-body">
                            <i class="fa fa-check-square" style=
                            "color:green"></i> Languages are pulled in here
                            from the server.
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Interests and Hobbies
                        </div>


                        <div class="panel-body">
                            <i class="fa fa-check-square" style=
                            "color:green"></i> Interests are pulled in here
                            from the server.
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Influencing Agents
                        </div>


                        <ul class="list-group">
                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class="">City:</strong></span>
                            125</li>


                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class=
                            "">Industry:</strong></span> 13</li>


                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class="">Study
                            Budgets:</strong></span> 78</li>


                            <li class="list-group-item text-right"><span class=
                            "pull-left"><strong class="">Average
                            Salary</strong></span> 78</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div id="push">
        </div>
    </div>


  
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
    <script src="js/jquery.js">
    </script> <!-- Bootstrap Core JavaScript -->
     
    <script src="js/bootstrap.min.js">
    </script>
</body>
</html>