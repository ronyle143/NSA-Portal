<?php
	if(isset($_POST['register'])){
		if($_POST['reg_password'] == $_POST['reg_password_r']){
		if( (!($_POST['reg_firstname'] == "")) AND
			(!($_POST['reg_mi'] == "")) AND
			(!($_POST['reg_lastname'] == "")) AND
			(!($_POST['reg_username'] == "")) AND
			(!($_POST['reg_password'] == "")) AND
			(!($_POST['reg_estno'] == ""))){
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$all = mysql_query("SELECT guardno FROM guard_table
								UNION
								SELECT guardno FROM in_table
								UNION 
								SELECT outguardno FROM record_table
								UNION 
								SELECT inguardno FROM record_table");
			$guardno = 0;
			if($item = mysql_fetch_array($all)){
				do{
					if($guardno<$item['guardno']){
						$guardno = $item['guardno'];
					}
				}while($item = mysql_fetch_array($all));
			}
			$guardno += 1;	
			$firstname = $_POST['reg_firstname'];
			$mi = $_POST['reg_mi'];
			$lastname = $_POST['reg_lastname'];
			$address = $_POST['reg_address'];
			$contactno = $_POST['reg_contactno'];
			
			$username = strtolower($_POST['reg_username']);
			$password = $_POST['reg_password'];
			$active = 0;
			$estno = $_POST['reg_estno'];
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$inserttotable = "INSERT INTO guard_table(guardno,firstname,mi,lastname,address,contactno,username,password,active,estno)
						VALUES('$guardno','$firstname','$mi','$lastname','$address','$contactno','$username','$password','$active','$estno');";
			mysql_query($inserttotable);
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$break = mysql_query("SELECT * FROM guard_table WHERE guardno = '$guardno'");
			$get = mysql_fetch_assoc($break);
			if($guardno == $get['guardno']){
				echo"<script>alert('Account has been created!\\nYour account needs to be activated before you can use it.');</script>";
			}
			else{
				echo"<script>alert('Username is already in use');</script>";
			}
		}
	}
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if(isset($_POST['reg_est'])){
		if( (!($_POST['reg_name'] == "")) AND
			(!($_POST['reg_short'] == ""))){
			
			$all = mysql_query("SELECT estno FROM est_table
								UNION
								SELECT estno FROM est_temp
								UNION
								SELECT estno FROM guard_table
								UNION
								SELECT estno FROM in_table
								UNION
								SELECT estno FROM record_table");
			$estno = 0;
			if($item = mysql_fetch_array($all)){
				do{
					if($estno<$item['estno']){
						$estno = $item['estno'];
					}
				}while($item = mysql_fetch_array($all));
			}
			$estno += 1;	
			
			$estname  = $_POST['reg_name'];
			$estshort = $_POST['reg_short'];
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$inserttoesttable = "INSERT INTO est_temp(estno,estname,estshort)
						VALUES('$estno','$estname','$estshort');";
			mysql_query($inserttoesttable);
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$break = mysql_query("SELECT * FROM est_table WHERE estno = '$estno'
								  UNION
								  SELECT * FROM est_temp  WHERE estno = '$estno'");
			$get = mysql_fetch_assoc($break);
			if($estno == $get['estno']){
				echo"<script>alert('Establishment has been Added!\\nThis establishment needs to be activated before you can use it.');</script>";
			}
			else{
				echo"<script>alert('Username is already in use');</script>";
			}
		}
		else{
			printf("<script>alert('ERROR!');</script>");
		}
	}
	
?>