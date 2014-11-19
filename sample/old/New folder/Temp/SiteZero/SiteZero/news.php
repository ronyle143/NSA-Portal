<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<?php 
		$docacon = mysql_connect('localhost','root','');
		$docadb = mysql_select_db('doca_db',$docacon);
		
		session_start();
		$_SESSION['gidno1'] = "";
		$_SESSION['gtitle1'] = "";
		$_SESSION['gcontent1'] = "";
		
		if($_SESSION['gusername']==""&&$_SESSION['gpassword']==""){
			echo"<script>alert('You must login first!')</script>";
			echo"<script>window.location=['login.php']</script>";
		}
	?>
	<meta charset="UTF-8">
	<title>SiteZero - News</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	
</head>
<body>
	
	<form name="doca" method="POST" action="newsentry.php">

	<?php include_once "blocks/header.php"; ?>
	
	<table>
		<tr><td><a href="newsentry.php" class="btn">Add Entry</a></td></tr>
	</table>
	<div id="adbox" align="center">
		<div class="clearfix"><table>
						
			<div>
				<h1>News</h1>
				<center>
					<table bgcolor = gray>
						<tr align = center>
							<td>
								<a href="news.php" class="titlebtn">latest News</a>
							</td>
						</tr>
					</table>
				</center>
				
				<?php	
					$docasq2 = "SELECT * FROM news_table ORDER BY idno DESC";
					$all = mysql_query($docasq2);
					if($item = mysql_fetch_array($all)){
						do{
							$idno2 = $item['idno'];
							$title2 = $item['title'];
							$content2 = $item['content'];
							$when2 = $item['when'];
							
							echo"<center><table cellpadding = 5 bgcolor = gray><tr align = center><td bgcolor = lightgray width = 150>";
								printf("%s",$title2);
							echo"</td><td></td></tr><tr bgcolor = white><td colspan = 5><textarea readonly  rows=4 cols=58 wrap=physical>";
								printf("%s",$content2);
							echo"</textarea></td></tr><tr bgcolor = lightgray align = center><td colspan = 5 align=right>";
								printf("(%s) - %s",$idno2-100000,$when2);
							echo"</td></tr></table></center><br>";
						}while($item = mysql_fetch_array($all));
					}
				?>
			</div>
		</div>
	</div>
	
	
	<?php include_once "blocks/footer.php"; ?>
</body>

</html>