<?php
date_default_timezone_set('Asia/Kolkata'); 

// server info
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'sdv';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);

// show errors (remove this line if on a live site)
//mysqli_report(MYSQLI_REPORT_ERROR);
//mysql_query('SET NAMES UTF8');
//mysql_query("SET NAMES CP1251");
//mysqli_set_charset($mysqli,"utf8");
session_start();
$t = time();
?>