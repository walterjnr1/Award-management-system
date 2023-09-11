<?php
include('../inc/topbar.php'); 
if(empty($_SESSION['login_userid']))
    {   
      header("Location: ../index.php"); 
    }

if(isset($_POST["btnsave"]))
{

  $file_type = $_FILES['userimage']['type']; //returns the mimetype
  $allowed = array("image/jpg", "image/gif","image/jpeg", "image/webp","image/png");
  if(!in_array($file_type, $allowed)) {
  $error = 'Only jpg, jpeg,Webp, gif, and png files are allowed.';
   // exit();
  
  }else{
  $image= addslashes(file_get_contents($_FILES['userimage']['tmp_name']));
  $image_name= addslashes($_FILES['userimage']['name']);
  $image_size= getimagesize($_FILES['userimage']['tmp_name']);
  move_uploaded_file($_FILES["userimage"]["tmp_name"],"../uploadImage/" . $_FILES["userimage"]["name"]);		
  $location="uploadImage/" . $_FILES["userimage"]["name"];

  //edit profile details
  $sql = "UPDATE tblregister SET photo=? where userid=?";
  $stmt= $dbh->prepare($sql);
  $stmt->execute([$location,$userid]);
  if($stmt) {
  

    header( "refresh:2;url= photo.php" );
     $success ='Profile Photo Edited Successfully...';
     
    }else{
    $error='Problem Editing Photo ';
    }
    }
  }
    ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/adminkit/demo/horizontal/ltr/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 19:36:56 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>View/Edit Profile - <?php echo $sitename; ?></title>
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

<!-- hmenu -->
<link rel="stylesheet" href="dist/plugins/hmenu/ace-responsive-menu.css">



<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <!-- Logo --> 
    <a href="index.html" class="logo blue-bg"> 
    <!-- mini logo for sidebar mini 50x50 pixels --> 
    <span class="logo-mini"><img src="../images/logo.jpeg" alt="" width="70" height="60"></span> 
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
  <div class="main-nav">
    <nav> 
      <!-- Menu Toggle btn-->
      <div class="menu-toggle">
        <h3>Menu</h3>
        <button type="button" id="menu-btn"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <!-- Responsive Menu Structure--> 
      <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
      <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
      <?php
			   include('sidebar.php');
			   
			   ?>
       
      </ul>
    </nav>
  </div>
  <!-- Main Nav -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Profile page</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Profile page</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-4">
          <div class="user-profile-box m-b-3">
            <div class="box-profile text-white"> <img class="profile-user-img img-responsive img-circle m-b-2" src="../<?php echo $row_user['photo']; ?>" alt="User profile picture">
              <h3 class="profile-username text-center style1"><?php echo $row_user['fullname']; ?></h3>
              <p class="text-center style1"><?php echo $row_user['userid']; ?></p>
              <p class="text-center style1"><?php echo $row_user['dept']; ?>.</p>
            </div>
          </div>
          <div class="card m-b-3">
            <div class="card-body">
              <div class="box-body"> <strong><i class="fa fa-user margin-r-5"></i> User Type</strong>
                <p class="text-muted"> <?php echo $row_user['user_type']; ?> </p>
                <hr>
                <strong><i class="fa fa-envelope margin-r-5"></i> Email address </strong>
                <p class="text-muted"><?php echo $row_user['email']; ?></p>
                <hr>
                              
            
              </div>
              <!-- /.box-body --> 
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="info-box">
          <!-- Main content -->
          <?php if($success){?>
          <div class="alert alert-success" role="alert" align="center">  <?php echo ($success); ?></div>
		  <?php } 
					else if($error){?>
           <div class="alert alert-danger" role="alert">  <?php echo ($error); ?></div>
 <?php } ?>
    <div class="content">
      <div class="row">
        <div class="col-lg-9">
          <div class="card card-outline">
            <div class="card-header bg-blue">

              <h5 class="text-white m-b-0">Edit Photo</h5>
            </div>
            
            <div class="card-body">
		
            <form  action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                        <input name="userimage" type="file" class="form-control" onChange="display_img(this)"/>
              <div class="col-md-10">
                          <div align="center"><img src="../<?php echo $row_user['photo'];   ?>" alt="user photo" width="178" height="154" id="logo-img">   
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
          <button type="submit" name="btnsave" class="btn btn-success">Save Changes</button>

              </div>
            </div>
          </form>
            </div>
          </div>
        </div>
      </div>
          </div>
        </div>
      </div>
      <!-- Main row --> 
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs"></div>
    <?php include('../inc/footer.php');?>
</footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script>
 
<script src="dist/plugins/popper/popper.min.js"></script>

<!-- v4.0.0-alpha.6 -->
<script src="dist/bootstrap/js/bootstrap.min.js"></script>

<!-- template --> 
<script src="dist/js/adminkit.js"></script>

<!-- Chart Peity JavaScript --> 
<script src="dist/plugins/peity/jquery.peity.min.js"></script> 
<script src="dist/plugins/functions/jquery.peity.init.js"></script>
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
<script>
    function display_img(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#logo-img').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
   
</script>
</body>

<!-- Mirrored from uxliner.com/adminkit/demo/horizontal/ltr/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 19:36:56 GMT -->
</html>
