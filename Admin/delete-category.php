<?php
include('../inc/topbar.php');
if(empty($_SESSION['admin-username']))
    {
      header("Location: login.php");
    }

$id= $_GET['id'];
$sql = "DELETE FROM tblcategory WHERE ID=?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

header("Location: add-category.php");
 ?>
