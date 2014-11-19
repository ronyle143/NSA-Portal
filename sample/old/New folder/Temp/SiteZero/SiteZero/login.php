<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<?php 
		$docacon = mysql_connect('localhost','root','');
		$docadb = mysql_select_db('doca_db',$docacon);
		
		session_start();
		$_SESSION['gmemberno'] = "";
		$_SESSION['gfname'] = "";
		$_SESSION['ggname'] = "";
		$_SESSION['gmi'] = "";
		$_SESSION['gusername'] = "";
		$_SESSION['gpassword'] = "";
		$_SESSION['gaccount'] = "";
	?>
	<?php
		if(isset($_POST['submit']))
			{
				$memberno=$_POST['memberno_txt'];
				$fname=$_POST['fname_txt'];
				$gname=$_POST['gname_txt'];
				$mi=$_POST['mi_txt'];
				$username=$_POST['username_txt'];
				$password=$_POST['password_txt'];
				$account=$_POST['account_txt'];
				
				$docasql = "INSERT INTO registration_table(memberno,fname,gname,mi,username,password,account) VALUES('$memberno','$fname','$gname','$mi','$username','$password','$account');";
				mysql_query($docasql);
				echo"<script>alert('Record Saved!!!');</script>";
			}
	?>
	<meta charset="UTF-8">
	<title>SiteZero - Login</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	
	<form name="doca" method="POST" action="login.php">
	<?php include_once "blocks/header.php"; ?>
	
	<?php
		if(isset($_POST['login'])){
			$username = $_POST['username_txt'];
			$password = $_POST['password_txt'];
			
			$docasql = "SELECT * FROM registration_table WHERE username = '$username' AND password='$password'";
			$break = mysql_query($docasql);
			$get = mysql_fetch_assoc($break);
			$_SESSION['gusername']=$get['username'];
			$_SESSION['gpassword']=$get['password'];
			$_SESSION['ggname']=$get['gname'];
			$_SESSION['gaccount']=$get['account'];
			if($get['username']=='gusername' AND $get['password']=='gpassword'){
				echo"<script>window.location=['login.php']</script>";
			}
			else{
				echo"<script>window.location=['home.php']</script>";
			}
		}
	?>
	<div id="adbox">
		<div class="clearfix">
			<img src="images/box.png" alt="Img" height="342" width="368">
			<div>
			<center>		
			<h1>Login Now!</h1>
			
			<table>
				<tr><td>Username</td><td><input type="TEXT" value="<?php printf($_SESSION['gusername'])?>" name="username_txt"></td></tr>
				<tr><td>Password</td><td><input type="PASSWORD" value="<?php printf($_SESSION['gpassword'])?>" name="password_txt"></td></tr>
				<tr><td></td><td align="right"><input type="submit" value="Login" name="login"></td></tr>
			</table>
			</center>
			</div>
		</div>
	</div>
	<div id="contents">
		<div id="tagline" class="clearfix">
			
		</div>
	</div>
	
	<?php include_once "blocks/footer.php"; ?>
</body>

</html>