<?php

  require_once './db/config.php';
  session_start();
  ini_set('display_errors',0);


  if ($_SESSION['type'] == 1 || $_SESSION['type'] == 2) {
    
  }else{
    header('Location:index.php');
  }
?>
<?php

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

  <title>Courier - SwiftShip</title>
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
      <h1>Courier</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Courier</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- ADMIN Courier -->
    <?php if ($_SESSION['type'] == 1):?>
      <section class="section profile">
      <div class="row">

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Add new</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#list-all">List all</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#list-shipped">Shipped</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#list-progress">In Progress</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#list-delivered">Delivered</button>
                </li>

              </ul>
              
              <!-- Add Parcel -->
              <div class="tab-content pt-3">

              <!-- php code -->

              <?php 
              
              if (isset($_POST['new_parcel'])) {
                  $ref_num = $_POST['reference_num'];
                  $s_name = $_POST['s_name'];
                  $s_address = $_POST['s_address'];
                  $s_num = $_POST['s_num'];
                  $r_name = $_POST['r_name'];
                  $r_address = $_POST['r_address'];
                  $r_num = $_POST['r_num'];
                  $from = $_POST['from'];
                  $to = $_POST['to'];

                  $sql = "INSERT INTO `parcels` (`id`, `reference_number`, `sender_name`, `sender_address`, `sender_contact`, `recipient_name`, `recipient_address`, `recipient_contact`, `from_branch_id`, `to_branch_id`, `status`, `date_created`) 
                  VALUES (NULL, '$ref_num', '$s_name', '$s_address', '$s_num', '$r_name', '$r_address', '$r_num', '$from', '$to', '1', current_timestamp());";

                  $result = $conn->query($sql);
                  if ($result) {
                    echo "<script>alert('added')</script>";
                  }


              }

            ?>

              <!-- php code end -->

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Add new</h5>

                  <hr>

                  <form class="row g-5 needs-validation " method="POST" novalidate>

                  <div class="d-flex flex-row">

                    <div class="sender container-fluid">

                    <div class="col-12">
                      <label for="yourName" class="form-label"><b>Sender Name</b></label>
                      <input type="text" name="s_name" class="form-control" id="BranchCode" required>
                      <div class="invalid-feedback">Please, enter name!</div>
                    </div>
  
                    <div class="col-12">
                      <label for="yourEmail" class="form-label"><b>Sender Address</b></label>
                      <input type="text" name="s_address" class="form-control" id="yourStreet" required>
                      <div class="invalid-feedback">Please enter address!</div>
                    </div>
  
                    <div class="col-12">
                      <label for="yourEmail" class="form-label"><b>Sender Contact#</b></label>
                      <input type="number" name="s_num" class="form-control" id="yourCity" required>
                      <div class="invalid-feedback">Please enter number!</div>
                    </div>

                    </div>

                    <div class="recipient container-fluid">

                    <div class="col-12">
                      <label for="yourName" class="form-label"><b>Reciever Name</b></label>
                      <input type="text" name="r_name" class="form-control" id="BranchCode" required>
                      <div class="invalid-feedback">Please, enter your Reciever Name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label"><b>Reciever Address</b></label>
                      <input type="text" name="r_address" class="form-control" id="yourStreet" required>
                      <div class="invalid-feedback">Please enter address!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label"><b>Reciever Contact#</b></label>
                      <input type="number" name="r_num" class="form-control" id="yourCity" required>
                      <div class="invalid-feedback">Please enter number!</div>
                    </div>

                    </div>
                    


                  </div>

                    

                    <div class="col-12">
                      <label for="yourName" class="form-label">From Branch:</label>
                      <select name="from" id="branch_id" class="form-select" required>
                        <option value="" selected>Select branch...</option>
                        <option value="1">vzTL0PqMogyOWhF | Branch 1, Karachi</option>
                        <option value="2">KyIab3mYBgAX71t | Branch 2, Mianwali</option>
                        <option value="3">dIbUK5mEh96f0Zc | Branch 3, Sialkot</option>
                      </select>
                    </div>
                    

                    <div class="col-12">
                      <label for="yourName" class="form-label">To Branch:</label>
                      <select name="to" id="branch_id" class="form-select" required>
                        <option value="" selected>Select branch...</option>
                        <option value="1">vzTL0PqMogyOWhF | Branch 1, Karachi</option>
                        <option value="2">KyIab3mYBgAX71t | Branch 2, Mianwali</option>
                        <option value="3">dIbUK5mEh96f0Zc | Branch 3, Sialkot</option>
                      </select>
                    </div>
                    
                    <div class="col-12">
                    <button type="submit" name="new_parcel" class="btn btn-dark btn-outline-success mt-4" style="width: 100%;">Submit</button>
                    </div>

                    <input type="text" hidden name="reference_num" class="form-control" id="random" required>
                    

                    
                    <script>
                        function randomNumber(len) {
                        var randomNumber;
                        var n = '';

                        for (var count = 0; count < len; count++) {
                            randomNumber = Math.floor(Math.random() * 10);
                            n += randomNumber.toString();
                        }
                        return n;
                        }

                        document.getElementById("random").value = randomNumber(12);
                    </script>

                  </form>

                  </div>

              </div>

              <!-- List all parcel -->
              <div class="tab-content pt-3">
                <!-- Checkout Section -->
                <div class="tab-pane fade list-all" id="list-all">
                  <section class="section dashboard">
                    <br>
                    <h3>Parcels:</h3>
                    <br>
                  <table class="table table-light table-hover">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">ID</th>
                      <th scope="col" class="text-center">Reference Number</th>
                      <th scope="col" class="text-center">Sender Name</th>
                      <th scope="col" class="text-center">Recipient Name</th>
                      <th scope="col" class="text-center">Status</th>
                      <th scope="col" class="text-center">Date Created</th>
                      <th scope="col" class="text-center">Edit/Delete</th>
                    </tr>
                  </thead>  
                <?php 
                    $sql = "SELECT * FROM parcels";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($raw = $result->fetch_assoc()) 
                        {
                            $courier_id = $raw['id'];
                            $p_ref_num = $raw['reference_number'];
                            $sender_name = $raw['sender_name'];
                            $sender_address = $raw['sender_address'];
                            $sender_num = $raw['sender_contact'];
                            $rec_name = $raw['recipient_name'];
                            $rec_address = $raw['recipient_address'];
                            $rec_num = $raw['recipient_contact'];
                            $from_b = $raw['from_branch_id'];
                            $to_b = $raw['to_branch_id'];
                            $status = $raw['status'];
                            $date = $raw['date_created'];
                ?>

                  
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $courier_id?></td>
                      <td class="text-center"><?php echo $p_ref_num;?></td>
                      <td class="text-center"><?php echo $sender_name;?></td>
                      <td class="text-center"><?php echo $rec_name;?></td>
                      <td class="text-center">

                        <?php

                          if ($status == 1) {
                            echo "<p class='bg-primary text-light rounded-5 p-1'>Shipped</p>";
                          }elseif ($status == 2) {
                            echo "<p class='bg-danger text-light rounded-5 p-1'>In Process</p>";
                          }elseif ($status == 3) {
                            echo "<p class='bg-success text-light rounded-5 p-1'>Delivered</p>";
                          }

                        ?>

                      </td>
                      <td class="text-center"><?php echo $date;?></td>
                      <td class="text-center"><a href="update-parcel.php?courier_id=<?php echo $courier_id;?>" class="me-1 btn btn-primary"><i class="bi bi-arrow-clockwise"></i></a>
                      <a href="delete-parcel.php?courier_id=<?php echo $courier_id;?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                    </tr>
                  </tbody>

                <?php 
                        }
                        $_SESSION['C_ID'] = $courier_id;
                    }
                ?>
                </table>
                  </section>
                </div>

              <!-- List Shipped -->
                <div class="tab-pane fade list-shipped" id="list-shipped">
                  <section class="section dashboard">
                    <br>
                    <h3>Shipped:</h3>
                    <br>
                  <table class="table table-light table-hover">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">ID</th>
                      <th scope="col" class="text-center">Reference Number</th>
                      <th scope="col" class="text-center">Sender Name</th>
                      <th scope="col" class="text-center">Recipient Name</th>
                      <th scope="col" class="text-center">Status</th>
                      <th scope="col" class="text-center">Date Created</th>
                      <th scope="col" class="text-center">Edit/Delete</th>
                    </tr>
                  </thead>  
                <?php 
                    $sql = "SELECT * FROM parcels WHERE status = '1'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($raw = $result->fetch_assoc()) 
                        {
                            $courier_id = $raw['id'];
                            $p_ref_num = $raw['reference_number'];
                            $sender_name = $raw['sender_name'];
                            $sender_address = $raw['sender_address'];
                            $sender_num = $raw['sender_contact'];
                            $rec_name = $raw['recipient_name'];
                            $rec_address = $raw['recipient_address'];
                            $rec_num = $raw['recipient_contact'];
                            $from_b = $raw['from_branch_id'];
                            $to_b = $raw['to_branch_id'];
                            $status = $raw['status'];
                            $date = $raw['date_created'];
                ?>

                  
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $courier_id?></td>
                      <td class="text-center"><?php echo $p_ref_num;?></td>
                      <td class="text-center"><?php echo $sender_name;?></td>
                      <td class="text-center"><?php echo $rec_name;?></td>
                      <td class="text-center">

                        <?php

                          if ($status == 1) {
                            echo "<p class='bg-primary text-light rounded-5 p-1'>Shipped</p>";
                          }elseif ($status == 2) {
                            echo "<p class='bg-danger text-light rounded-5 p-1'>In Process</p>";
                          }elseif ($status == 3) {
                            echo "<p class='bg-success text-light rounded-5 p-1'>Delivered</p>";
                          }

                        ?>

                      </td>
                      <td class="text-center"><?php echo $date;?></td>
                      <td class="text-center"><a href="update-parcel.php?courier_id=<?php echo $courier_id;?>" class="me-1 btn btn-primary"><i class="bi bi-arrow-clockwise"></i></a>
                      <a href="delete-parcel.php?courier_id=<?php echo $courier_id;?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                    </tr>
                  </tbody>

                <?php 
                        }
                        $_SESSION['C_ID'] = $courier_id;
                    }
                ?>
                </table>
                  </section>
                </div>

              <!-- In Process -->
                <div class="tab-pane fade list-progress" id="list-progress">
                  <section class="section dashboard">
                    <br>
                    <h3>In Process:</h3>
                    <br>
                  <table class="table table-light table-hover">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">ID</th>
                      <th scope="col" class="text-center">Reference Number</th>
                      <th scope="col" class="text-center">Sender Name</th>
                      <th scope="col" class="text-center">Recipient Name</th>
                      <th scope="col" class="text-center">Status</th>
                      <th scope="col" class="text-center">Date Created</th>
                      <th scope="col" class="text-center">Edit/Delete</th>
                    </tr>
                  </thead>  
                <?php 
                    $sql = "SELECT * FROM parcels WHERE status = '2'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($raw = $result->fetch_assoc()) 
                        {
                            $courier_id = $raw['id'];
                            $p_ref_num = $raw['reference_number'];
                            $sender_name = $raw['sender_name'];
                            $sender_address = $raw['sender_address'];
                            $sender_num = $raw['sender_contact'];
                            $rec_name = $raw['recipient_name'];
                            $rec_address = $raw['recipient_address'];
                            $rec_num = $raw['recipient_contact'];
                            $from_b = $raw['from_branch_id'];
                            $to_b = $raw['to_branch_id'];
                            $status = $raw['status'];
                            $date = $raw['date_created'];
                ?>

                  
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $courier_id?></td>
                      <td class="text-center"><?php echo $p_ref_num;?></td>
                      <td class="text-center"><?php echo $sender_name;?></td>
                      <td class="text-center"><?php echo $rec_name;?></td>
                      <td class="text-center">

                        <?php

                          if ($status == 1) {
                            echo "<p class='bg-primary text-light rounded-5 p-1'>Shipped</p>";
                          }elseif ($status == 2) {
                            echo "<p class='bg-danger text-light rounded-5 p-1'>In Process</p>";
                          }elseif ($status == 3) {
                            echo "<p class='bg-success text-light rounded-5 p-1'>Delivered</p>";
                          }

                        ?>

                      </td>
                      <td class="text-center"><?php echo $date;?></td>
                      <td class="text-center"><a href="update-parcel.php?courier_id=<?php echo $courier_id;?>" class="me-1 btn btn-primary"><i class="bi bi-arrow-clockwise"></i></a>
                      <a href="delete-parcel.php?courier_id=<?php echo $courier_id;?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                    </tr>
                  </tbody>

                <?php 
                        }
                        $_SESSION['C_ID'] = $courier_id;
                    }
                ?>
                </table>
                  </section>
                </div>

              <!-- Delivered -->
                <div class="tab-pane fade list-delivered" id="list-delivered">
                  <section class="section dashboard">
                    <br>
                    <h3>Delivered:</h3>
                    <br>
                  <table class="table table-light table-hover">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">ID</th>
                      <th scope="col" class="text-center">Reference Number</th>
                      <th scope="col" class="text-center">Sender Name</th>
                      <th scope="col" class="text-center">Recipient Name</th>
                      <th scope="col" class="text-center">Status</th>
                      <th scope="col" class="text-center">Date Created</th>
                      <th scope="col" class="text-center">Edit/Delete</th>
                    </tr>
                  </thead>  
                <?php 
                    $sql = "SELECT * FROM parcels WHERE status = '3'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($raw = $result->fetch_assoc()) 
                        {
                            $courier_id = $raw['id'];
                            $p_ref_num = $raw['reference_number'];
                            $sender_name = $raw['sender_name'];
                            $sender_address = $raw['sender_address'];
                            $sender_num = $raw['sender_contact'];
                            $rec_name = $raw['recipient_name'];
                            $rec_address = $raw['recipient_address'];
                            $rec_num = $raw['recipient_contact'];
                            $from_b = $raw['from_branch_id'];
                            $to_b = $raw['to_branch_id'];
                            $status = $raw['status'];
                            $date = $raw['date_created'];
                ?>

                  
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $courier_id?></td>
                      <td class="text-center"><?php echo $p_ref_num;?></td>
                      <td class="text-center"><?php echo $sender_name;?></td>
                      <td class="text-center"><?php echo $rec_name;?></td>
                      <td class="text-center">

                        <?php

                          if ($status == 1) {
                            echo "<p class='bg-primary text-light rounded-5 p-1'>Shipped</p>";
                          }elseif ($status == 2) {
                            echo "<p class='bg-danger text-light rounded-5 p-1'>In Process</p>";
                          }elseif ($status == 3) {
                            echo "<p class='bg-success text-light rounded-5 p-1'>Delivered</p>";
                          }

                        ?>

                      </td>
                      <td class="text-center"><?php echo $date;?></td>
                      <td class="text-center"><a href="update-parcel.php?courier_id=<?php echo $courier_id;?>" class="me-1 btn btn-primary"><i class="bi bi-arrow-clockwise"></i></a>
                      <a href="delete-parcel.php?courier_id=<?php echo $courier_id;?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                    </tr>
                  </tbody>

                <?php 
                        }
                        $_SESSION['C_ID'] = $courier_id;
                    }
                ?>
                </table>
                  </section>
                </div>
                </div>
            </div>
          </div>

        </div>
    </section>
    <?php endif;?>

    <!-- AGENT Courier -->
    <?php if($_SESSION['type'] == 2):?>
      <section class="section profile">
      <div class="row">

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-overview">Add new</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#list-all">List all</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#list-shipped">Shipped</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#list-progress">In Progress</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#list-delivered">Delivered</button>
                </li>

              </ul>


              <!-- Add Parcel -->
              <div class="tab-content pt-3">

              <!-- php code -->

              <?php 
              
              if (isset($_POST['new_parcel'])) {
                  $ref_num = $_POST['reference_num'];
                  $s_name = $_POST['s_name'];
                  $s_address = $_POST['s_address'];
                  $s_num = $_POST['s_num'];
                  $r_name = $_POST['r_name'];
                  $r_address = $_POST['r_address'];
                  $r_num = $_POST['r_num'];
                  $from = $_POST['from'];
                  $to = $_POST['to'];

                  $sql = "INSERT INTO `parcels` (`id`, `reference_number`, `sender_name`, `sender_address`, `sender_contact`, `recipient_name`, `recipient_address`, `recipient_contact`, `from_branch_id`, `to_branch_id`, `status`, `date_created`) 
                  VALUES (NULL, '$ref_num', '$s_name', '$s_address', '$s_num', '$r_name', '$r_address', '$r_num', '$from', '$to', '1', current_timestamp());";

                  $result = $conn->query($sql);
                  if ($result) {
                    echo "<script>alert('added')</script>";
                  }


              }

            ?>

              <!-- php code end -->

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Add new</h5>

                  <hr>

                  <form class="row g-5 needs-validation " method="POST" novalidate>

                  <div class="d-flex flex-row">

                    <div class="sender container-fluid">

                    <div class="col-12">
                      <label for="yourName" class="form-label"><b>Sender Name</b></label>
                      <input type="text" name="s_name" class="form-control" id="BranchCode" required>
                      <div class="invalid-feedback">Please, enter name!</div>
                    </div>
  
                    <div class="col-12">
                      <label for="yourEmail" class="form-label"><b>Sender Address</b></label>
                      <input type="text" name="s_address" class="form-control" id="yourStreet" required>
                      <div class="invalid-feedback">Please enter address!</div>
                    </div>
  
                    <div class="col-12">
                      <label for="yourEmail" class="form-label"><b>Sender Contact#</b></label>
                      <input type="number" name="s_num" class="form-control" id="yourCity" required>
                      <div class="invalid-feedback">Please enter number!</div>
                    </div>

                    </div>

                    <div class="recipient container-fluid">

                    <div class="col-12">
                      <label for="yourName" class="form-label"><b>Reciever Name</b></label>
                      <input type="text" name="r_name" class="form-control" id="BranchCode" required>
                      <div class="invalid-feedback">Please, enter your Reciever Name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label"><b>Reciever Address</b></label>
                      <input type="text" name="r_address" class="form-control" id="yourStreet" required>
                      <div class="invalid-feedback">Please enter address!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label"><b>Reciever Contact#</b></label>
                      <input type="number" name="r_num" class="form-control" id="yourCity" required>
                      <div class="invalid-feedback">Please enter number!</div>
                    </div>

                    </div>
                    


                  </div>

                    

                    <div class="col-12">
                      <label for="yourName" class="form-label">From Branch:</label>
                      <select name="from" id="branch_id" class="form-select" required>
                        <option value="" selected>Select branch...</option>
                        <option value="1">vzTL0PqMogyOWhF | Branch 1, Karachi</option>
                        <option value="2">KyIab3mYBgAX71t | Branch 2, Mianwali</option>
                        <option value="3">dIbUK5mEh96f0Zc | Branch 3, Sialkot</option>
                      </select>
                    </div>
                    

                    <div class="col-12">
                      <label for="yourName" class="form-label">To Branch:</label>
                      <select name="to" id="branch_id" class="form-select" required>
                        <option value="" selected>Select branch...</option>
                        <option value="1">vzTL0PqMogyOWhF | Branch 1, Karachi</option>
                        <option value="2">KyIab3mYBgAX71t | Branch 2, Mianwali</option>
                        <option value="3">dIbUK5mEh96f0Zc | Branch 3, Sialkot</option>
                      </select>
                    </div>
                    
                    <div class="col-12">
                    <button type="submit" name="new_parcel" class="btn btn-dark btn-outline-success mt-4" style="width: 100%;">Submit</button>
                    </div>

                    <input type="text" hidden name="reference_num" class="form-control" id="random" required>
                    

                    
                    <script>
                        function randomNumber(len) {
                        var randomNumber;
                        var n = '';

                        for (var count = 0; count < len; count++) {
                            randomNumber = Math.floor(Math.random() * 10);
                            n += randomNumber.toString();
                        }
                        return n;
                        }

                        document.getElementById("random").value = randomNumber(12);
                    </script>

                  </form>

                  </div>

              </div>

              

              <!-- List all parcel -->
              <div class="tab-content pt-3">
                <!-- Checkout Section -->
                <div class="tab-pane fade list-all" id="list-all">
                  <section class="section dashboard">
                    <br>
                    <h3>Parcels:</h3>
                    <br>
                  <table class="table table-light table-hover">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">ID</th>
                      <th scope="col" class="text-center">Reference Number</th>
                      <th scope="col" class="text-center">Sender Name</th>
                      <th scope="col" class="text-center">Recipient Name</th>
                      <th scope="col" class="text-center">Status</th>
                      <th scope="col" class="text-center">Date Created</th>
                      <th scope="col" class="text-center">Edit/Delete</th>
                    </tr>
                  </thead>  
                <?php 
                    
                    $sql = "SELECT * FROM parcels WHERE from_branch_id = '$b_id'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($raw = $result->fetch_assoc()) 
                        {
                            $courier_id = $raw['id'];
                            $p_ref_num = $raw['reference_number'];
                            $sender_name = $raw['sender_name'];
                            $sender_address = $raw['sender_address'];
                            $sender_num = $raw['sender_contact'];
                            $rec_name = $raw['recipient_name'];
                            $rec_address = $raw['recipient_address'];
                            $rec_num = $raw['recipient_contact'];
                            $from_b = $raw['from_branch_id'];
                            $to_b = $raw['to_branch_id'];
                            $status = $raw['status'];
                            $date = $raw['date_created'];
                ?>

                  
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $courier_id?></td>
                      <td class="text-center"><?php echo $p_ref_num;?></td>
                      <td class="text-center"><?php echo $sender_name;?></td>
                      <td class="text-center"><?php echo $rec_name;?></td>
                      <td class="text-center">

                        <?php

                          if ($status == 1) {
                            echo "<p class='bg-primary text-light rounded-5 p-1'>Shipped</p>";
                          }elseif ($status == 2) {
                            echo "<p class='bg-danger text-light rounded-5 p-1'>In Process</p>";
                          }elseif ($status == 3) {
                            echo "<p class='bg-success text-light rounded-5 p-1'>Delivered</p>";
                          }

                        ?>

                      </td>
                      <td class="text-center"><?php echo $date;?></td>
                      <td class="text-center"><a href="update-parcel.php?courier_id=<?php echo $courier_id;?>" class="me-1 btn btn-primary"><i class="bi bi-arrow-clockwise"></i></a>
                      <a href="delete-parcel.php?courier_id=<?php echo $courier_id;?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                    </tr>
                  </tbody>

                <?php 
                        }
                        $_SESSION['C_ID'] = $courier_id;
                    }
                ?>
                </table>
                  </section>
                </div>

              <!-- List Shipped -->
                <div class="tab-pane fade list-shipped" id="list-shipped">
                  <section class="section dashboard">
                    <br>
                    <h3>Shipped:</h3>
                    <br>
                  <table class="table table-light table-hover">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">ID</th>
                      <th scope="col" class="text-center">Reference Number</th>
                      <th scope="col" class="text-center">Sender Name</th>
                      <th scope="col" class="text-center">Recipient Name</th>
                      <th scope="col" class="text-center">Status</th>
                      <th scope="col" class="text-center">Date Created</th>
                      <th scope="col" class="text-center">Edit/Delete</th>
                    </tr>
                  </thead>  
                <?php 
                    $sql = "SELECT * FROM parcels WHERE status = '1' AND from_branch_id = '$b_id'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($raw = $result->fetch_assoc()) 
                        {
                            $courier_id = $raw['id'];
                            $p_ref_num = $raw['reference_number'];
                            $sender_name = $raw['sender_name'];
                            $sender_address = $raw['sender_address'];
                            $sender_num = $raw['sender_contact'];
                            $rec_name = $raw['recipient_name'];
                            $rec_address = $raw['recipient_address'];
                            $rec_num = $raw['recipient_contact'];
                            $from_b = $raw['from_branch_id'];
                            $to_b = $raw['to_branch_id'];
                            $status = $raw['status'];
                            $date = $raw['date_created'];
                ?>

                  
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $courier_id?></td>
                      <td class="text-center"><?php echo $p_ref_num;?></td>
                      <td class="text-center"><?php echo $sender_name;?></td>
                      <td class="text-center"><?php echo $rec_name;?></td>
                      <td class="text-center">

                        <?php

                          if ($status == 1) {
                            echo "<p class='bg-primary text-light rounded-5 p-1'>Shipped</p>";
                          }elseif ($status == 2) {
                            echo "<p class='bg-danger text-light rounded-5 p-1'>In Process</p>";
                          }elseif ($status == 3) {
                            echo "<p class='bg-success text-light rounded-5 p-1'>Delivered</p>";
                          }

                        ?>

                      </td>
                      <td class="text-center"><?php echo $date;?></td>
                      <td class="text-center"><a href="update-parcel.php?courier_id=<?php echo $courier_id;?>" class="me-1 btn btn-primary"><i class="bi bi-arrow-clockwise"></i></a>
                      <a href="delete-parcel.php?courier_id=<?php echo $courier_id;?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                    </tr>
                  </tbody>

                <?php 
                        }
                        $_SESSION['C_ID'] = $courier_id;
                    }
                ?>
                </table>
                  </section>
                </div>

              <!-- In Process -->
                <div class="tab-pane fade list-progress" id="list-progress">
                  <section class="section dashboard">
                    <br>
                    <h3>In Process:</h3>
                    <br>
                  <table class="table table-light table-hover">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">ID</th>
                      <th scope="col" class="text-center">Reference Number</th>
                      <th scope="col" class="text-center">Sender Name</th>
                      <th scope="col" class="text-center">Recipient Name</th>
                      <th scope="col" class="text-center">Status</th>
                      <th scope="col" class="text-center">Date Created</th>
                      <th scope="col" class="text-center">Edit/Delete</th>
                    </tr>
                  </thead>  
                <?php 
                    $sql = "SELECT * FROM parcels WHERE status = '2' AND from_branch_id = '$b_id'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($raw = $result->fetch_assoc()) 
                        {
                            $courier_id = $raw['id'];
                            $p_ref_num = $raw['reference_number'];
                            $sender_name = $raw['sender_name'];
                            $sender_address = $raw['sender_address'];
                            $sender_num = $raw['sender_contact'];
                            $rec_name = $raw['recipient_name'];
                            $rec_address = $raw['recipient_address'];
                            $rec_num = $raw['recipient_contact'];
                            $from_b = $raw['from_branch_id'];
                            $to_b = $raw['to_branch_id'];
                            $status = $raw['status'];
                            $date = $raw['date_created'];
                ?>

                  
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $courier_id?></td>
                      <td class="text-center"><?php echo $p_ref_num;?></td>
                      <td class="text-center"><?php echo $sender_name;?></td>
                      <td class="text-center"><?php echo $rec_name;?></td>
                      <td class="text-center">

                        <?php

                          if ($status == 1) {
                            echo "<p class='bg-primary text-light rounded-5 p-1'>Shipped</p>";
                          }elseif ($status == 2) {
                            echo "<p class='bg-danger text-light rounded-5 p-1'>In Process</p>";
                          }elseif ($status == 3) {
                            echo "<p class='bg-success text-light rounded-5 p-1'>Delivered</p>";
                          }

                        ?>

                      </td>
                      <td class="text-center"><?php echo $date;?></td>
                      <td class="text-center"><a href="update-parcel.php?courier_id=<?php echo $courier_id;?>" class="me-1 btn btn-primary"><i class="bi bi-arrow-clockwise"></i></a>
                      <a href="delete-parcel.php?courier_id=<?php echo $courier_id;?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                    </tr>
                  </tbody>

                <?php 
                        }
                        $_SESSION['C_ID'] = $courier_id;
                    }
                ?>
                </table>
                  </section>
                </div>

              <!-- Delivered -->
                <div class="tab-pane fade list-delivered" id="list-delivered">
                  <section class="section dashboard">
                    <br>
                    <h3>Delivered:</h3>
                    <br>
                  <table class="table table-light table-hover">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">ID</th>
                      <th scope="col" class="text-center">Reference Number</th>
                      <th scope="col" class="text-center">Sender Name</th>
                      <th scope="col" class="text-center">Recipient Name</th>
                      <th scope="col" class="text-center">Status</th>
                      <th scope="col" class="text-center">Date Created</th>
                      <th scope="col" class="text-center">Edit/Delete</th>
                    </tr>
                  </thead>  
                <?php 
                    $sql = "SELECT * FROM parcels WHERE status = '3' AND from_branch_id = '$b_id'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($raw = $result->fetch_assoc()) 
                        {
                            $courier_id = $raw['id'];
                            $p_ref_num = $raw['reference_number'];
                            $sender_name = $raw['sender_name'];
                            $sender_address = $raw['sender_address'];
                            $sender_num = $raw['sender_contact'];
                            $rec_name = $raw['recipient_name'];
                            $rec_address = $raw['recipient_address'];
                            $rec_num = $raw['recipient_contact'];
                            $from_b = $raw['from_branch_id'];
                            $to_b = $raw['to_branch_id'];
                            $status = $raw['status'];
                            $date = $raw['date_created'];
                ?>

                  
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $courier_id?></td>
                      <td class="text-center"><?php echo $p_ref_num;?></td>
                      <td class="text-center"><?php echo $sender_name;?></td>
                      <td class="text-center"><?php echo $rec_name;?></td>
                      <td class="text-center">

                        <?php

                          if ($status == 1) {
                            echo "<p class='bg-primary text-light rounded-5 p-1'>Shipped</p>";
                          }elseif ($status == 2) {
                            echo "<p class='bg-danger text-light rounded-5 p-1'>In Process</p>";
                          }elseif ($status == 3) {
                            echo "<p class='bg-success text-light rounded-5 p-1'>Delivered</p>";
                          }

                        ?>

                      </td>
                      <td class="text-center"><?php echo $date;?></td>
                      <td class="text-center"><a href="update-parcel.php?courier_id=<?php echo $courier_id;?>" class="me-1 btn btn-primary"><i class="bi bi-arrow-clockwise"></i></a>
                      <a href="delete-parcel.php?courier_id=<?php echo $courier_id;?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                    </tr>
                  </tbody>

                <?php 
                        }
                        $_SESSION['C_ID'] = $courier_id;
                    }
                ?>
                </table>
                  </section>
                </div>
                </div>
            </div>
          </div>

        </div>
    </section>
    <?php endif;?>

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
</body>

</html>