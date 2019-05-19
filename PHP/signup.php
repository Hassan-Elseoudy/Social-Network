<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="socialnetwork";
session_start();

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error){
	// If there's any failure in connection
	die("Connection failed: " . mysqli_connect_error());
}
    	
else {

		// If user submitted form
		if (isset($_POST['reg']))
		{        
			$firstname = $_POST['firstName'];
			$lastname = $_POST['lastName'];
			$nickname = $_POST['nickName'];
			$password = $_POST['Password'];
			$email = $_POST['Email'];
		  $phone = $_POST['phoneNumber'];
			$aboutme = $_POST['me'];
			$mstatus = $_POST['status'];
			$birthdate = $_POST['bday'];
			$gender = $_POST['sex'];
			$hometown = $_POST['homeTown'];
			$friends = 10;
			
			$_SESSION['firstname']=$firstname;
			$_SESSION['lastname']=$lastname;
			$_SESSION['email']=$email;
			$_SESSION['gender']=$gender;
			$_SESSION['hometown']=$hometown;
			$_SESSION['aboutme']=$aboutme;
			$_SESSION['status']=$mstatus;
			$_SESSION['phone']=$phone;
			$_SESSION['bday']=$birthdate;

			if($_FILES['pic']['error'] > 0){
				if($gender == "Male"){
					$img = "./img/male_default.jpg";
	 			}
			 
			 	else{
	 				$img = "./img/female_default.jpg";
	 			}
	 		} 
	 
	 		else{
				$img = $_FILES["pic"];
	 			echo "File Name: " . $_FILES["pic"]["name"] . "<br>";
	 			echo "File Type: " . $_FILES["pic"]["type"] . "<br>";
				echo "File Size: " . ($_FILES["pic"]["size"] / 1024) . " KB<br>";
	 			echo "Stored in: " . $_FILES["pic"]["tmp_name"];
	 		}
	 		echo $img;
			$sql = "INSERT INTO user_(first_name, last_name, nick_name, pass_word, user_email, phone_number, home_town, about_me, user_status, birth_date, user_gender, number_friends, user_image)VALUES('$firstname','$lastname','$nickname','$password','$email','$phone','$hometown','$aboutme','$mstatus','$birthdate','$gender', '$friends', '$img')";
			$qry = mysqli_query($conn,$sql);

			if($qry){
				echo "done";
				header("location: ../profile.html");
			}
}

   $conn->close();
}

?>