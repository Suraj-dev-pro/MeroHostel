<?php
    //include constants.php for siteurl
    include('../config/constants.php');
    //1. destroy the session 
    session_unset();//unset $_SESSION['USER]
    session_destroy();

    //2. redirect to the login page
    header('Location:'.SITEURL.'admin/login.php');
?>