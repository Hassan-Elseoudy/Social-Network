<?php

$servername = "localhost";
$username = "root";
$password = "";
$db="socialnetwork";

$output = '    
<HTML>
<head>
<style> 
#fri{
color: #1F4DFF;
margin-bottom:0px;
}
</style>
</head>
<body>';

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error){
    	die("Connection failed: " . mysqli_connect_error());
}
 
else{
    echo $_SESSION['xx'];
}
?>