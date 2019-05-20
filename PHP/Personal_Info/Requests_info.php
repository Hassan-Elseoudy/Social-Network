<?php

$servername = "localhost";
$username = "root";
$password = "";
$db="socialnetwork";

$output = '    
<HTML>
<head>
<style> 
#req{
color: #1F4DFF;
margin-bottom:0px;
}
#demo{
    font-size: 10px;
}
</style>
<script>
    function acceptOrReject(obj,obj_){
        document.getElementById(\'demo\').innerHTML = obj;
        alert(obj_);
    }
</script>
</head>
<body>';

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error){
    	die("Connection failed: " . mysqli_connect_error());
} 
else{ 
    $uemail = $_SESSION['email'];
    $q=mysqli_query($conn,"SELECT * FROM friendship WHERE user_email= '$uemail' and request_status='1'");
    $w=mysqli_query($conn,"SELECT * FROM friendship WHERE friend_email= '$uemail' and request_status='1'");
        $i = 0;
        echo "<p id= \"demo\"></p>";

        while($row = mysqli_fetch_array($q)){
            $friend = $row['friend_email'];
            $output .= "<p id = \"req$i\">". $friend ."</p>";
           // $output .= "<form  method='POST' action='Database_issues.php'>";
            $xx = 'req'.$i.'rej';
            $output .= "<button onclick = \"acceptOrReject('$friend','$xx')\"  id = '$xx' class='tm-button'>Accept</button>";
            $yy = 'req'.$i.'acc';
            $output .= "<button onclick = \"acceptOrReject('$friend')\"  id = '$yy' class='tm-button'>Reject</button>";  
           // $output .= "</form>";
            $i++;
        }

        while($row = mysqli_fetch_array($w)){
            $friend = $row['user_email'];
            $output .= "<p id = \"req$i\">". $friend ."</p>";
            //$output .= "<form  method='POST' action='Database_issues.php'>";
            $xx = 'req'.$i.'rej';
            $output .= "<button onclick = \"acceptOrReject('$friend','$xx')\"  id = '$xx' class='tm-button'>Accept</button>";
            $yy = 'req'.$i.'acc';
            $output .= "<button onclick = \"acceptOrReject('$friend')\"  id = '$yy' class='tm-button'>Reject</button>";  
            //$output .= "</form>";
            $i++;
        }
    echo $output;
   $conn->close();
}

?>