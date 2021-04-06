<?php
include("app/model/configuration.php");
include("access.php");

$user_type = $_SESSION['AD_user_type'];

if (@$_GET['succ'] == '4') { $succ_msg = "Student Activated Successfully";}
if (@$_GET['succ'] == '5') { $succ_msg = "Student Deactivated Successfully";}
if (@$_GET['succ'] == '6') { $succ_msg = "Student Deleted Successfully";}

if(isset($_POST["btn_search"]))
{
	$regno=$_POST["regno"];
	$first_name=$_POST["first_name"];
	$branch=$_POST["branch"];
	$batch=$_POST["batch"];

	if ($regno!='') {
	$query_csp = retrieveAllData($mysqli,$tbl_student, "*", "regno LIKE '%".$regno."'","","","");
	}elseif ($first_name!='') {
	$query_csp = retrieveAllData($mysqli,$tbl_student, "*", "full_name LIKE '%".$first_name."'","","","");
	}elseif ($branch!='') {
	$query_csp = retrieveAllData($mysqli,$tbl_student, "*", "branch='".$branch."'","","","");
	}elseif ($batch!='') {
	$query_csp = retrieveAllData($mysqli,$tbl_student, "*", "batch='".$batch."'","","","");
	}
}else{
	$query_csp = retrieveAllData($mysqli,$tbl_student, "*", "status!=0","","","");
}
@$cnt_csp = mysqli_num_rows($query_csp);

if(isset($_POST["btn_reset"]))
{
	$query_csp = retrieveAllData($mysqli,$tbl_student, "*", "status!=0","","","");
	$cnt_csp = mysqli_num_rows($query_csp);
}
if(!empty($_GET['act']) && !empty($_GET['id']))
{
	if($_GET['act'] == "activate")
	{
		active($mysqli,$tbl_student, "status", "id='".$_GET['id']."'");
		header("location:manage-student.php?succ=4");
	}
	else if($_GET['act'] == "deactivate")
	{	
		inactive($mysqli,$tbl_student, "status", "id='".$_GET['id']."'");
		header("location:manage-student.php?succ=5");
	}
}


if(!empty($_GET['deleid']))
{
	$deleId = $_GET['deleid'];
	$form_datacsp = array(
		'status' => 0
	);

	updateData($mysqli,$tbl_student, $form_datacsp,"id='$deleId'");
	header("location:manage-student?succ=6");
}
include("app/view/layouts/user-header.html");
include("app/view/user/manage-student.html");
include("app/view/layouts/user-footer.html");
?>