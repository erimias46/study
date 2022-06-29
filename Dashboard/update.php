<?php
session_start();
$dbhost = "localhost";
$dbname = "study";
$dbpass = "";
$dbuser = "root";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



if (isset($_GET['edit'])) {
    
  $id=$_GET['edit'];
  
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

if(isset($_POST['update'])){


  $pfirstname=$_POST['pfirstname'];
  $plastname=$_POST['plastname'];
  $pacadamic=$_POST['pacadamic'];
  $psex=$_POST['psex'];
  $pemail=$_POST['pemail'];
  $pcollege=$_POST['pcollege'];
  $pdepartment=$_POST['pdepartment'];
  #$pscholar=$_POST['pscholar'];
  $pphone=$_POST['pphone'];
  $paward=$_POST['paward'];
  

  $gfirstname=$_POST['gfirstname'];
  $glastname=$_POST['glastname'];
  $gemail=$_POST['gemail'];
  $gsex=$_POST['gsex'];
  $gphone=$_POST['gphone'];


  $uniname=$_POST['uniname'];
  $unicountry=$_POST['unicountry'];
  $uniemail=$_POST['uniemail'];


  $sdate=date('Y-m-d',strtotime($_POST['sdate']));
  $edate=date('Y-m-d',strtotime($_POST['edate']));



 $target_dir = "../registeration/uploads/";
 $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 $uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
 // Check if image file is a actual image or fake image
 if(isset($_POST["submit"])) {
   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
   if($check !== false) {
     echo "File is an image - " . $check["mime"] . ".";
     $uploadOk = 1;
   } else {
     echo "File is not an image.";
     $uploadOk = 0;
   }
 }
 
 // Check if file already exists
 if (file_exists($target_file)) {
   echo "Sorry, file already exists.";
   $uploadOk = 0;
 }
 
 // Check file size
 if ($_FILES["fileToUpload"]["size"] > 103500000) {
   echo "Sorry, your file is too large.";
   $uploadOk = 0;
 }
 
 // Allow certain file formats
 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "gif" ) {
   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
   $uploadOk = 0;
 }
 
 // Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
   echo "Sorry, your file was not uploaded.";
 // if everything is ok, try to upload file
 } else {
   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
   } else {
     echo "Sorry, there was an error uploading your file.";
   }
 }
$target_dir1="registeration/uploads/";
 $target_file1 = $target_dir1 . basename($_FILES["fileToUpload"]["name"]);
 


        $sql="UPDATE personal set firstname='$pfirstname',lastname='$plastname',email='$pemail',acadamic='$pacadamic', sex='$psex',college='$pcollege',department='$pdepartment',award='$paward' WHERE userid='$id';";
        $sql.="UPDATE guarantee set firstname='$gfirstname',lastname='$glastname',email='$gemail',sex='$gsex',email='$gemail',phone='$gphone';";
        
        $sql.="UPDATE university set uniname='$uniname', unicountry='$unicountry',uniemail='$uniemail' where userid='$id';";
        $sql.="UPDATE contract set sdate='$sdate', edate='$edate',pdf='$target_file1' where userid='$id'";
        
        if (mysqli_multi_query($conn, $sql)) {
            echo "Record Updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Study leave</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

    <style>
        .button-30 {
            align-items: center;
            appearance: none;
            background-color: #FCFCFD;
            border-radius: 4px;
            border-width: 0;
            box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
            box-sizing: border-box;
            color: #36395A;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono", monospace;
            height: 30px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: left;
            text-decoration: none;
            transition: box-shadow .15s, transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow, transform;
            font-size: 18px;
        }

        .button-30:focus {
            box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        }

        .button-30:hover {
            box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
            transform: translateY(-2px);
        }

        .button-30:active {
            box-shadow: #D6D6E7 0 3px 7px inset;
            transform: translateY(2px);
        }
    </style>
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
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="plugins/images/logo-icon.png" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <h3 style="color:black;font-weight: bold;">Study leave</h3>

                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <p class="in"style="color:white;font-size:30px;text-align:center; margin-left:150px;margin-top:10px">College of Applied Science</p>
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><span class="text-white font-medium">Dr Siraye</span></a>
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.html" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.html" aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Basic Table</span>
                            </a>
                        </li>


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
                        <h4 class="page-title">Dashboard</h4>
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
            <div class="container my-5">
    <div class="card">
      <form action=" " method="post" enctype="multipart/form-data">
        <!-- Card header -->
        <div class="card-header py-4 px-5 bg-light border-0">
          <h4 class="mb-0 fw-bold" style="padding-top:40px">Update Information</h4>
        </div>

        <!-- Card body -->
        <div class="card-body px-5">
          <!-- Account section -->
          <div class="row gx-xl-5">
            <div class="col-md-4">
              <h5>Personal Infromation</h5>
              <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam et ducimus velit, facere quaerat debitis modi asperiores aspernatur corrupti, sit aliquam.</p>
            </div>

            <div class="col-md-8">
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">First Name</label>
                <input type="text" name="pfirstname" class="form-control" id="exampleInput1" style="max-width: 500px;"  value="<?php echo $pfirstname ?>" />
                
              </div>
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">Last name</label>
                <input type="text" name="plastname" class="form-control" id="exampleInput1" style="max-width: 500px;" value="<?php echo $plastname ?>" />
              </div>
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">Acadamic Status</label>
                <br>
                <label for="" style="color:green;">Choosen</label> <?php echo $pacadamic ?>
                
                <!-- Default radio -->
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pacadamic" value="ARA" id="flexRadioDefault1" />
                  <label class="form-check-label" for="flexRadioDefault1"> ARA </label>
                </div>

                <!-- Default checked radio -->
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pacadamic"  value="MSC"id="flexRadioDefault2" checked />
                  <label class="form-check-label" for="flexRadioDefault2">MSc </label>
                </div>

              </div>
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">Sex</label>

                <!-- Default radio -->

                <input type="radio" class="btn-check" name="psex" id="option1"  value="male" autocomplete="off" checked />
                <label class="btn btn-primary" for="option1">Male</label>

                <input type="radio" class="btn-check" name="psex" id="option2"  value="female" autocomplete="off" />
                <label class="btn btn-danger" for="option2">Female</label>



              </div>
              <label for="" style="color:green;">Choosen</label> <?php echo $psex ?>
              <div class="mb-3">
                <label for="exampleInput2" class="form-label">Email address</label>
                <input type="email" name="pemail" class="form-control" id="exampleInput2" style="max-width: 500px;" value="<?php echo $pemail?>" />
              </div>
              <div class="mb-3">
                <label for="exampleInput2" class="form-label">College</label>
                <input type="text" name="pcollege" class="form-control" id="exampleInput2" style="max-width: 500px;"  value="<?php echo $pcollege?>"/>
              </div>
              <div class="mb-3">
                <label for="exampleInput2" class="form-label">Department</label>
                <input type="text" name="pdepartment" class="form-control" id="exampleInput2" style="max-width: 500px;" value="<?php echo $pdepartment?>" />
              </div>
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">Scholarship Award</label>

                <!-- Default radio -->


                <!-- Default checked radio -->
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="paward" id="flexRadioDefault2" checked />
                  <label class="form-check-label" for="flexRadioDefault2">MSc </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="paward" id="flexRadioDefault2" checked />
                  <label class="form-check-label" for="flexRadioDefault2">PHD </label>
                </div>
                <label for="" style="color:green;">Choosen</label> <?php echo $paward ?>
                <div class="mb-3">
                  <label for="exampleInput3" class="form-label">Phone number</label>
                  <input type="tel" class="form-control" name="pphone" id="exampleInput3" style="max-width: 300px;" value="<?php echo $pphone?>" />
                </div>

              </div>
            </div>

            <hr class="my-5" />
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <h5>Guarnatee Infromation</h5>
                <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam et ducimus velit, facere quaerat debitis modi asperiores aspernatur corrupti, sit aliquam.</p>
              </div>

              <div class="col-md-8">
                <div class="mb-3">
                  <label for="exampleInput1" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="exampleInput1" name="gfirstname"style="max-width: 500px;" value="<?php echo $gfirstname?>" />
                </div>
                <div class="mb-3">
                  <label for="exampleInput1" class="form-label">Last name</label>
                  <input type="text" class="form-control" id="exampleInput1" name="glastname"style="max-width: 500px;" value="<?php echo $glastname?>" />
                </div>

                <div class="mb-3">
                  <label for="exampleInput1" class="form-label">Sex</label>
                  <label for="" style="color:red;">Choosen <?php echo $gsex ?></label> 
                  <!-- Default radio -->

                  <input type="radio" class="btn-check" name="gsex"  id="option4" value="male"  autocomplete="off"  checked/>
                  <label class="btn btn-primary" for="option4" >Male</label>

                  <input type="radio" class="btn-check" name="gsex"   id="option5" value="female" autocomplete="off" />
                  <label class="btn btn-danger" for="option5">Female</label>



                </div>
                <div class="mb-3">
                  <label for="exampleInput2" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInput2" name="gemail"style="max-width: 500px;" value="<?php echo $gemail?>" />
                </div>



                <div class="mb-3">
                  <label for="exampleInput3" class="form-label">Phone number</label>
                  <input type="tel" class="form-control" id="exampleInput3" name="gphone"style="max-width: 300px;"  value="<?php echo $gphone?>"/>
                </div>

              </div>
            </div>

          </div>

          <hr class="my-5" />


          <div class="row gx-xl-5">
            <div class="col-md-4">
              <h5>University Information</h5>
              <p class="text-muted">Fill the full university information Nam et ducimus velit, facere quaerat debitis modi asperiores aspernatur corrupti, sit aliquam.</p>
            </div>

            <div class="col-md-8">
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">University Name</label>
                <input type="text" name="uniname" class="form-control" id="exampleInput1" style="max-width: 500px;" value="<?php echo $uniname?>"/>
              </div>
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">Country</label>
                <input type="text" name="unicountry" class="form-control" id="exampleInput1" style="max-width: 500px;"value="<?php echo $unicountry?>" />
              </div>


              <div class="mb-3">
                <label for="exampleInput2" class="form-label">Email address</label>
                <input type="email"  name="uniemail"class="form-control" id="exampleInput2" style="max-width: 500px;" value="<?php echo $uniemail?>"/>
              </div>

            </div>
          </div>

          <hr class="my-5" />

          <div class="row gx-xl-5">
            <div class="col-md-4">
              <h5>Contract Agreement</h5>
              <p class="text-muted">Contract Agreement full information Nam et ducimus velit, facere quaerat debitis modi asperiores aspernatur corrupti, sit aliquam.</p>
            </div>

            <div class="col-md-8">
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">Starting date</label>
                <input type="date" class="sdate" name="sdate" id="exampleInput1" style="max-width: 500px;"value="<?php echo $sdate?>" />
              </div>
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">End date</label>
                <input type="date" class="edate" name="edate" id="exampleInput1" style="max-width: 500px;" value="<?php echo "$edate";?>" />
                
              </div>


              <div class="mb-3">
                <label for="exampleInput2" class="form-label">Contarct In PDF format</label>
                <input type="file" class="pfile" name="fileToUpload" id="exampleInput2" style="max-width: 500px;" value="<?php echo $pdf?>" />
              </div>

            </div>
          </div>
        </div>
    </div>

    <!-- Card footer -->
    <div class="card-footer text-end py-4 px-5 bg-light border-0">
      <button class="btn btn-link btn-rounded" data-ripple-color="primary">Cancel</button>
      <button type="submit" class="btn btn-primary btn-rounded" name="update">
        Update
      </button>
    </div>
    </form>
  </div>
  </div>
  <!-- End your project here-->

  <!-- MDB -->
  

                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer text-center"> 2022 © Erimias Designs

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

        <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/app-style-switcher.js"></script>
        <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
        <!--Wave Effects -->
        <script src="js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="js/custom.js"></script>
        <!--This page JavaScript -->
        <!--chartis chart-->
        <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
        <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
        <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>