<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<?php 
		$docacon = mysql_connect('localhost','root','');
		$docadb = mysql_select_db('doca_db',$docacon);
		
		session_start();
		$_SESSION['gmemberno1'] = "";
		$_SESSION['gfname1'] = "";
		$_SESSION['ggname1'] = "";
		$_SESSION['gmi1'] = "";
		$_SESSION['gusername1'] = "";
		$_SESSION['gpassword1'] = "";
		$_SESSION['gaccount1'] = "";
		
		if($_SESSION['gusername']==""&&$_SESSION['gpassword']==""){
			echo"<script>alert('You must login first!')</script>";
			echo"<script>window.location=['login.php']</script>";
		}
	?>
	<?php
		if(isset($_POST['submit']))
			{
				$num = 10000000;
				$docasq2 = "SELECT * FROM registration_table";
				$all = mysql_query($docasq2);
				do{
						$num += 1;
				}while($item = mysql_fetch_array($all));
							
				$memberno=$num;
				$fname=$_POST['fname_txt'];
				$gname=$_POST['gname_txt'];
				$mi=$_POST['mi_txt'];
				$username=$_POST['username_txt'];
				$password=$_POST['password_txt'];
				$account=$_POST['account_txt'];
				
				
				$docasql = "INSERT INTO registration_table(memberno,fname,gname,mi,username,password,account) VALUES('$memberno','$fname','$gname','$mi','$username','$password','$account');";
				mysql_query($docasql);
				
				$docasq3 = "SELECT * FROM registration_table WHERE username = '$username'";
				$break = mysql_query($docasq3);
				$get = mysql_fetch_assoc($break);
				if($username == $get['username']){
					echo"<script>alert('Record Saved!!!');</script>";
				}
				else{
					echo"<script>alert('Username is already in use');</script>";
				}
			}
	?>
	<?php 
			if(isset($_POST['fetch']))
			{
				$memberno = $_POST['memberno_txt'];
				$docasql = "SELECT * FROM registration_table WHERE memberno = '$memberno'";
				$break = mysql_query($docasql);
				$get = mysql_fetch_assoc($break);
				
				$_SESSION['gmemberno1'] = $get['memberno'];
				$_SESSION['gfname1'] = $get['fname'];
				$_SESSION['ggname1'] = $get['gname'];
				$_SESSION['gmi1'] = $get['mi'];
				$_SESSION['gusername1'] = $get['username'];
				$_SESSION['gpassword1'] = $get['password'];
				$_SESSION['gaccount1'] = $get['account'];
			}
		?>
	<?php 
			if(isset($_POST['update']))
			{
				$memberno=$_POST['memberno_txt'];
				$fname=$_POST['fname_txt'];
				$gname=$_POST['gname_txt'];
				$mi=$_POST['mi_txt'];
				$username=$_POST['username_txt'];
				$password=$_POST['password_txt'];
				$account=$_POST['account_txt'];
				
				$docasql = "UPDATE registration_table SET memberno ='$memberno',fname='$fname',gname='$gname',mi='$mi',username='$username',password='$password',account='$account' WHERE memberno = '$memberno'";
				mysql_query($docasql);
				
				echo"<script>alert('Record Saved!!!');</script>";
			}
		?>
		<?php 
			if(isset($_POST['delete']))
			{
				$memberno=$_POST['memberno_txt'];
				$fname=$_POST['fname_txt'];
				$gname=$_POST['gname_txt'];
				$mi=$_POST['mi_txt'];
				$username=$_POST['username_txt'];
				$password=$_POST['password_txt'];
				$account=$_POST['account_txt'];
				
				$docasql = "DELETE FROM registration_table WHERE memberno='$memberno'";
				mysql_query($docasql);
				echo"<script>alert('Record Deleted!!!');</script>";
			}
		?>
	<meta charset="UTF-8">
	<title>SiteZero - Register</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	
	<form name="doca" method="POST" action="signup.php">
		

	<?php include_once "blocks/header.php"; ?>
	
	<div id="adbox">
		<div class="clearfix">
			<img src="images/box.png" alt="Img" height="342" width="368">
			<div>
					<table border="0"><tr><td><center>
			<h1>Register</h1>
			<table border="0">
				
				<tr><td>ID no.</td><td><input type="TEXT" value="<?php printf($_SESSION['gmemberno1'])?>" name="memberno_txt"></td></tr>
				<tr><td><input type="submit" value="Fetch" name="fetch"></td></tr>
				<tr><td colspan = "2"><hr></td></tr>
				
				<tr><td>Family Name</td><td><input type="TEXT" value="<?php printf($_SESSION['gfname1'])?>" name="fname_txt"></td></tr>
				<tr><td>Given Name</td><td><input type="TEXT" value="<?php printf($_SESSION['ggname1'])?>" name="gname_txt"></td></tr>
				<tr><td>Middle Initial</td><td><input type="TEXT" value="<?php printf($_SESSION['gmi1'])?>" name="mi_txt"></td></tr>
				<tr><td>Username</td><td><input type="TEXT" value="<?php printf($_SESSION['gusername1'])?>" name="username_txt"></td></tr>
				<tr><td>Password</td><td><input type="TEXT" value="<?php printf($_SESSION['gpassword1'])?>" name="password_txt"></td></tr>
				<tr><td>Account type</td><td><input type="TEXT" value="<?php printf($_SESSION['gaccount1'])?>" name="account_txt"></td></tr>
				<tr><td colspan="2"><input type="submit" value="Submit" name="submit"><input type="submit" value="Update" name="update"><input type="submit" value="Delete" name="delete"></td></tr>
				    
			</table>
		</center></td></tr></table>
			</div>
		</div>
	</div>
	<div id="contents">
		<div id="tagline" class="clearfix">
			<?php
				if(strtoupper($_SESSION['gaccount'])=="ADMIN"||strtoupper($_SESSION['gaccount'])=="SUPERADMIN"){
					echo"<h1>Registered Users.</h1>";
					$docasql = "SELECT * FROM registration_table";
					$all = mysql_query($docasql);
					if($item = mysql_fetch_array($all)){
						echo"<table cellpadding = 5 bgcolor = gray align = center>";
						echo"<tr bgcolor = lightgray align = center>
									<td width=100>ID #</td>
									<td width=150>Last Name</td>
									<td width=150>First Name</td>
									<td width=50>MI</td>
									<td width=150>Username</td>
									<td width=200>Account Type</td>
							</tr>\n\n";
						do{
							printf("<tr bgcolor = white align = center><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>\n",
							$item['memberno'],$item['fname'],$item['gname'],$item['mi'],$item['username'],$item['account']);
						}while($item = mysql_fetch_array($all));
					}
					echo"</table>";
				}
			?>
		</div>
	</div>
	<?php include_once "blocks/footer.php"; ?>
</body>

</html>