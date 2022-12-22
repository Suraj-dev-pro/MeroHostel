<?php

    require_once('config/constants.php');

    if(isset($_POST['signUp'])) {

        $Username = mysqli_real_escape_string($conn, $_POST['Username']);
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);
        $Cpassword = mysqli_real_escape_string($conn, $_POST['Cpassword']);
        $PhoneNo = mysqli_real_escape_string($conn, $_POST['PhoneNo']);
        $Address = mysqli_real_escape_string($conn, $_POST['Address']);
        $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);


        $pass = md5($Password);
        // $Cpass = password_hash($Cpassword, PASSWORD_BCRYPT);


        $email = "SELECT * from customer where Email = '$Email'";

        $query = mysqli_query($conn, $email);

        $emailCount = mysqli_num_rows($query);

        if(empty($_POST["Username"])) {

            echo "Name is required."; 
        }
    
        if(empty($_POST["Email"])) {

            echo "Email is required";
        }

        if(!preg_match("/[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-z\d\.]{2,5}+$/", $_POST["Email"])) {

            echo "email must be in an email format";
        }

        if (empty($_POST["PhoneNo"])) {

            echo "Phone Number is required";
        }

        if(!preg_match("/^[0-9]{10}+$/", $_POST["PhoneNo"])) {
            echo "Phone Number must be in 10 digits";
        }

        if(empty($_POST["Address"])) {
            echo "Enter Address";
        }

        if(empty($_POST["Gender"])) {
            echo "Select your gender";
        }
        

        if($emailCount > 0) {
            echo "Email already exists";
        }
        else {

            if($Password !== $Cpassword){
                echo 'password not matched!';
            }
            else{
                $insert = "INSERT INTO customer (Username, Email, Password, PhoneNo, Address, Gender) VALUES('$Username','$Email','$pass','$PhoneNo', '$Address', '$Gender')";
                mysqli_query($conn, $insert);
                header('location:loginSignUp.php');
      }
        }

    }
