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
        		$search=$_POST['search'];
        		$search=preg_replace("#[^0-9a-z]#i", "", $search);
        		$q=mysqli_query($conn,"SELECT * FROM user_ WHERE nick_name like '%$search%' or first_name like '%$search%' or last_name like '%$search%'");
        		$count=mysqli_num_rows($q);
        		if($count==0)
        			$output='no search result';
        		else
        		{
        			//while(){
                    $row=mysqli_fetch_array($q);
        			$fname=$row['first_name'];
        			$lname=$row['last_name'];
                         $_SESSION['friendfirstname']=$row['first_name'];
                                        $_SESSION['friendlastname']=$row['last_name'];
                                        $_SESSION['friendemail']=$row['user_email'];
                                        $_SESSION['friendgender']=$row['user_gender'];
                                        $_SESSION['friendhometown']=$row['home_town'];
                                        $_SESSION['friendaboutme']=$row['about_me'];
                                        $_SESSION['friendstatus']=$row['user_status'];
                                        $_SESSION['friendphone']=$row['phone_number'];
                                        $_SESSION['friendbday']=$row['birth_date'];
        			$output.='<div> 
                    <a href="user.php">' .$fname.' '.$lname;
               
        		}

                echo $output.'</a></div>';
    	}

	  if(isset($_POST['show']))
            {
              
              echo $_SESSION['firstname'].' <br>'
                        .$_SESSION['lastname'].'<br> '
                        .$_SESSION['email'].'<br> '
                        .$_SESSION['gender'].'<br> '
                        .$_SESSION['hometown'].'<br> '
                        .$_SESSION['aboutme'].'<br> '
                        .$_SESSION['status'].'<br> '
                        .$_SESSION['phone'].'<br> '
                        .$_SESSION['bday'].' <br>';          
            }
              if(isset($_POST['friends']))
            {

             // $search=$_POST['search'];
                //$search=preg_replace("#[^0-9a-z]#i", "", $search);
                $uemail=$_SESSION['email'];
                
                $q=mysqli_query($conn,"SELECT * FROM friendship WHERE user_email= '$uemail' and request_status='0'");
                $count=mysqli_num_rows($q);
                if($count==0)
                    $output='no friends';
                else
                {
                    while($row=mysqli_fetch_array($q))
                    {
                    
                   
                    $friend=$row['friend_email'];
                    $output.='<div> <br>
                    <a href="user.php">' .$friend;
                   }
                      echo $output.'</a></div>';

                    
            }
        }
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