<?php
include '../../database/connect.php';

$code7 = $_REQUEST['txtcode7'];
if ($code7 !== "") {
	
	$stmt = $dbh->query("SELECT * FROM tblcourse where code='$code7'");
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
