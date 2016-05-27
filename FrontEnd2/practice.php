<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="orientdb-api.js"></script>
    <title></title>

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

</head>
<body>
    <input type="button" value="Connect to OrientDB" onclick="connect()"/>
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

<?php 

include 'config.php';

$ridQ = $client->query("SELECT @RID FROM Cambridge_IGCSE WHERE Subjects='Accounting'");
    foreach ($ridQ as $key){
        $rid = $key->RID;
    }

    echo $rid;

?>
</body>
</html>