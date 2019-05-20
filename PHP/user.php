<?php

$servername = "localhost";
$username = "root";
$password = "";
$db="socialnetwork";
session_start();
$output=" Results  -> ";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error){
    die("Connection failed: " . mysqli_connect_error());
} 

else{
    echo $_SESSION['friendfirstname'].' <br'
    .$_SESSION['friendlastname'].'<br> '
    .$_SESSION['friendemail'].' <br>'
    .$_SESSION['friendgender'].'<br> '
    .$_SESSION['friendhometown'].' <br>'
    .$_SESSION['friendstatus'].'<br> '
    .$_SESSION['friendphone'].'<br> '; 

    $conn->close();
}

?>