<?php

$dbhost = "localhost";
$dbname = "study";
$dbpass = "";
$dbuser = "root";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
  $pfirstname = $_POST['pfirstname'];
  $plastname = $_POST['plastname'];
  $pacadamic = $_POST['pacadamic'];
  $psex = $_POST['psex'];
  $pemail = $_POST['pemail'];
  
  $pdepartment = $_POST['pdepartment'];
  $pscholar = $_POST['pscholar'];
  $pphone = $_POST['pphone'];
  

  $gfirstname = $_POST['gfirstname'];
  $glastname = $_POST['glastname'];
  $gemail = $_POST['gemail'];
  $gsex = $_POST['gsex'];
  $gphone = $_POST['gphone'];


  $uniname = $_POST['uniname'];
  $unicountry = $_POST['unicountry'];
  $uniemail = $_POST['uniemail'];


  $sdate = date('Y-m-d', strtotime($_POST['sdate']));
  $edate = date('Y-m-d', strtotime($_POST['edate']));



  if (isset($_FILES['fileToUpload'])) {
    $errors = array();
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload']['name'])));

    $extensions = array("pdf", "doc", "txt", "docx");

    if (in_array($file_ext, $extensions) === false) {
      $errors[] = "extension not allowed, please choose a DOCX or PDF file.";
    }

    if ($file_size > 209700152) {
      $errors[] = 'File size must be excately 2 MB';
    }

    if (empty($errors) == true) {
      move_uploaded_file($file_tmp, "registeration/uploads/" . $file_name);
      echo "Success";
    } else {
      print_r($errors);
    }
    $target = "registeration/uploads/";
    $filename = $target . $file_name;
  }








  // random unique id generator 
  $userid = uniqid(100000, true);



  // Now let's move the uploaded image into the folder: image

  // if(!empty($pfirstname) && !empty($plastname)  && !empty($pemail)  && !empty($pacadamic)  && !empty($psex)  && !empty($pcollege)  && !empty($pdepartment)  && !empty($paward)  && !empty($pphone) 
  //  && !empty($gfirstname) && !empty($glastname) && !empty($gemail)  && !empty($gemail) && !empty($gphone)
  //   && !empty($uniname) && !empty($unicountry) && !empty($uniemail) 
  //   && !empty($sdate) && !empty($edate)  && !empty($pdf))
  // {
  $sql = "INSERT INTO personal (userid,firstname, lastname, email ,acadamic,sex,department,award,phone) VALUES ('$userid','$pfirstname', '$plastname', '$pemail','$pacadamic','$psex','$pdepartment','$pscholar','$pphone');";
  $sql .= "INSERT INTO guarantee (userid,firstname, lastname,sex,email,phone) VALUES ('$userid','$gfirstname', '$glastname','$gsex', '$gemail','$gphone');";
  $sql .= "INSERT INTO university (userid,uniname,unicountry,uniemail) VALUES ('$userid','$uniname', '$unicountry','$uniemail');";
  $sql .= "INSERT INTO contract (userid,sdate,edate,pdf) VALUES ('$userid','$sdate', '$edate','$filename')";

  if (mysqli_multi_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  //}
  // else{
  //   echo "Missing information";
  // }






  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Registeration</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />

    <style>

    </style>
</head>

<body>
    <!-- Start your project here-->

    <div class="container my-5">
        <div class="card  gradient-custom1">
            <form action=" " method="post" enctype="multipart/form-data">
                <!-- Card header -->
                <div class="card-header py-4 px-5 bg-light  border-0" style="background-color: blue;">
                    <h4 class="mb-0 fw-bold" style="padding-top:40px">Add Person</h4>
                </div>

                <!-- Card body -->
                <div class="card-body px-5">
                    <!-- Account section -->
                    <div class="row gx-xl-5">
                        <div class="col-md-4">
                            <h5>Personal Infromation</h5>
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="exampleInput1" class="form-label">First Name</label>
                                <input type="text" name="pfirstname" required class="form-control" id="exampleInput1"
                                    style="max-width: 500px;" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInput1" class="form-label">Last name</label>
                                <input type="text" name="plastname" required class="form-control" id="exampleInput1"
                                    style="max-width: 500px;" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInput1" class="form-label">Acadamic Status</label>

                                <!-- Default radio -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pacadamic" value="ARA"
                                        id="flexRadioDefault1" />
                                    <label class="form-check-label" for="flexRadioDefault1"> ARA </label>
                                </div>

                                <!-- Default checked radio -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pacadamic" value="MSC"
                                        id="flexRadioDefault2" checked />
                                    <label class="form-check-label" for="flexRadioDefault2">MSc </label>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInput1" class="form-label">Sex</label>

                                <!-- Default radio -->

                                <input type="radio" name="psex" id="option1" value="male" />
                                <label class="btn btn-primary" for="option1">Male</label>

                                <input type="radio" name="psex" id="option2" value="female" />
                                <label class="btn btn-danger" for="option2">Female</label>



                            </div>
                            <div class="mb-3">
                                <label for="exampleInput2" class="form-label">Email address</label>
                                <input type="email" name="pemail" required class="form-control" id="exampleInput2"
                                    style="max-width: 500px;" />
                            </div>

                            <div class="mb-3">
                                <label for="exampleInput2" class="form-label">Department</label>

                                <select name="pdepartment" id="" class="form-control" style="max-width: 500px;"
                                    autocomplete="Indusstrial">
                                    <option value="Industrial">Industrial Chemistry</option>
                                    <option value="Food Science">Food Science</option>
                                    <option value="Geology">Geology</option>

                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInput1" class="form-label">Scholarship Award</label>

                                <!-- Default radio -->


                                <!-- Default checked radio -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pscholar" value="MSc"
                                        id="flexRadioDefault2" checked />
                                    <label class="form-check-label" for="flexRadioDefault2">MSc </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pscholar" value="PHD"
                                        id="flexRadioDefault2" checked />
                                    <label class="form-check-label" for="flexRadioDefault2">PHD </label>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput3" class="form-label">Phone number</label>
                                    <input type="tel" class="form-control" name="pphone" id="exampleInput3"
                                        style="max-width: 300px;" />
                                </div>

                            </div>
                        </div>

                        <hr class="my-5" />
                        <div class="row gx-xl-5">
                            <div class="col-md-4">
                                <h5>Guarnatee Infromation</h5>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="exampleInput1" name="gfirstname"
                                        style="max-width: 500px;" />

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput1" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="exampleInput1" name="glastname"
                                        style="max-width: 500px;" />
                                </div>


                                <div class="mb-3">
                                    <label for="exampleInput12" class="form-label">Sex</label>

                                    <!-- Default radio -->

                                    <input type="radio" name="gsex" id="option3" value="male" />
                                    <label class="btn btn-primary" for="option3">Male</label>

                                    <input type="radio" name="gsex" id="option4" value="female" />
                                    <label class="btn btn-danger" for="option4">Female</label>



                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput2" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInput2" name="gemail"
                                        style="max-width: 500px;" />
                                </div>



                                <div class="mb-3">
                                    <label for="exampleInput3" class="form-label">Phone number</label>
                                    <input type="tel" class="form-control" id="exampleInput3" name="gphone"
                                        style="max-width: 300px;" />
                                </div>

                            </div>
                        </div>

                    </div>

                    <hr class="my-5" />


                    <div class="row gx-xl-5">
                        <div class="col-md-4">
                            <h5>University Information</h5>
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="exampleInput1" class="form-label">University Name</label>
                                <input type="text" name="uniname" class="form-control" required id="exampleInput1"
                                    style="max-width: 500px;" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInput1" class="form-label">Country</label>
                                <input type="text" name="unicountry" class="form-control" id="exampleInput1"
                                    style="max-width: 500px;" />
                            </div>


                            <div class="mb-3">
                                <label for="exampleInput2" class="form-label">Email address</label>
                                <input type="email" name="uniemail" class="form-control" id="exampleInput2"
                                    style="max-width: 500px;" />
                            </div>

                        </div>
                    </div>

                    <hr class="my-5" />

                    <div class="row gx-xl-5">
                        <div class="col-md-4">
                            <h5>Contract Agreement</h5>
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="exampleInput1" class="form-label">Starting date</label>
                                <input type="date" class="sdate" name="sdate" id="exampleInput1"
                                    style="max-width: 500px;" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInput1" class="form-label">End date</label>
                                <input type="date" class="edate" name="edate" id="exampleInput1"
                                    style="max-width: 500px;" />
                            </div>


                            <div class="mb-3">
                                <label for="exampleInput2" class="form-label">Contarct In PDF format</label>
                                <input type="file" class="pfile" name="fileToUpload" id="exampleInput2"
                                    style="max-width: 500px;" />
                            </div>

                        </div>
                    </div>
                </div>
        </div>

        <!-- Card footer -->
        <div class="card-footer text-end py-4 px-5 bg-light border-0">
            <button class="btn btn-link btn-rounded" data-ripple-color="primary">Cancel</button>
            <button type="submit" class="btn btn-primary btn-rounded" name="submit">
                Submit
            </button>
        </div>
        </form>
    </div>
    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>