<?php
include("app/model/configuration.php");
include("access.php");

$sql_submit = $mysqli->query("SELECT COUNT(id) AS status FROM `tbl_user` WHERE status='1' and user_type!='1'");
$res_submit = $sql_submit->fetch_row();

$sql_soft = $mysqli->query("SELECT COUNT(id) AS status FROM `tbl_student` WHERE status='1'");
$res_stud = $sql_soft->fetch_row();

$sql_stdplcd = $mysqli->query("SELECT SUM(student_placed) AS student_placed FROM `tbl_studentcampous`");
$res_stdplcd = $sql_stdplcd->fetch_object();
$stdplaced = $res_stdplcd ->student_placed;

$sql_stdpass = $mysqli->query("SELECT SUM(student_passed) AS student_passed FROM `tbl_studentcampous`");
$res_stdpass = $sql_stdpass->fetch_object();
$stdpass = $res_stdpass ->student_passed;

$query_stdcamp = retrieveAllData($mysqli,$tbl_studentcampous, "*", "chart_type='2'","","","");

if(isset($_POST["btn_search"]))
{
	$regno=$_POST["regno"];
	$first_name=$_POST["first_name"];
	$branch=$_POST["branch"];
	$batch=$_POST["batch"];

	if ($regno!='') {
	$query_csp = retrieveAllData($mysqli,$tbl_student, "*", "regno LIKE '%".$regno."' AND status!='0'","","","");
	}elseif ($first_name!='') {
	$query_csp = retrieveAllData($mysqli,$tbl_student, "*", "full_name LIKE '%".$first_name."' AND status!='0'","","","");
	}elseif ($branch!='') {
	$query_csp = retrieveAllData($mysqli,$tbl_student, "*", "branch='".$branch."' AND status!='0'","","","");
	}elseif ($batch!='') {
	$query_csp = retrieveAllData($mysqli,$tbl_student, "*", "batch='".$batch."' AND status!='0'","","","");
	}
}else{
	$query_csp = retrieveAllData($mysqli,$tbl_student, "*", "'","","","");
}
@	$cnt_csp = mysqli_num_rows($query_csp);
if(isset($_POST["btn_reset"]))
{
	$query_csp = retrieveAllData($mysqli,$tbl_student, "*", "'","","","");
	@	$cnt_csp = mysqli_num_rows($query_csp);
}

include("app/view/layouts/user-header.html");
include("app/view/user/dashboard.html");
include("app/view/layouts/user-footer.html");
?>