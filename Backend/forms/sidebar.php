<?php
 session_start();
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar" data-bs-theme="dark">

 <ul class="sidebar-nav" id="sidebar-nav">

    <?php if ($_SESSION['type'] == 1): ?>

      <!-- Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid-fill"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <!-- Manage Customers Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="../Backend/manage-customer.php">
          <i class="bi bi-people-fill"></i>
          <span>Manage Customers</span>
        </a>
      </li>
      <!-- End Manage Customers Nav -->

      <!-- Agent Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>Agent</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../Backend/view-agents.php">
              <i class="bi bi-circle"></i><span>List Agents</span>
            </a>
          </li>
          <li>
            <a href="../Backend/insert-agent.php">
              <i class="bi bi-circle"></i><span>Add Agent</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Agent Nav -->

    <?php 
      endif;
    ?>

    <?php if ($_SESSION['type'] == 2 || $_SESSION['type'] == 1): ?>

      <!-- Parcel Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="courier.php">
        <i class="bi bi-box-fill"></i>
        <span>Courier</span>
      </a>
    </li>
      <!-- End Parcel Nav -->

      <!-- Reports Nav -->
      <li class="nav-item">
      <a class="nav-link collapsed" href="report.php">
      <i class="bi bi-file-earmark-fill"></i>
        <span>Reports</span>
      </a>
    </li>
      <!-- End Reports Nav -->

    <?php 
      endif;
    ?>

    <!-- Pages -->
    <li class="nav-heading">Pages</li>

    <!-- F.A.Q Page Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="../about.php#faq">
        <i class="bi bi-question-circle-fill"></i>
        <span>F.A.Q</span>
      </a>
    </li>
    <!-- End F.A.Q Page Nav -->

    <!-- Contact Page Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="../contact.php#contact">
        <i class="bi bi-envelope-fill"></i>
        <span>Contact Us</span>
      </a>
    </li>
    <!-- End Contact Page Nav -->

 </ul>

</aside>
<!-- End Sidebar-->