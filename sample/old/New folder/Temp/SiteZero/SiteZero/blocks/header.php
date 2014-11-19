<div id="header">
	<div>
		<div class="logo">
			<a href="home.php">Site Zero</a>
		</div>
		<ul id="navigation">
			<li>
				<a href="home.php">Home</a>
			</li>
			<li>
				<a href="features.html">Features</a>
			</li>
			<li>
				<a href="news.php">News</a>
			</li>
			<li>
				<a href="signup.php">Register</a>
			</li>
			<li class="active">
				<?php
					if($_SESSION['gusername']==""&&$_SESSION['gpassword']==""){
						echo"Login First";
					}
					else{
						echo"<a>Welcome ";
						printf($_SESSION['ggname']);	
						echo"</a>";
					}
				?>
			</li>
		</ul>
	</div>
</div>