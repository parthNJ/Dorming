<?php 
	include('Server.php'); //include the db connection
	//header for the page using php 
	echo "<img src = 'http://transracialadoption.net/wp-content/uploads/MSU-Logo.png' width:='200px' height = '80px'></img>";
	echo "<a href = 'login.php?logout = '1'' ' class = 'log'>"; ?> <?php echo $_SESSION["username"]; ?><?php //include the logout link 
	echo "Logout</a>";
	echo "<hr class = 'line1'>";
	
	//edn of header
	//Action1 when the submit button is clicked: check if cwid is valid 
		//Since I am generating and writing random numbers to the db for the user cwid, please refere to the db to get the cwid. 
			if(isset($_POST['submit'])){ //when button is clicked 
			//get the values from the input fields.
				$cwid = ($_POST['cwid']); 
				$year = ($_POST['year']);
				//query checks to see if the cwid is correct. 
				$query = "SELECT * FROM dorming WHERE cwid ='$cwid' AND netid= '{$_SESSION['username']}'"; //check to see if cwid is correct.
				$result = mysqli_query($db, $query); //executes it 
					if(mysqli_num_rows($result) == 1){ //make sure only one cwid is found
					}
					else{ //if none is found throw an error 
						echo "<div class = 'errorBox'><b>Invalid CWID </b></div>";
					}
						$_SESSION['cwid'] = $cwid; //remember cwid and year for other pages. 
						$_SESSION['year'] = $year;
			}	
	//Action2 when the submit button is clicked: check if the user has paid their deposit and don't have a roommate.
			if(isset($_POST['submit'])){ //when button is clicked action 2
				$cwid = ($_POST['cwid']);
				$year = ($_POST['year']);
				$testOne = 1; 
				$testZero = 0;
				//select ther users values at deposit and hasRoomates from the database columns. 
				$sql =  "SELECT deposit, hasRoommate FROM dorming WHERE  netid= '{$_SESSION['username']}' AND cwid = '$cwid'";
				$result = mysqli_query($db, $sql); //execute 
					if(mysqli_num_rows($result)>0){ //if the user exists 
						while($row = mysqli_fetch_assoc($result)){
							$depo = $row["deposit"];  //retrieve their deposit values into the depo variable
							$hasMate = $row['hasRoommate'];//retrieve their hasRoomate (Checks if the user has a roommate or not) values into the depo variable
							 //turns them into a string
							$depo2 = (string)$depo;
							$hasMate2 = (string)$hasMate;
							
							
							//query2 checks if the user has paid their deposit or not. 
							$query2 = "SELECT roommate FROM dorming WHERE netid= '{$_SESSION['username']}'";
							$result2 = mysqli_query($db, $query2); //execute 
								if(mysqli_num_rows($result2)>0){ //make sure user exists
									while($row = mysqli_fetch_assoc($result2)){ 
										$cwidOfRoommate = $row['roommate']; //get the user's values at their column roommate. 
									}
								}
								if( $depo2 == "0"){ //Not paid their housing deposit throw an error 
									echo "<div class = 'errorBox'><b> Our records show that you have not paid your deposit. Please check with the 
									university.</b></div> ";
								}
					}
					if( $depo2 == "1" && $hasMate2 == "1"){ //If they have paid their deposit, but they already have a roommate. 
							$sql = "SELECT roommate FROM dorming WHERE netid = '{$_SESSION['username']}'";
							$result = mysqli_query($db, $sql);
								if(mysqli_num_rows($result)==1){
									while($row = mysqli_fetch_assoc($result)){
										$roommate = $row['roommate'];
									}
								}
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
										//If they already have a roommate
										echo "<div class = 'errorBox'><b>Our record shows that you already choose a roommate!</b>
											<br>
											<b>Name:</b> $fname $lname <br>
											<b>Email:</b> $email <br>
											<b>School Year:</b> $year <br>
											<b>Would you like to rechoose your roommate? </b>
											<form method = 'post' action = 'Verification.php'>
											<button type = 'submit' name = 'rechose'>Re-choose</button>
											</form> </div>";
										}
					
					
						//Continue to next page. If the user had paid their deposit and does not have a roommate. (Main part)
						if( $depo2 == "1" && $hasMate2 == "0"){
							$query1 = "UPDATE dorming
							SET year= '$year'
							WHERE netid= '{$_SESSION['username']}'";
							mysqli_query($db, $query1);
							header('location:ChooseDorm.php');
						}
					}
				}
				
						//rechoose roommate button is clicked
						if(isset($_POST['rechose'])){ //if user tries to rechose their roommate do the following. 
							$zero = '0';
							//query1 says to delete their information about having a roommate in the database. 
							$query1 = "UPDATE dorming
								SET
								hasRoommate = '$zero'
								WHERE netid= '{$_SESSION['username']}'";
								mysqli_query($db, $query1);
								header('location:ChooseDorm.php');	//go to the next page. 
						}
						
	
?>


	<html>
		<head>
			<meta charset = "utf-8">
			<title>Verification Page</title>
			<link rel = "stylesheet" type = "text/css" href = "StyleVerificationPage.css">
			<style>
				b{
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
				
				.haveAMate{
					width:300px;
					height:auto;
					background-color:red;
					border:2px solid #111;
					color:#111;
				}
				
				
			</style>
		</head>
		<body>
			
			<form action = "Verification.php" method = "post">
			<h2>Housing Verification</h2>
			<table>
					<p>Please enter your CWID and Graducation Year for us to confirm and varify that you've fulfil MSU's residency requirements</p>
					<hr>
				<tr>
					<td>CWID:</td>
					<td><input type = "text" name = "cwid" class = "impt"></td>
				</tr>
			
				<tr>
					<td>School Year:</td>
							<td>
							<select name = "year">
							<option value = "Freshman">Freshman</option>
							<option value = "Sophmore">Sophmore</option>
							<option value = "Junior">Junior</option>
							<option value = "Senior">Senior</option>
							</select>
					</td>
				</tr>
			</form>
				<details>
					<summary>Requirements for Residency at Montclair State University</summary>
					<p>A student must present evidence of his/her domicile to the institution to qualify for resident tuition rates. Such evidence must include:</p>
					<ul>
						<li>NJ drivers license; motor vehicle registration; or voter registration card</li>
					</ul>
					<p>And a minimum of 3 of the list below:</p>
					<ul>
						<li>A copy of his/her New Jersey resident Income tax return (please block out any identifying numbers such as SS#)</li>
						<li>A copy of the parent’s(s’) or legal guardian’s (s’)  NJ income tax return</li>
						<li>Evidence of ownership or a long term lease on a permanent residence for a period of one year</li>
						<li>A sworn, notarized statement from the student and/or his /her parent (s) or legal guardian declaring domicile in NJ for a period of one year</li>
						<li>Any proof of employment in the state for a period of one year</li>
					</ul>
						<p>This documentation must be submitted to Student Accounts Office located in College Hall, Room 218. 
						When received a decision will be made as to the students' residence status; additional documentation may be required upon request of Student Accounts.
						</p>
				</details>
				<tr>
					<td></td>
					<td>
						<button type = "submit" name = "submit">Verify</button>
					</td>
				</tr>
			
			</table>
		</body>
	</html>