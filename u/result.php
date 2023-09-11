<?php
include('../inc/topbar.php'); 
if(empty($_SESSION['login_userid']))
    {   
      header("Location: ../index.php"); 
    }


?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/adminkit/demo/horizontal/ltr/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 19:36:37 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Result| <?php echo $sitename; ?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- v4.0.0 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

<!-- Favicon -->
<link rel="shortcut icon" href="../images/logo.jpeg" type="image/x-icon" />

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">
<link rel="stylesheet" href="dist/css/simple-lineicon/simple-line-icons.css">

<!-- form wizard -->
<link rel="stylesheet" href="dist/plugins/formwizard/jquery-steps.css">

<!-- hmenu -->
<link rel="stylesheet" href="dist/plugins/hmenu/ace-responsive-menu.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<style type="text/css">
<!--
.style2 {color: #000000; font-weight: bold; }
-->
</style>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
  <!-- Logo --> 
    <a href="index.php" class="logo blue-bg"> 
    <!-- mini logo for sidebar mini 50x50 pixels --> 
    <span class="logo-mini"><img src="../images/logo.jpeg" alt=""></span> 
    <!-- logo for regular state and mobile devices --> 
    <span class="logo-lg"><img src="../images/logo.jpeg" alt="" width="70" height="60"></span> </a> 
    <!-- Header Navbar -->
    <nav class="navbar blue-bg navbar-static-top"> 
      <!-- Sidebar toggle button-->
      <div class="pull-left search-box">
        <form action="#" method="get" class="search-form">
          <div class="input-group">
            <input name="search" class="form-control" placeholder="" type="text">
            <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
            </span></div>
        </form>
        <!-- search form --> </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account  -->
          <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="../<?php echo $row_user['photo']; ?>" class="user-image" alt="user image"> <span class="hidden-xs"><?php echo $row_user['fullname'];?>  </span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <div class="pull-left user-img"><img src="../<?php echo $row_user['photo']; ?> " class="img-responsive img-circle" alt="User"></div>
                <p class="text-left"><?php echo $row_user['fullname']; ?>  <small><?php echo $row_user['email']; ?> </small> </p>
              </li>
              <li><a href="profile.php"><i class="icon-profile-male"></i> My Profile</a></li>
			   <li role="separator" class="divider"></li>
              <li><a href="changepassword.php"><i class="icon-gears"></i> Change Password</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Main Nav -->
 <?php include('sidebar.php'); ?>
  <!-- Main Nav -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="style2">Vote </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Result</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-9">
          <div class="col-xl-12" >
            <div class="info-box">
              <div class="card-header">
                <h2 align="center" class="card-title style2">Real-Time Result Board</h2>
              </div>
              <div class="table-responsive">
                <div align="center">
                  <table width="103%" height="87" align="right" class="table table-hover">
                    <thead class="bg-primary text-white">
                      <tr>
                        <th width="2%"><div align="center">#</div></th>
                        <th width="9%"><div align="center">Photo</div></th>
                        <th width="21%"><div align="center">Candidate</div></th>
                        <th width="29%"><div align="center">Category</div></th>
                        <th width="29%"><div align="center">Votes</div></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
$data = $dbh->query("SELECT * FROM candidate ORDER BY category ASC")->fetchAll();
$cnt=1;
foreach ($data as $row) {
?>
                      <tr>
                        <td><div align="center"><?php echo $cnt ?></div></td>
                        <td><div align="center" class="style2"><span class="controls"><img src="../<?php echo $row['photo'];?>"  width="50" height="43" border="2"/></span></div></td>
                        <td><div align="center"><?php echo $row['candName'] ?></div></td>
                        <td><div align="center"><?php echo $row['category'] ?></div></td>
                        <td><div align="center" class="style2"><?php echo $row['count'] ?></div></td>
                      </tr>
                      <?php $cnt=$cnt+1;} ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <p align="center"><a href="vote_step_1.php"><strong> Continue Voting &gt;&gt; </strong></a></p>
        </div>
        <div align="center">
          <p><a href="vote_step_2.php"></a></p>
        </div>
      </div>
      <div class="row m-t-3"></div>
	        <div class="row m-t-3"></div>
      <div class="row m-t-3">
        <div align="center"><a href="vote_step_2.php"></a></div>
      </div>
      <div class="row m-t-3"></div>

    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs"></div>
  <?php include('../inc/footer.php');?></footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 



<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/adminkit.js"></script>

<!-- form wizard --> 
<script src="dist/plugins/formwizard/jquery-steps.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>
    var frmRes = $('#frmRes');
    var frmResValidator = frmRes.validate();
	
    var frmInfo = $('#frmInfo');
    var frmInfoValidator = frmInfo.validate();

    var frmLogin = $('#frmLogin');
    var frmLoginValidator = frmLogin.validate();

    var frmMobile = $('#frmMobile');
    var frmMobileValidator = frmMobile.validate();

    $('#demo1').steps({
      onChange: function (currentIndex, newIndex, stepDirection) {
        console.log('onChange', currentIndex, newIndex, stepDirection);
        // tab1
        if (currentIndex === 0) {
          if (stepDirection === 'forward') {
            var valid = frmRes.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmResValidator.resetForm();
          }
        }
		
		// tab2
        if (currentIndex === 1) {
          if (stepDirection === 'forward') {
            var valid = frmInfo.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmInfoValidator.resetForm();
          }
        }

        // tab3
        if (currentIndex === 2) {
          if (stepDirection === 'forward') {
            var valid = frmLogin.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmLoginValidator.resetForm();
          }
        }

        // tab4
        if (currentIndex === 3) {
          if (stepDirection === 'forward') {
            var valid = frmMobile.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmMobileValidator.resetForm();
          }
        }

        return true;

      },
      onFinish: function () {
        alert('Wizard Completed');
      }
    });
  </script> 
<script>
    $('#demo').steps({
      onFinish: function () {
        alert('Wizard Completed');
      }
    });
  </script>
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

<!-- Mirrored from uxliner.com/adminkit/demo/horizontal/ltr/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 19:36:37 GMT -->
</html>
