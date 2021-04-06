<?php
if(empty($_SESSION['AD_adminid']))
{
	header("location:index.php");
	exit();
}
?>