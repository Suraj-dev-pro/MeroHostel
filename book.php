<?php

    require_once('config/constants.php');

    $hostel_id = $_GET['id'];
    $customer_id = $_SESSION['user_id'];

    $date = $_GET['date'];
      
    $sql = "insert into booking_details (customer_id, hostel_id, checkin_date) values($customer_id, $hostel_id, '$date')";

    $conn->query($sql);

?>

