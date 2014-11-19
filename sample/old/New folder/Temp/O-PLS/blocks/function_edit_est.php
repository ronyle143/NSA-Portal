<?php
	if(isset($_POST['edit_est'])){
		if( (!($_POST['reg_name'] == "")) AND
			(!($_POST['reg_short'] == ""))){
			
			$estno = 	$_SESSION['edit'];	
			$estname  = $_POST['reg_name'];
			$estshort = $_POST['reg_short'];
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$inserttoesttable = "UPDATE est_table set estname = '$estname', estshort = '$estshort'
								 WHERE estno = '$estno'";
			mysql_query($inserttoesttable);
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$break = mysql_query("SELECT * FROM est_table WHERE estno = '$estno'
								  UNION
								  SELECT * FROM est_temp  WHERE estno = '$estno'");
			$get = mysql_fetch_assoc($break);
			if($estno == $get['estno'] && $estname == $get['estname'] && $estshort == $get['estshort']){
				echo"<script>alert('Establishment has been Edited!');</script>";
			}
			else{
				echo"<script>alert('Failed to Edit');</script>";
			}
		}
		else{
			printf("<script>alert('ERROR!');</script>");
		}
	}
?>