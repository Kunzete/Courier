<?php
// Start the session
session_start();

// Include the config file
require_once './db/config.php';

// Check if the user is logged in
if (!isset($_SESSION['Username'])) {
    header('Location:../index.php');
}
if ($_SESSION['type'] == 1 || $_SESSION['type'] == 2) {
    
}else{
  header('Location:index.php');
}
ini_set('display_errors',0);

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
 <link href="assets/img/favicon.png" rel="icon">
 <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
        <h1>Reports</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?Home">Home</a></li>
            <li class="breadcrumb-item active">Reports</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    <?php }?>
        
    <br>

    <?php if($_SESSION['type'] == 1 || $_SESSION['type'] == 2){?>
      <div class="card">

        <div class="card-body rounded-top-1 border-3 border-top border-primary">

            <form method="POST" class="d-flex justify-content-between mt-4 mb-2">

            <div class="col-12" style="width:20%;">
              
              <b>From Date</b>
              <input type="date"  name="from" id="from" class="form-control form-control-sm">

            </div>

            <div class="col-12" style="width:20%;">
              
              <b>To Date</b>
              <input type="date"  name="to" id="to" class="form-control form-control-sm">

            </div>

            <div class="col-12" style="width:20%;">
              
              <b>To</b>

              <select name="city" id="city" class="form-select form-select-sm" aria-label=".form-select-sm example" style="width:100%;" required>
                <option selected>City</option>
                <option value="1">Karachi</option>
                <option value="2">Mianwali</option>
                <option value="3">Sialkot</option>
              </select>
              
            </div>

            <div class="col-12" style="width:20%;">

              <a href="download.php" class="btn btn-primary btn-sm" style="margin-top:9%; margin-left:40%;">download</a>

            </div>


            </form>

          
          </div>


      </div>

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