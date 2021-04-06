<?php

include("app/model/configuration.php");

include("access.php");

if(!empty($_GET['error_msg']))
{
	if($_GET['error_msg'] == '1') { $error_msg = "This email id is already exist"; }
	
}

if(!empty($_GET['succ']))
{
	if($_GET['succ'] == '2') { $succ_msg = "User Added Successfully"; }
	
}
if(!empty($_GET['succ']))
{
	if($_GET['succ'] == '3') { $succ_msg = "User Updated Successfully"; }	
}
if(isset($_POST['btnsave']))
{

    	$form_data = array(
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'full_name' => $_POST['first_name'] ." ". $_POST['last_name'],
			'batch' => $_POST['batch'],
			'branch' => $_POST['branch'],
			'regno' => $_POST['regno'],
			'actbacklog' => $_POST['actbacklog'],
			'cgpa' => $_POST['cgpa'],
			'result' => $_POST['result'],
			'status' => 1,
			'created_date' =>date("Y-m-d"),
			);	
	dbRowInsert($mysqli,$tbl_student, $form_data);	

}

if(!empty($_GET['editid']))
{
	$editId = $_GET['editid'];
    $result_user = retrieveAllData($mysqli,$tbl_student, "*", "id ='$editId'", "", "", "result");
    //echo $result_user;die();
}
if(isset($_POST['btn_update']))
{	
   $editId = $_GET['editid'];	
	$form_data = array(
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'full_name' => $_POST['first_name'] ." ". $_POST['last_name'],
			'batch' => $_POST['batch'],
			'branch' => $_POST['branch'],
			'regno' => $_POST['regno'],
			'actbacklog' => $_POST['actbacklog'],
			'cgpa' => $_POST['cgpa'],
			'result' => $_POST['result'],

	);		

	updateData($mysqli,$tbl_student, $form_data,"id='$editId'");
	header("location:manage-student.php?succ=3");

}

include("app/view/layouts/user-header.html");
include("app/view/user/add-student.html");
include("app/view/layouts/user-footer.html");

?>