<?php

include("app/model/configuration.php");



if(isset($_POST['btn_update']))

{

	

		$email = $_POST['email']; 

		$genrand = substr(str_shuffle("0123456789QWER1TYUIOP2LKJHGFDSAZ5XCVB7NM"), 0, 5);

		$nwpass = "ODISHA".$genrand; //echo $token;

		$password = md5($nwpass);



		$sql_user = "SELECT user_id,email_id FROM tbl_user WHERE email_id='$email'";

		$resultc = mysqli_query($mysqli,$sql_user);



			@$cnt = mysqli_num_rows($resultc);

		if($cnt > 0) 

		{

			$sql_update_user = "UPDATE tbl_user SET enc_pwd='$password' WHERE email_id='$email'";

			$res_update_user = mysqli_query($mysqli,$sql_update_user);



	                $to = $user=$_POST['email'];

					$subject = 'Reset Password';

					$header = 'From:support@sdv.com \r\n';

					//$header .= 'Cc:afgh@somedomain.com \r\n';

					$header .= 'MIME-Version: 1.0\r\n';

					$header .= 'Content-type: text/html\r\n';

					$message = '';

					

					$Mail_Admin_Message = '';

					$Mail_Admin_Message .= '<html>

											<head>

											</head>

											<body style="font-family:arial;font-size:14px;margin:40px;padding:0px;">

												<div  style="width:100%;margin:0px auto;padding:0px;">

													<div>

														<p style="margin-bottom:0px;">Dear User,</p>

														<p>Your Password has been changed successfully.</p>

														<p>Your Password is :<strong>"'.$nwpass .'"</strong></p>

													</div>

												</div>

											</body>

										</html>';	

					$Mail_To_Admin_ID   = $_POST['email'];

				    $Mail_Admin_Subject = "Change Password";

					$Mail_Admin_Header  = "MIME-Version: 1.0\n";

					$Mail_Admin_Header .= "Content-type: text/html; charset=iso-8859-1\r\n";

					$Mail_Admin_Header .= "Content-Transfer-Encoding: 8bit\n";

					$Mail_Admin_Header .= "X-Priority: 1\n";

					$Mail_Admin_Header .= "From: SDV <support@sdv.com>\r\n";

					$Mail_Admin_Header .= "X-MSMail-Priority: High\n";



					mail($Mail_To_Admin_ID, $Mail_Admin_Subject, $Mail_Admin_Message, $Mail_Admin_Header);



			$succ_msg = "<center><font class='red_bold_text'>Password Updated Successfully ! Please Check Your Email Id</font></center>";

header("location:index.php");


		}

		else

		{

header("location:index.php");

			/*$error_msg = "<center><font class='red_bold_text'>Invalid Email Id !</font></center>";*/

		}

}

//include("../app/view/layouts/admin-header.html");

include("app/view/user/forgot-password.html");

//include("../app/view/layouts/admin-footer.html");



?>