<?php 
    require_once './db/config.php';
    session_start();
    if (!isset($_SESSION['Username'])) {
      header('Location:../Home Page/Home.php');
    }

    if ($_SESSION['type'] == 1 || $_SESSION['type'] == 2) {
    
    }else{
      header("Location:index.php");
    }
    ini_set('display_errors',0);

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
  if (isset($_GET['courier_id'])) {
    $cour_id = $_GET['courier_id'];

    $sql = "SELECT * FROM parcels WHERE `id`='$cour_id';";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $raw = $res->fetch_assoc();
        $send_name = $raw['sender_name'];
        $send_address = $raw['sender_address'];
        $send_num = $raw['sender_contact'];
        $recp_name = $raw['recipient_name'];
        $recp_address = $raw['recipient_address'];
        $recp_num = $raw['recipient_contact'];
      }
      if(isset($_POST['update_parcel'])) {
        $sname = $_POST['s_name'];
        $saddress = $_POST['s_address'];
        $snum = $_POST['s_num'];
        $rname = $_POST['r_name'];
        $raddress = $_POST['r_address'];
        $rnum = $_POST['r_num'];
        $status = $_POST['status'];
  
        $sql = "UPDATE `parcels` SET `sender_name`='$sname',`sender_address`='$saddress',`sender_contact`='$snum',`recipient_name`='$rname',`recipient_address`='$raddress',`recipient_contact`='$rnum',`status`='$status' WHERE
        `parcels`.`id` = '$cour_id'";
        $result = $conn->query($sql);
  
        if ($result) {
          echo 
          "<script>
            alert('Info Updated!')
            window.location.href = 'courier.php';
          </script>";
        } else {
            echo "<script>alert('Update failed!')</script>";
        }
      }
    }
?>
  <main id="main" class="main">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Add new</h5>

                  <hr>

                  <div class="form d-flex flex-row container">

                 <form class="row g-5 needs-validation " method="POST" novalidate>

                  <div class="d-flex flex-row">

                    <div class="sender container-fluid">

                    <div class="col-12">
                      <label for="yourName" class="form-label"><b>Sender Name</b></label>
                      <input type="text" name="s_name" class="form-control" id="BranchCode" value="<?php echo $send_name?>" required>
                      <div class="invalid-feedback">Please, enter name!</div>
                    </div>
  
                    <div class="col-12">
                      <label for="yourEmail" class="form-label"><b>Sender Address</b></label>
                      <input type="text" name="s_address" class="form-control" id="yourStreet" value="<?php echo $send_address?>" required>
                      <div class="invalid-feedback">Please enter address!</div>
                    </div>
  
                    <div class="col-12">
                      <label for="yourEmail" class="form-label"><b>Sender Contact#</b></label>
                      <input type="number" name="s_num" class="form-control" id="yourCity" value="<?php echo $send_num?>" required>
                      <div class="invalid-feedback">Please enter number!</div>
                    </div>

                    </div>

                    <div class="recipient container-fluid">

                    <div class="col-12">
                      <label for="yourName" class="form-label"><b>Reciever Name</b></label>
                      <input type="text" name="r_name" class="form-control" id="BranchCode" value="<?php echo $recp_name?>" required>
                      <div class="invalid-feedback">Please, enter your Reciever Name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label"><b>Reciever Address</b></label>
                      <input type="text" name="r_address" class="form-control" id="yourStreet" value="<?php echo $recp_address?>" required>
                      <div class="invalid-feedback">Please enter address!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label"><b>Reciever Contact#</b></label>
                      <input type="number" name="r_num" class="form-control" id="yourCity" value="<?php echo $recp_num?>" required>
                      <div class="invalid-feedback">Please enter number!</div>
                    </div>

                    </div>
                    


                  </div>


                    <div class="col-12">
                      <label for="yourName" class="form-label">Status:</label required>
                      <select name="status" id="status" class="form-select">
                        <option disabled selected>Select status</option>
                        <option value="1">Shipped</option>
                        <option value="2">In Process</option>
                        <option value="3">Delivered</option>
                      </select>
                    </div>
                    
                    <div class="col-12">
                    <button type="submit" name="update_parcel" class="btn btn-dark btn-outline-success mt-4" style="width: 100%;">Submit</button>
                    </div>

                  </form>
                  
                  </div>

                  </div>
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