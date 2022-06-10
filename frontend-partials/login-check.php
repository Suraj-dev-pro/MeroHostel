<?php
    //authorization - access control
    //check whether the use is logged in or not

    if(!isset($_SESSION['user_id']))//if the user session is not set, create
    {
        //user is not logged in
        //redirect to login page with message
        $_SESSION['no-login-message']="<div class='error text-center'>Please login with credentials</div>";
        //redirect to login page
        header('Location:'.SITEURL.'/index.php');
    }
?>