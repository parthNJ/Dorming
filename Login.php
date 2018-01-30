<?php include('server.php');  #Include the database connection 
 ?>
 


<html>
		<head>
			<title>Login</title>
			<link rel = "stylesheet" type = "text/css" href = "StyleRegisterPage.css"> 
			<script src = "Register.js"></script> 
		</head>
		
		<body>
		
		<div class="slider" id="main-slider"> 
			<div class="slider-wrapper">
			<img src="http://www.montclair.edu/media/montclairedu/residentialeducation/sliders/residence-life-banner.jpg" alt="First" class="slide" />
			<img src="https://www.montclair.edu/media/montclairedu/residentialeducation/sinatra-banner.jpg" alt="Second" class="slide" />
			<img src="http://www.montclair.edu/media/montclairedu/residentialeducation/sliders/MRCbanner.jpg" alt="Third" class="slide" />
			<img src="https://d13b2ieg84qqce.cloudfront.net/5e2e951c3244d7c28ea08295d241080c6aa40fcb.jpg" alt="Fourth" class="slide" />
			<img src="http://www.montclair.edu/media/montclairedu/undergraduateadmissions/new/Dorm-cropped.jpg" alt="Fifth" class="slide" />
			</div>
		</div>	
			
			<form method = "post" action = "Login.php">  
				<?php include ('Errors.php'); ?> 
				<table> 
					<caption>Montclair State University Hawk Hut</caption>
					<tr>
						<td>NetID: </td>
						<td><input type = "text" name = "username"></td>
					</tr>
					
					<tr>
						<td>Password: </td>
						<td><input type = "password" name = "password"></td>
					</tr>
					<tr>
						<td></td>
					</tr>
				
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td class = "sml">
							<button type = "submit" name = "login" class = "btn">Login</button>
							<a href = "Register.php">Register</a>
						</td>
					</tr>
					
			</table>
			</form>
			
			<footer>		
				<address><b>
				Montclair Red Hawk Resort<br>
				1 Atlantic Ave.<br>
				Atlantic City, NJ 07777<br>
				973-655-4166
				</b>
				</address>
				<p><em><strong>Copyright &copy; 2017 Montclair State University</strong></em><br>
				<a href = "mailto:patelp94@montclair.edu">patelp94@montclair.edu</a></p>
			</footer>
		</body>
	
	</html>