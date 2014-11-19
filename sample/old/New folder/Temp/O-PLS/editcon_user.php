<!DOCTYPE HTML>
<!-- Website template by HalcyonArts -->
<html>
<head>
	<?php 
		$docacon = mysql_connect('localhost','root','');
		$docadb = mysql_select_db('opls_db',$docacon);

		session_start();
		$_SESSION['spec']			= "";
		$_SESSION['edit_guardno'] 	= "";
		$_SESSION['edit_lastname'] 	= "";
		$_SESSION['edit_firstname'] = "";
		$_SESSION['edit_mi'] 		= "";
		$_SESSION['edit_username'] 	= "";
		$_SESSION['edit_address'] 	= "";
		$_SESSION['edit_contactno'] = "";
		$_SESSION['edit_regdate'] 	= "";
		$_SESSION['edit_estno'] 	= "";
		$_SESSION['edit_active'] 	= "";
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
	<?php include_once "blocks/function_edit_user.php"; ?>
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
											<td colspan=10 align=center>
												<b><font size=8 color='<?php printf($_SESSION['color_1'])?>'>Establishments</font></b>
											</td>
										</tr>
										
<!--------------------------------------------------------------------------------------------------------------------------------->
									<?php
									$x = $_SESSION['edituser'];
									$qer1 = "SELECT * FROM guard_table WHERE guardno = '$x'";
									$break = mysql_query($qer1);
									$get = mysql_fetch_assoc($break);
									
									$_SESSION['edit_guardno'] 	= $get['guardno'];
									$_SESSION['edit_lastname'] 	= $get['lastname'];
									$_SESSION['edit_firstname'] = $get['firstname'];
									$_SESSION['edit_mi'] 		= $get['mi'];
									$_SESSION['edit_username'] 	= $get['username'];
									$_SESSION['edit_address'] 	= $get['address'];
									$_SESSION['edit_contactno'] = $get['contactno'];
									$_SESSION['edit_regdate'] 	= $get['regdate'];
									$_SESSION['edit_estno'] 	= $get['estno'];
									$_SESSION['edit_active'] 	= $get['active'];
									
printf("							<tr>
										<td align=right>
											<font color='orange'>Username</font>&nbsp&nbsp&nbsp
										</td>
										<td>
											<font color=white>%s</font>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='orange'>Password</font>
											<font color=red>*</font>
										</td>
										<td>
											<input type='TEXTBOX' value='%s' placeholder='Password' name='reg_password' maxlength='20'>
										</td>
									</tr>
									<tr><td colspan=2><hr></td></tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='orange'>First name</font>
											<font color=red>*</font>
										</td>
										<td>
											<input type='TEXT' value='%s' placeholder='Firstname' name='reg_firstname' maxlength='20'>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='orange'>Middle Initial</font>
											<font color=red>*</font>
										</td>
										<td>
											<input type='TEXT' value='%s' placeholder='MI' name='reg_mi' maxlength='1'>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='orange'>Last name</font>
											<font color=red>*</font>
										</td>
										<td>
											<input type='TEXT' value='%s' placeholder='Lastname' name='reg_lastname' maxlength='20'>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='orange'>Address&nbsp&nbsp&nbsp</font>
										</td>
										<td>
											<textarea style='resize: none;' placeholder='Address' name='reg_address' wrap='physical' cols='15' maxlength='100'>%s</textarea>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='orange'>Contact no.&nbsp&nbsp</font>
										</td>
										<td>
											<input type='TEXTBOX' value='%s' placeholder='Contact no.' name='reg_contactno' maxlength='15'>
										</td>
									</tr>
									"
,$_SESSION['edit_username']
,$get['password']
,$_SESSION['edit_firstname']
,$_SESSION['edit_mi']
,$_SESSION['edit_lastname']
,$_SESSION['edit_address']
,$_SESSION['edit_contactno']
,$_SESSION['edit_regdate']
,$_SESSION['edit_estno']
,$_SESSION['edit_active']
);		
printf("	
									<tr>
										<td align=right>
											<font color='orange'>Account type</font>
											<font color=red>*</font>
										</td>
										<td>
											<select id=selection name='reg_active'>
												<option value='1'>Default</option>
												<option value='2'>Admin</option>
												<option value='0'>Disable</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan=2 align=right>
											<button class=btnedit name=edit_user value='%s'></button>
										</td>
									</tr>",$_SESSION['edituser']);
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