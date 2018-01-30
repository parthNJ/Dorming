<?php
	include('Server.php');
	echo "<a href = 'login.php?logout = '1'' style = 'color:red;' class = 'log'>"; ?> <?php echo $_SESSION["username"]; ?><?php
	echo "Logout</a>";
	$results =  mysqli_query($db, "SELECT * FROM dorming"); 
?>

<html>
<head>
	<style>
	table{
		width: 48%;
		margin: 30px auto;
		border:1px solid;
		text-align: left;

	}
	th, td{
		border: none;
		height: 25px;
		padding: 2px;
	}
	tr:hover {
		background: #D5F5E3  ;
	}
	
	h2{
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
		background-color:grey;
	}
	</style>
</head>

<body>

	<h2>MSU Student Dorming records</h2>
	<hr>

<table>
	<thead>
		<tr>
			<th>FirstName</th>
			<th>LastName</th>
			<th>CWID</th>
			<th>Deposit</th>
			<th>HasRommate</th>
			<th>Dorm</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?> 
		<tr>
		 
			<td><?php echo $row['fname']; ?></td>
			<td><?php echo $row['lname']; ?></td>
			<td><?php echo $row['cwid']; ?></td>
			<td><?php echo $row['deposit']; ?></td>
			<td><?php echo $row['hasRoommate']; ?></td>
			<td><?php echo $row['dorm']; ?></td>
		</tr>
	<?php } ?>
	
</table>

</body>
</html>
