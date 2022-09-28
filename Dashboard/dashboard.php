<?php
session_start();

if (!isset($_SESSION['adminid']) and !isset($_SESSION['level'])) {
    header("location: ../login/index.php");
}
$dbhost = "localhost";
$dbname = "study";
$dbpass = "";
$dbuser = "root";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$adminid = $_SESSION['adminid'];


$sql4 = "Select * from admin where adminid='$adminid'";
$result4 = mysqli_query($conn, $sql4);


while ($row4 = mysqli_fetch_assoc($result4)) {
    $adminname = $row4['fullname'];
    $level = $row4['level'];
}




if (isset($_GET['delete'])) {
    $id = $_GET['delete'];



    $sql = "DELETE FROM `personal` WHERE userid='$id';";
    $sql .= "DELETE FROM `guarantee` WHERE userid='$id';";
    $sql .= "DELETE FROM `university` WHERE userid='$id';";
    $sql .= "DELETE FROM `contract` WHERE userid='$id'";

    if (mysqli_multi_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    header('location:dashboard.php');
}

if (isset($_GET['renewal'])) {
    $id = $_GET['renewal'];

    $update = true;


    $sql = "SELECT * FROM contract WHERE userid='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            $edate = $row['edate'];
            $sdate = $row['sdate'];
            $pdf = $row['pdf'];
        }
    } else {
        echo "0 results";
    }
}

if (isset($_POST['update'])) {

    $id = $_GET['renewal'];

    $redate = date('Y-m-d', strtotime($_POST['redate']));

    $sql = "UPDATE contract SET edate ='$redate'  WHERE userid='$id'";

// Inserting the file in renewal
$target_dir = "../registeration/uploads/";
 $target_file = $target_dir . basename($_FILES["rpdf"]["name"]);
 $uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
 // Check if image file is a actual image or fake image
 
 
 // Check if file already exists
 if (file_exists($target_file)) {
   echo "Sorry, file already exists.";
   $uploadOk = 0;
 }
 
 // Check file size
 if ($_FILES["rpdf"]["size"] > 103500000) {
   echo "Sorry, your file is too large.";
   $uploadOk = 0;
 }
 
 // Allow certain file formats
 if($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf"
 && $imageFileType != "txt" ) {
   echo "Sorry, only doc, docx, pdf & txt files are allowed.";
   $uploadOk = 0;
 }
 
 // Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
   echo "Sorry, your file was not uploaded.";
 // if everything is ok, try to upload file
 } else {
   if (move_uploaded_file($_FILES["rpdf"]["tmp_name"], $target_file)) {
     echo "The file ". htmlspecialchars( basename( $_FILES["rpdf"]["name"])). " has been uploaded.";
   } else {
     echo "Sorry, there was an error uploading your file.";
   }
 }
$target_dir1="registeration/uploads/";
 $target_file1 =$target_dir1 . basename($_FILES["rpdf"]["name"]);


    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    $count = 1;
    $sql8 = "Insert into renewal (userid,sdate,edate,renewenddate,adminid,renewcount,renewpdf) values('$id','$sdate','$edate','$redate','$adminid','$count','$target_file1')";
    if (mysqli_query($conn, $sql8)) {
    } else {
        echo "Error updating record: " . mysqli_error($conn);
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
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
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <p class="in"
                        style="color:white;font-size:30px;text-align:center; margin-left:150px;margin-top:10px">College
                        of Applied Science</p>
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
                                    class="img-circle"><span
                                    class="text-white font-medium"><?php echo $adminname;
                                                                                                                                                            ?></span></a>
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../index.php"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Registeration</span>
                            </a>
                        </li>

                        <li class="text-center p-20 upgrade-btn">
                            <a href="../login/logout.php" class="btn d-grid btn-danger text-white">
                                Logout</a>
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
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->

                <?php
                $con= new mysqli('localhost','root','','study');
                $query=$con->query("SELECT count(*) as gendercount,sex FROM personal GROUP By sex;");
                
                foreach($query as $data){
                    $gendercount[]=$data['gendercount'];
                    $sex[]=$data['sex'];


                }

                ?>
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Based on Gender</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div class="container">
                                        <canvas id="mychart"> </canvas>
                                        <script>
                                        const labels = <?php echo json_encode($sex);?>;
                                        const datas = <?php echo json_encode($gendercount);?>;
                                        let mychart = document.getElementById('mychart').getContext('2d');
                                        let massPopChart = new Chart(mychart, {
                                            type: 'bar',
                                            data: {
                                                labels: labels,
                                                datasets: [{
                                                    label: '#',
                                                    data: datas,
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255, 99, 132, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 159, 64, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                        </script>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>


                </div>
            </div>


            <!-- ============================================================== -->
            <!-- Tables -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <div class="d-md-flex mb-3">
                            <h3 class="box-title mb-0">Full information</h3>



                            <form method="GET" style="margin-left: 50px;">
                                <input type="text" name="search">

                                <button type="submit">Search</button>
                            </form>

                            <form method="GET" style="margin-left: 50px;">
                                <select name="filter" id="">

                                    <option value="Geology">Geology</option>
                                    <option value="Industrial">Industrial</option>
                                    <option value="Food Science">FSAN</option>

                                </select>


                                <button type="submit">Filter</button>
                            </form>



                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">First Name</th>
                                        <th class="border-top-0">Last Name</th>
                                        <th class="border-top-0">Awarded</th>
                                        <th class="border-top-0">Starting Date</th>
                                        <th class="border-top-0">Ending Date</th>
                                        <th class="border-top-0">Countdown</th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">Contract file</th>
                                        <th class="border-top-0">Action</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        if(!isset($_GET['search'])){
                                        $sql = "SELECT firstname,lastname,email,lastname,pdf,sdate,edate,award,personal.userid from personal JOIN contract ON personal.userid=contract.userid;";

                                        $result = mysqli_query($conn, $sql);


                                        $v = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {


                                            $datetime1 = strtotime(date("Y-m-d"));
                                            $datetime2 = strtotime($row["edate"]);

                                            $secs = $datetime2 - $datetime1; // == <seconds between the two times>
                                            $days = $secs / 86400;
                                            if ($days <= 0) {
                                                $days = '<span class="text-danger">Expired</span>';
                                            } else {
                                                $days = $days . "<span> days left</span>";
                                            }
                                        ?>


                                    <tr>
                                        <td><?php echo $v;
                                                    $v++; ?></td>
                                        <td class="txt-oflo"><?= $row["firstname"] ?></td>
                                        <td><?= $row["lastname"] ?></td>
                                        <td class="txt-oflo"><?= $row["award"] ?></td>
                                        <td><span class="text-success"><?= $row["sdate"] ?></span></td>
                                        <td><span class="text-success"><?= $row["edate"] ?></span></td>
                                        <td><span class="text-success"><?= $days ?></span></td>
                                        <td><span class="text-success"><?= $row["email"] ?></span></td>
                                        <td><span class="text-success"><a href="../<?= $row["pdf"] ?> "
                                                    target="_blank">PDF</a></span></td>
                                        <?php if ($level == 1) { ?>
                                        <td><button class="button-30" role="button"
                                                style="background-color:blue;color:white;">
                                                <i class="fas fa-edit"></i>
                                                <a name="edits" href="update.php?edit=<?php echo $row['userid']; ?>">
                                                    Edit</button></a>
                                            <button class="button-30" role="button"
                                                style="background-color:red;color:white;">
                                                <i class="fa fa-trash"></i>
                                                <a name="delete"
                                                    href="dashboard.php?delete=<?php echo $row['userid']; ?>">
                                                    Delete</a>
                                            </button>

                                            <button class="button-30" role="button"
                                                style="background-color:green;color:white;">
                                                <a name="edit"
                                                    href="dashboard.php?renewal=<?php echo $row['userid']; ?>">
                                                    Renewal </a>
                                            </button>

                                            <button class="button-30" role="button"
                                                style="background-color:yellow;color:white;">
                                                <a name="edit"
                                                    href="../info/index.php?view=<?php echo $row['userid']; ?>">
                                                    View </a>
                                            </button>
                                        </td>
                                        <?php } else { ?>
                                        <td>
                                            <button class="button-30" role="button"
                                                style="background-color:yellow;color:white;">
                                                <a name="edit"
                                                    href="../info/index.php?view=<?php echo $row['userid']; ?>">
                                                    View </a>
                                            </button>
                                        </td>
                                    </tr>

                                    <?php
                                                }
                                            }




                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->

            <?php if (isset($_GET['renewal'])) { ?>

            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Renewal</h3>
                    <ul>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div><label for="">Renewal End date</label>
                                <?php if (isset($edate)) echo $edate; ?>
                                <span><input type="date" name="redate"> </span>

                                <label for="">Renewal Contract PDF</label>



                                <span><input type="file" name="rpdf"> </span>

                                <span><button class="button-30" type="submit" name="update" role="button"
                                        style="background-color:green;color:white;">
                                        UPDATE
                                    </button></span></li>
                        </form>
                    </ul>
                </div>
            </div>
            <?php } else {
                }}else{
                    $filtervalues=$_GET['search'];
                    $sql = "SELECT firstname,lastname,email,lastname,pdf,sdate,edate,award,personal.userid from personal JOIN contract ON personal.userid=contract.userid  where firstname LIKE'%$filtervalues%';";

                    $result = mysqli_query($conn, $sql);


                    $v = 1;
                    while ($row = mysqli_fetch_assoc($result)) {


                        $datetime1 = strtotime(date("Y-m-d"));
                        $datetime2 = strtotime($row["edate"]);

                        $secs = $datetime2 - $datetime1; // == <seconds between the two times>
                        $days = $secs / 86400;
                        if ($days <= 0) {
                            $days = '<span class="text-danger">Expired</span>';
                        } else {
                            $days = $days . "<span> days left</span>";
                        }
                    ?>


            <tr>
                <td><?php echo $v;
                                $v++; ?></td>
                <td class="txt-oflo"><?= $row["firstname"] ?></td>
                <td><?= $row["lastname"] ?></td>
                <td class="txt-oflo"><?= $row["award"] ?></td>
                <td><span class="text-success"><?= $row["sdate"] ?></span></td>
                <td><span class="text-success"><?= $row["edate"] ?></span></td>
                <td><span class="text-success"><?= $days ?></span></td>
                <td><span class="text-success"><?= $row["email"] ?></span></td>
                <td><span class="text-success"><a href="../<?= $row["pdf"] ?> " target="_blank">PDF</a></span></td>
                <?php if ($level == 1) { ?>
                <td><button class="button-30" role="button" style="background-color:blue;color:white;">
                        <i class="fas fa-edit"></i>
                        <a name="edits" href="update.php?edit=<?php echo $row['userid']; ?>">
                            Edit</button></a>
                    <button class="button-30" role="button" style="background-color:red;color:white;">
                        <i class="fa fa-trash"></i>
                        <a name="delete" href="dashboard.php?delete=<?php echo $row['userid']; ?>">
                            Delete</a>
                    </button>

                    <button class="button-30" role="button" style="background-color:green;color:white;">
                        <a name="edit" href="dashboard.php?renewal=<?php echo $row['userid']; ?>">
                            Renewal </a>
                    </button>

                    <button class="button-30" role="button" style="background-color:yellow;color:white;">
                        <a name="edit" href="../info/index.php?view=<?php echo $row['userid']; ?>">
                            View </a>
                    </button>
                </td>
                <?php } else { ?>
                <td>
                    <button class="button-30" role="button" style="background-color:yellow;color:white;">
                        <a name="edit" href="../info/index.php?view=<?php echo $row['userid']; ?>">
                            View </a>
                    </button>
                </td>
            </tr>

            <?php
                            }
                        }




                ?>


            </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    <!-- ============================================================== -->

    <?php if (isset($_GET['renewal'])) { ?>

    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">Renewal</h3>
            <ul>
                <form action="" method="post" enctype="multipart/form-data">
                    <div><label for="">Renewal End date</label>
                        <?php if (isset($edate)) echo $edate; ?>
                        <span><input type="date" name="redate"> </span>

                        <label for="">Renewal Contract PDF</label>



                        <span><input type="file" name="rpdf"> </span>

                        <span><button class="button-30" type="submit" name="update" role="button"
                                style="background-color:green;color:white;">
                                UPDATE
                            </button></span></li>
                </form>
            </ul>
        </div>
    </div>
    <?php } else {
}} ?>
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