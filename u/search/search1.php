<?php
include '../../database/connect.php';

$code1 = $_REQUEST['txtcode1'];
if ($code1 !== "") {
	
	$stmt = $dbh->query("SELECT * FROM tblcourse where code='$code1'");
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
