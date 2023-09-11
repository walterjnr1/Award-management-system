<?php
include('../inc/topbar.php');
if(empty($_SESSION['admin-username']))
    {
      header("Location: login.php");
    }

$id= $_GET['uid'];
$sql = "DELETE FROM tblregister WHERE userid=?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

header("Location: votersrecord.php");
 ?>
