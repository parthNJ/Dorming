<?php
//Jist of this page: From the choices the user used in their personality test, it would generate their matches by comparing values to the database. 
	include('Server.php');
	error_reporting(0);
	
	//Logout Button 
	echo "<img src = 'http://transracialadoption.net/wp-content/uploads/MSU-Logo.png' width:='200px' height = '80px'></img>";
	echo "<a href = 'login.php?logout = '1'' style = 'color:red;' class = 'log'>"; ?> <?php echo $_SESSION["username"]; ?> 
<?php
	echo "Logout</a>";
	echo "<hr class = 'line1'>";
	
	
	//From the database retrieve the user's personality type and their desire of dorm.
	$sql1 = "SELECT person, dorm FROM dorming WHERE netid= '{$_SESSION['username']}'";
	echo "<h2>Here are your potential roommate matches </h2>";
	$result1 = mysqli_query($db, $sql1);
		if(mysqli_num_rows($result1)==1){
			while($row1 = mysqli_fetch_assoc($result1)){
				$person = $row1['person'];
				$dorm = $row1['dorm'];
				$_SESSION['person'] = $person;
				$_SESSION['dorm'] = $dorm;
			}
		}
		
	//Giving them 3 options for their best roommate matches.
		$Zero = 0;
		//querry retrieves information of other users in the database that have the same personality type and choose the same dorm as the user logged in
		$sql2 = "SELECT fname, lname,cwid,email, discription FROM dorming WHERE person= '{$_SESSION['person']}' AND dorm = '{$_SESSION['dorm']}' AND hasRoommate = '$Zero'";
		//place the information of the matches inside an array. 
		$fname = Array();
		$lname = Array();
		$email = Array();
		$discription = Array();
		$result2 = mysqli_query($db, $sql2); //execure 
			while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){ //look through the whole colum where values are same as the user looged in  
				$fname[] = $row2['fname']; 
				$lname[] = $row2['lname'];
				$cwid[] = $row2['cwid'];
				$email[] = $row2['email'];
				$discription[] = $row2['discription'];
		}
		 //get the three cwids 
			$one = $cwid[0];
			$two = $cwid[1];
			$three = $cwid[2];
			
			//provide the possible students foudn for the logged in user. 
			echo "<form method = 'post' action = 'ResultPage.php'>";
			echo "<details>
					<summary><strong>Roommate Information</strong></summary>
				<div class = 'welcome'>While there were ample students who matched your personality, these three students matched you the best.
				These three students were generated from an algorith to perfectly match the results of your personality test. From the personality test
				we can inform you that these three students share similar preferences when it comes to dorming on college. All three of these students
				also perfer to stay on the same dorm as you. Please choose one of these three students as your roommate for Montclair State University
				, or if you have someone in your mind that you would perfer to dorm with, please scroll down and provide their CWID. </div><br>
					</details>";
			
			//First match. 
			echo "<div class = 'backgroundBox'>	
				<div class = 'box1'>
				<h3>Match 1</h3> <br>
				<strong>First Name: <b>$fname[0] <br></b>
				Last Name:<b> $lname[0]</b> <br>
				Email: <b>$email[0]</b><br>
				About:<b> $discription[0]</b> <br></strong>
				<h3>Choose:<input type = 'submit' value = '$fname[0]' name = 'btn0'></h3>
				</div>
				";
			//Secound match. 
			echo "
				<div class = 'box1'>
				<h3>Match 2</h3> <br>
				<strong>First Name: $fname[1] <br>
				Last Name: $lname[1] <br>
				Email: <b>$email[1]</b><br>
				About: $discription[1] <br></strong>
				<h3>Choose:<input type = 'submit' value = '$fname[1]' name = 'btn1' ></h3>
				</div>";
			//Third match. 
			echo "
				<div class = 'box1'>
					<h3>Match 3</h3> <br>
					<strong>First Name: $fname[2] <br>
					Last Name: $lname[2] <br>
					Email: <b>$email[2]</b><br>
					About: $discription[2] <br></strong>
					<h3><input type = 'submit' value = '$fname[2]' name = 'btn2' ></h3>
				</div>
				</form></div>";
			
			//Button for user to enter their own match. If the user wants to choose their own matchm they can. Hopefully it works. 
			echo "
			<div class = 'option'>
			<form method = 'post' action = 'ResultPage.php'>
					<h3>Have someone in mind?</h3>
					If you have someone you wish to dorm with who attends MSU and plans to dorm,
					<br>please enter their CWID.
					<input type = 'text' name = 'code'>
					<input type = 'submit' name = 'codebtn' value = 'Check'> <br>
			</form></div>";
			
			
		//If the user chooses to select their first match. Input their cwid information into the database. 
		if(isset($_POST['btn0'])){
			$UpdateRoommate = '1';
			$notification = '1';
			$sql3 = "UPDATE dorming
			SET 
			hasRoommate = '$UpdateRoommate',
			roommate = '$one'
			WHERE netid= '{$_SESSION['username']}'";
			mysqli_query($db, $sql3);
			header('location:ConfirmPage.php');
		}
		//If the user chooses to select their secound match. Input their cwid information into the database. 	
		if(isset($_POST['btn1'])){
			$UpdateRoommate = 1;
			$notification = '1';
			$sql3 = "UPDATE dorming
			SET 
			roommate = '$two',
			hasRoommate = '$UpdateRoommate'
			WHERE netid= '{$_SESSION['username']}'";
			mysqli_query($db, $sql3);
			header('location:ConfirmPage.php');
			}
			
		//If the user chooses to select their thrid match. Input their cwid information into the database. 
			if(isset($_POST['btn2'])){
			$UpdateRoommate = 1;
			$notification = '1';
			$sql3 = "UPDATE dorming
			SET 
			roommate = '$three',
			hasRoommate = '$UpdateRoommate'
			WHERE netid= '{$_SESSION['username']}'";
			mysqli_query($db, $sql3);
			header('location:ConfirmPage.php');
			}
		
	
	
	
	//if the user wants to choose someone as their roommate. Not sure if this works fully. 
	if(isset($_POST['codebtn'])){
		$code = $_POST['code'];
		$sql =  "SELECT hasRoommate, deposit, cwid, dorm, person  FROM dorming WHERE  cwid= '$code'";
		$result = mysqli_query($db, $sql);
		if(mysqli_num_rows($result)==1){
			while($row = mysqli_fetch_assoc($result)){
				$hasMate = $row['hasRoommate'];
				$deposit = $row['deposit'];
				$cwid = $row['cwid'];
				$dorm = $row['dorm'];
				
				$hasMate2 = (string)$hasMate;
				$deposit2 = (string)$deposit;
				$cwid2 = (string)$cwid;
				$dorm2 = (string)$dorm;
				$yourDorm = $_SESSION['dorm'];
				//If the student they choose has a roommate.
				if($hasMate2 == '1'){
					echo "<div class = 'clr'>Error: sorry they already have a roommate</div> ";
					
				}
				//If the student they choose did not pay their deposit. 
				if($deposit2 == '0'){
					echo "<div class = 'clr'>Error: They haven't paid their deposit</div> ";
					
				} //If the choosen student has paid their deposit, does not have a roommmate, and choose the same dorm as you: Only then continue. 
				if($deposit2 == '1' && $hasMate2 == '0' && $yourDorm == '$dorm2'){
					$One = 1; 
					
					//Write the choosen students values to the db
					$sql = "UPDATE dorming  
							SET 
							hasRoommate = '$One'
							roommate = '$code'
							WHERE netid= '{$_SESSION['username']}'";
		
					mysqli_query($db, $sql);
					header('Refresh:2; url = ConfirmPage.php'); //take them to next page. 
				}
			}
		}
		else{
			echo "<div class = 'clr'>sorry invalid cwid</div>"; //IF no cwid the user enters is found. 
		}
    }
?>

<html>
	<head>
	<style>
	
		.move{
			width:200px;
			margin-left:600px;
		}
		.line1 {
		border: none;
		height: 5px;
		background-color:#f44256;
		}
		.work{
			
			color:red;
		}
		details{
			margin-left:450px;
			width:600px;
		}
		.clr{
			font-size:20px;
			color:Red;
			margin-left:20px;
			
		}
		
		h2{
			text-align:center;
			
		}
		h3{
			text-align:center;
		}
		a{
			text-decoration:none;
		}
		.log {
					margin-left:1200px;
					margin-top:90px;
					width:auto;
					height:auto;
					background-color:white;
					border:2px solid #111;
					color:#111;
				}
				.log:hover{
					background-color:gray;
				}
				
		.option{
			width:250px;
			height:165px;
			background-color:#F7DC6F;
			margin-left:20px;
			margin-top:-650px;
			border:2px solid #111;
			border-radius:5px;
		}
		
		b{
			color:#212F3D;
		}
		strong{
			font-size:17px;
		}
		.box1{
			height:auto;
			width:420px;
			background-color:#ABB2B9;
			margin-left:165px;
			margin-top:40px;
			margin-bottom:20px;
			border-radius:9px;
			box-shadow: 10px 10px 5px #888888;
		}
		
		.backgroundBox{
			height:auto;
			width:750px;
			background-color:#F4F6F6;
			margin-left:300px;
			margin-top:23px;
			box-shadow: 10px 10px 5px #888888;
			border-radius:20px;
			border:2px solid #111;
		}

		
	</style>
	</head>
</html>