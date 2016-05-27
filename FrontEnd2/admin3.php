<!DOCTYPE html>

<?php
include 'config.php';

$sql_uni_name = $client->query("SELECT Institution FROM Subject_Rankings LIMIT 100") ;
$sql_uni_prog = $client->query("SELECT Short_Title FROM programme_Codes LIMIT 100");
//$sql_$hsd = $client->query("SELECT FROM ");
$sql_subj_IG = $client->query("SELECT Subjects FROM Cambridge_IGCSE LIMIT 100");
$sql_subj_PEA = $client->query("SELECT Subjects FROM Pearson LIMIT 100");




?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin3 Page</title>

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


<!-- MY CODE -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
    

    function upload(){
        var uni_N = document.getElementById("UNI_NAME").value;
        var uni_P = document.getElementById("UNI_PROG").value;
        var HSD = document.getElementById("HSD").value;
        var subj = document.getElementById("SUBJ").value;
        var subjp = document.getElementById("SUBJP").value;
        var grade = document.getElementById("GRADE").value;

       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("uploadSuccess").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", "upload.php?UNI_NAME="+ uni_N +"&UNI_PROG="+uni_P+"&HSD="+HSD+"&SUBJ="+subj+"&SUBJP="+subjp+ "&GRADE="+grade, true);
        xmlhttp.send();
        } 

        $(function() {
    $('#PEA').hide(); 
    $('#hsd').bind('change',function(){
        if($('#hsd').val() == 'IGCSE') {
            $('#IGS').show(); 
            $('#PEA').hide();
        } else{
            $('#IGS').hide(); 
            $('#PEA').show(); 
        } 
    });
});
        </script>
<!-- END OF MY CODE -->
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
        
                
   



<div class="form-horizontal">


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="UNI_Name">University Name</label>
  <div class="col-md-4">
    <select id="UNI_NAME" name="UNI_NAME" class="form-control">    
<?php
      try{
      foreach ($sql_uni_name as $row) 
        {
         $uni_name = $row->Institution;
         echo"<option>".$uni_name."</option>";
        }
      }catch(OutOfBoundsException $e){
  
      }
?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="UNI_Prog">University Program</label>
  <div class="col-md-4">
    <select id="UNI_PROG" name="UNI_PROG" class="form-control">
<?php
      try{
      foreach ($sql_uni_prog as $row) 
        {
         $uni_prog = $row->Short_Title;
         echo"<option>".$uni_prog."</option>";
        }
      }catch(OutOfBoundsException $e){
  
      }
?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group" id="hsd">
  <label class="col-md-4 control-label" for="HIGH SCHOOL DEGREE">High School Degree</label>
  <div class="col-md-4">
    <select id="HSD" name="HIGH SCHOOL DEGREE" onchange="HSD()" class="form-control">
      <option>IGCSE</option>
      <option>Pearson</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group" id="IGS" >
  <label class="col-md-4 control-label" for="SUBJECT">Subject</label>
  <div class="col-md-4">
    <select id="SUBJ" name="SUBJECT" class="form-control">
<?php
      try{
      foreach ($sql_subj_IG as $row) 
        {
         $subj = $row->Subjects;
         echo"<option>".$subj."</option>";
        }
      }catch(OutOfBoundsException $e){
  
      }
?>
    </select>
  </div>
</div>

<div class="form-group" id="PEA">
  <label class="col-md-4 control-label" for="SUBJECT">Subject</label>
  <div class="col-md-4">
    <select id="SUBJP" name="SUBJECT" class="form-control">
<?php
      try{
      foreach ($sql_subj_PEA as $row) 
        {
         $subjP = $row->Subjects;
         echo"<option>".$subjP."</option>";
        }
      }catch(OutOfBoundsException $e){
  
      }
?>
    </select>
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="GRADE">Grade</label>
  <div class="col-md-4">
    <select id="GRADE" name="GRADE" class="form-control">
      <option>A</option>
      <option>B</option>
      <option>C</option>
      <option>D</option>
      <option>E</option>
      <option>F</option>
      <option>U</option>
    </select>
  </div>
</div>
<br>
<div class="form-group">
  <label class="col-md-5 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary" onclick="upload()">Upload</button>
  </div>
</div>

<div class="success" id="uploadSuccess"> </div>






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
