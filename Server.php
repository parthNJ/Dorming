
<?php 
	session_start(); //start a session. 

	$username = "";
	$email = "";
	$errors = array();
	
	
	//db connect 
	$db = mysqli_connect('localhost', 'parthpatel', 'parthpatelpass', 'parthpateldatabase');
	
	
	//when register button is clicked. When the user tries to register write to the database. 
	if(isset($_POST['register'])){ //when button is pressed
		//get the values from the textfields in the Register page. 
		$username = ($_POST['username']);
		$email = ($_POST['Email']);
		$pass1 = ($_POST['pass1']);
		$pass2 = ($_POST['pass2']);
		$rand = rand(1,40);
		$randCWID = rand(9999999, 99999999);
		$DepositOne = 1;
		$DepositZero = 0;
		$RoommateOne = 0;
		
		//take action if the inputs are left empty. 
		if (empty($username)){
			array_push($errors, "<b>username is required</b>");
			header('location:Login.php');
		}
		if (empty($email)){
			array_push($errors, "email is required");
		}
		if (empty($pass1)){
			array_push($errors, "password is required");
		}
		if ($pass1 != $pass2){
			array_push($errors, "please check your passwords, they dont match");
			echo "<div class = 'errorBox'><div class = 'b'>Your passwords don't match, please try again</div></div>";
		}
		
		 
		if(count($errors) == 0){  //If there are no errors only then continue. 
			$password = md5($pass1);  //encrypt the password 
			
			
			//To randomaly generate a value wheather if the user has paid their deposit or not, I m using a random num generator between 1-40;
			if($rand <= 10){   //if that rand num is less then 10, for the deposit write a 1
			$sql = "INSERT INTO dorming (netid, email, password, deposit, hasRoommate, cwid) 
			VALUES ('$username', '$email', '$password', '$DepositOne', '$RoommateOne', '$randCWID' )";
			
			}
			
			if($rand <= 14 && $rand > 10){ //if that rand num falls between 10 and 14, for the deposit write a 0. Rare case
			$sql = "INSERT INTO dorming (netid, email, password, deposit, hasRoommate, cwid) 
			VALUES ('$username', '$email', '$password', '$DepositZero', '$RoommateOne', '$randCWID')";

			}
			
			if($rand >14){ //if that rand num is greater than 14, for the deposit write a 1. 
			$sql = "INSERT INTO dorming (netid, email, password, deposit, hasRoommate, cwid) 
			VALUES ('$username', '$email', '$password', '$DepositOne', '$RoommateOne', '$randCWID')";
			
			}
			
			mysqli_query($db, $sql); //execute to the database 
			
			$_SESSION['username'] = $username;  //make a session for the username, this gets used throughout the project. 
			$_SESSION['success'] = "you paid it";
			header('location: Verification.php'); //go to the next page.
		}
		
	}
	
	
	
	
	//When login button is pressed, on the login page. When user tries to login perform these actions. 
		if(isset($_POST['login'])){ //when loggin button is pressed
			
			//get values from textfields from the login page
			$username = ($_POST['username']);
			$password = ($_POST['password']);
		
		if(count($errors) == 0){ //if 0 errors continue. 
			$password = md5($password); //encrypt password before checking to the database
			$sql = "SELECT * FROM dorming WHERE netid='$username' AND password='$password'"; //query to select the loggin values to the db
			$result = mysqli_query($db, $sql); //execute
			
			//check the db to see if the user exists with the same username and password provided
				if(mysqli_num_rows($result) == 1){
			
					$_SESSION['username'] = $username;
					header('location:Verification.php'); //if it does go to next page
						
				}
				else{  //if no matches are found, provide errors. 
					array_push($errors, "Incorrect username and Password");
					echo "<div class = 'errorBox
					
					
					'><div class = 'b'>Username and Password are incorrect</div></div>";
				}
	}	
}
	//Another case for the login button, Where the admin tries to loggin. 
		if(isset($_POST['login'])){ //when the login button is clicked. 
		//now check three columns in the db to make sure that the admin has a 1 next to their name.
		$sql2 = "SELECT admin FROM dorming WHERE  netid= '$username' AND password = '$password' AND admin = '1'";  
				$result2 = mysqli_query($db, $sql2); //execute 
					if(mysqli_num_rows($result2) == 1){  //if the query values provided are found at the appropriate locations, continue. 
						while($row2 = mysqli_fetch_assoc($result2)){ //used fetch the admin 
							$admin = $row2["admin"];
							if($admin = '1'){ //If admin value is 1 only then, they would be brought to the admin page/ 
								header('location: AdminPage.php'); //take them to the admin page
							}
							else{ //else "your not an admin" , if someone tries to use the admin username and password
								echo "your not an admin";
							}
						}
					}
					
					
		}		
					
		
	//logout values 
	if(isset($_GET['logout'])){ //when user clicks on the login link
		session_unset();  //stop and destroy the session. 
		session_destroy();
		header('location: Login.php'); //take them back to the login page
	}
	

?>


<html>
	<head>
		<style>
			.b{
					font-size:20px;
					color:Red;
				}
				.errorBox{
					font-size:20px;
					color:Red;
					width:600px;
					height:auto;
					background-color:#ABB2B9;;
					
					border-radius:2px;
					box-shadow: 10px 10px 5px #888888;
				}
		</style>
	</head>


</html>