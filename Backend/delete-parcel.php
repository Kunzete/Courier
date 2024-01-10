<?php
    require_once './db/config.php';
    session_start();
    
    // Check if the session variable 'type' is set and if it's not equal to 1, redirect to 'index.php'

    if ($_SESSION['type'] == 1 || $_SESSION['type'] == 2) {
    
    }else{
      header("Location:index.php");
    }

    $P_ID = $_GET['courier_id'];

    // Check if the session variable 'Customer_ID' is set
    if (isset($_GET['courier_id'])) {
        // Delete the user with the given customer_id from the user table
        $sql = "DELETE FROM parcels WHERE `id` = '$P_ID'";
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result) {
            // If successful, redirect to 'manage-customer.php'
            header("Location:courier.php");
        }
    }
?>