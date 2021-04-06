<?php
if(empty($_SESSION['AD_adminid']))
{
	header("location:index.php");
}
session_start();
unset($_SESSION['AD_adminid']);
header("location:index.php");
?>



