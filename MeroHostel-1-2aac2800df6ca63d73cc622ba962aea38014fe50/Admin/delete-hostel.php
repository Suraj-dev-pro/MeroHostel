
<?php
    //include constants page
    include('../config/constants.php');
    
    //echo 'Delete hostel page'
    if(isset($_GET['id']) && isset($_GET['image_name'])) //Either use && or AND
    {
        //process to delete

        //1. Get id and image name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        //2. remove image if available
        //check if image exists or not delete only if available
        if($image_name != "")
        {
            //it has image and need to remove from folder
            //get image path and remove
            $path="../images/hostel/".$image_name;

            //remove image file from folder
            $remove= unlink($path);

            //check whether image removed or not
            if($remove==false)
            {
                //failed to remove image
                $_SESSION['upload']="<div class='error'>Failed to remove image file.</div>";
                //redirect to manage hostel
                header('Location:'.SITEURL.'admin/manage-hostel.php');
                //stop the process of deleting hostel
                die();
            }
        }
        //3.delete hostel from database
        $sql = "DELETE FROM hostels where id=$id";
        //execute query
        $res = mysqli_query($conn, $sql);

        //check whether the query is executed or not and set the session message respectively
        //4. Redirect to manage hostel with session message
        if($res==true){
            //hostel deleted successfully
            $_SESSION['delete']="<div class='success'>Hostel deleted successfully.</div>";
            header('Location:'.SITEURL.'admin/manage-hostel.php');
        }
        else{
            //failed to delete hostel
            $_SESSION['delete']="<div class='error'>Failed to delete hostel.</div>";
            header('Location:'.SITEURL.'admin/manage-hostel.php');
        }
    }
    else{
        //redirect to manage hostel page
        $_SESSION['unauthorize']="<div class='error'>Unauthorized Access.</div>";
        header('Location:'.SITEURL.'admin/manage-hostel.php');
    }
?>