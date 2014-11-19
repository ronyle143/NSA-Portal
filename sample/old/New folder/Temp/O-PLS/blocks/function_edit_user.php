<?php
	if(isset($_POST['edit_user'])){
		if( (!($_POST['reg_password'] == "")) AND
			(!($_POST['reg_firstname'] == "")) AND
			(!($_POST['reg_mi'] == "")) AND
			(!($_POST['reg_lastname'] == ""))){
			
			$guardno = $_POST['edit_user'];
			$password = $_POST['reg_password'];
			$firstname = $_POST['reg_firstname'];
			$mi = $_POST['reg_mi'];
			$lastname = $_POST['reg_lastname'];
			$address = $_POST['reg_address'];
			$contactno = $_POST['reg_contactno'];
			$active = $_POST['reg_active'];
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$inserttoesttable = "UPDATE guard_table set  
														firstname = '$firstname', 
														mi = '$mi',
														lastname = '$lastname',
														password = '$password',
														address = '$address',
														contactno = '$contactno',
														active = '$active'
								 WHERE guardno = '$guardno'";
			mysql_query($inserttoesttable);
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			$break = mysql_query("SELECT * FROM guard_table WHERE guardno = '$guardno'");
			$get = mysql_fetch_assoc($break);
			if($guardno == $get['guardno']
			&& $password == $get['password']
			&& $firstname == $get['firstname']
			&& $mi == $get['mi']
			&& $lastname == $get['lastname']
			&& $address == $get['address']
			&& $contactno == $get['contactno']
			&& $active == $get['active']){
				echo"<script>alert('User has been Edited!');</script>";
			}
			else{
				printf("<script>alert('Failed to Edit');</script>");
			}
		}
		else{
			printf("<script>alert('ERROR!');</script>");
		}
	}
?>