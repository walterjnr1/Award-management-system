<?php
include('../inc/topbar.php'); 
if(empty($_SESSION['login_userid']))
    {   
      header("Location: ../index.php"); 
    }
     

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>User Dashboard| <?php echo $sitename; ?></title>
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
          <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="../<?php echo $row_user['photo']; ?>" class="user-image" alt="User Image"> <span class="hidden-xs"><?php echo $row_user['fullname']; ?>  </span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <div class="pull-left user-img"><img src="../<?php echo $row_user['photo']; ?> " class="img-responsive img-circle" alt="user photo"></div>
                <p class="text-left"><?php echo $row_user['fullname']; ?>  <small> <?php echo $row_user['email']; ?> </small> </p>
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
      <h1>Welcome <?php echo $row_user['fullname']; ?>  </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Dashboard</li>
      </ol>
    </div>
   
    <!-- Main content -->
    <div class="content">
      <div class="row">
     
      </div>
      <!-- /.row -->
     
      <div class="row">

        <div class="col-lg-3">
          <div class="tile-progress tile-white">
            <div class="tile-header">
              <h5>Status</h5>
              <h3><?php if($row_user['status']=="0"){ ?>
			                    <span class="badge  bg-warning">Inactive</span>
                             <?php } else if($row_user['status']=="1") {?>
			                      <span class="badge  bg-success">Active</span>
                      
			                  <?php } ?>
                        </h3>
            </div>
            <div class="tile-progressbar"> <span data-fill="65.5%" style="width: 65.5%;"></span> </div>
            <div class="tile-footer">
            </div>
          </div>
        </div>



        <div class="col-lg-3">
          <div class="tile-progress tile-red">
            <div class="tile-header">
              <h5>User ID</h5>
              <h3> <?php echo $row_user['userid'];  ?></h3>
            </div>
            <div class="tile-progressbar"> <span data-fill="70%" style="width: 70%;"></span> </div>
            <div class="tile-footer">
            </div>
          </div>
        </div>


        <div class="col-lg-3">
          <div class="tile-progress tile-cyan">
            <div class="tile-header">
              <h5>User Type</h5>
              <h3><?php echo $row_user['user_type'];  ?></h3>
            </div>
            <div class="tile-progressbar"> <span data-fill="70%" style="width: 70%;"></span> </div>
              <div class="tile-footer">
            </div>
          </div>
        </div> 
 		   
      <!-- /.row -->
      
      <div class="row"></div>
      <!-- /.row -->
      
      <div class="row" >
        <table width="1600" height="249" align="center">
          <tr>
            <td width="1600" align="center"><p>&nbsp;</p>
              <div class="col-xl-8" >
                <div class="info-box">
                  <div class="card-header">
                    <h5 align="center" class="card-title style1"><strong>Your Recent Voting</strong></h5>
                  </div>
                  <div class="table-responsive">
                    <div align="center">
                      <table width="114%" height="87" class="table table-hover">
                        <thead class="bg-primary text-white">
                          <tr>
                            <th><div align="center">Candidate Photo </div></th>
                            <th><div align="center">Candidate</div></th>
                            <th><div align="center">Category</div></th>
                            <th><div align="center">Date</div></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
        $data = $dbh->query("SELECT candidate.*,voting.* FROM voting INNER JOIN candidate ON voting.cand_userid=candidate.userid WHERE voting.voter_userid ='$userid' ORDER BY voting.voting_date DESC")->fetchAll();
        $cnt=1;
        foreach ($data as $row) {
        ?>
                          <tr>
                            <td><div align="center"><img src="../<?php echo $row['photo'];?>"  width="50" height="43" border="2"/></div></td>
                            <td><div align="center"><?php echo $row['candName'] ?></div></td>
                             <td><div align="center"><?php echo $row['category'] ?></div></td>
                             <td><div align="center"><?php echo $row['voting_date'] ?></div></td>

                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            </td>
          </tr>
        </table>
        <!-- /.row -->
</div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs"></div>
    <div align="center">
    <?php include('../inc/footer.php');?>
    </div>
  </footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/adminkit.js"></script> 

<!-- Morris JavaScript --> 
<script src="dist/plugins/raphael/raphael-min.js"></script> 
<script src="dist/plugins/morris/morris.js"></script> 
<script src="dist/plugins/functions/dashboard1.js"></script> 

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
</body>

<!-- Mirrored from uxliner.com/adminkit/demo/horizontal/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 19:35:54 GMT -->
</html>
