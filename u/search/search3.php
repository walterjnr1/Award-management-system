<?php
include '../../database/connect.php';

$code3 = $_REQUEST['txtcode3'];
if ($code3 !== "") {
	
	$stmt = $dbh->query("SELECT * FROM tblcourse where code='$code3'");
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
