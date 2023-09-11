<?php 
session_start();
error_reporting(1);
include('../database/connect.php'); 
include('../database/connect2.php'); 

$sitename = "Award Management system";

//set time
date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');


//fetch user data
$userid = $_SESSION["login_userid"];

$stmt = $dbh->query("SELECT * FROM tblregister where userid='$userid'");
$row_user = $stmt->fetch();


//fetch admin data
$username = $_SESSION["admin-username"];
$stmt = $dbh->query("SELECT * FROM users where username='$username'");
$row_admin = $stmt->fetch();
?>