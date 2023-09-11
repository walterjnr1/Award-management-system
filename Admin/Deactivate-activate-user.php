<?php
include('../inc/topbar.php');
if(empty($_SESSION['admin-username']))
{
header("Location: login.php");
}

// for activate user
if(isset($_GET['id']))
{
$id=intval($_GET['id']);

$sql = "UPDATE tblregister SET status=? where ID=?";
$stmt= $dbh->prepare($sql);
$stmt->execute(["1", $id]);
header("location: votersrecord.php");
}

// for Deactivate user
if(isset($_GET['did']))
{
$did=intval($_GET['did']);

$sql = "UPDATE tblregister SET status=? where ID=?";
$stmt= $dbh->prepare($sql);
$stmt->execute(["0", $did]);
header("location: votersrecord.php");


}

?>
