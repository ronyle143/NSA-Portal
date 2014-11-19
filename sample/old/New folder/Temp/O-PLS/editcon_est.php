<!DOCTYPE HTML>
<!-- Website template by HalcyonArts -->
<html>
<head>
	<?php 
		$docacon = mysql_connect('localhost','root','');
		$docadb = mysql_select_db('opls_db',$docacon);
		
		session_start();
		$_SESSION['spec']="";
		$_SESSION['edit_estno'] = "";
		$_SESSION['edit_estname'] = "";
		$_SESSION['edit_estshort'] = "";
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
	<?php include_once "blocks/function_edit_est.php"; ?>
	<meta charset='UTF-8'>
	<title>O-PLS - Edit Establishment</title>
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
									$x = $_SESSION['edit'];
									$qer1 = "SELECT * FROM est_table WHERE estno = '$x'";
									$break = mysql_query($qer1);
									$get = mysql_fetch_assoc($break);
									
									$_SESSION['edit_estno'] = $get['estno'];
									$_SESSION['edit_estname'] = $get['estname'];
									$_SESSION['edit_estshort'] = $get['estshort'];
									
printf("							<tr>
										<td>
											<font color=orange>#</font>
										</td>
										<td>
											<font color=orange>%s</font>
										</td>
									</tr>
									<tr>
										<td>
											<font color=orange>Establishment name</font>
										</td>
										<td>
											<input type='TEXT' value='%s' placeholder='Name' name='reg_name' maxlength='50'>
										</td>
									</tr>
									<tr>
										<td>
											<font color=orange>Abbreviation</font>
										</td>
										<td>
											<input type='TEXT' value='%s' placeholder='Name' name='reg_short' maxlength='7'>
										</td>
									</tr>
									<tr>
										<td colspan=2 align=right>
											<button class=btnedit name=edit_est value=''></button>
										</td>
									</tr>"
,$_SESSION['edit_estno']
,$_SESSION['edit_estname']
,$_SESSION['edit_estshort']);
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