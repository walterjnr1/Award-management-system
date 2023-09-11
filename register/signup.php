<?php 
include('../inc/topbar.php'); 


if(isset($_POST["btnsubmit"])){

///check if email already exist
$stmt = $dbh->prepare("SELECT * FROM tblregister WHERE userid=?");
$stmt->execute([$_POST['txtuserid']]); 
$user = $stmt->fetch();

if ($user) {
$error ='This User Already Registered ';

}else{

    $sql = "INSERT INTO tblregister(fullname,userid,password,email,sex,dob,user_type,dept,date_reg,status,photo) VALUES(:fullname,:userid,:password,:email,:sex,:dob,:user_type,:dept,:date_reg,:status,:photo)";
          
           $statement = $dbh->prepare($sql);
           $statement->execute([
        ':fullname'   => $_POST['txtfullname'],
        ':userid'   => $_POST['txtuserid'],
        ':password'   => $_POST['txtpassword'],
        ':email'   => $_POST['txtemail'],
         ':sex'   =>$_POST['cmdsex'],
         ':dob'   =>  $_POST['txtdob'],
         ':user_type'   =>$_POST['cmdtype'],
         ':dept'   =>$_POST['cmddept'],
         ':date_reg'   =>$current_date,
         ':status'   =>  '1',
         ':photo'   =>'uploadImage/default.jpg'
    ]);
if ($statement){
    $success = "Registration Was Successful";
} else {
$error = "Something Went Wrong";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title> Register Form| <?php echo $sitename; ?></title>
    <link rel="shortcut icon" href="images/logo.jpeg" type="image/x-icon" />
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Bootstrap JS -->
    <script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
              <div align="center"><img src="images/signin-img.png" width="480" height="228">
                </div>
                <div class="card-body">
                    <h3 class="title">Registration Info (Lecturers and Students only)</h3>
                    <p class="title"> <?php if($error){?>
          <div class="alert alert-danger" role="alert" align="center">  <?php echo ($error); ?></div>
		  <?php } 
				?>
			 <?php if($success){?>
          <div class="alert alert-success" role="alert" align="center">  <?php echo ($success); ?></div>
		  <?php } 
				?>	
				
				
				</p>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Fullname" value="<?php if (isset($_POST['txtfullname']))?><?php echo $_POST['txtfullname']; ?>" name="txtfullname" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="password" value="<?php if (isset($_POST['txtpassword']))?><?php echo $_POST['txtpassword']; ?>" name="txtpassword" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email" value="<?php if (isset($_POST['txtemail']))?><?php echo $_POST['txtemail']; ?>" name="txtemail" required>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="Date of Birth" name="txtdob" required>
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="cmdsex" id="cmdsex" > 
                                            <option disabled="disabled" selected="selected">Choose Sex</option>
                                             <option value="Male">Male</option> 
                                            <option value="Female">Female</option> 
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                            <select name="cmdtype" id="cmdtype" > 
                                    <option disabled="disabled" selected="selected">Choose User type</option>
                                    <option value="Student">Student</option> 
                                    <option value="Lecturer">Lecturer</option>
                              </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                        <div class="col-2">
                                <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Lecturer ID/Matric No" value="<?php if (isset($_POST['txtuserid']))?><?php echo $_POST['txtuserid']; ?>" name="txtuserid" required>
                                </div>
                          </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="cmddept" id="cmddept"> 
                                            <option disabled="disabled" selected="selected">Choose Department</option>
                                             <option value="Computer Science">Computer Science</option> 
                                            <option value="SLT">SLT</option> 
                                            <option value="Mass Communication">Mass Communication</option> 
                                            <option value="Microbiology">Microbiology</option> 
                                            <option value="Civil Engineering">Civil Engineering</option> 
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <div class="p-t-20">
                            <button class="btn btn--radius btn--green" name="btnsubmit" type="submit">Submit</button>
                            <a href="../index.php"><strong>Already a User</strong> </a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
