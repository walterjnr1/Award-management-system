<?php
include('../inc/topbar.php'); 
if(empty($_SESSION['login_userid']))
{   
header("Location: ../index.php"); 
}

$category=$_GET['cat'];
$cand_userid=$_GET['uid'];

//get old count
$sqlcount = "select * from candidate where userid='$cand_userid'"; 
$resultcount = $conn->query($sqlcount);
$rowcount = mysqli_fetch_array($resultcount);
$count = $rowcount['count'];
$candName = $rowcount['candName'];

//select voters details
$sqlvoter = "select * from tblregister where userid='$userid'"; 
$resultvoter = $conn->query($sqlvoter);
$rowvoter = mysqli_fetch_array($resultvoter);
$voterName = $rowvoter['fullname'];
$voter_userid = $rowvoter['userid'];

//check if voter has voted already
$sql_u = "SELECT * FROM voting WHERE voter_userid='$voter_userid' and category='$category'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
?>
									
<script>
alert('You Already Voted for this Category ');
window.location = "vote_step_1.php";

</script>
<?php	
}else {
$sql1 = " update candidate set count=('$count' + 1) where userid='$cand_userid'";
if (mysqli_query($conn, $sql1)) {

//insert to vote and other details
$query_insert_vote = "INSERT INTO voting ( voter_userid,cand_userid,category,voting_date) VALUES ('$voter_userid','$cand_userid ','$category', '$current_date')";
if ($conn->query($query_insert_vote) === TRUE) {

$_SESSION["category"]=$category ;
$_SESSION["cand_userid"]=$cand_userid ;
?>					
<script>
alert('Voting was successful');
window.location = "Result.php";
</script>
<?php	
}
}
}
?>