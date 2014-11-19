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
		if(isset($_POST['btn_edit'])){
			$_SESSION['spec'] = "edit";
		}
	?>
	<?php
		if(isset($_POST['btn_confirm'])){
			$_SESSION['spec'] = "confirm";
		}
	?>
	
	<meta charset='UTF-8'>
	<title>O-PLS - Admin</title>
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
								<table border=0>
								<tr>
									<td width=300 align=center>
<?php if($_SESSION['spec']=="confirm"){
printf("								<button name=btn_confirm style='background-color:transparent;border: 0;'><image src='img/screen/confirm_s.png'></button>");
}
else{
printf("								<button name=btn_confirm style='background-color:transparent;border: 0;'><image src='img/screen/confirm.png'></button>");
} ?>									</td>
									<td>
<?php if($_SESSION['spec']=="edit"){
printf("								<button name=btn_edit style='background-color:transparent;border: 0;'><image src='img/screen/edit_s.png'></button>");
}
else{
printf("								<button name=btn_edit style='background-color:transparent;border: 0;'><image src='img/screen/edit.png'></button>");
} ?>									</td>
								</tr>
								
<?php if($_SESSION['spec']=="confirm"){
								//<button class=btnok name=btnok value=''></button>
						printf("<tr>
									<td width=300>
									
										<table cellspacing=2 cellpadding=5 width=240>
											<tr><td bgcolor=#555555 style='%s'>
												<a href='con_user.php' style='text-decoration: none'>&nbspOperators</a>
											</td></tr>
											<tr><td bgcolor=#555555 style='%s'>
												<a href='con_est.php'style='text-decoration: none'>&nbspEstablishments</a>
											</td></tr>
										</td></tr></table>
									</td>
									<td width=300>
									</td>
								</tr>
"
,$_SESSION['style1']
,$_SESSION['style1']
);} ?>
<?php if($_SESSION['spec']=="edit"){
								//<button class=btnok name=btnok value=''></button>
						printf("<tr>
									<td width=300></td>
									<td width=300>
										<table cellspacing=2 cellpadding=5 width=240>
											<tr><td bgcolor=#555555 style='%s'>
												<a href='edit_user.php' style='text-decoration: none'>&nbspOperators</a>
											</td></tr>
											<tr><td bgcolor=#555555 style='%s'>
												<a href='edit_est.php'style='text-decoration: none'>&nbspEstablishments</a>
											</td></tr>
										</td></tr></table>
									</td>
								</tr>
"
,$_SESSION['style1']
,$_SESSION['style1']
);} ?>
	<?php if($_SESSION['spec']==""){
						printf("<tr>
									<td width=300></td>
									<td width=300></td>
								</tr>");
} ?>					
								</table>
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