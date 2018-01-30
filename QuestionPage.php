<?php 
	//Purpose of this page: 
		// The user would go through a test with 4 awnsers to choose from. This page will find the maximum of the choices the user choose. 
		//ex. Math.Max(choiceA, choiceB, choiceC, choiceD);
		//The maximum out of the 4 choices will be written to the database. 
		
		
	include('Server.php'); //db connect
	error_reporting(0); //turn off error reporting since cookies at the start will be empty and show an error. 
		$x = $_COOKIE["mycookie"];//A
		$y = $_COOKIE["mycookie2"];//B
		$z = $_COOKIE["mycookie3"];//C
		$a = $_COOKIE["mycookie4"];//D
	
	//find the maximun of the four choices and update that value to the database. 
	//Write to the database where the maximim is found. 
			if($x > $y && $x > $z && $x > $a){
				$A = 1;
				$sql = "UPDATE dorming
				SET person = '$A'
				WHERE netid= '{$_SESSION['username']}'";
			}
			if($y > $x && $y > $z && $y > $a){
				$B = 2;
				$sql = "UPDATE dorming
				SET person = '$B'
				WHERE netid= '{$_SESSION['username']}'";
			}
	
			if($z > $x && $z > $y && $z > $a){
				$C = 3;
				$sql = "UPDATE dorming
				SET person = '$C'
				WHERE netid= '{$_SESSION['username']}'";
			}
	
			if($a > $x && $a > $y && $a > $z){
				$D = 4;
				$sql = "UPDATE dorming
				SET person = '$D'
				WHERE netid= '{$_SESSION['username']}'";
			}
			mysqli_query($db, $sql); //db execute
			if(isset($_POST['btn_go'])){ //when btn is pressed go to next page. 
				header('Refresh:0; url = ResultPage.php');
			}
?>

<html>

	<head>
		<title>Personality Test</title>
			<link rel = "stylesheet" type = "text/css" href ="StyleQuestionPage.css">
			
			<style>
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
				.headerMove{
					font-size:23px;
					text-align:center;
				}
				.headerMove2{
					text-align:center;
				}
				.imginnter{
					margin-left:690px;
				}
				.imginnter2{
					margin-left:230px;
					margin-top:-300px;
				}
				.backbox{
					width:920px;
					height:auto;
					margin-left:224px;
					margin-top:18px;
					background-color:gray;
					border:2px solid #111;
					border-radius:20px;
				}
				.btnzmove{
					margin-left:1000px;
					width:150px;
					height:28px;
					color:#111;
					background-color:red;
				}
			</style>
			
			
			
			
		<header>
				<img src = "http://transracialadoption.net/wp-content/uploads/MSU-Logo.png" class = "headerImage">
				<div>
				<?php if (isset($_SESSION["username"])): ?>
					<a href = "login.php?logout = '1'" style = "color:red;" class = "log"><?php echo $_SESSION["username"]; ?> Logout</a>
				<?php endif ?>
			</div>
		</header>
			<hr class = "line1">
			
			
			
			
			
			<script>
				
	let pos = 0, test, test_status, question, choice, choices, chA, chB, chC, chD = 0;
	var correctA = 0; var correctB = 0; var correctC = 0; var correctD = 0;
		const questions = [ //Questions used 
	  [ "What do you look forward to the most about dorming at Montclair State University?", "Getting to meet people.", "Just a nice enviornment to get work done.", "That I don't have to commute" , "I'm not sure why I am dorming", 'A', 'B','C','D'],
	  ["When it comes to socialization, how would you describe yourself?", "I absolutely love meeting new people.", "It's okay to meet new people once in a while", "I perfer to keep to my self, unless someone comes up to me first" , "Just leave me alone!", 'A', 'B','C','D'],
	  ["Would you like to really get to be friends with your roommate?","I would! It would be an easy transition to making a friend.", "Depending on who they are, I would put an effort", "It'd be cool, but it dosen't matter" , "I'd rather make my own friends somewhere else", 'A', 'B','C','D' ],
	  [ "Would you like to attend group events with your roommate?", "Yes, I would like that.", "Once in a while I hope", "I would, if they ask", "I feel we should do our own thing", 'A', 'B','C','D' ],
	  [ "When it comes to your dorm, do you believe in cleaning schedules with your roommate?", "Yeah we should help each other out", "If they ask, sure", "I'd pick up if I saw something down", "No, I'll clean mine, they'll clean theirs", 'A', 'B','C','D' ],
	  [ "Would you perfer to coordinate your sleep schedule with your roommate?", "Of course, we should coordinate", "If we're living together then I guess we have to", "Every once in a while I don't mind if they come in late.", "They can sleep whenever they want, dosen't matter.", 'A', 'B','C','D' ],
	  [ "Would you want to find a roommate for the next several years?", "Yes I would, it would be great to dorm with each other all of our years", "Only if we get really close", "Maybe, I'll see what happens", "Nah, I ll rather change it up every year.", 'A', 'B','C','D' ],
	  [ "Are you pickey about the way things are kept in the dormitory?", "Yes, I need it done in a particular way.", "If they ask, then sure we can work on it", "Not Reall!", "As long as my stuff is on my side, I have no problem", 'A', 'B','C','D' ],
	  [ "How frequent do you plan to be in your dorm on a daily basis?", "Alot, and I would love company from my roommate", "Sometimes, I won't know untill the semester stars", "If I have nothing to do, I guess I'll be at my dorm", "I'l be out alot, mostly there to just sleep.", 'A', 'B','C','D' ],
	  [ "ARE YOU COOL?", "YES", "NO", "MAYBE", "SO-SO", 'A', 'B','C','D' ]
];
function _(x){
	return document.getElementById(x);
}
function renderQuestion(){  //render questions
	test = _("test");
	if(pos >= questions.length){
		
			fcookie='mycookie';  
			 var tempo = correctA; 
			 document.cookie=fcookie+"=" + tempo;
			 
			 
			 fcookie2='mycookie2';  
			 var tempo2 = correctB; 
			 document.cookie=fcookie2+"=" + tempo2;
			 
			 
			 fcookie3='mycookie3';  
			 var tempo3 = correctC; 
			 document.cookie=fcookie3+"=" + tempo3;
			 
			 
			 
			 fcookie4='mycookie4';  
			 var tempo4 = correctD; 
			 document.cookie=fcookie4+"=" + tempo4;
		
 
		test.innerHTML = ` 
		<form action = "QuestionPage.php" method = "post">
		<h3 class = 'headerMove'>Before we get to your results, lets go over how to be a good roommate<br></h3>
		<img src = 'https://unigocms.blob.core.windows.net/media/2356/college-roommate-survival-guide.jpg' width = '450px' height = '300px' class = 'imginnter'>
		<img src = 'https://s-i.huffpost.com/gen/1934919/images/n-COLLEGE-ROOMMATE-628x314.jpg' width = '450px' height = '300px' class = 'imginnter2'>
			<div class = 'backbox'>
			<b>
			<h2>1. Be honest</h2><br>
				If you know you are a night owl or border on being a neat freak, share this information with your new roommate. It also helps to let him/her 
				know if you have any allergies or other issues that may create problems down the line, such as sensitivity to strong smells. Be sure to ask
				your roommate to share their concerns, as well, as this will help you create a schedule and a set of ground rules that work for both of you.

			<h2>2. Address issues right away</h2><br>
				When a problem or disagreement does arise — and it will — talk to your roommate immediately. Don’t complain to other people or tweet about it,
				instead, calmly approach your roommate and let them know what's bothering you. Most issues will probably be small, but they can quickly get out
				of hand if you involve others or don’t address them right away.

			<h2>3. Be respectful</h2><br>
				The golden rule definitely applies here. Treat your roommate as you'd like to be treated. This means don’t borrow clothes without asking or eat
				your roommate’s food without permission; don’t show up with a bunch of friends in tow, especially if you know your roommate is planning to study
				for an upcoming exam; and NEVER invite an overnight guest over without discussing it first with your roommate. Be sure to keep your area neat 
				and clean, too.

			<h2>4. Keep an open mind</h2><br>
				It’s highly unlikely that your roommate will share the same exact views with you on most subjects. When you disagree on topics, such as
				religion or politics, keep an open mind and consider each other’s position. College is a place to expand your mind and this sometimes means 
				stepping outside your comfort zone or challenging your beliefs. Who knows? You may actually learn a few things along the way.

			<h2>5. Don’t expect to be BFFs</h2><br>
				I’m not saying that you won’t become best friends with your roommate, but chances are you’ll be more than happy to say "goodbye" at the end
				of the year. Living in a small space with anyone (even someone you already know) can be a challenge; there are bound to be some arguments and 
				misunderstandings along the way. Don’t set yourself up for failure by having unrealistic expectations. It will be considered a victory if you
				finish the year with your sanity intact.

			<h2>6. Coordinate with your roommate before you move in </h2><br>
				As soon as your college provides you with the contact information for your roommate, be sure to give them a call. Discuss who will bring what,
				such as televisions, game systems, and small appliances, as this can prevent any bad feelings when you move in and find there’s not enough
				space for you both to have one of everything. If you live fairly close to each other, consider meeting for lunch or a movie. Taking the time
				to get to know your roommate before you head to college will help you create a bond and make the transition a little easier.
			</b>
			</div>
			<input type="submit" name = "btn_go" value="Update" class = "btnzmove">
		</form>`;
		_("test_status").innerHTML = '<h3></h3>';
		pos = 0;
		correctA = 0;
		correctB = 0;
		correctC = 0;
		correctD = 0;
		return false;
	}
	
	question = questions[pos][0];
	chA = questions[pos][1];
	chB = questions[pos][2];
	chC = questions[pos][3];
	chD = questions[pos][4];
  
	test.innerHTML = `<form>  
			<h1>Montclair State University Personality Test</h1>
			<h3 class = "box"><div class = "Qus">${question} </div><br>
			<div class = "Input1"><input type='radio' name='choices' value='A'required> ${chA}</div>
			<div class = "Input2"><input type='radio' name='choices' value='B' required> ${chB}<br></div>
			<div class = "Input3"><input type='radio' name='choices' value='C' required> ${chC}<br></div>
			<div class = "Input4"><input type='radio' name='choices' value='D' required> ${chD}<br></div><br>
			<div class = "NumOfQues">Question ${pos+1} of ${questions.length}</div><br>
			<div class = "btnNext"><input type = "button" value = "Next" name = "btn" onclick='checkAnswer()'></div></h3></form>`;
	}
	
	
function checkAnswer(){
	choices = document.getElementsByName("choices");
	for(let i=0; i<choices.length; i++){
		if(choices[i].checked){
			choice = choices[i].value;
		}
	}
	if(choice == questions[pos][5]){
		correctA++;
	}
	if(choice == questions[pos][6]){
		correctB++;
	}
	if(choice == questions[pos][7]){
		correctC++;
	}
	if(choice == questions[pos][8]){
		correctD++;
	}
	
	pos++;
	renderQuestion();
}
window.addEventListener("load", renderQuestion, false);
	</script>
	</head>
	
	<body id ="jumbotron">
			<h2 id="test_status"></h2>
				<div id="test"></div>
	</body>
	
</html>