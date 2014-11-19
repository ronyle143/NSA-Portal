<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="us">
<head>
	<meta charset="utf-8">
	<title>NSA Portal</title>
	<link href="jquery-ui.css" rel="stylesheet">
	<?php include'blocks\add_css.php'; ?>
</head>
<body style="background-image: url('../images/main/paper-bg.jpg');">
	<center>
<!--------------------------------------------------------------------------------------------------------------------------->



	<div class="container">
		<div align="left"  style="position: absolute;width:100%;">
			
			&nbsp&nbsp
			<img class="logo" src="images/main/NSA-logo.png" width="90" height="90"/>
		</div>
		
		<div id="top-content">
                        <div id="div_log">
				<input id="autocomplete" title="type &quot;a&quot;" placeholder="username">
				<input id="autocomplete" title="type &quot;a&quot;" placeholder="password">
				<button value="ok" id="btnlog">Login</button>
			</div>
		</div>
		
		<br/>
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Home</a></li>
				<li><a href="#tabs-2">About</a></li>
				<li><a href="#tabs-3">News</a></li>
				<li><a href="#tabs-4">Offers</a></li>
			</ul>
			<div id="tabs-1">
				<div style="background-image: url('../images/main/linedpaper-bg-blue.jpg');min-height: 530px">
					<table width="100%" height="500" border="0">
						<tr>
							<td align="center">
								<img src="images/main/NSA-logo-faint.png"/>
							</td>
						</tr>
					</table>
				</div>
			</div>
			
			<div id="tabs-2">
				<div style="min-height: 530px" id="accordion">
						<h3 align="left">About 1</h3>
						<div align="left">~insert description here~</div>
						<h3 align="left">About 2</h3>
						<div align="left">~insert description here~</div>
						<h3 align="left">About 3</h3>
						<div align="left">~insert description here~</div>
						<h3 align="left">About 4</h3>
						<div align="left">~insert description here~</div>
				</div>
			</div>
			
			<div id="tabs-3">
				<div style="min-height: 530px">
					
					
					
					<div  class="notecontainer">
						<div class="notetitle">
							News Title
						</div>
						
						<div class="notedesc">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<p>Phasellus mattis tincidunt nibh. Cras orci urna, blandit id, pretium vel, aliquet ornare, felis. Maecenas scelerisque sem non nisl. Fusce sed lorem in enim dictum bibendum.</p>
						</div>
						<div class="notepic">
							<img class="logo" src="images/main/unknown.png" width="100%" height="100%"/>
						</div>
						<div class="noterooter">
							11/19/2014 - 11:35am
						</div>
					</div>
					
					
					
				</div>
			</div>
			
			<div id="tabs-4">
				<div style="min-height: 530px">
					
					
					<div style="border:1px solid #AAAAAA;width:800px;background:url('../images/main/linedpaper-bg.jpg')repeat;height:500px">
						<br><br><h1>SCOLARSHIP OFFER</h1><hr width="700">
					</div>
					
					
				</div>
			</div>
		</div>

	</div>
	
	
	
	
<!--------------------------------------------------------------------------------------------------------------------------->
	</center>
<?php include'blocks\add_script.php'; ?>
</body>
</html>
