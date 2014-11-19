<!DOCTYPE HTML>
<!-- Website template by HalcyonArts -->
<html>
<head>
	<?php 
		$docacon = mysql_connect('localhost','user','','opls_db');
		//$docadb = mysql_select_db('opls_db',$docacon);
	
		session_start();
		$_SESSION['opls_username'] = "";
		$_SESSION['opls_password'] = "";
		
		$_SESSION['opls_active'] = "";
		$_SESSION['opls_estno'] = "";
		
		$_SESSION['opls_firstname'] = "";
		$_SESSION['opls_mi']        = "";
		$_SESSION['opls_lasttname'] = "";
		
	?>
	<?php
		include_once "blocks/function_register.php";
	?>
	<meta charset='UTF-8'>
	<title>O-PLS Login</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<form name="doca" method="POST">
<center>
	<div>
		<?php include_once "blocks/header.php"; ?>
		<table bgcolor='<?php printf($_SESSION['color_3'])?>' cellpadding=10 width='1000' background='<?php printf($_SESSION['bg_img'])?>'>
			<tr>
				<td align=center colspan=2>
					<table width=976 border=0>
						<tr height=480 valign=top>
							<td align=center>
								<table bgcolor='<?php printf($_SESSION['color_2'])?>' cellpadding=5 cellspacing=2>
									<tr>
										<td colspan=2 align=center>
											<b><font size=8 color='<?php printf($_SESSION['color_1'])?>'>Sign up!</font></b>
										</td>
									</tr>
									<tr>
										<td colspan=2>
											<font color='<?php printf($_SESSION['color_1'])?>'></font>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='<?php printf($_SESSION['color_1'])?>'>Username</font>
											<font color=red>*</font>
										</td>
										<td>
											<input type='TEXTBOX' value='' placeholder='Username' name='reg_username' maxlength='20'>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='<?php printf($_SESSION['color_1'])?>'>Password</font>
											<font color=red>*</font>
										</td>
										<td>
											<input type='TEXTBOX' value='' placeholder='Password' name='reg_password' maxlength='20'>
										</td>
									</tr>
									<tr>
										<td>
										</td>
										<td>
											<input type='TEXTBOX' value='' placeholder='Password' name='reg_password_r' maxlength='20'>
										</td>
									</tr>
									<tr><td colspan=2><hr></td></tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='<?php printf($_SESSION['color_1'])?>'>First name</font>
											<font color=red>*</font>
										</td>
										<td>
											<input type='TEXT' value='' placeholder='Firstname' name='reg_firstname' maxlength='20'>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='<?php printf($_SESSION['color_1'])?>'>Middle Initial</font>
											<font color=red>*</font>
										</td>
										<td>
											<input type='TEXT' value='' placeholder='MI' name='reg_mi' maxlength='1'>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='<?php printf($_SESSION['color_1'])?>'>Last name</font>
											<font color=red>*</font>
										</td>
										<td>
											<input type='TEXT' value='' placeholder='Lastname' name='reg_lastname' maxlength='20'>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='<?php printf($_SESSION['color_1'])?>'>Address&nbsp&nbsp&nbsp</font>
										</td>
										<td>
											<textarea style='resize: none;' value='' placeholder='Address' name='reg_address' wrap='physical' cols="15" maxlength='100'></textarea>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='<?php printf($_SESSION['color_1'])?>'>Contact no.&nbsp&nbsp</font>
										</td>
										<td>
											<input type='TEXTBOX' value='' placeholder='Contact no.' name='reg_contactno' maxlength='15'>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='<?php printf($_SESSION['color_1'])?>'>Est.</font>
											<font color=red>*</font>
										</td>
										<td>
											<select id=selection name='reg_estno'>
											<?php
									$docasql = "SELECT * FROM est_table ORDER BY 1";
									$all = mysql_query($docasql);
									if($item = mysql_fetch_array($all)){
										do{
											printf("<option value='%s'>%s</option>",$item['estno'],$item['estshort']);
										}while($item = mysql_fetch_array($all));
									}
												
											?>
											</select>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr align='right'>
										<td colspan=2>
											<font color=white size='1'>Requires Confirmation</font>
											<input type='submit' value='Submit' name='register'>
										</td>
									</tr>
								</table>
							</td>
							<!------------------------------------------------------------------------------------------------------------->
							<td align=center>
								<table bgcolor='<?php printf($_SESSION['color_2'])?>' cellpadding=5 cellspacing=2>
									<tr>
										<td colspan=2 align=center>
											<b><font size=6 color='<?php printf($_SESSION['color_1'])?>'>Register a new<br>Establishment</font></b>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='<?php printf($_SESSION['color_1'])?>'>Name:</font>
											<font color=red>*</font>
										</td>
										<td>
											<input type='TEXT' value='' placeholder='Name' name='reg_name' maxlength='50'>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr>
										<td align=right>
											<font color='<?php printf($_SESSION['color_1'])?>'>Abbreviation:</font>
											<font color=red>*</font>
										</td>
										<td>
											<input type='TEXT' value='' placeholder='Name' name='reg_short' maxlength='7'>
										</td>
									</tr>
									<!----------------------------------------------------------------->
									<tr align='right'>
										<td colspan=2>
											<font color=white size='1'>Requires Confirmation</font>
											<input type='submit' value='Submit' name='reg_est'>
										</td>
									</tr>
									<!----------------------------------------------------------------->
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php include_once "blocks/footer.php"; ?>
	</div>
<center>
</form>
</body>

</html>