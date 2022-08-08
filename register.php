<?php

require_once('config/constants.php');

if (isset($_POST['signUp'])) {

    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);
    $Cpassword = mysqli_real_escape_string($conn, $_POST['Cpassword']);
    $PhoneNo = mysqli_real_escape_string($conn, $_POST['PhoneNo']);
    $Address = mysqli_real_escape_string($conn, $_POST['Address']);
    $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);


    $pass = md5($Password);
    // $Cpass = password_hash($Cpassword, PASSWORD_BCRYPT);

    $email = "SELECT * from customer where Email = '$Email'and Username = '$Username'";

    $query = mysqli_query($conn, $email);

    $emailCount = mysqli_num_rows($query);

    $err = [];

    if (empty(trim($_POST["Username"]))) {

        $err['username'] = "Name is required.";
    }

    if (empty(trim($_POST["Email"])) || (!preg_match("/[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-z\d\.]{2,5}+$/", $_POST["Email"]))) {

        $err['email'] = "Email is empty or email is invalid";
    }

    if (empty(trim($Password))) {

        $err['password'] = "Password is empty";
    }

    if (strlen($Password) < 6) {

        $err['password'] = "Password shoud be greater than 6 characters";
    }

    if (empty(trim($Password))) {

        $err['cpassword'] = "Confirm Password should be equal to password";
    }

    if (empty($_POST["PhoneNo"])) {

        $err['phone'] = "Phone Number is required";
    }

    if (!preg_match("/^[0-9]{10}+$/", $_POST["PhoneNo"])) {
        $err['phone'] = "Phone Number must be in 10 digits";
    }

    if (empty(trim($_POST["Address"]))) {
        $err['address'] = "Enter Address";
    }

    if (empty($_POST["Gender"])) {
        $err['gender'] = "Select your gender";
    }



    $sql = "SELECT id,Username,Email from customer where Email ='$Email'";
    $query = mysqli_query($conn, $sql);

    $emailCount = mysqli_num_rows($query);

    if ($emailCount > 0) {
        $err['email'] = "Email already exists";
    } else {

        if ($Password !== $Cpassword) {
            $err['password'] = "Password doesn't match with confirm password";
        } else {
            if (count($err) > 0) {
                foreach ($err as $key => $value) {
                    echo $value . "<br>";
                }
            }
            else {
                $insert = "INSERT INTO customer (Username, Email, Password, PhoneNo, Address, Gender) VALUES('$Username','$Email','$pass','$PhoneNo', '$Address', '$Gender')";

                mysqli_query($conn, $insert);
                echo "<script>alert('Registration Successful.')</script>";
                header('location:loginSignUp.php');
            }

           
        }
    }
    
}
