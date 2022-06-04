
<?php
require_once('config/constants.php');

// require_once 'checkUserLogin.php';

if (isset($_POST['login'])) {

    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $sql = "SELECT id,Username,Email from customer where Email ='$Email'";
    $query = mysqli_query($conn, $sql);

    $emailCount = mysqli_num_rows($query);
    echo $emailCount;

    if ($emailCount) {
        $emailPass = mysqli_fetch_assoc($query);

        // session_start();
        $_SESSION['user_id'] = $emailPass['id'];
        $_SESSION['user_Username'] = $emailPass['Username'];
        $_SESSION['user_Email'] = $emailPass['Email'];

        //check remember me button
        if (isset($_POST['remember'])) {
            //storing data into cookies

            setcookie('user_id', $emailPass['id'], time() + 7 * 24 * 60 * 60);
            setcookie('user_email', $emailPass['email'], time() + 7 * 24 * 60 * 60);
            setcookie('user_name', $emailPass['name'], time() + 7 * 24 * 60 * 60);
        }

        $dbPass = $emailPass['Password'];
        echo $dbPass;

        $passDecode = md5($Password);

        if ($passDecode) {
?>
            <script>
                window.alert("Login Successful");
            </script>
<?php

            header("location:dashboard.php");
            exit;
        } else {
            echo "Password is incorrect";
        }
    } else {
        echo "Invalid email";
    }
}
?>