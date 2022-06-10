<?php
ob_start();
//session start
@session_start();
//create constants to store non repeating values
define('SITEURL', 'http://localhost/merohostel/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'merohostel');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));//select database
