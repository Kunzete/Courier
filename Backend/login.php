<?php 

  require_once './db/config.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - SwiftShip</title>
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

<?php

 // Check if the submit button has been clicked
 if(isset($_POST['submit'])) {
    // Get the values from the form using the $_POST array
    function sec($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    $username = sec($_POST['username']);
    $password = sec($_POST['password']);

    // Query the database to fetch user details based on the username and password from the user table
    $sql = "SELECT * FROM user WHERE username='$username' AND Password='$password';";
    $result = $conn->query($sql);

    // Check if the query returned any results (i.e., a user with the given username and password was found)
    if ($result->num_rows > 0) {
      // If a result was found, store the user details in an array
      while ($row = $result->fetch_assoc()) {
        $user_name = $row['username'];
        $user_pass = $row['Password'];
        $user_email = $row['email'];
        $user_num = $row['Number'];
        $user_id = $row['id'];
        $user_role = $row['type'];
      }
      if ($user_name == $username && $user_pass == $password && $user_role == 2) {
        // If the username and password match, start a session and store the user details in session variables
        $_SESSION['Username'] = $user_name;
        $_SESSION['Email'] = $user_email;
        $_SESSION['Number'] = $user_num;
        $_SESSION['id'] = $user_id;
        $_SESSION['Password'] = $user_pass;
        $_SESSION['type'] = $user_role;

        // Redirect the user to a secure page after successful login
        echo 
        "<script>
          alert('It looks like you are an Agent!')
          window.location.href = 'Agent Login.php';
        </script>";
        exit();

      }
      else
      {
            // Check if the username and password from the database match the entered data
            if ($user_name == $username && $user_pass == $password) {
              // If the username and password match, start a session and store the user details in session variables
              $_SESSION['Username'] = $user_name;
              $_SESSION['Email'] = $user_email;
              $_SESSION['Number'] = $user_num;
              $_SESSION['id'] = $user_id;
              $_SESSION['Password'] = $user_pass;
              $_SESSION['type'] = $user_role;
      
              // Redirect the user to a secure page after successful login
              echo 
              "<script>
                alert('Login Successfull!')
                window.location.href = 'index.php';
              </script>";
              exit();
            } else {
              // If the username and password do not match, display an error message
              echo "<script>alert('Invalid Username or Password. Please try again.');</script>";
            }  
      }


    } else {
      // If no user was found with the given username and password, display an error message
      echo "<script>alert('No User Found. Please check your username and password.');</script>";
    }
 }

?>


  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="../index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">SwiftShip</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="pass" type="checkbox" value="" onclick="PassToggle()">Show password
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="submit" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Are you an Agent? <a href="Agent Login.php">Login as Agent</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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
  <script>
function PassToggle() {
  var x = document.getElementById("yourPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>

</body>

</html>