<?php
	if(isset($_POST['in'])){
		if($_POST['in_pass'] == $_POST['in_pass_r']){
		if( (!($_POST['in_name'] == "")) AND
			(!($_POST['in_desc'] == "")) AND
			(!($_POST['in_pass'] == ""))){
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$all = mysql_query("SELECT propno FROM in_table
								UNION ALL
								SELECT propno FROM record_table
								ORDER BY 1 DESC");
			$propno = 0;
			if($item = mysql_fetch_array($all)){
				do{
					if($propno<$item['propno']){
						$propno = $item['propno'];
					}
				}while($item = mysql_fetch_array($all));
			}
			$propno += 1;
			$inname  = $_POST['in_name'];
			$desc    = $_POST['in_desc'];
			$pass    = $_POST['in_pass'];
			$guardno = $_SESSION['guardno'];
			$estno   = $_SESSION['opls_estno'];
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$insertintointable = "INSERT INTO in_table(`propno`, `inname`, `description`, `pass`, `guardno`, `estno`)
							      VALUES('$propno','$inname','$desc','$pass','$guardno','$estno')";
			mysql_query($insertintointable);
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$break = mysql_query("SELECT * FROM in_table WHERE propno = '$propno'");
			$get = mysql_fetch_assoc($break);
			if($propno == $get['propno']){
				echo"<script>alert('Your property has been recorded successfully!');</script>";
				//printf("<script>alert('Your property has been recorded successfully! %s, %s, %s, %s, %s');</script>",$propno,$inname,$desc,$pass,$guardno);
			}
			else{
				printf("<script>alert('There was an Error on the recording!');</script>");
				//printf("<script>alert('%s, %s, %s, %s, %s');</script>",$propno,$inname,$desc,$pass,$guardno);
			}
		}
		}
		else{
			printf("<script>alert('Password mismatch!');</script>");
		}
	}
?>