<?php
$servername = "127.0.0.1";
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
		if (isset($_POST['reg']))
		{
			$firstname=$_POST['firstName'];
			echo $firstname;
			$lastname=$_POST['lastName'];
			echo $lastname;
			$nickname=$_POST['nickName'];
			echo $nickname;
			$password=$_POST['Password'];
			echo $password;
			$email=$_POST['Email'];
			echo $email;
			$phone=$_POST['phoneNumber'];
			echo $phone;
			$hometown=$_POST['homeTown'];
			echo $hometown;
			$aboutme=$_POST['me'];
			echo $aboutme;
			$mstatus=$_POST['status'];
			echo $mstatus;
			$birthdate=$_POST['bday'];
			echo $birthdate;
			$gender=$_POST['sex'];
			echo $gender;
			$frnds = 10;

			if($_FILES["pic"]["error"] > 0){
				if($gender == "Male"){
					$img = "./img/male_default.jpg";
				}
				else{
				$img = "./img/female_default.jpg";
				}
			} else{
				$img = $_FILES["pic"];
				echo "File Name: " . $_FILES["pic"]["name"] . "<br>";
				echo "File Type: " . $_FILES["pic"]["type"] . "<br>";
				echo "File Size: " . ($_FILES["pic"]["size"] / 1024) . " KB<br>";
				echo "Stored in: " . $_FILES["pic"]["tmp_name"];
			}
			echo $img;
			$sql = "INSERT INTO user_(first_name, last_name, nick_name, pass_word, user_email, phone_number, home_town, about_me, user_status, birth_date, user_gender, number_friends, user_image)VALUES('$firstname','$lastname','$nickname','$password','$email','$phone','$hometown','$aboutme','$mstatus','$birthdate','$gender', '$frnds', '$img')";
			$qry = mysqli_query($conn,$sql);
			if($qry){
				echo "done";
			}


		}
	
			

   $conn->close();
}

?>
