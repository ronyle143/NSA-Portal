<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<?php 
		$docacon = mysql_connect('localhost','root','');
		$docadb = mysql_select_db('doca_db',$docacon);
		
		session_start();
			$_SESSION['selected'] = "";
			$_SESSION['comno1'] = "";
			$_SESSION['SelectedArticle'] = "";
				
		if($_SESSION['gclearance']<=2){
			echo"<script>alert('Clearance level 2 required.')</script>";
			echo"<script>window.location=['home.php']</script>";
		}

		if(isset($_POST['btnok'])){
			$commentno = $_POST['btnok'];
			$docasq2 = "SELECT * FROM comment_table WHERE commentno = '$commentno'";
			$break = mysql_query($docasq2);
			$get = mysql_fetch_assoc($break);
			
			if($get['status']<=0){
				$apps = 1;
				$docasql = "UPDATE comment_table SET status = $apps WHERE commentno = '$commentno'";
				mysql_query($docasql);
				//echo"<script>alert('Comment Aprroved.');</script>";
			}
			else{
				echo"<script>alert('Comment is already Approved.');</script>";
			}
		}
		
		if(isset($_POST['btnhide'])){
			$commentno = $_POST['btnhide'];
			$docasq2 = "SELECT * FROM comment_table WHERE commentno = '$commentno'";
			$break = mysql_query($docasq2);
			$get = mysql_fetch_assoc($break);
			
			if($get['status']<=0){
				
				echo"<script>alert('Comment is already Hidden.');</script>";
			}
			else{
				$apps = 0;
				$docasql = "UPDATE comment_table SET status = $apps WHERE commentno = '$commentno'";
				mysql_query($docasql);
				//echo"<script>alert('Comment Hidden.');</script>";
			}
		}
		
		if(isset($_POST['btndelete'])){
			$commentno = $_POST['btndelete'];
				$docasq2 = "DELETE FROM comment_table WHERE commentno='$commentno'";
				mysql_query($docasq2);
				
				echo"<script>alert('Comment Deleted!');</script>";
		}
		
		if(isset($_POST['gotoarticle'])){
			if($_POST['artno_txt']==""){
				echo"<script>alert('Input Article Number!');</script>";
			}
			else{
				$_SESSION['SelectedArticle'] = $_POST['artno_txt'];
				echo"<script>window.location=['article.php']</script>";
			}
		}
	?>
	<?php
		$docasq2 = "SELECT * FROM news_table";
		$all = mysql_query($docasq2);
		$idno = "";
		if($item = mysql_fetch_array($all)){
			do{
				if($idno<$item['idno']){
					$idno = $item['idno'];
				}
			}while($item = mysql_fetch_array($all));
		}
		
		if(isset($_POST['gotolatestarticle'])){
			$_SESSION['SelectedArticle'] = $idno;
			echo"<script>window.location=['article.php']</script>";
		}
	?>
	<meta charset="UTF-8">
	<title>SiteZero - Comments</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	
	<form method="POST">
		
	<?php include_once "blocks/header.php"; ?>
	
	<div id="adbox" align="center">
		<div class="clearfix">
			
			<table border="0">
				<tr>
					<td>
						<h2>Control panel</h2>
						
						<table cellpadding=5 bgcolor=gray>
							<tr bgcolor=lightgray>
								<td>
									<input type="TEXT" value="<?php printf($_SESSION['comno1'])?>" name="artno_txt" placeholder="Article Number" />
								</td>
								<td>
									<button class=universalsumbitbtn type=submit name=gotoarticle>View</button>
									<button class=universalsumbitbtn type=submit name=gotolatestarticle>Latest</button>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<h2>Comments List</h2>
						<center>
						<?php
							$docasql = "SELECT * FROM comment_table ORDER BY idno DESC, commentno";
							$all = mysql_query($docasql);
							$tripper = 0;
							$tripper1 = 0;
							if($item = mysql_fetch_array($all)){
								echo"<table cellpadding=5 bgcolor=gray align=center>";
								echo"<tr bgcolor = lightgray align = center>
											<td width=50>Article #</td>
											<td width=50>Comment #</td>
											<td width=100>Username</td>
											<td width=500>Comment</td>
											<td width=50>Status</td>
											<td width=300>Actions</td>
									</tr>";
								$selectedNO = $item['commentno'];
								do{
									if($tripper != $item['idno']){
										printf("<tr>");
											printf("<td></td>");
											printf("<td></td>");
											printf("<td></td>");
											printf("<td></p></td>");
											printf("<td></td>");
											printf("<td></td>");
										printf("</tr>");
										$tripper = $item['idno'];
										$tripper1 = 1;
									}
									if($item['status'] >= 1){
										echo"<tr bgcolor=white align = center>";
									}
									else{
										echo"<tr bgcolor=#FEF2BF align = center>";
									}
										if($tripper1 > 0){
											printf("<td>%s</td>", $item['idno']);
											$tripper1 -= 1;
										}
										else{
											printf("<td bgcolor=gray></td>");
										}
										printf("<td>%s</td>", $item['commentno']);
										printf("<td>%s</td>", $item['username']);
										printf("<td align=left><p>%s</p></td>", $item['comment']);
										if($item['status'] >= 1){
											printf("<td>Approved</td>");
											printf("<td align=left>");
												//printf("<button class=btnok></button>");
												//printf("<button class=btnno></button>");
												//printf("<button class=btnadd></button>");
												//printf("<button class=btnrem></button>");
												//printf("<button class=btnview></button>");
												printf("<button class=btnhide name=btnhide value=%s></button>",$item['commentno']);
												printf("<button class=btnno name=btndelete value=%s></button>",$item['commentno']);
												//printf("<button class=btnlike></button>");
												//printf("<button class=btndislike></button>");
												//printf("<button class=btnmessage></button>");
												//printf("<button class=btnedit></button>");
												
											printf("</td>");
										}
										else{
											printf("<input type=hidden name=id value=%s />",$item['commentno']);
											printf("<td>Pending</td>");
											printf("<td align=left>");
												printf("<button class=btnok name=btnok value=%s></button>",$item['commentno']);
												printf("<button class=btnno name=btndelete value=%s></button>",$item['commentno']);
												//printf("<button class=btnadd></button>");
												//printf("<button class=btnrem></button>);
												//printf("<button class=btnview></button>");
												//printf("<button class=btnhide></button>");
												//printf("<button class=btnlike></button>");
												//printf("<button class=btndislike></button>");
												//printf("<button class=btnmessage></button>");
												//printf("<button class=btnedit></button>");
												
											printf("</td>");
										}
										
									printf("</tr>");
								}while($item = mysql_fetch_array($all));
							}
							echo"</table>";
						?>
						</center>
					</td>
				</tr>
			</table>
			
		</div>
	</div>
	<br>	
	<?php include_once "blocks/footer.php"; ?>
	
</body>

</html>