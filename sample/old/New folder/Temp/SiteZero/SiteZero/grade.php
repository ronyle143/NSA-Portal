<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<?php 
		$docacon = mysql_connect('localhost','root','');
		$docadb = mysql_select_db('doca_db',$docacon);
		
		session_start();
		$_SESSION['gname1'] = "";
		$_SESSION['gprelim1'] = "";
		$_SESSION['gmidterm1'] = "";
		$_SESSION['gsemi1'] = "";
		$_SESSION['gfinal1'] = "";
		$_SESSION['ggrade1'] = "";
		
		if($_SESSION['gusername']==""&&$_SESSION['gpassword']==""){
			echo"<script>alert('You must login first!')</script>";
			echo"<script>window.location=['login.php']</script>";
		}
	?>
	<?php
		if(isset($_POST['submit']))
			{
				$name=$_POST['name_txt'];
				$prelim=$_POST['prelim_txt'];
				$midterm=$_POST['midterm_txt'];
				$semi=$_POST['semi_txt'];
				$final=$_POST['final_txt'];
				
				$docasql = "INSERT INTO grade_table(name,prelim,midterm,semi,final) VALUES('$name','$prelim','$midterm','$semi','$final');";
				mysql_query($docasql);
				echo"<script>alert('Record Saved!!!');</script>";
			}
	?>
	<?php 
			if(isset($_POST['update']))
			{
				$name=$_POST['name_txt'];
				$prelim=$_POST['prelim_txt'];
				$midterm=$_POST['midterm_txt'];
				$semi=$_POST['semi_txt'];
				$final=$_POST['final_txt'];
				
				$docasql = "UPDATE grade_table SET name ='$name',prelim='$prelim',midterm='$midterm',semi='$semi',final='$final' WHERE name = '$name'";
				mysql_query($docasql);
			}
		?>
		<?php 
			if(isset($_POST['delete']))
			{
				$name=$_POST['name_txt'];
				$prelim=$_POST['prelim_txt'];
				$midterm=$_POST['midterm_txt'];
				$semi=$_POST['semi_txt'];
				$final=$_POST['final_txt'];
				
				$docasql = "DELETE FROM grade_table WHERE name='$name'";
				mysql_query($docasql);
			}
		?>
		<?php 
			if(isset($_POST['cal']))
			{
				$name = $_POST['name_txt'];
				$docasql = "SELECT * FROM grade_table WHERE name = '$name'";
				$break = mysql_query($docasql);
				$get = mysql_fetch_assoc($break);
			
				$name=$_POST['name_txt'];
				$prelim=$_POST['prelim_txt'];
				$midterm=$_POST['midterm_txt'];
				$semi=$_POST['semi_txt'];
				$final=$_POST['final_txt'];
				
				$_SESSION['gname1'] = $get['name'];
				$_SESSION['gprelim1'] = $get['prelim'];
				$_SESSION['gmidterm1'] = $get['midterm'];
				$_SESSION['gsemi1'] = $get['semi'];
				$_SESSION['gfinal1'] = $get['final'];
				$_SESSION['ggrade1'] = ($prelim + $midterm + $semi + $final)/4;
				mysql_query($docasql);
			}
		?>
	<meta charset="UTF-8">
	<title>SiteZero - Grade Calculator Page</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	
	<form name="doca" method="POST" action="grade.php">
		<?php 
			if(isset($_POST['fetch']))
			{
				$name = $_POST['name_txt'];
				$docasql = "SELECT * FROM grade_table WHERE name = '$name'";
				$break = mysql_query($docasql);
				$get = mysql_fetch_assoc($break);
				
				$_SESSION['gname1'] = $get['name'];
				$_SESSION['gprelim1'] = $get['prelim'];
				$_SESSION['gmidterm1'] = $get['midterm'];
				$_SESSION['gsemi1'] = $get['semi'];
				$_SESSION['gfinal1'] = $get['final'];
			}
		?>

	<?php include_once "blocks/header.php"; ?>
	
	<div id="adbox">
		<div class="clearfix">
			<img src="images/box.png" alt="Img" height="342" width="368">
			<div>
					<table border="0"><tr><td><center>
			<h3>GRADE CALCULATOR PAGE</h3>
			<table border="0">
				<tr><td>Name</td><td><input type="TEXT" value="<?php printf($_SESSION['gname1'])?>" name="name_txt"></td></tr>
				<tr><td>Prelim</td><td><input type="TEXT" value="<?php printf($_SESSION['gprelim1'])?>" name="prelim_txt"></td></tr>
				<tr><td>Midterm</td><td><input type="TEXT" value="<?php printf($_SESSION['gmidterm1'])?>" name="midterm_txt"></td></tr>
				<tr><td>Semi-final</td><td><input type="TEXT" value="<?php printf($_SESSION['gsemi1'])?>" name="semi_txt"></td></tr>
				<tr><td>Final</td><td><input type="TEXT" value="<?php printf($_SESSION['gfinal1'])?>" name="final_txt"></td></td><td><input type="submit" value="compute" name="cal"></td></tr>
				<tr><td colspan = 3><hr></td></tr>
				<tr><td>Grade</td><td><input type="TEXT" value="<?php printf($_SESSION['ggrade1'])?>" name="grade_txt"></tr>
				<tr><td colspan="2"><input type="submit" value="Submit" name="submit"><input type="submit" value="Fetch" name="fetch"><input type="submit" value="Update" name="update"><input type="submit" value="Delete" name="delete"></td></tr>
				    
			</table>
		</center></td></tr></table>
			</div>
		</div>
	</div>
	<div id="contents">
		<div id="tagline" class="clearfix">
			<h1>Grade Sheet</h1>
			<?php
				$docasql = "SELECT * FROM grade_table";
				$all = mysql_query($docasql);
				if($item = mysql_fetch_array($all)){
					echo"<table cellpadding = 5 bgcolor = gray align = center>";
					echo"<tr bgcolor = lightgray align = center>
								<td width=150>Name</td>
								<td width=100>Prelim</td>
								<td width=100>Midterm</td>
								<td width=100>Semi-final</td>
								<td width=100>Final</td>
								<td width=150>Grade</td>
						</tr>\n\n";
					do{
						printf("<tr bgcolor = white align = center><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td bgcolor=yellow>%s</td></tr>\n",
						$item['name'],$item['prelim'],$item['midterm'],$item['semi'],$item['final'],($item['prelim'] + $item['midterm'] + $item['semi'] + $item['final'])/4						);
					}while($item = mysql_fetch_array($all));
				}
				echo"</table>";
			?>
		</div>
	</div>
	<?php include_once "blocks/footer.php"; ?>
</body>

</html>