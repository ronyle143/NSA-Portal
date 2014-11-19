<?php
	if(isset($_POST['login'])){
		if((!($_POST['txt_opls_username'] == "")) AND (!($_POST['txt_opls_password'] == ""))){
			$username = strtolower($_POST['txt_opls_username']);
			$password = $_POST['txt_opls_password'];
			
			$opls_con = "SELECT * FROM guard_table WHERE username = '$username' AND password='$password'";
			$break = mysql_query($opls_con);
			$get = mysql_fetch_assoc($break);
			
			$_SESSION['opls_username']  = $get['username'];
			$_SESSION['opls_password']  = $get['password'];
			
			$_SESSION['opls_active']  = $get['active'];
			$_SESSION['opls_estno']  = $get['estno'];
			
			$_SESSION['guardno']        = $get['guardno'];
			$_SESSION['opls_firstname'] = $get['firstname'];
			$_SESSION['opls_mi']        = $get['mi'];
			$_SESSION['opls_lasttname'] = $get['lastname'];
			
			if($username==$get['username'] && $password==$get['password']){
				if($get['active'] >= 1){
					echo"<script>window.location=['home.php']</script>";
				}
				else{
					echo"<script>alert('Your account has not been activated!');</script>";
					$_SESSION['opls_username'] = "";
					$_SESSION['opls_password'] = "";
					
					$_SESSION['opls_guardno']	   = "";
					$_SESSION['opls_active']	   = "";
					$_SESSION['opls_estno']  = "";
				}
			}
			else{
				echo"<script>alert('Wrong username or password!');</script>";
				$_SESSION['opls_username'] = "";
				$_SESSION['opls_password'] = "";
				
				$_SESSION['guardno']	   = "";
				$_SESSION['opls_active']	   = "";
				$_SESSION['opls_estno']  = "";
			}
		}
	}
?>