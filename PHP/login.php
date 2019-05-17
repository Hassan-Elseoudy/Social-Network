<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="socialnetwork";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error)
	{
    	die("Connection failed: " . mysqli_connect_error());
    } 
    else
    {

		if (isset($_POST['login']))
		{
			
			$password=$_POST['Password'];
			$email=$_POST['email'];
			$sql="Select FROM user(`first_name`, `last_name`, `nick_name`, `pass_word`, `user_email`, `phone_number`, `home_town`, `about_me`, `user_status`, `birth_date`, `user_gender`, `user_image`)VALUES('$firstname','$lastname','$nickname','$password','$email','$phone','$hometown','$aboutme','$mstatus','$birtdate','$gender','$')";
			$qry=mysqli_query($conn,$sql);
			if($qry){
				echo "done";
			$select=$db->prepare("SELECT * FROM user WHERE user_email='$email' and pass_word='$password'");
			$select->setFetchMode(PDO::FETCH_ASSOC);
			$select->execute();
			$data=$select->fetch();
			
			$_SESSION ['email']=$data['user_email'];
			$_SESSION ['password']=$data['pass_word'];
			}


		}
	
			

   $conn->close();
}

?>