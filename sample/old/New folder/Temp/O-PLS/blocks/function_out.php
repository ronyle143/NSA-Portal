<?php
	if(isset($_POST['out'])){
		if( (!($_POST['out_outname'] == "")) AND
			(!($_POST['out_propno'] == "")) AND
			(!($_POST['out_pass'] == ""))){
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$outname  = $_POST['out_outname'];
			$propno  = $_POST['out_propno'];
			$pass    = $_POST['out_pass'];
			
			$break = mysql_query("SELECT * FROM in_table WHERE propno = '$propno'");
			$get = mysql_fetch_assoc($break);
			if($propno == $get['propno']){
				if($pass == $get['pass']){
					
					$inname 	 = $get['inname'];
					$inwhen 	 = $get['inwhen'];
					$desc        = $get['description'];
					$inguardno     = $get['guardno'];
					$outguardno     = $_SESSION['guardno'];
					$estno   = $_SESSION['opls_estno'];
					
					$insertintorecttable = "INSERT INTO record_table(`propno`, `inname`, `inwhen`,  `description`, `outname`, `inguardno`, `outguardno`, `estno`)
										  VALUES('$propno','$inname','$inwhen','$desc','$outname','$inguardno','$outguardno',$estno)";
					mysql_query($insertintorecttable);
					
					$break1 = mysql_query("SELECT * FROM record_table WHERE propno = '$propno'");
					$get1 = mysql_fetch_assoc($break1);
					if($propno == $get1['propno']){
						mysql_query("DELETE FROM in_table WHERE propno = $propno");
						echo"<script>alert('Your property has been logged out successfully!');</script>";
					}
					else{
						printf("<script>alert('There was an Error on the recording!');</script>");
					}
				}
				else{
					echo"<script>alert('Incorrect password!');</script>";
				}
			}
			else{
				printf("<script>alert('Property does not exist!');</script>");
			}
		}
	}
?>