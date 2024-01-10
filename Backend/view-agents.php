<?php 
  session_start();

  require_once './db/config.php';
  if ($_SESSION['type'] != 1) {
    header('Location:index.php');
  }
  if (!isset($_SESSION['Username'])) {
    header('Location:../index.php');
  }
  ini_set('display_errors',0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Agents - SwiftShip</title>
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

  <main id="main" class="main">

  <section class="section dashboard">
    <br>
    <h3>Agents:</h3>
    <br>
  <table class="table table-light table-hover">
  <thead>
    <tr>
      <th scope="col">Branch_ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Number</th>
      <th scope="col">City</th>
      <th scope="col">Password</th>
      <th scope="col">Date Created</th>
      <th scope="col">Edit/Delete</th>
    </tr>
  </thead>  
<?php 
    $sql = "SELECT * FROM user WHERE type='2'";
    $result = $conn->query($sql);

    if ($result) {
        while ($raw = $result->fetch_assoc()) 
        {
            $branch_id = $raw['branch_id'];
            $id = $raw['id'];
            $username = $raw['username'];
            $email = $raw['email'];
            $number = $raw['Number'];
            $password = $raw['Password'];
            $city = $raw['city'];
            $date = $raw['date_created'];
?>

  
  <tbody>
    <tr>
    <td><?php echo $branch_id?></td>
      <td><?php echo $username;?></td>
      <td><?php echo $email;?></td>
      <td><?php echo $number;?></td>
      <td><?php echo $city;?></td>
      <td><?php echo $password;?></td>
      <td><?php echo $date;?></td>
      <td><a href="update-agent.php?agent_id=<?php echo $id;?>" class="btn btn-primary btn-sm rouded-5"><i class="bi bi-pencil-fill"></i></a>
      <a href="delete-agent.php?agent_id=<?php echo $id;?>" class="btn btn-danger btn-sm rouded-5 m-2"><i class="bi bi-trash"></i></a></td>
    </tr>
  </tbody>

<?php 
        }
        $_SESSION['Agent_ID'] = $id;
        $_SESSION['branch_id'] = $branch_id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['number'] = $number;
        $_SESSION['password'] = $password;
    }
?>
</table>
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