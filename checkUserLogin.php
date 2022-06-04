<?php

if (!isset($_SESSION['user_id'])) {

    header('location:index.php?err=1');
    exit;
}

?>