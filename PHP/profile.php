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
if ($conn->connect_error)
	{
    	die("Connection failed: " . mysqli_connect_error());
    } 
    else
        {  
         
    	if(isset($_POST['search']))
    	{
        		
	                if(isset($_POST['requests']))
            {
                $uemail=$_SESSION['email'];
                $femail=$_SESSION['friendemail'];
                $q=mysqli_query($conn,"SELECT * FROM friendship WHERE user_email= '$uemail' and request_status='1'");
                $count=mysqli_num_rows($q);
                if($count==0)
                    $output='no friends request';

                else
                {echo "Number of Requests ".$count;
                    while($row=mysqli_fetch_array($q))
                    {
                        $friend=$row['friend_email'];
                        echo '<div> <br>
                        <a href="user.php">' .$friend; 
                   }
                  if(isset($_POST['accept']))
                  {
                    $sql="UPDATE user_ set request_status='0' WHERE "; //hna 3wza a3rafl button eliidost3leh anhy friend
                  }
                    if(isset($_POST['reject']))
                  {
                     $sql="UPDATE user_ set request_status='0' WHERE "; //same
                  }    
                  
            
                     
            }
		}	

   $conn->close();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
 <form action="" method="post">
    
    <input type="submit" value="accept" name="accept">
    <input type="submit" value ="reject" name="reject">

    
    </form>
</body>
</html>