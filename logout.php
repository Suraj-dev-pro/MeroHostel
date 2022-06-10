<?php
    include('config/constants.php');

    unset($_SESSION['user_id']);
    unset($_SESSION['user_Username']);
    unset($_SESSION['user_Email']);

    setcookie('user_id', false, time() - 7 * 24 * 60 * 60);
    setcookie('user_email', false, time() - 7 * 24 * 60 * 60);
    setcookie('user_name', false, time() - 7 * 24 * 60 * 60);

    header('location:index.php');
?>