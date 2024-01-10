<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "courierdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if(!$conn){
        die('Error');
    }
?>