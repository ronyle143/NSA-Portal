<?php //============================================================================================================HEADER
$_SESSION['color_1'] = "Orange";
$_SESSION['color_2'] = "Black";
$_SESSION['color_3'] = "Gray";
$_SESSION['bg_img']  = "img/main.png";
include_once "blocks/function_login.php";
include_once "blocks/function_logout.php";
//--------------------------[Empty]
			if(($_SESSION['opls_username']=="")||($_SESSION['opls_password']=="")){
				printf("
					<table bgcolor='%s' cellpadding=10 width='1000'>
						<tr height=60>
							<td bgcolor='%s'>
								<input type='TEXT'     value='%s' placeholder='Username' name='txt_opls_username'>
								<input type='PASSWORD' value='%s' placeholder='Password' name='txt_opls_password'>
								<input type='submit' value='Login' name='login'>
							</td>
							<td bgcolor='%s' width=600>
								<font color=white size='1'>
									Not yet a member?<br>
									Sign up!!
								</font>
							</td>
						</tr>
					</table>"
				,$_SESSION['color_3']
				,$_SESSION['color_2']
				,$_SESSION['opls_username']
				,$_SESSION['opls_password']
				,$_SESSION['color_2']);
			}  
			else{
//--------------------------[Logged in]
				$user_title = "";
				if($_SESSION['opls_active'] >= 2){
					$user_title = "[ADMIN]";
				}
				$emp = $_SESSION['opls_estno'];
				$break = mysql_query("SELECT * FROM est_table WHERE estno = '$emp'");
				$get = mysql_fetch_assoc($break);
				
				printf("
					<table bgcolor='%s' cellpadding=10 width='1000'>
						<tr height=60>
							<td bgcolor='%s'>
								<table><tr>
									<td>
										<font color=white size='1' style='vertical-align:text-top;'>
											logged-in as: 
										</font>
										<font color='red' size='4'>
											%s 
										</font>
										<font color='%s' size='4'>
											%s %s %s
										</font>
										<font color='white' size='4'>
											@ %s
										</font>
									</td>
								</tr></table>
								<td align=right width=65 bgcolor=%s>
									<input type='submit' value='Logout' name='logout'>
								</td>
							</td>
						</tr>
					</table>"
				,$_SESSION['color_3']
				,$_SESSION['color_2']
				,$user_title
				,$_SESSION['color_1']
				,$_SESSION['opls_firstname']
				,$_SESSION['opls_mi']
				,$_SESSION['opls_lasttname']
				,$get['estshort']
				,$_SESSION['color_2']);
			}
			printf("
				<table bgcolor='%s' cellpadding=0 cellspacing=1 width='1000'>
					<tr>
						<td colspan=2>
							<a href='home.php'><img src='img/title.png'></a>
						</td>
					<tr>
					<tr>
						<td>"
				,$_SESSION['color_3']);
			if($_SESSION['opls_username']==""||$_SESSION['opls_password']==""){
			printf("
							<a href='index.php'><img src='img/nav/index.png'></a>
					");		
			}
			else{
			printf("
							<img src='img/nav/index_1.png'>
					");	
			}
			printf("
							<a href='home.php'><img src='img/nav/home.png'></a>");
			if($_SESSION['opls_username']==""||$_SESSION['opls_password']==""){
				printf("
							<img src='img/nav/in_1.png'>
							<img src='img/nav/out_1.png'>
				");		
			}
			else{
				printf("
							<a href='in.php'><img src='img/nav/in.png'></a>
							<a href='out.php'><img src='img/nav/out.png'></a>
				");		
			}
			printf("		<a href='current.php'><img src='img/nav/current.png'></a>
							<a href='record.php'><img src='img/nav/previous.png'></a>");
			if($_SESSION['opls_username']==""||$_SESSION['opls_password']==""){
				printf("
							<img src='img/nav/admin_1.png'>
							
				");		
			}
			else{
				If($_SESSION['opls_active']>=2){
					printf("
							<a href='admin.php'><img src='img/nav/admin.png'></a>	
					");
				}
				else{
					printf("
							<img src='img/nav/admin_1.png'>
								
					");	
				}
			}
			printf("			
						<td>
					</tr>
				</table>");
				
		?>