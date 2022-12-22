<?php
    include('config/constants.php');

    session_destroy();

    setcookie('user_id', false, time() - 7 * 24 * 60 * 60);
    setcookie('user_email', false, time() - 7 * 24 * 60 * 60);
    setcookie('user_name', false, time() - 7 * 24 * 60 * 60);
    ?>
    <script>
        alert("You're logging out");
    </script>
    <?php
    
    header('location:index.php');
?>