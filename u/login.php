<?php
include('topbar.php');

if(isset($_POST['btnlogin']))
{
  $status ="Admitted";
//login
$sql = "SELECT * FROM `tbladmission` WHERE `email`=? AND `password`=? AND `status`=?";
			$query = $dbh->prepare($sql);
			$query->execute(array($_POST['txtemail'],$_POST['txtpassword'],$status));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
			$_SESSION['login_email'] = $fetch['email'];
            $_SESSION['login_fullname'] = $fetch['fullname'];
		     //$_SESSION['logged']=time();
		
//save activity log details
$fullname=$fetch['fullname'];
$task= $fullname.' '.'Logged In'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':task' => $task
]);

header("Location: index.php"); 
}else { 
$error=' Wrong Email and Password';
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Student Login Form | Brainfill Polytechnic , Ikot Ekpene</title>
 <link rel="icon" type="image/png" sizes="16x16" href="../assets/logo.png">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">
<!-- hmenu -->
<link rel="stylesheet" href="dist/plugins/hmenu/ace-responsive-menu.css">

<style type="text/css">
<!--
.style1 {
	color: #000000;
	font-size: 18px;
}
.style2 {
	color: #FF0000;
	font-size: 14px;
}
-->
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <h3 class="login-box-msg style1">  <p><?php if($success){?>
          <div class="alert alert-success" role="alert" align="center">  <?php echo ($success); ?></div>
		  <?php } 
					else if($error){?>
           <div class="alert alert-danger" role="alert">  <?php echo ($error); ?></div>
 <?php } ?></p></h3>
    <h3 class="login-box-msg style1">&nbsp;</h3>
    <h3 class="login-box-msg style1">Login Form </h3>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="txtemail" class="form-control sty1" placeholder="Enter Email" required>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="txtpassword" class="form-control sty1" placeholder="Enter Password" required>
      </div>
      <div>
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox">
              Remember Me </label>
            <a href="forgot_password.php" class="pull-right"><i class="fa fa-lock"></i> Forgot pwd?</a> </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" name="btnlogin" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
    <!-- /.social-auth-links -->
<div class="m-t-2"></div>
  <span class="style2">Use Your registered Phone number as the default password </span></div>
  <!-- /.login-box-body --> 
</div>
<!-- /.login-box --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.html"></script>
<script src="dist/plugins/hmenu/ace-responsive-menu.js" ></script> 
<!--Plugin Initialization--> 
<script >
         $(document).ready(function () {
             $("#respMenu").aceResponsiveMenu({
                 resizeWidth: '768', // Set the same in Media query       
                 animationSpeed: 'fast', //slow, medium, fast
                 accoridonExpAll: false //Expands all the accordion menu on click
             });
         });
</script>
</body>
</html>