<?php
    require_once './db/config.php';
    session_start();
    
    // Check if the session variable 'type' is set and if it's not equal to 1, redirect to 'index.php'
    if ($_SESSION['type'] != 1) {
        header('Location:index.php');
    }

    if(isset($_GET['customer_id'])){
    // Check if the session variable 'Customer_ID' is set
        $customer_id = $_GET['customer_id'];
        // Delete the user with the given customer_id from the user table
        $sql = "DELETE FROM user WHERE `user`.`id` = $customer_id";
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result) {
            // If successful, redirect to 'manage-customer.php'
            header("Location:manage-customer.php");
        }
    }
?>