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
	<?php
		if(isset($_POST['submit']))
			{
				$num = 100000;
				$docasq2 = "SELECT * FROM news_table";
				$all = mysql_query($docasq2);
				do{
					$num += 1;
				}while($item = mysql_fetch_array($all));		
				$idno=$num;
				
				$title=$_POST['title_txt'];
				$content=$_POST['content_txt'];
				
				$docasql = "INSERT INTO news_table(idno,title,content) VALUES('$idno','$title','$content');";
				mysql_query($docasql);
				
				$docasq3 = "SELECT * FROM news_table WHERE title = '$title'";
				$break = mysql_query($docasq3);
				$get = mysql_fetch_assoc($break);
				if($title == $get['title']){
					echo"<script>alert('News Entry Saved!!!');</script>";
				}
				else{
					echo"<script>alert('ID number is already in use');</script>";
				}
			}
	?>
	<?php 
		if(isset($_POST['update']))
		{
			$idno=$_POST['idno_txt'];
			$title=$_POST['title_txt'];
			$content=$_POST['content_txt'];
			
			$docasql = "UPDATE news_table SET idno ='$idno',title='$title',content='$content' WHERE idno = '$idno'";
			mysql_query($docasql);
			echo"<script>alert('News Entry Updated!!!');</script>";
		}
	?>
	<?php 
		if(isset($_POST['fetch']))
		{
			$idno = $_POST['idno_txt'];
			$docasql = "SELECT * FROM news_table WHERE idno = '$idno'";
			$break = mysql_query($docasql);
			$get = mysql_fetch_assoc($break);
			
			$_SESSION['gidno1'] = $get['idno'];
			$_SESSION['gtitle1'] = $get['title'];
			$_SESSION['gcontent1'] = $get['content'];
		}
	?>
	<?php 
		if(isset($_POST['fetchlast']))
		{
			$docasq2 = "SELECT * FROM news_table";
			$all = mysql_query($docasq2);
			$idno = "";
			if($item = mysql_fetch_array($all)){
				do{
					$idno = $item['idno'];
				}while($item = mysql_fetch_array($all));
			}
			$docasql = "SELECT * FROM news_table WHERE idno = '$idno'";
			$break = mysql_query($docasql);
			$get = mysql_fetch_assoc($break);
			
			$_SESSION['gidno1'] = $get['idno'];
			$_SESSION['gtitle1'] = $get['title'];
			$_SESSION['gcontent1'] = $get['content'];
		}
	?>
	<?php 
		if(isset($_POST['delete']))
		{
			$idno=$_POST['idno_txt'];
			
			$docasql = "DELETE FROM news_table WHERE idno='$idno'";
			mysql_query($docasql);
			echo"<script>alert('News Entry Deleted!!!');</script>";
		}
	?>
	<meta charset="UTF-8">
	<title>SiteZero - News Entry</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	
	<form name="doca" method="POST" action="newsentry.php">
		
	<?php include_once "blocks/header.php"; ?>
	
	<div id="adbox" align="center">
		<div class="clearfix">
			<div>
					<table border="0"><tr><td><center>
			<h1>News Entry</h1>
			<table border="0" bgcolor = "gray" width="500">
				
				<tr bgcolor = lightgray>
					<td width="50">&nbspID no.</td>
					<td align="left"><input width="200" type="TEXT" value="<?php printf($_SESSION['gidno1'])?>" name="idno_txt"><input type="submit" value="Fetch" name="fetch"><input type="submit" value="Fetch Last" name="fetchlast"></td>
				</tr>
				<tr bgcolor = lightgray>
					<td>&nbspTitle</td>
					<td align="left"><input type="TEXT" value="<?php printf($_SESSION['gtitle1'])?>" name="title_txt"></td>
				</tr>
			</table>
			<table border="0" bgcolor = gray width="500">
				<tr>
					<td bgcolor = lightgray align="center">Content</td>
				</tr>
				<tr>
					<td align="center"><textarea name ="content_txt" rows="15" cols="58" wrap="physical" placeholder="Enter text here..."><?php printf($_SESSION['gcontent1'])?></textarea></td>
				</tr>
			
				<tr><td align="right"><input type="submit" value="Submit" name="submit"><input type="submit" value="Update" name="update"><input type="submit" value="Delete" name="delete"></td></tr>
				    
			</table>
			
		</center></td></tr></table>
			</div>
		</div>
	</div>
		
	<?php include_once "blocks/latestnews.php"; ?>
	
	<?php include_once "blocks/footer.php"; ?>
</body>

</html>