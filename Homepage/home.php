<?php
require('header/header.php');

session_start();

if (!isset($_SESSION['adminid']) and !isset($_SESSION['level'])) {
  header("location: ../login/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Home </title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/styles.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>
<style>
  .carousel-inner {
    margin-top: 50px;
    width: 100%;
    display: inline-block;
    position: relative;
  }

  .carousel-inner {
    padding-top: 43.25%;
    display: block;
    content: "";
  }

  .carousel-item {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    background: skyblue;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }

  .caption {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    width: 60%;
    z-index: 9;
    margin-top: 20px;
    text-align: center;
  }

  .caption h1 {
    color: #fff;
    font-size: 52px;
    font-weight: 700;
    margin-bottom: 23px;
  }

  .caption h2 {
    color: rgba(255, 255, 255, .75);
    font-size: 26px;
    font-weight: 300;
  }

  a.big-button {
    color: #fff;
    font-size: 19px;
    font-weight: 700;
    text-transform: uppercase;
    background: #eb7a00;
    background: rgba(255, 0, 0, 0.75);
    padding: 28px 35px;
    border-radius: 3px;
    margin-top: 80px;
    margin-bottom: 0;
    display: inline-block;
  }

  a.big-button:hover {
    text-decoration: none;
    background: rgba(255, 0, 0, 0.9);
  }

  a.view-demo {
    color: #fff;
    font-size: 21px;
    font-weight: 700;
    display: inline-block;
    margin-top: 35px;
  }

  a.view-demo:hover {
    text-decoration: none;
    color: #333;
  }

  .carousel-indicators .active {
    background: #fff;
  }

  .carousel-indicators li {
    background: rgba(255, 255, 255, 0.4);
    border-top: 20px solid;
    z-index: 15;
  }

  .carousel-inner .carousel-item {
    transition: -webkit-transform 2s ease;
    transition: transform 2s ease;
    transition: transform 2s ease, -webkit-transform 2s ease;
  }



  /* Footer */

  @import url('https://fonts.googleapis.com/css?family=Rubik&display=swap');

  body {
    font-family: 'Rubik', sans-serif;
    height: 100% !important;
    background-color: #F8F9FB !important;
  }

  .container-fluid {
    margin-top: 101px;
    color: #000 !important;
  }

  .card {
    background-color: #F8F9FB !important;
  }

  p {
    font-size: calc(12px + (14 - 12) * ((100vw - 360px) / (1600 - 360))) !important;
    display: fkex;
  }

  h3 {
    font-size: calc(24px + (30 - 24) * ((100vw - 360px) / (1600 - 360))) !important;
  }

  .social {
    font-size: 21px !important;
  }


  .color-text {
    color: #757575 !important;
  }


  button {
    font-size: calc(12px + (13 - 12) * ((100vw - 360px) / (1600 - 320))) !important;
    background-color: #2CA6FB !important;
    padding-left: calc(20px + (28 - 20) * ((100vw - 360px) / (1600 - 360))) !important;
    padding-right: calc(20px + (28 - 20) * ((100vw - 360px) / (1600 - 360))) !important;
    padding-top: calc(10px + (12 - 10) * ((100vw - 360px) / (1600 - 360))) !important;
    padding-bottom: calc(10px + (12 - 10) * ((100vw - 360px) / (1600 - 360))) !important;
  }

  button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
  }

  footer {
    color: #caced1 !important;
  }

  li {
    margin-top: 20px;
    margin-bottom: 20px;
  }

  .Careers {
    cursor: pointer;
    color: #1E88E5;
  }

  .row-1 {
    background-color: #1E242A !important;
  }

  .row-2 {

    background-color: #28323C !important;
  }
</style>

<body>
  <script>
    $(document).ready(function() {
      jQuery.fn.carousel.Constructor.TRANSITION_DURATION = 2000 // 2 seconds
    });
  </script>





  <header>

    <div id="carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active" style="background-image: url('assets/img/chem2.jpg'); background-size: cover; opacity: 0.8;">
          <div class="caption">
            <h1 style="color:yellow;">Welcome To Study Leave Control</h1>
            <h2>Make it easy for you to control students.</h2>
            <h2>College Of Applied Scinece</h2>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url('assets/img/chem3.jpg'); background-size: cover;">
          <div class="caption">
            <h1>Something and share your whatever</h1>
            <h2>Else it easy for you to do whatever this thing does.</h2>

            <a class="big-button" href="" title="">Create Project</a>
            <div class="clear"></div>
            <a class="view-demo" href="" title="">View Demo</a>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url('assets/img/chem4.jpg'); background-size: cover;">
          <div class="caption">
            <h1>Create and share your whatever</h1>
            <h2>Make it easy for you to do whatever this thing does</h2>

          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </header>


  <footer>
    <div class="container-fluid pb-0 mb-0 justify-content-center text-light ">
      <div class="row my-5 justify-content-center">
        <div class="col text-center">
          <div class="card border-0">
            <div class="card-body">
              <div class="card-title">
                <h3 class="mb-4">IN PARTNERSHIP WITH AASTU </h3>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-4 col">
                  <p class="small color-text">This piece of software can help manage and track the students </p>
                  <button type="button" class="btn btn-primary border-0 my-4">
                    <b>Contact the Dean</b>
                  </button>
                  <br> <img src="assets/img/logo 3.jpg" class="img-fluid" width="450">

                </div>

              </div>
              <br>
              <br>
              <br>

              <div class="row justify-content-center">
                <div class="col-md-4 col">
                  <div class="card-title">
                    <h3 class="mb-4">Geology </h3>
                  </div>

                  <br> <img src="assets/img/Geo.webp" class="img-fluid" width="450" height="300">
                  <br>
                  <p class="small color-text">This piece of software can help manage and track the students </p>
                  <button type="button" class="btn btn-primary border-0 my-4">
                    <b>Contact the Dean</b>
                  </button>

                </div>
                <div class="col-md-4 col">
                  <div class="card-title">
                    <h3 class="mb-4">FOOD ENGINEERING </h3>
                  </div>
                  <br> <img src="assets/img/food4.webp" class="img-fluid" width="450" height="450">
                  <br>
                  <p class="small color-text">This piece of software can help manage and track the students </p>
                  <button type="button" class="btn btn-primary border-0 my-4">
                    <b>Contact the Dean</b>
                  </button>

                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
      <footer>
        <div class="row justify-content-center mb-0 pt-5 pb-0 row-2 px-3">
          <div class="col-12">
            <div class="row row-2">
              <div class="col-sm-3 text-md-center">
                <h5><b> <img src="assets/img/Logo.jpg" width="150px" height="150px"> <span>Study leave </span></b></h5>
              </div>
              <div class="col-sm-3  my-sm-0 mt-5">
                <ul class="list-unstyled">
                  <li class="mt-0">Platform</li>
                  <li>Help Center</li>
                  <li>Security</li>
                </ul>
              </div>
              <div class="col-sm-3  my-sm-0 mt-5">
                <ul class="list-unstyled">
                  <li class="mt-0">Customers</li>
                  <li>Use Cases</li>
                  <li>Customers Services</li>
                </ul>
              </div>
              <div class="col-sm-3  my-sm-0 mt-5">
                <ul class="list-unstyled">
                  <li class="mt-0">Company</li>
                  <li>About</li>
                  <li>Careers- <span class="Careers">We're-hiring</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-0 pt-0 row-1 mb-0  px-sm-3 px-2">
          <div class="col-12">
            <div class="row my-4 row-1 no-gutters">
              <div class="col-sm-3 col-auto text-center"><small>&#9400; Erimias Siraye 2022</small></div>
              <div class="col-md-3 col-auto "></div>
              <div class="col-md-3 col-auto"></div>
              <div class="col  my-auto text-md-left  text-right "> <small> erimias46@gmail.com <a href="http://twiter"></a><span><img src="https://i.imgur.com/TtB6MDc.png" class="img-fluid " width="25"></span> <span><img src="https://i.imgur.com/N90KDYM.png" class="img-fluid " width="25"></span></small> </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </footer>
</body>

</html>