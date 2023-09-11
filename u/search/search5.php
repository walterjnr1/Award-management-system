<?php
include '../../database/connect.php';

$code5 = $_REQUEST['txtcode5'];
if ($code5!== "") {
	
	$stmt = $dbh->query("SELECT * FROM tblcourse where code='$code5'");
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
