<?php
// Start the session
session_start();

ini_set('display_errors',0);

// Include the config file
require_once './db/config.php';

// Check if the user is logged in
if (!isset($_SESSION['Username'])) {
    header('Location:../index.php');
}

$b_id = $_SESSION['b_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta content="width=device-width, initial-scale=1.0" name="viewport">

 <title>Dashboard -SwiftShip</title>
 <meta content="" name="description">
 <meta content="" name="keywords">

 <!-- Favicons -->
 <link href="assets/img/logo.png" rel="icon">
 <link href="assets/img/logo.png" rel="apple-touch-icon">

 <!-- Google Fonts -->
 <link href="https://fonts.gstatic.com" rel="preconnect">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 <!-- Vendor CSS Files -->
 <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
 <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
 <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
 <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
 <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
 <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

 <!-- Template Main CSS File -->
 <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

 <!-- Include header and Sidebar-->
 <?php require_once './forms/header.php'?>
 <?php require_once './forms/sidebar.php'?>

 <main id="main" class="main">

    <?php if ($_SESSION['type'] == 1 || $_SESSION['type'] == 2) {?>
      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?Home">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    <?php }?>

    <?php if($_SESSION['type'] == 1){?>

      <div class="row row-cols-1 row-cols-md-3 g-5">

        <div class="col">
          <div class="card border border-dark">
            <div class="card-body text-center p-5">
              <h5 class="card-title">
                <?php 
                  $sql = "SELECT * FROM user WHERE type = '3'";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo 'Total Users: '.mysqli_num_rows($result).'';
                  }
                ?>
              </h5>
            </div>
          </div>
        </div>
        

        <div class="col">
          <div class="card border border-dark">
            <div class="card-body text-center p-5">
              <h5 class="card-title">
                <?php 
                  $sql = "SELECT * FROM user WHERE type = '2'";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo 'Total Agents: '.mysqli_num_rows($result).'';
                  }
                ?>
              </h5>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card border border-dark">
            <div class="card-body text-center p-5">
              <h5 class="card-title">
                <?php 
                  $sql = "SELECT * FROM branches";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo 'Total branches: '.mysqli_num_rows($result).'';
                  }
                ?>
              </h5>
            </div>
          </div>
        </div>
 

        <div class="col">
          <div class="card border border-dark">
            <div class="card-body text-center p-5">
              <h5 class="card-title">
                <?php 
                  $sql = "SELECT * FROM parcels";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo 'Total Couriers: '.mysqli_num_rows($result).'';
                  }
                ?>
              </h5>
            </div>
          </div>
        </div>
 

        <div class="col">
          <div class="card border border-dark">
            <div class="card-body text-center p-5">
              <h5 class="card-title">
                <?php 
                  $sql = "SELECT * FROM parcels WHERE status = '0'";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo 'Shipped: '.mysqli_num_rows($result).'';
                  }
                ?>
              </h5>
            </div>
          </div>
        </div>
 

        <div class="col">
          <div class="card border border-dark">
            <div class="card-body text-center p-5">
              <h5 class="card-title">
                <?php 
                  $sql = "SELECT * FROM parcels WHERE status = '1'";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo 'In Process: '.mysqli_num_rows($result).'';
                  }
                ?>
              </h5>
            </div>
          </div>
        </div>
 

        <div class="col">
          <div class="card border border-dark">
            <div class="card-body text-center p-5">
              <h5 class="card-title">
                <?php 
                  $sql = "SELECT * FROM parcels WHERE status = '2'";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo 'Delivered: '.mysqli_num_rows($result).'';
                  }
                ?>
              </h5>
            </div>
          </div>
        </div>
 
      </div>
      
    <?php }?>

    <?php if($_SESSION['type'] == 2){?>

      <div class="row row-cols-1 row-cols-md-3 g-5">     

        <div class="col">
          <div class="card border border-dark">
            <div class="card-body text-center p-5">
              <h5 class="card-title">
                <?php 
                  $sql = "SELECT * FROM parcels WHERE from_branch_id = '$b_id'";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo 'All Courier: '.mysqli_num_rows($result).'';
                  }
                ?>
              </h5>
            </div>
          </div>
        </div>
        
        <div class="col">
          <div class="card border border-dark">
            <div class="card-body text-center p-5">
              <h5 class="card-title">
                <?php 
                  $sql = "SELECT * FROM parcels WHERE status = '1' AND from_branch_id = '$b_id'";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo 'Shipped: '.mysqli_num_rows($result).'';
                  }
                ?>
              </h5>
            </div>
          </div>
        </div>
 

        <div class="col">
          <div class="card border border-dark">
            <div class="card-body text-center p-5">
              <h5 class="card-title">
                <?php 
                  $sql = "SELECT * FROM parcels WHERE status = '2' AND from_branch_id = '$b_id'";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo 'In Process: '.mysqli_num_rows($result).'';
                  }
                ?>
              </h5>
            </div>
          </div>
        </div>
 

        <div class="col">
          <div class="card border border-dark">
            <div class="card-body text-center p-5">
              <h5 class="card-title">
                <?php 
                  $sql = "SELECT * FROM parcels WHERE status = '3' AND from_branch_id = '$b_id'";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo 'Delivered: '.mysqli_num_rows($result).'';
                  }
                ?>
              </h5>
            </div>
          </div>
        </div>
 
      </div>
      
    <?php }?>

    <?php if ($_SESSION['type'] == 3) {?>
      <section class="section dashboard">
        <br>
        <h4>Tracking Number:</h4>
        <?php
          if (isset($_POST['submit_track'])) {
            $track = $_POST['track'];

            $sql = "SELECT * FROM parcels WHERE reference_number = '$track'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              echo
              "<script>
              alert('Tracking Successfull!')
              window.location.href = '../track.php';
            </script>";
            while ($row = $result->fetch_assoc()) {
              $_SESSION['Courier_ID'] = $row['id']; 
              $_SESSION['Courier_status'] = $row['status'];
              $_SESSION['from_branch'] = $row['from_branch_id'];
              $_SESSION['to_branch'] = $row['to_branch_id'];
            }
            }$_SESSION['track'] = $track;
          }
        ?>
        <form class="form-inline my-2 my-lg-3" method="POST">
          <input class="form-control mr-sm-2" type="search" name="track" placeholder="Search" aria-label="Search">
          <br>
          <button class="btn btn-outline-primary my-2 my-sm-0 my-2 col-12" name="submit_track" type="submit">Search</button>
        </form>
      </section>
    <?php }?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

 </body>

</html>