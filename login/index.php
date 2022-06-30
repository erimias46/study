<?php
require('header.php');




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

  $user = $_POST['username'];
  $pass = $_POST['password'];


  $sql = "Select * from admin";
  $result = mysqli_query($conn, $sql);

  
    while($row = mysqli_fetch_assoc($result)) {
      if ($pass == $row['password'] and $user == $row['username']) {
        session_start();
        if($row['level']==1){
          $_SESSION['level']=$row['level'];
          $_SESSION['adminid']=$row['adminid'];
          header('Location: ../index.php');
        }
        else{
          $_SESSION['level']=$row['level'];
          $_SESSION['adminid']=$row['adminid'];
          header('Location: ../index.php');

        }

        
      
    } else {
      echo "password or username incorrect";
    }
    }
    
  }


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Study leave</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <form method="post" class="box">
            <h1>Login</h1>
            <p class="text-muted"> Please enter your login and password!</p>
             <input type="text" name="username" placeholder="Username">
              <input type="password" name="password" placeholder="Password"> 
              <a class="forgot text-muted" href="#">Forgot password?</a> 
              <input type="submit" name="submit" value="Login" >
            <div class="col-md-12">
              <ul class="social-network social-circle">
                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li>
              </ul>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src=" https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</body>

</html>