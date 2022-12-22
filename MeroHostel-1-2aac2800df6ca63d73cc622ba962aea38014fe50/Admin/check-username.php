<?php include "../config/constants.php";?>
<?php
    $username=$_POST['username'];
    $sql = "SELECT * from admins where username='$username'";
    $result = $connection ->query($sql);
    if ($result->num_rows == 1){
        echo'Already exists';
    }
    else{
        echo 'Available';
    }
?>