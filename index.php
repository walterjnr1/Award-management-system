<?php 
session_start();
include('database/connect.php'); 
error_reporting(0);

if(isset($_POST['btnlogin']))
{


//login
$sql = "SELECT * FROM `tblregister` WHERE `userid`=? AND `password`=? AND `status`=?";
			$query = $dbh->prepare($sql);
			$query->execute(array($_POST['txtuserid'],$_POST['txtpassword'],'1'));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
			
            $_SESSION['login_userid'] = $fetch['userid'];
            $_SESSION['login_fullname'] = $fetch['fullname'];
		    $_SESSION['logged']=time();

header("Location: u/index.php"); 
}else { 
$error=' Wrong User ID or Password or Account Blocked';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in Form| Award Management System</title>
    <link rel="shortcut icon" href="images/logo.jpeg" type="image/x-icon" />
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Bootstrap JS -->
    <script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
	font-size: 24px;
}
.style2 {color: #000000; font-weight: bold; font-size: 24px; }
.style3 {font-size: 12px}
.style5 {font-size: 9px}
-->
    </style>
</head>
<body>
<div align="center">
  <p class="style1"><img src="images/logo.jpeg" alt="Logo" width="140" height="138"> </p>
  <p class="style2">AWARD MANAGEMENT SYSTEM (FOUNDATION POLYTECHNIC, IKOT EKPENE)</p>
</div>
<div class="main">

  <div  style=width:100% align="center">
    <!-- Sing in  Form -->
    
 <?php if($error){?>
          <div class="alert alert-danger" role="alert" align="center">  <?php echo ($error); ?></div>
		  <?php } 
				?>
</div>
        <section class="sign-in">
            <div class="container">
              <div class="signin-content"> <div class="signin-image">
                        <figure>
                          <div align="center"><img src="images/signin-image.jpg" alt="sing up image"></div>
                        </figure>
                        <div align="center"><a href="register/signup.php" class="signup-image-link">Create an account</a>
                        </div>
              </div>

                    <div class="signin-form">
                        <h2 align="center" class="form-title">Sign In</h2>
                        <form method="POST">
                            <div class="form-group">
                                <label for="txtuserid">
                                <div align="center"><i class="zmdi zmdi-account material-icons-name"></i></div>
                                </label>
                                
                              <div align="center">
                                <input type="text" name="txtuserid" id="txtuserid" placeholder="Enter User ID" />
                              </div>
                            </div>
                            <div class="form-group">
                                <label for="txtpassword">
                                <div align="center"><i class="zmdi zmdi-lock"></i></div>
                                </label>
                                
                              <div align="center">
                                <input type="password" name="txtpassword" id="txtpassword" placeholder="Enter Password" />
                              </div>
                            </div>
                            <div class="form-group">
                                
                              <div align="center">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                              </div>
                                <label for="remember-me" class="label-agree-term">
                                  <div align="center"><span><span></span></span>Remember me</div>
                                </label>
                            </div>
                            <div class="form-group form-button">
                                
                              <div align="center">
                                <input type="submit" name="btnlogin" id="signin" class="form-submit" value="Log in"/>
                              </div>
                            </div>
                        </form>
                        <div class="social-login">
                            <div align="center"><span class="social-label">Or login with</span>
                              <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                              </ul>
                            </div>
                        </div>
                    </div>
                <p align="center">
              </div>
              <div align="center"></div>
            </div>
        </section>

        <div align="center"></div>
</div>
    <div align="center">
      <!-- JS -->
      <span class="style3">
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="js/main.js"></script> 
      <span class="style5">
      <?php include('inc/footer.php');?>
      </span></span></div>
</body>

</html>