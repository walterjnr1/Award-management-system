<?php
include '../../database/connect.php';

$code4 = $_REQUEST['txtcode4'];
if ($code4 !== "") {
	
	$stmt = $dbh->query("SELECT * FROM tblcourse where code='$code4'");
	$row = $stmt->fetch();
	$course_name = $row["course_name"];
	$unit = $row["unit"];
}
// Store it in a array
$result = array("$course_name", "$unit");
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
