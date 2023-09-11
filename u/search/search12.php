<?php
include '../../database/connect.php';

$code12 = $_REQUEST['txtcode12'];
if ($code12 !== "") {
	
	$stmt = $dbh->query("SELECT * FROM tblcourse where code='$code12'");
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
