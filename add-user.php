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

			'email_id' => $_POST['email_id'],

			'mobile_no' => $_POST['mobile_no'],

			'enc_pwd' => md5($_POST['password']),

			'user_type' => $_POST['user_type'],

			'status' => 1,

			'created_date' =>date("Y-m-d"),
			);	
	dbRowInsert($mysqli,$tbl_user, $form_data);	

}

if(!empty($_GET['editid']))
{
	$editId = $_GET['editid'];
    $result_user = retrieveAllData($mysqli,$tbl_user, "*", "id ='$editId'", "", "", "result");
    //echo $result_user;die();
}
if(isset($_POST['btn_update']))
{	
   $editId = $_GET['editid'];	
	$form_data = array(

			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'email_id' => $_POST['email_id'],
			'mobile_no' => $_POST['mobile_no'],
			'user_type' => $_POST['user_type'],
			'enc_pwd' => md5($_POST['password'])

	);		

	updateData($mysqli,$tbl_user, $form_data,"id='$editId'");

	$form_datacsp = array(

		//'cbi_ko_name' => $_POST['user_name'],
		'user_type' => $_POST['user_type'],
		'cbi_contact_no' => $_POST['mobile_no'],
	);

	updateData($mysqli,$tbl_user, $form_datacsp,"user_id='$editId'");

	header("location:manage-user.php?succ=3");

}

include("app/view/layouts/user-header.html");
include("app/view/user/add-user.html");
include("app/view/layouts/user-footer.html");

?>