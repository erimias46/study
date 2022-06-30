<?php
session_start();
if(!isset($_SESSION['adminid'] )and !isset($_SESSION['level']) ){
  header("location: ../login/index.php");
}
require("../conn.php");

$adminid=$_SESSION['adminid'];


$sql4 = "Select * from admin where adminid='$adminid'";
$result4= mysqli_query($conn, $sql4);

  
    while($row4= mysqli_fetch_assoc($result4)) {
        $adminname=$row4['fullname'];
        $level=$row4['level'];
     

        
      
    }


if (isset($_GET['view'])) {
  $id = $_GET['view'];
  
  $sql = "SELECT * from personal where userid='$id'";
                                       
  $result = mysqli_query($conn, $sql);
 while ($row = mysqli_fetch_assoc($result)) {

  $pfirstname=$row['firstname'];
  $plastname=$row['lastname'];
  $pacadamic=$row['acadamic'];
  $psex=$row['sex'];
  $pemail=$row['email'];
  $pcollege=$row['college'];
  $pdepartment=$row['department'];
  #$pscholar=$row['scholar'];
  $pphone=$row['phone'];
  $paward=$row['award'];

 }
 $sql2 = "SELECT * from guarantee where userid='$id'";
                                       
 $result2 = mysqli_query($conn, $sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {

 $gfirstname=$row2['firstname'];
 $glastname=$row2['lastname'];
 $gemail=$row2['email'];
 $gsex=$row2['sex'];
 $gphone=$row2['phone'];


 
}

$sql3 = "SELECT * from university where userid='$id'";
                                       
 $result3 = mysqli_query($conn, $sql3);
while ($row3 = mysqli_fetch_assoc($result3)) {

$uniname=$row3['uniname'];
 $unicountry=$row3['unicountry'];
 $uniemail=$row3['uniemail'];
 
}

$sql4 = "SELECT * from contract where userid='$id'";
                                       
 $result4 = mysqli_query($conn, $sql4);
while ($row4 = mysqli_fetch_assoc($result4)) {

$sdate=$row4['sdate'];
$edate=$row4['edate'];
$pdf=$row4['pdf'];
}
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Full Information</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
   <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
<!-- Font Awesome -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
/>
<!-- Google Fonts Roboto -->
<link
  rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
/>
<!-- MDB -->
<link rel="stylesheet" href="css/mdb.min.css" />
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="plugins/images/logo-icon.png" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <label style="color: black;">Study Leave</label>
                            
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <label style="color: white; font-size: 30px; margin-top: 10px; margin-left: 150px;">College of Applied Science </label>
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium"><?php echo  $adminname; echo " Level ".$level?> </span></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../Dashboard/dashboard.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../Dashboard/profile.php"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Basic Table</span>
                            </a>
                        </li>
                       
                       
                        <li class="text-center p-20 upgrade-btn">
                            <a href="../login/logout.php"
                                class="btn d-grid btn-danger text-white" target="_blank">
                                Logout</a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Full Information</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                            
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <section style="background-color: #eee;">
                    
                  
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="card mb-4">
                            <div class="card-body text-center">
                              <img src="src/user.png" width="20px" height="20px" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                              <h5 class="my-3"><?php echo ucfirst($pfirstname)." ".ucfirst($plastname)?></h5>
                              
                              <div class="d-flex justify-content-center mb-2">
                                
                                <a href="mailto:<?php echo $pemail?>">
                                <button type="button" class="btn btn-primary">Send Mail</button>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="card mb-4 mb-lg-0" style="margin-top:38px;min-height:250px;">
                            <div class="card-body p-0">
                              <ul class="list-group list-group-flush rounded-3">
                                <label style="color:#3b5998;margin:5px 50px;margin-top:30px;">Guarantee information</label>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                  <p class="mb-0">Full Name</p>
                                  <p class="mb-0"><?php echo ucfirst($gfirstname)." ".ucfirst($glastname)?></p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">Sex</p>
                                  <p class="mb-0"><?php echo ucfirst($gsex)?></p>
                                  
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">Email</p>
                                  <p class="mb-0"><?php echo ucfirst($gemail)?></p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">Phone</p>
                                  <p class="mb-0"><?php echo ucfirst($gphone)?></p>
                                </li>
                                
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-8">
                          <div class="card mb-4">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0"> <?php echo ucfirst($pfirstname)." ".ucfirst($plastname)?></p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0"><?php echo $pemail;?></p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0"><?php echo $pphone ?></p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Sex</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0"><?php echo ucfirst($psex)?></p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Department</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0"><?php echo $pdepartment?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                <div class="card-body p-0">
                              <ul class="list-group list-group-flush rounded-3">
                                <label style="color:#3b5998;margin:5px 50px;">University Information</label>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                  <p class="mb-0">Univeristy Name</p>
                                  <p class="mb-0"><?php echo ucfirst($uniname)?></p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">University Country</p>
                                  <p class="mb-0"><?php echo ucfirst($unicountry)?></p>
                                  
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">Email</p>
                                  <p class="mb-0"><?php echo ucfirst($uniemail)?></p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">Phone</p>
                                  <p class="mb-0"><?php echo ucfirst($gphone)?></p>
                                </li>
                                
                              </ul>
                            </div>
                            </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                <div class="card-body p-0">
                              <ul class="list-group list-group-flush rounded-3">
                                <label style="color:#3b5998;margin:5px 50px;">Contract Information</label>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                  <p class="mb-0">Starting Date</p>
                                  <p class="mb-0"><?php echo ucfirst($sdate)?></p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">End date</p>
                                  <p class="mb-0"><?php echo ucfirst($edate)?></p>
                                  
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">Contract</p>
                                  <p class="mb-0"><a href="../<?= $pdf?> " target="_blank">PDF</a></p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">Phone</p>
                                  <p class="mb-0"><?php echo ucfirst($gphone)?></p>
                                </li>
                                
                              </ul>
                            </div>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2022 © Erimias Design
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>