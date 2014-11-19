<!DOCTYPE HTML>
<!-- Website template by HalcyonArts -->
<html>
<head>
	<?php 
		$docacon = mysql_connect('localhost','root','');
		$docadb = mysql_select_db('opls_db',$docacon);
		
		session_start();
	?>
	<?php
		if($_SESSION['opls_username']==""||$_SESSION['opls_password']==""){
			printf("<script>alert('%s, You must login first!')</script>",$_SESSION['opls_username']);
			echo"<script>window.location=['index.php']</script>";
		}
	?>
	<?php
		if(isset($_POST['goto_home'])){
			echo"<script>window.location=['home.php']</script>";
		}
	?>
	<?php
		$_SESSION['pick']     = "";
		
		if(isset($_POST['refresh'])){
			$_SESSION['pick'] = $_POST['selection'];
		}
	?>
	<?php include_once "blocks/function_in.php"; ?>
	<meta charset='UTF-8'>
	<title>O-PLS - Log-In Property</title>
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
					<table width=976 border=0   height=480>
						<tr height=10 valign=top>
							<td align=center style='vertical-align: top;'>
<!--------------------------------------------------------------------------------------------------------------------------------->
							<table bgcolor='<?php printf($_SESSION['color_2'])?>' cellpadding=5 cellspacing=2>
								<tr>
									<td colspan=2>
										<b><font size=8 color='<?php printf($_SESSION['color_1'])?>'>Log-In Property</font></b>
									</td>
								</tr>
								<tr>
									<td align=right>
										<font color='<?php printf($_SESSION['color_1'])?>'>Name:</font>
										<font color=red>*</font>
									</td>
									<td>
										<input type='TEXT' value='' placeholder='Name' name='in_name'>
									</td>
								</tr>
								<tr>
									<td align=right>
										<font color='<?php printf($_SESSION['color_1'])?>'>Item Description:</font>
										<font color=red>*</font>
									</td>
									<td>
										<input type='TEXT' value='' placeholder='Description' name='in_desc'>
									</td>
								</tr>
								<tr>
									<td align=right>
										<font color='<?php printf($_SESSION['color_1'])?>'>Password:</font>
										<font color=red>*</font>
									</td>
									<td>
										<input type='PASSWORD' value='' placeholder='Password' name='in_pass'>
									</td>
								</tr>
								<tr>
									<td>
										
									</td>
									<td>
										<input type='PASSWORD' value='' placeholder='Retype password' name='in_pass_r'>
									</td>
								</tr>
								<tr>
									<td colspan=2 align=center>
										<input type='submit' value='Log' name='in'>
									</td>
								</tr>
							</table>
<!--------------------------------------------------------------------------------------------------------------------------------->
							</td>
							<td height=10 align=center>
<!--------------------------------------------------------------------------------------------------------------------------------->
							<?php
									$pick = "propno";
									if($_SESSION['pick'] != ""){
										$pick = $_SESSION['pick'];
									}
									printf(
									"<table bgcolor='%s' cellpadding=5 cellspacing=2>
										<tr>
											<td colspan=5 align=center>
												<b><font size=8 color='%s'>Current Properties</font></b>
											</td>
										</tr>
										<tr>
											<td colspan=5 align=center>
												<select id=selection name=selection >
												 <option value='propno'>Prop no.</option>
												 <option value='inname'>In Name</option>
												 <option value='description'>Description</option>
												 <option value='inwhen'>In Date</option>
												 <option value='guardno'>Incharge</option>"
										,$_SESSION['color_2']
										,$_SESSION['color_1']);
										if($_SESSION['opls_username']==""||$_SESSION['opls_password']==""){
										printf("<option value='estno'>Est. no.</option>");
										}
										printf("
												</select>
												<input type=submit name=refresh value=Refresh>
											</td>
										</tr>
										<tr>
											<td align=center>
													<font color='%s'>Prop no.</font>
											</td>
											<td align=center>
													<font color='%s'>In Name</font>							
											</td>
											<td align=center>
													<font color='%s'>Item Description</font>
											</td>"
										,$_SESSION['color_1']
										,$_SESSION['color_1']
										,$_SESSION['color_1']);
										if($_SESSION['opls_active'] >=2){
											printf("
											<td align=center>
													<font color='%s'>Password</font>
											</td>"
											,$_SESSION['color_1']);
										}
										printf("
											<td align=center>
													<font color='%s'>In Date</font>
											</td>
											<td align=center>
													<font color='%s'>Incharge</font>
											</td>"
										,$_SESSION['color_1']
										,$_SESSION['color_1']
									);
									if($_SESSION['opls_username']==""||$_SESSION['opls_password']==""){
									printf("
											<td align=center>
													<font color='%s'>Est.</font>
											</td>
										</tr>"
										,$_SESSION['color_1']);
									}
									$estno = "";
									if($_SESSION['opls_estno']==""){}
									else{
										$tmp = $_SESSION['opls_estno'];
										$estno = " WHERE estno='$tmp'";
									}
									$docasql = "SELECT * FROM in_table".$estno." ORDER BY ".$pick.",1";
									$all = mysql_query($docasql);
									if($item = mysql_fetch_array($all)){
										do{
											if($_SESSION['opls_active'] >=2){
												printf("<tr bgcolor = white>");
												printf("	<td align=right ");
													if($pick == "propno"){
														printf("bgcolor='#FFF2E0'");
													}
													printf(" >%s</td>",$item['propno']);
												printf("	<td             ");
													if($pick == "inname"){
														printf("bgcolor='#FFF2E0'");
													}
													printf(" >%s</td>",$item['inname']);
												printf("	<td             ");
													if($pick == "description"){
														printf("bgcolor='#FFF2E0'");
													}
													printf(" >%s</td>",$item['description']);
												printf("	<td             ");
													if($pick == "pass"){
														printf("bgcolor='#FFF2E0'");
													}
													printf(" >%s</td>",$item['pass']);
												printf("	<td             ");
													if($pick == "inwhen"){
														printf("bgcolor='#FFF2E0'");
													}
													printf(" >%s</td>",$item['inwhen']);
												printf("	<td align=right ");
													if($pick == "guardno"){
														printf("bgcolor='#FFF2E0'");
													}
													printf(" >%s</td>",$item['guardno']);
												if($_SESSION['opls_username']==""||$_SESSION['opls_password']==""){
													printf("	<td align=right ");
														if($pick == "estno"){
															printf("bgcolor='#FFF2E0'");
														}
														printf(" >%s</td>",$item['estno']);
												}
												printf("</tr>");
											}
											else{
												printf("<tr bgcolor = white>");
												printf("	<td align=right ");
													if($pick == "propno"){
														printf("bgcolor='#FFF2E0'");
													}
													printf(" >%s</td>",$item['propno']);
												printf("	<td             ");
													if($pick == "inname"){
														printf("bgcolor='#FFF2E0'");
													}
													printf(" >%s</td>",$item['inname']);
												printf("	<td             ");
													if($pick == "description"){
														printf("bgcolor='#FFF2E0'");
													}
													printf(" >%s</td>",$item['description']);
												printf("	<td             ");
													if($pick == "inwhen"){
														printf("bgcolor='#FFF2E0'");
													}
													printf(" >%s</td>",$item['inwhen']);
												printf("	<td align=right ");
													if($pick == "guardno"){
														printf("bgcolor='#FFF2E0'");
													}
													printf(" >%s</td>",$item['guardno']);
												if($_SESSION['opls_username']==""||$_SESSION['opls_password']==""){
													printf("	<td align=right ");
														if($pick == "estno"){
															printf("bgcolor='#FFF2E0'");
														}
														$emp = $item['estno'];
														$break = mysql_query("SELECT * FROM est_table WHERE estno = '$emp'");
														$get = mysql_fetch_assoc($break);
														printf(" >%s</td>",$get['estshort']);
												}
												printf("</tr>");
											}
										}while($item = mysql_fetch_array($all));
									}
									echo"</table>";
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