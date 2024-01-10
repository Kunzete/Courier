<?php 
    require_once './db/config.php'; // load the database configuration
    session_start(); // start the session
    if ($_SESSION['type'] != 1) { // if the user is not an admin
        header('Location:index.php'); // redirect them to the index page
    }
    
    if(isset($_GET['agent_id'])){
    // Check if the session variable 'Customer_ID' is set
        $agent_id = $_GET['agent_id'];
        // Delete the user with the given customer_id from the user table
        $sql = "DELETE FROM user WHERE `user`.`id` = $agent_id";
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result) {
            // If successful, redirect to 'manage-customer.php'
            header("Location:view-agents.php");
        }
    }
?>
?>