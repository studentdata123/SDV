<?php
include("app/model/configuration.php");
include("access.php");

if (@$_GET['succ'] == '4') { $succ_msg = "CSP Activated Successfully";}
if (@$_GET['succ'] == '5') { $succ_msg = "CSP Deactivated Successfully";}
if (@$_GET['succ'] == '6') { $succ_msg = "CSP Deleted Successfully";}


$query_csp = retrieveAllData($mysqli,$tbl_user, "*", "id!=1","","","");
$cnt_csp = mysqli_num_rows($query_csp);


include("app/view/layouts/user-header.html");
include("app/view/user/manage-user.html");
include("app/view/layouts/user-footer.html");
?>