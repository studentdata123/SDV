<?php

include("app/model/configuration.php");
if(@$_GET['err_msg']=='1')
{
	$error_msg = "<center><font class='red_bold_text'>User name and Password Invalid!</font></center>";
}
if(!empty($_GET['succ']))
{
	if($_GET['succ'] == '2') { $succ_msg = "<center><font class='green_bold_text'>Password Updated Successfully</font></center>"; }	
}
if(isset($_POST['btn_login']))
{
	if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
	{
		$admin_name = ($_POST['email']); 
		$password = md5($_POST['password']);
		if(empty($admin_name) || empty($password))
		{
			$error_msg = "<center><font class='red_bold_text'>User name and Password should not be blank !</font></center>";
		}
		else
		{
			$query = "SELECT * FROM $tbl_user where `email_id`='$admin_name' and `enc_pwd`='$password' and `status`!='0'";
			//echo "SELECT * FROM $tbl_admin where `user_id`='$admin_name' and`id`!='1' and `password`='$password'";die();
			$query_login = mysqli_query($mysqli,$query) or die("can not fetch database.".mysqli_error($mysqli));
			if (mysqli_num_rows($query_login) == 1)
			{
				$row = mysqli_fetch_array($query_login);
				$islogin = $row['is_pswd_cngd'];
				$_SESSION['AD_adminid'] = $row['id'];
				$_SESSION['AD_user_id'] = $row['first_name'];
				$_SESSION['AD_user_type'] = $row['user_type'];
				$_SESSION['AD_user_name'] = $row['first_name'];
				$_SESSION['AD_email_id'] = $row['email_id'];
				
					header("location:dashboard.php");
			
				//echo "<script>document.location.href='dashboard.php";
			}

			else

			{
				$error_msg = "<center><font class='red_bold_text'>Invalid Login Id and Password !</font></center>";
			}
		}
	}
	else 
		{
			$error_msg = "<center><font class='red_bold_text'>Invalid Captcha Code !</font></center>";		
		}
}
//include("../app/view/layouts/admin-header.html");
include("app/view/user/index.html");
//include("../app/view/layouts/admin-footer.html");
?>