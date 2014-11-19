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
	$docasq2 = "SELECT * FROM news_table";
	$all = mysql_query($docasq2);
	if($item = mysql_fetch_array($all)){
		$idno2 = "";
		$title2 = "";
		$content2 = "";
		$when2 = "";
		do{
			$idno2 = $item['idno'];
			$title2 = $item['title'];
			$content2 = $item['content'];
			$when2 = $item['when'];
		}while($item = mysql_fetch_array($all));
		echo"<center><table cellpadding = 5 bgcolor = gray>";
		echo"<tr align = center><td bgcolor = lightgray width = 150>";
			printf("%s",$title2);
		echo"</td><td></td></tr><tr bgcolor = white><td colspan = 5><textarea readonly  rows=4 cols=58 wrap=physical;>";
			printf("%s",$content2);
		echo"</textarea></td></tr><tr bgcolor = lightgray align = center><td colspan = 5 align=right>";
			printf("(%s) - %s",$idno2-100000,$when2);
		echo"</td></tr><table></center><br><br><br>";
	}
?>