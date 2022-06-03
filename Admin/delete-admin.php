<?php 
    //include constants.php file
    include('../config/constants.php');
    //get the id of admin to be deleted
    $id = $_GET['id'];
    //create sql query to delete admin 
    $sql = "DELETE FROM admins where id = $id";
    //execute sql query
    $res = mysqli_query($conn, $sql);
    //check wheter query executed successfully or not
    if ($res==true){
        //query executed successfully and admin is deleted
        //echo "admin deleted";
        //create session variable to display message
        $_SESSION['delete']="<div class='success'>Admin deleted successfully</div>";
        //redirect to manage-admin
        header("Location:".SITEURL."/admin/manage-admin.php");
    }
    else{
        //failed to delete admin
        //echo "admin deletion failed";
        $_SESSION['delete']="<div class-'error'>Failed to delete admin.Try again later</div>";
        header("Location::".SITEURL."/admin/manage-admin.php");
    }
    //redirect to manage admin page with message(success/error)
?>