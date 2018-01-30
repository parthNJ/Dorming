<?php
	//This page basically confirms the choice the user made on the last page. 
	include('Server.php'); //db
	echo "<img src = 'http://transracialadoption.net/wp-content/uploads/MSU-Logo.png' width:='200px' height = '80px'></img>";
	echo "<a href = 'login.php?logout = '1'' style = 'color:red;' class = 'log'>"; ?> <?php echo $_SESSION["username"]; ?> 
	<?php
	echo "Logout</a>";
	echo "<hr class = 'line1'>";
	echo "<h2>Confirming your Montclair State University roommate choice</h2>";
	
	//Look for a cwid that's also the same as the logged in user, in the roommate field. If found, then the logged in user has a roomate. 
	$sql = "SELECT roommate FROM dorming WHERE netid = '{$_SESSION['username']}'";
	$result = mysqli_query($db, $sql);
		if(mysqli_num_rows($result)==1){
			while($row = mysqli_fetch_assoc($result)){
				$roommate = $row['roommate'];
			}
		}
	//retrieve that students name where the cwid is found. 
	$sql2 = "SELECT fname, lname, email, year, discription FROM dorming WHERE cwid = '$roommate'";
	$result2 = mysqli_query($db, $sql2);
		if(mysqli_num_rows($result2)==1){
			while($row = mysqli_fetch_assoc($result2)){
				$fname = $row['fname'];
				$lname = $row['lname'];
				$email = $row['email'];
				$year = $row['year'];
				$disc = $row['discription'];
			}
		}
		//Provide their information on the page. 
	echo "<div class = 'rmate'>
		  <b> Your Montclair State University roommate: </b><br>
		  <b>Name:</b> $fname $lname <br>
		  <b>Email:</b> $email <br>
		  <b>School Year:</b> $year <br>
		  <b>About:</b> $disc</div>";
		 //If clicked to rechoose, take them back. 
	if(isset($_POST['rechoose'])){
		header('location:ResultPage.php');
	}
?>


<html>
	<head>
		<title>Confirm Page</title>
		<style>
			h2{
				text-align:center;
			}
			.rmate{
				width:450px;
				height:auto;
				margin-left:450px;
				background-color:#f44256;
				border:2px solid #111;
				border-radius:10px;
			}
			.rmate2{
				margin-left:550px;
				margin-top:8px;
				font-weight: bold;
			}
			b{
				text-align:center;
				font-size:18px;
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
				
			.line1 {
		border: none;
		height: 5px;
		background-color:#f44256;;
		}
		
		</style>
	</head>
	
	
	<body>
	<form action = "ConfirmPage.php" method = "post">
		<div class = "rmate2">
			<lable>Re-Choose Roommate</lable>
			<input type = "submit" name = "rechoose" value = "take me back">
		</div>
			
	</form>
	
	</body>



</html>