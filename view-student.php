<?php

include("app/model/configuration.php");

include("access.php");

if(!empty($_GET['viewid']))
{
	$viewid = $_GET['viewid'];
    $result_user = retrieveAllData($mysqli,$tbl_student, "*", "id ='$viewid'", "", "", "result");
    //echo $result_user;die();
}


include("app/view/layouts/user-header.html");
include("app/view/user/view-student.html");
include("app/view/layouts/user-footer.html");

?>