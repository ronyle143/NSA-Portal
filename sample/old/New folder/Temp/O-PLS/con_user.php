<!DOCTYPE HTML>
<!-- Website template by HalcyonArts -->
<html>
<head>
	<?php 
		$docacon = mysql_connect('localhost','root','');
		$docadb = mysql_select_db('opls_db',$docacon);
		
		session_start();
		$_SESSION['spec']="";
		$_SESSION['style1']="border-width: 1px;padding: 5px;border-style: inset;border-color: lightgray;background-color: #555555;"
	?>
	<?php
		if($_SESSION['opls_username']==""||$_SESSION['opls_password']==""){
			printf("<script>alert('%s, You must login first!')</script>",$_SESSION['opls_username']);
			echo"<script>window.location=['index.php']</script>";
		}
		else{
			if($_SESSION['opls_active'] >= 2){
			
			}
			else{
				printf("<script>alert('%s, You must be an Admin to use this page!')</script>",$_SESSION['opls_username']);
				echo"<script>window.location=['home.php']</script>";
			}
		}
	?>
	<?php
		$_SESSION['pick'] = "";
		
		if(isset($_POST['refresh'])){
			$_SESSION['pick'] = $_POST['selection'];
		}
	?>
	<?php
		if(isset($_POST['btn_confirm'])){
			$_SESSION['spec'] = "confirm";
		}
	?>
	<?php
		if(isset($_POST['approve'])){
			$guardno = $_POST['approve'];
			$docasq2 = "SELECT active FROM guard_table WHERE guardno = '$guardno'";
			$break = mysql_query($docasq2);
			$get = mysql_fetch_assoc($break);
			
			$docasql = "UPDATE guard_table SET active = 1 WHERE guardno = '$guardno'";
			mysql_query($docasql);
			printf("<script>alert('User Aprroved.');</script>");
		}
	
	?>
	<meta charset='UTF-8'>
	<title>O-PLS - Confirm Users</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body link="lightgray" vlink="lightgray" alink="red">
<form name="doca" method="POST">
<center>
	<div>
		<?php include_once "blocks/header.php"; ?>
		<table bgcolor='<?php printf($_SESSION['color_3'])?>' cellpadding=0 cellspacing=0 width='1000' background='<?php printf($_SESSION['bg_img'])?>'>
			<tr>
				<td align=center colspan=2>
					<table width=976 cellpadding=0 cellspacing=0>
						<tr height=480>
							<td align=center valign=top>
<!--------------------------------------------------------------------------------------------------------------------------------->
								<table bgcolor='<?php printf($_SESSION['color_2'])?>' cellpadding=5 cellspacing=2>
										<tr>
											<td colspan=10 align=center>
												<b><font size=8 color='<?php printf($_SESSION['color_1'])?>'>Pending Operators</font></b>
											</td>
										</tr>
										<tr>
											<td colspan=10 align=center>
												<select id=selection name=selection >
													<option value='guardno' <?php if($_SESSION['pick']=="guardno"){printf("selected");} ?>>User no.</option>
													<option value='lastname,firstname,mi' <?php if($_SESSION['pick']=="lastname,firstname,mi"){printf("selected");} ?>>Name</option>
													<option value='username' <?php if($_SESSION['pick']=="username"){printf("selected");} ?>>Username</option>
													<option value='regdate' <?php if($_SESSION['pick']=="regdate"){printf("selected");} ?>>Date registered</option>
													<option value='estno' <?php if($_SESSION['pick']=="estno"){printf("selected");} ?>>Establishment</option>
												</select>
												<input type=submit name=refresh value=Refresh>
											</td>
										</tr>
										<tr>
											<td><font color=orange>#</font></td>
											<td><font color=orange>Name</font></td>
											<td><font color=orange>Username</font></td>
											<td><font color=orange>Password</font></td>
											<td><font color=orange>Address</font></td>
											<td><font color=orange>Contact no.</font></td>
											<td><font color=orange>Registered</font></td>
											<td><font color=orange>Est.</font></td>
											<td></td>
										</tr>
<!--------------------------------------------------------------------------------------------------------------------------------->
									<?php
									$pick = "guardno";
									if($_SESSION['pick'] != ""){
										$pick = $_SESSION['pick'];
									}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
									$estno = "";
									if($_SESSION['opls_estno']==""){}
									else{
										$tmp = $_SESSION['opls_estno'];
										$estno = " WHERE estno='$tmp'";
									}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
									$docasql = "SELECT * FROM guard_table WHERE active=0 ORDER BY ".$pick.",1";
									$all = mysql_query($docasql);
									if($item = mysql_fetch_array($all)){
										do{
											$emp = $item['estno'];
											$break = mysql_query("SELECT * FROM est_table WHERE estno = '$emp'");
											$get = mysql_fetch_assoc($break);
printf("
											<tr bgcolor=white>
												<td align=right>%s</td>
												<td            >%s,<br>%s<br>%s.</td>
												<td            >%s</td>
												<td            >%s</td>
												<td            >%s</td>
												<td            >%s</td>
												<td            >%s</td>
												<td            >%s</td>
											
"
,$item['guardno']
,$item['lastname']
,$item['firstname']
,$item['mi']
,$item['username']
,$item['password']
,$item['address']
,$item['contactno']
,$item['regdate']
,$get['estshort']
);
printf("
												<td bgcolor=black><button class=btnok name=approve value=%s></button></td>
											</tr>
"
,$item['guardno']
);
										}while($item = mysql_fetch_array($all));
									}
									
									?>
<!--------------------------------------------------------------------------------------------------------------------------------->
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
	<?php include_once "blocks/footer.php"; ?>
<center>
</form>
</body>

</html>