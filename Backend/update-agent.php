<?php 
    require_once './db/config.php';
    session_start();

    if (!isset($_SESSION['Username'])) {
      header('Location:../Home Page/Home.php');
    }

    if ($_SESSION['type'] != 1) {
      header('Location:index.php');
    }
    ini_set('display_errors',0);

    $agent_id = $_SESSION['Agent_ID'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Management System - SwiftShip</title>
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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


<?php require_once './forms/header.php'?>

<?php 

if (isset($_GET['agent_id'])) {
  $a_id = $_GET['agent_id'];

  $sql = "SELECT * FROM user WHERE id = '$a_id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $a_name = $row['username'];
    $a_mail = $row['email'];
    $a_num = $row['Number'];
    $a_pass = $row['Password'];
  }

  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    $sql = "UPDATE `user` SET `username`='$username',`email`='$email',`Number`='$number',`Password`='$password' WHERE `user`.`id` = $a_id";
    $result = $conn->query($sql);

    if ($result) {
      echo 
      "<script>
        alert('Info Updated!')
        window.location.href = 'view-agents.php';
      </script>";
    } else {
        echo "<script>alert('Update failed!')</script>";
    }
  }
}
?>
  <main id="main" class="main">

    <section class="section dashboard">
                  <form class="row g-3 needs-validation" method="POST" novalidate>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Username</label>
                      <input type="text" name="username" class="form-control" id="yourStreet" value="<?php echo $a_name?>">
                      <div class="invalid-feedback">Please enter Username!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourCity" value="<?php echo $a_mail?>">
                      <div class="invalid-feedback">Please enter Email!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Number</label>
                      <input type="number" name="number" class="form-control" id="yourCountry" value="<?php echo $a_num?>">
                      <div class="invalid-feedback">Please enter your Number!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="text" name="password" class="form-control" id="yourZipCode" value="<?php echo $a_pass?>">
                      <div class="invalid-feedback">Please enter password</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="submit" type="submit">Update Info</button>
                    </div>
                  </form>
    </section>

  </main><!-- End #main -->

  <?php require_once './forms/sidebar.php'?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <?php require_once './forms/footbar.php'?>
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