<!DOCTYPE HTML>
<!-- Website template by HalcyonArts -->
<html>
<head>
	<?php 
		$docacon = mysql_connect('localhost','root','');
		$docadb = mysql_select_db('opls_db',$docacon);
		
		session_start();
		$_SESSION['selected_propno']      = "";
		$_SESSION['selected_inname']      = "";
		$_SESSION['selected_description'] = "";
		$_SESSION['selected_pass']        = "";
		$_SESSION['selected_when']        = "";
		$_SESSION['selected_guardno']     = "";
		
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
	<meta charset='UTF-8'>
	<title>O-PLS - Previous Records</title>
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
					<table width=976 cellspacing=0 cellpadding=0>
						<tr height=480 valign=top>
							<td align=center colspan=3>
<!--------------------------------------------------------------------------------------------------------------------------------->
							
								<?php
									$pick = "propno";
									if($_SESSION['pick'] != ""){
										$pick = $_SESSION['pick'];
									}
									printf(
									"<table bgcolor='%s' cellpadding=5 cellspacing=2>
										<tr>
											<td colspan=8 align=center>
												<b><font size=8 color='%s'>Previous Records</font></b>
											</td>
										</tr>
										<tr>
											<td colspan=8 align=center>
												<select id=selection name=selection >
												 <option value='propno'>Prop no.</option>
												 <option value='inname'>In Name</option>
												 <option value='inwhen'>In Date</option>
												 <option value='inguardno'>Incharge(In)</option>
												 <option value='description'>Description</option>
												 <option value='outname'>Out Name</option>
												 <option value='outwhen'>Out Date</option>
												 <option value='outguardno'>Incharge(Out)</option>"
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
													<font color='%s'>In Date</font>
											</td>
											<td align=center>
													<font color='%s'>Incharge(In)</font>
											</td>
											<td align=center>
													<font color='%s'>Item Description</font>
											</td>
											<td align=center>
													<font color='%s'>Out Name</font>							
											</td>
											<td align=center>
													<font color='%s'>Out Date</font>
											</td>
											<td align=center>
													<font color='%s'>Incharge(Out)</font>
											</td>"
										,$_SESSION['color_1']
										,$_SESSION['color_1']
										,$_SESSION['color_1']
										,$_SESSION['color_1']
										,$_SESSION['color_1']
										,$_SESSION['color_1']
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
									$docasql = "SELECT * FROM record_table".$estno." ORDER BY ".$pick.",1";
									$all = mysql_query($docasql);
									if($item = mysql_fetch_array($all)){
										do{
											printf("<tr bgcolor = white>");
						////propno//////////////////////////////////////////////////////////////////////////
											printf("	<td align=right ");
												if($pick == "propno"){
													printf("bgcolor='#FFF2E0'");
												}
												printf(" >%s</td>",$item['propno']);
						////inname//////////////////////////////////////////////////////////////////////////
											printf("	<td             ");
												if($pick == "inname"){
													printf("bgcolor='#FFF2E0'");
												}
												printf(" >%s</td>",$item['inname']);
						////inwhen//////////////////////////////////////////////////////////////////////////
											printf("	<td             ");
												if($pick == "inwhen"){
													printf("bgcolor='#FFF2E0'");
												}
												printf(" >%s</td>",$item['inwhen']);
						////inguardno//////////////////////////////////////////////////////////////////////////
											printf("	<td align=right ");
												if($pick == "inguardno"){
													printf("bgcolor='#FFF2E0'");
												}
												printf(" >%s</td>",$item['inguardno']);
						////description//////////////////////////////////////////////////////////////////////////
											printf("	<td             ");
												if($pick == "description"){
													printf("bgcolor='#FFF2E0'");
												}
												printf(" >%s</td>",$item['description']);
						////outname//////////////////////////////////////////////////////////////////////////
											printf("	<td             ");
												if($pick == "outname"){
													printf("bgcolor='#FFF2E0'");
												}
												printf(" >%s</td>",$item['outname']);
						////outwhen//////////////////////////////////////////////////////////////////////////
											printf("	<td             ");
												if($pick == "outwhen"){
													printf("bgcolor='#FFF2E0'");
												}
												printf(" >%s</td>",$item['outwhen']);
						////outguardno//////////////////////////////////////////////////////////////////////////
											printf("	<td align=right ");
												if($pick == "outguardno"){
													printf("bgcolor='#FFF2E0'");
												}
												printf(" >%s</td>",$item['outguardno']);
						////estno//////////////////////////////////////////////////////////////////////////
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
						//////////////////////////////////////////////////////////////////////////////
											printf("</tr>");
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