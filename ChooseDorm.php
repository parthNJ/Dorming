<?php 
	include('Server.php'); //db connect
	if(isset($_POST['sbmitChooseDorm'])){ //when the submit button is clicked
		
		$fname = ($_POST['fname']); //Get First name from the textfield 
		$lname = ($_POST['lname']);//Get Last name from the textfield 
		$discription = ($_POST['disc']); //Get Discription from the textfield 
		$dorm = ($_POST['dorm']);//Get dorm choice from the dropdown 
		
	//Update the information the user provides to the database. 
	$sql = "UPDATE dorming
			SET fname = '$fname', 
			lname = '$lname',
			dorm = '$dorm', 
			discription = '$discription'
			WHERE netid= '{$_SESSION['username']}'";
	mysqli_query($db, $sql);
	header('location:QuestionPage.php'); //take them to the next page.
	}	
?>


<!DOCTYPE html>
	<html>
		<head>
			<meta charset = "utf-8">
			<title>Page4</title>
			<link rel = "stylesheet" type = "text/css" href ="StyleSheetPart4.css">
			<style>
			input{
				margin-left:-150px;
				width:155px;
			}
			</style>
		</head>
		<body>
				<div class = "sidenav">
					<h3>Montclair State University Residency Options</h3>
					<a href = "#DormChoi">Dorm Choice</a>
					<a href = "#Blanton">Blanton Hall</a>
					<a href = "#Heights">The Heights</a>
					<a href = "#bohn">Bohn Hall</a>
					<a href = "#russ">Russ Hall</a>
					<a href = "#">Hawk Crossing</a>
					<a href = "#">Village Apartments</a>
					<a href = "#">Freeman Hall</a>
					<a href = "#">Frank Sinatra Hall</a>
					<a href = "#">Stone Hall</a>
				</div>
				
				<div class = "tablecls">
				<form action = "ChooseDorm.php" method = "post" >
					<table>
						<caption>Where to Next?</caption>
						
						<tr>
							<td>First Name</td>
							<td><input type = "text" name = "fname" required></td>
						</tr>
						
						<tr>
							<td>Last Name</td>
							<td><input type = "text" name = "lname" required></td>
						</tr>
						
						<tr>
							<td>Impress your matches.</td>
							
						</tr>
						
						<tr>
							<td><textarea rows = "4" cols = "30" name = "disc" required></textarea></td>
						</tr>
						
						<tr>	
							<td>Dorm Choice:</td>
						</tr>
						
						
						<tr>
							<td>
							<select name = "dorm" required>
							<option value = "Blanton Hall">Blanton Hall</option>
							<option value = "The Heights">The Heights</option>
							<option value = "Bohn Hall">Bohn Hall</option>
							<option value = "Russ Hall">Russ Hall</option>
							<option value = "Hawk Crossing">Hawk Crossing</option>
							<option value = "Village Apartments">Village Apartments</option>
							<option value = "Freeman Hall">Freeman Hall</option>
							<option value = "Frank Sinatra Hall">Frank Sinatra Hall</option>
							<option value = "Stone Hall">Stone Hall</option>			
							</select>
							</td>
						</tr>
						
						<tr>
							<td><button type = "submit" name = "sbmitChooseDorm">Continue</button></td>
						</tr>
					</table>
				</div>
			</form>
				
			
			

			<div id = "DormChoi" class = "main">
			<img src = "https://s-media-cache-ak0.pinimg.com/originals/7b/09/2a/7b092ad9a1aec71751909e5afa7e7042.jpg" class ="imgFirst">
			<img src = "http://cbsphilly.files.wordpress.com/2012/08/college-prep-moving-in.jpg" class ="imgSecound">
			<img src = "http://i.telegraph.co.uk/multimedia/archive/02674/students-in-room_2674470b.jpg" class = "imgThird">
			<img src = "https://i.pinimg.com/736x/a1/0c/e4/a10ce4c699490601a7e6add21a717741--dorm-life-college-life.jpg" class = "imgFourth">
			<br></br>
			<hr id = "Blanton" class = "lines"></hr>
				<h4 class = "NameOfDorm">Blanton Hall</h4>
			<!-- blanton Hall -->
				
			
				<img src = "http://www.montclair.edu/media/montclairedu/residentialeducation/sliders/residence-life-banner.jpg"
					alt = "blantonHall1">
			
				
				
				<div class = "box1">
					<h4>New Renovation</h4>
						<p><font size = "3">The residential lounges have been renovated with new lounge furniture, mail boxes, front desk, and 
						gaming equipment. All of the student rooms in Blanton Hall have also been renovated. The showers and wardrobe 
						closets have been replaced in each of the rooms. The lighting, carpeting and painting have been upgraded throughout
						the entire building. 
						</font></p>
				</div>
				<div class = "box2">
					<h4>Building Amenities</h4>
						<ul><font size = "3">
							<li>5 floors</li>
							<li>Elevators</li>
							<li>Laundry Facilities</li>
							<li>Secure entrance monitored by Service Assistance</li>
							<li>Dining Facility within the building</li>
							<li>Air conditioning</li>
							<li>Central Mailboxes</li>
							<li>Two TV lounges on each floor</li>
							<li>Games: billiards tables, ping pong tables, air hockey, and foosball</li>
							</font>
						</ul>
				</div>
				<div class = "box3">
					<h4>History</h4>
						<p><font size = "3">Blanton Hall, one of the largest of the residence halls, was built in the early 1980s and is designed to promote a comfortable 
						living environment. This five-story building houses nearly 650 residents in suites of adjoining rooms with central air conditioning, 
						connected by a bathroom. Each residential floor consists of four wings. Each wing houses approximately forty-four residents. Four Resident 
						Assistants supervise each floor. A Resident Assistant lives on each wing. The front desk area is staffed by Desk Assistants.
						</font></p>
				</div>
				<div class = "box4">
					<h4>Per Resident</h4>
						<ul><font size = "3">
							<li>An extra long twin bed</li>
							<li>A wardrobe</li>
							<li>A desk</li>
							<li>A chair</li>
							<li>Individual internet and University network access</li>
							</font>
						</ul>
				</div>
				
				<!-- The Heights -->
				<br>
				<br>
				</br>
				<hr id = "Heights" class = "lines">
					<h4 class = "NameOfDorm">The Heights</h4>
				<img id = "img1"src = "http://www.capdevpartners.com/wp-content/uploads/2012/12/MSU1.jpg"
					alt = "The Heights" class = "heightsImg">
				<img id = "img1"src = "https://i.ytimg.com/vi/_XFcWUqAHjk/maxresdefault.jpg"
					alt = "The Heights" class = "heightsImg2">
				<img id = "img1"src = "https://s-media-cache-ak0.pinimg.com/originals/dc/27/09/dc2709e7c75d942d50ae1cce1d7a86ef.jpg"
					alt = "The Heights" class = "heightsImg3">
					<div class = "box5">
						<h4>About</h4>
							<p>The Heights, Montclair State University’s newest residence halls complex opened in the fall 2011. This is the first
							public-private partnership to be initiated under the 2009 NJ Economic Stimulus Act. It is located at the north end of campus.
							</p>
					</div>
					
					<div class = "box6">
						<h4>Suite Setup</h4>
								<ul>
									<li>Two residents per suite</li>
									<li>Suites are either a double-occupancy bedroom (approx. 13' x 15')</li>
									<li>or two single-occupancy bedrooms (approx. 8'5'' by 13' each)</li>
									<li>Toilet and shower in enclosed area</li>
									<li>Vanity outside of toilet/shower room</li>
									<li>Storage alcove</li>
								</ul>							
					</div>
					
					<img src = "http://www.montclair.edu/media/montclairedu/residentialeducation/rooms/TheHeights_2x1_SingleBedroomSuite_3D-002.jpg" 
							class = "box6Img1">
							
					<img src = "http://www.montclair.edu/media/montclairedu/residentialeducation/rooms/TheHeights2x1_SharedBedroomSuite_001.jpg" 
							class = "box6Img2">
							
							
							<hr class = "lines">
							<h4 class = "NameOfDorm">Bohn Hall</h4>
							
					<details>
						<summary>Tour of The Heights</summary>
						<video width = "300" height = "200">
						<source src = "HeightsVideo.mp4" type = "video/mp4"></source>
					</video>
					</details>
					
					<!--Bohn Hall -->
						
					
						<img id = "bohn"src = "http://www.montclair.edu/media/montclairedu/residentialeducation/Bohn.jpg" class = "BohnImg1">
						<img src = "http://wiredjersey.com/wp-content/uploads/2014/12/FullSizeRender-30-1024x835.jpg" class = "BohnImg2">

						<div class = "box7">
							<h4>About</h4>
								‌Capturing a scenic view of the New York City skyline, Bohn Hall's 16 floors house a resident community of approximately 
								500 students. Residents live in traditional rooms and share a community bathroom within gender-specific wings on each floor.  
								Approximately two Resident Assistants live on every floor and desk assistants keep the front desk operational 24 hours a day.
								Bohn Hall residents can interact with members of other communities such as residents in Blanton Hall in a shared quad area.
						</div>
						
						<div class = "box8">
							<h4>Bohn Hall Features</h4>
								<ul>
									<li>An extra long twin bed </li>
									<li>A wardrobe</li>
									<li>A desk</li>
									<li>A chair</li>
									<li>Individual internet and University network access</li>
								</ul>
						
						</div>
						
						<div class = "box9">
							<h4>Building Amenities</h4>
								<ul>
									<li>16 floors</li>
									<li>Elevators</li>
									<li>Free laundry Facilities on each floor</li>
									<li>Center for Writing and Academic Resource</li>
									<li>Hydration stations</li>
									<li>Secure entrances monitored</li>
									<li>Building management offices</li>
									<li>Community kitchen</li>
									<li>Community lounge(TV and gaming)</li>
									<li>Open community lounges on most floors</li>
									<li>Central mailboxes</li>
								</ul>
						</div>
						
						<div class = "box10">
							<h4>Bohn Hall view</h4>
								Bohn Hall has a magnificent view from most of its dorm rooms.
								Many rooms overlook the Main Campus Dorm's Annex, while others 
								overlook the Manhattan Skyline.
						</div>
						
						<br>
						<br>
						<br>
					<hr class = "lines">
					
					<!-- Russ Hall -->
						
						<h4 id = "russ">Russ Hall</h4>
						<img src = "http://www.montclair.edu/media/montclairedu/residentialeducation/RussHall.jpg">
					
						<div class = "box11">
							<h4>About</h4>
							
								Russ Hall was built in 1915 and served as the first residential facility of the State 
								Normal School at Montclair, now of course known as Montclair State University. Converted 
								at one point to an administrative building and then later renovated back to a residence hall,
								Russ Hall provides suite-style accommodations for approximately 100 students.
								There are approximately two Resident Assistants living on each floor and a 24 hour staff of desk 
								assistants at the front desk.
						</div>
						
						<div class = "box12">
							<h4>Russ Hall Room Features</h4>
								
								<ul>
									<li>An extra long twin bed</li>
									<li>A wardrobe</li>
									<li>A three dresser drawer</li>
									<li>A desk</li>
									<li>A chair</li>
									<li>Individual internet and University network access</li>
								</ul>
						</div>
						
						<div class = "box13">
							<h4>Russ Hall Building Features</h4>
								<ul>
									<li>3 residential floors</li>
									<li>Carpeted rooms</li>
									<li>Single, Double or Triple rooms</li>
									<li>2 Lounges on each floor</li>
									<li>Laundry Facilities</li>
									<li>Elevator</li>
									<li>Full kitchen on first floor for community use</li>
								
								</ul>
						</div>
					
						<div class = "box14">
							<h4>Russ Hall</h4>
								
								<img src = "https://www.montclair.edu/media/montclairedu/residentialeducation/rooms/Russ500.gif" class = "RussHallImg">
							
						</div>
					
			</div>
			
		</body>
		
		
	
	</html>