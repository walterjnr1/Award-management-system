<?php
include '../../database/connect.php';

$code2 = $_REQUEST['txtcode2'];
if ($code2!== "") {
	
	$stmt = $dbh->query("SELECT * FROM tblcourse where code='$code2'");
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
