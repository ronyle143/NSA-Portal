<!DOCTYPE HTML>
<!-- Website template by HalcyonArts -->
<html>
<head>
	<?php 
		$docacon = mysql_connect('localhost','root','');
		$docadb = mysql_select_db('opls_db',$docacon);
		
		session_start();
		$_SESSION['spec']="";
		$_SESSION['edituser']="";
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
		if(isset($_POST['editthisuser'])){
			$_SESSION['edituser'] = $_POST['editthisuser'];
			echo"<script>window.location=['editcon_user.php']</script>";
		}
	
	?>
	<meta charset='UTF-8'>
	<title>O-PLS - Edit Users</title>
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
								<table bgcolor='<?php printf($_SESSION['color_2'])?>' cellpadding=5 cellspacing=2 border=0>
										<tr>
											<td colspan=11 align=center>
												<b><font size=8 color='<?php printf($_SESSION['color_1'])?>'>Operators</font></b>
											</td>
										</tr>
										
<!--------------------------------------------------------------------------------------------------------------------------------->
									<?php
printf("
											<tr>
												<td><font color=orange>#</font></td>
												<td><font color=orange>Name</font></td>
												<td><font color=orange>Username</font></td>
												<td><font color=orange>Password</font></td>
												<td><font color=orange>Address</font></td>
												<td><font color=orange>Contact no.</font></td>
												<td><font color=orange>Registered</font></td>
												<td><font color=orange>Est.</font></td>
												<td><font color=orange>Type</font></td>
												<td></td>
											</tr>
");
									$docasql = "SELECT * FROM guard_table ORDER BY 1";
									$all = mysql_query($docasql);
									if($item = mysql_fetch_array($all)){
										do{
											$emp = $item['estno'];
											$break = mysql_query("SELECT * FROM est_table WHERE estno = '$emp'
																  UNION ALL
																  SELECT * FROM est_temp  WHERE estno = '$emp'");
											$get = mysql_fetch_assoc($break);
printf("
											<tr bgcolor=white>
												<td>%s</td>
												<td>%s, %s %s.</td>
												<td>%s</td>
												<td>%s</td>
												<td>%s</td>
												<td>%s</td>
												<td>%s</td>
												<td>%s</td>
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
$acctype = "";
$acccolor = "orange";
if($item['active']==1){
	$acctype = "Default";
}
if($item['active']>=2){
	$acctype = "Admin";
	$acccolor = "red";
}
printf("									<td><font color=%s>%s</td>",$acccolor,$acctype);
printf("
												
												<td><button class=btnedit name=editthisuser value='%s'></button></td>
											</tr>",$item['guardno']);
										}while($item = mysql_fetch_array($all));
									}
									
									?>
<!--------------------------------------------------------------------------------------------------------------------------------->
								</table>
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