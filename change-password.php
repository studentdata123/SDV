<?php
include("app/model/configuration.php");
include("access.php");
if(isset($_POST['btn_submit']))
{
		$hiddenid=$_POST['hiddenid'];
		$oldpwd=md5($_POST['oldpasswrd']);
		$newpasswrd=trim($_POST['conpwd']);
		$conpwd=md5($_POST['conpwd']);
		$sql_user = "SELECT enc_pwd FROM tbl_user WHERE enc_pwd='$oldpwd' AND id='$hiddenid'";
		//echo $sql_user;exit;
		$resultc = mysqli_query($mysqli,$sql_user);
		$cnt = mysqli_num_rows($resultc);
		if($cnt > 0) 
		{
			$sql_update_user = "UPDATE tbl_user SET enc_pwd='$conpwd' WHERE enc_pwd='$oldpwd' AND id='$hiddenid'";
			$res_update_user = mysqli_query($mysqli,$sql_update_user);
			$succ_msg = "<center><font class='red_bold_text'>Password Updated Successfully !</font></center>";
		}
		else
		{
			$error_msg = "<center><font class='red_bold_text'>Unable to Change Password !! Enter Correct Current Password !</font></center>";
		}
}
include("app/view/layouts/user-header.html");
include("app/view/user/change-password.html");
include("app/view/layouts/user-footer.html");
?>