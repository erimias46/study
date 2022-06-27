<?php
$dbhost="localhost";
$dbname="study";
$dbpass="";
$dbuser="root";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
  $pfirstname=$_POST['pfirstname'];
  $plastname=$_POST['plastname'];
  $pacadamic=$_POST['pacadamic'];
  $psex=$_POST['psex'];
  $pemail=$_POST['pemail'];
  $pcollege=$_POST['pcollege'];
  $pdepartment=$_POST['pdepartment'];
  $pscholar=$_POST['pscholar'];
  $pphone=$_POST['pphone'];

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
 // $pfile=$_POST['pfile'];



    

 //////



 $target_dir = "registeration/uploads/";
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








 
   
    // random unique id generator 
    $userid=uniqid(100000,true);
 
   
 
    // Now let's move the uploaded image into the folder: image
   


        $sql ="INSERT INTO personal (userid,firstname, lastname, email ,acadamic,sex, college,department,award) VALUES ('$userid','$pfirstname', '$plastname', '$pemail','$pacadamic','$psex','$pcollege','$pdepartement','$paward');";
        $sql.="INSERT INTO guarantee (userid,firstname, lastname,sex,email,phone) VALUES ('$userid','$gfirstname', '$glastname','$gsex', '$gemail','$gphone');";
        $sql.="INSERT INTO university (userid,uniname,unicountry,uniemail) VALUES ('$userid','$uniname', '$unicountry','$uniemail');";
        $sql.="INSERT INTO contract (userid,sdate,edate,pdf) VALUES ('$userid','$sdate', '$edate','$target_file')";
        
        if (mysqli_multi_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
       

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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
</head>

<body>
  <!-- Start your project here-->

  <div class="container my-5">
    <div class="card">
      <form action=" " method="post" enctype="multipart/form-data">
        <!-- Card header -->
        <div class="card-header py-4 px-5 bg-light border-0">
          <h4 class="mb-0 fw-bold" style="padding-top:40px">Add Person</h4>
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
                <input type="text" name="pfirstname" class="form-control" id="exampleInput1" style="max-width: 500px;" />
              </div>
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">Last name</label>
                <input type="text" name="plastname" class="form-control" id="exampleInput1" style="max-width: 500px;" />
              </div>
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">Acadamic Status</label>

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
              <div class="mb-3">
                <label for="exampleInput2" class="form-label">Email address</label>
                <input type="email" name="pemail" class="form-control" id="exampleInput2" style="max-width: 500px;"  />
              </div>
              <div class="mb-3">
                <label for="exampleInput2" class="form-label">College</label>
                <input type="text" name="pcollege" class="form-control" id="exampleInput2" style="max-width: 500px;" />
              </div>
              <div class="mb-3">
                <label for="exampleInput2" class="form-label">Department</label>
                <input type="text" name="pdepartment" class="form-control" id="exampleInput2" style="max-width: 500px;" />
              </div>
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">Scholarship Award</label>

                <!-- Default radio -->


                <!-- Default checked radio -->
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pscholar" id="flexRadioDefault2" checked />
                  <label class="form-check-label" for="flexRadioDefault2">MSc </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pscholar" id="flexRadioDefault2" checked />
                  <label class="form-check-label" for="flexRadioDefault2">PHD </label>
                </div>
                <div class="mb-3">
                  <label for="exampleInput3" class="form-label">Phone number</label>
                  <input type="tel" class="form-control" name="pphone" id="exampleInput3" style="max-width: 300px;" />
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
                  <input type="text" class="form-control" id="exampleInput1" name="gfirstname"style="max-width: 500px;" />
                </div>
                <div class="mb-3">
                  <label for="exampleInput1" class="form-label">Last name</label>
                  <input type="text" class="form-control" id="exampleInput1" name="glastname"style="max-width: 500px;" />
                </div>

                <div class="mb-3">
                  <label for="exampleInput1" class="form-label">Sex</label>

                  <!-- Default radio -->

                  <input type="radio" class="btn-check" name="gsex"  value="male"  autocomplete="off" />
                  <label class="btn btn-primary" >Male</label>

                  <input type="radio" class="btn-check" name="gsex"  value="female" autocomplete="off" />
                  <label class="btn btn-danger" >Female</label>



                </div>
                <div class="mb-3">
                  <label for="exampleInput2" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInput2" name="gemail"style="max-width: 500px;" />
                </div>



                <div class="mb-3">
                  <label for="exampleInput3" class="form-label">Phone number</label>
                  <input type="tel" class="form-control" id="exampleInput3" name="gphone"style="max-width: 300px;" />
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
                <input type="text" name="uniname" class="form-control" id="exampleInput1" style="max-width: 500px;" />
              </div>
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">Country</label>
                <input type="text" name="unicountry" class="form-control" id="exampleInput1" style="max-width: 500px;" />
              </div>


              <div class="mb-3">
                <label for="exampleInput2" class="form-label">Email address</label>
                <input type="email"  name="uniemail"class="form-control" id="exampleInput2" style="max-width: 500px;" />
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
                <input type="date" class="sdate" id="exampleInput1" style="max-width: 500px;" />
              </div>
              <div class="mb-3">
                <label for="exampleInput1" class="form-label">End date</label>
                <input type="date" class="edate" id="exampleInput1" style="max-width: 500px;" />
              </div>


              <div class="mb-3">
                <label for="exampleInput2" class="form-label">Contarct In PDF format</label>
                <input type="file" class="pfile" name="fileToUpload" id="exampleInput2" style="max-width: 500px;" />
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