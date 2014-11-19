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
		if(isset($_POST['goto_in'])){
			echo"<script>window.location=['in.php']</script>";
		}
		
		if(isset($_POST['goto_out'])){
			echo"<script>window.location=['out.php']</script>";
		}
	?>
	<meta charset='UTF-8'>
	<title>O-PLS - Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<form name="doca" method="POST">
<center>
	<div>
		<?php include_once "blocks/header.php"; ?>
		<table bgcolor='<?php printf($_SESSION['color_3'])?>' cellpadding=0 cellspacing=0 width='1000' background='<?php printf($_SESSION['bg_img'])?>'>
			<tr>
				<td align=center colspan=2>
					<table width=976 cellpadding=0 cellspacing=0>
						<tr height=480>
							<?php
								if($_SESSION['opls_username']==""||$_SESSION['opls_password']==""){
									printf("
									<td align=center>
										<img src='img/enter_1.png'>
									</td>
									<td align=center align=center>
										<img src='img/exit_1.png'>
									</td>");
								}
								else{
									printf("
									<td align=center>
										<a href='in.php'><img src='img/enter.png'></a>
									</td>
									<td align=center align=center>
										<a href='out.php'><img src='img/exit.png'></a>
									</td>");
								}
							?>
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