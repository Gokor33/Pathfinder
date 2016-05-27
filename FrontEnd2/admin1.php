<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin1 Page</title>

    <!-- Bootstrap Core CSS <-->
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
<script>
        function connect() {
            var orientdb = new ODatabase("http://localhost:2480/Project");
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

    function viewMentor(){
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("user_details").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", "view_mentor.php", true);
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

    //this jQuery isnt working
    $(function(){
        $('#verify').click(function(){
            var eID = document.getElementById("eID").value;
            $.ajax({
                url: "verify.php?eID="+eID,
                success:function(){
                    alert("done");
                }
            });
        })
        });


    function verify(){
        var eID = document.getElementById("eID").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ver").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", "verify.php?eID="+eID, true);
        xmlhttp.send();
        }
    </script>



    <!--END OF MY SCRIPT -->
</head>

<body>

    <div class="brand">Pathfinder</div>
    <div class="address-bar">Shaping Your Future</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default">
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
                        <a href="indexcopy.html">Home</a>
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
                      <li class="dropbtn">Sign Up/Log In</li>
                      <div class="dropdown-content">
                        <a href="signup.html">Sign Up </a>
                        <a href="signin.html">Log In</a>
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
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Admin
                        <strong>Page</strong>
                    </h2>
                    <hr>
        
                </div>
        
<div class="container target">
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <div class="panel-default">

        
            <ul class="list-group">
             <form class="form-horizontal">




<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <a id="" name="" onclick="viewMentor()" class="btn btn-primary">View Mentor</a>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <a id="" name="" href="#" class="btn btn-primary">View User</a>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <a id="" name="" href="Grad_placement.html" class="btn btn-primary">Add Graduate Placement</a>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <a id="" name="" href="Grad_Salary.html" class="btn btn-primary">Add Graduate Salary</a>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <a id="" name="" href="subject_rankings.html" class="btn btn-primary">Add Subject Rankings</a>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <a id="" name="" href="Programme_codes.html" class="btn btn-primary">Add Programme Codes</a>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <a id="" name="" href="admin3.php" class="btn btn-primary">Requirements</a>
  </div>
</div>




</form>
</ul>

</div>
</div>

<div class="form-group">
  <label class="col-md-1 control-label" for="searchinput">Search</label>
  <div class="col-md-4">
    <select id="mySelect" >
        <option>Name</option>
        <option>Phone Number</option>
        <option>ID</option>
        <option>Email</option>
    </select>

    <input type="search" name="search_bar" id="search_bar" placeholder="search" onfocusout="check()">
    <button id="searchBttn" onclick="search()">Search</button><br>
    Search Result:
<div class="search-result" id="searchResult">
    
<p> <span id="txtHint"></span></p></div>
User Details:
<div class="user-Details" id="user_details">

 </div>
  </div>
  
</div>

</div>
</div>








          

            </div>
        </div>
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
