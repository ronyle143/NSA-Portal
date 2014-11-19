<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<?php 
		$docacon = mysql_connect('localhost','root','');
		$docadb = mysql_select_db('doca_db',$docacon);
		
		session_start();
	?>
	<?php
		if($_SESSION['gusername']==""&&$_SESSION['gpassword']==""){
			echo"<script>alert('You must login first!')</script>";
			echo"<script>window.location=['login.php']</script>";
		}
	?>	
	<meta charset="UTF-8">
	<title>SiteZero - Homepage</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<form name="doca" method="POST" action="home.php">
	<?php include_once "blocks/header.php"; ?>
	<div id="adbox">
		<div class="clearfix">
				
			<img src="images/box.png" alt="Img" height="342" width="368">
			<div>
				<h1>Actions</h1>
				<p>
					Available actions are located here.<br> 
					<table>
						<tr><td><a href="signup.php" class="btn">Register</a></td></tr>
						<tr><td><a href="grade.php" class="btn">Grade Cal</a></td></tr>
						<tr><td><a href="newsentry.php" class="btn">News Entry</a></td></tr>
						<tr><td><a href="login.php" class="btn1">Logout</a></td></tr>
					</table>
				</p>
			</div>
			
		</div>
	</div>
	<?php include_once "blocks/latestnews.php"; ?>
	
	<?php include_once "blocks/footer.php"; ?>
</body>
</html>