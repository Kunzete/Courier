<?php

  require_once './db/config.php';
  session_start();
  ini_set('display_errors',0);

  $user_id = $_SESSION['id'];
  $sql = "SELECT * FROM user WHERE id = '$user_id';";
  $result = $conn->query($sql);
                
  if ($result->num_rows > 0) {
    $detail = $result->fetch_assoc();
  }


if (!isset($_SESSION['Username'])) {
  header('Location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile - SwiftShip</title>
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
<?php require_once './forms/sidebar.php'?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php 
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM user WHERE id = '$id'";
            $result = $conn->query($sql);

            if ($result == TRUE) {
              while ($row = $result->fetch_assoc()) {
                $image = $row['image'];
              }
            }
    ?>

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="uploads/<?php echo $image; ?>" height="100" width="100" title="<?php echo $image; ?>" class="rounded-circle border border-dark">
              <h2><?php echo $detail['username'];?></h2>
              <h3><?php echo $detail['email'];?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>

              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Username</div>
                    <div class="col-lg-9 col-md-8"><?php echo $detail['username'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $detail['email'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone No.</div>
                    <div class="col-lg-9 col-md-8"><?php echo $detail['Number'] ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

<?php 

  if (isset($_POST['Enter'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['phone'];
    $uid = $_SESSION['id']; 
  
      $sql = "UPDATE `user` SET `username`='$username',`email`='$email',`Number`='$number' WHERE id = '$uid'";
      $result = $conn->query($sql);
  
      if($result){
        echo 
        "<script>
          alert('Info Updated!')
          window.location.href = 'profile.php';
        </script>";
      }
  }

  if (isset($_POST['update_image'])) {      
      $name = $_POST["name"];
      if($_FILES["image"]["error"] == 4){
        echo
        "<script> alert('Image Does Not Exist'); </script>"
        ;
      }
      else{
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
    
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if ( !in_array($imageExtension, $validImageExtension) ){
          echo
          "
          <script>
            alert('Invalid Image Extension');
          </script>
          ";
        }
        else if($fileSize > 100000000000){
          echo
          "
          <script>
            alert('Image Size Is Too Large');
          </script>
          ";
        }
        else{
          $newImageName = uniqid();
          $newImageName .= '.' . $imageExtension;
    
          move_uploaded_file($tmpName, 'uploads/' . $newImageName);
        }
      }

        
      $sql = "UPDATE `user` SET `image` = '$newImageName';";
      $result = $conn->query($sql);
  
      if($result){
        echo 
        "<script>
          alert('Image Uploaded')
          window.location.href = 'profile.php';
        </script>";
      }
    }
?>

                  <!-- Profile Edit Form -->
                  <form method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                      <img src="uploads/<?php echo $image; ?>" height="100" width="100" title="<?php echo $image; ?>" class="rounded-circle border border-dark">
                      <br>
                      <br>
                      <input type="file" name="image" accept=".jpg, .jpeg, .png" class="form-control">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="fullName" value="<?php echo $detail['username']?>">
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" id="fullName" value="<?php echo $detail['email'] ?>">
                      </div>
                    </div>

 
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="number" class="form-control" id="Phone" value="<?php echo $detail['Number'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-12 d-flex">
                        
                        <div class="text-center">
                          <button type="submit" name="Enter" class="btn btn-sm btn-primary">Save Changes</button>
                        </div>

                        <div class="text-center ms-2">
                          <button type="submit" name="update_image" class="btn btn-sm btn-primary">Update Image</button>
                        </div>
                        
                      </div>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->

<?php 

  if (isset($_POST['submit'])) {
    $pass = $_POST['password'];
    $npass = $_POST['newpassword'];
    $cpass = $_POST['renewpassword'];
    $uid = $_SESSION['id'];

    $sql = "SELECT Password FROM user WHERE id = '$uid' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
    }

    if ($pass !== $row['Password']) {
      echo "<script>alert('Current password dont match')</script>";
    }else{
      if ($npass == $cpass) {        

        $sql = "UPDATE `user` SET `Password` = '$npass' WHERE `user`.`id` = '$uid';";
        $result = $conn->query($sql);

        if($result){
          echo 
          "<script>
            alert('Password Changed')
            window.location.href = 'profile.php';
          </script>";
        }else{
          echo "<script>alert('New password and Current password dont match!!')</script>";
        }
      }
    }

  }

?>

                  <form method="POST">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="text" class="form-control" id="currentPassword" required>
                        <div class="invalid-feedback">Please enter your current password</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="pass" type="checkbox" value="" onclick="PassToggle()">Show password
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                    <script>
                  function PassToggle() {
                    let x = document.getElementById("newPassword");
                    let y = document.getElementById("renewPassword");

                    if (x.type === "password") {
                      x.type = "text";
                    } else {
                      x.type = "password";
                    }

                    if (y.type === "password") {
                      y.type = "text";
                    } else {
                      y.type = "password";
                    }
                  }
                    </script>
                    
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Dream Maker's</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    </div>
  </footer><!-- End Footer -->

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