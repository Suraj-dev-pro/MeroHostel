<?php include('partials/menu.php'); ?>

<?php
//check whether id is set or not
    if (isset($_GET['id'])) 
    {
        //get all the details 
        $id = $_GET['id'];

        //sql query to get the selected hostels
        $sql2 = "SELECT * FROM hostels where id=$id";
        //execute the query
        $res2 = mysqli_query($conn, $sql2);
        //get the value based on the query executed
        $row2 = mysqli_fetch_assoc($res2);

        //get the individual values of selected hostel
        
        $current_image = $row2['image_name'];
        $name = $row2['name'];
        $price = $row2['price'];
        $address = $row2['address'];
        $contact = $row2['contact'];
        $type = $row2['type'];
        $booked = $row2['booked'];
        $description = $row2['description'];
       
    }
    else
    {
    //redirect to manage hostel
        header('Location:'.SITEURL.'admin/manage-hostel.php');
    }
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Hostel</h1>
        <br><br>
        <form action="" method="post" enctype="multipart/form" required>
            <table class="tbl-30">
                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php
                        if ($current_image == "") {
                            //image not available
                            echo "<div class='error'>Image not available</div>";
                        } else {
                            //image available
                        ?>

                            <img src="<?php echo SITEURL; ?>images/hostel/<?php echo $current_image; ?>" width="150px">
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>
                        Name:
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Price:
                    </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Address:
                    </td>
                    <td>
                        <input type="text" name="address" value="<?php echo $address; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Contact:
                    </td>
                    <td>
                        <input type="number" name="contact" value="<?php echo $contact; ?>" >
                    </td>
                </tr>
                <tr>
                    <td>
                        Type:
                    </td>
                    <td>
                        <input <?php if ($type == "boys") {echo "checked"; } ?> type="radio" name="type" value="boys">Boys' Hostel
                        <input <?php if ($type == "girls") {echo "checked";} ?> type="radio" name="type" value="girls">Girls' Hostel
                    </td>
                </tr>
                <tr>
                    <td>
                        Booked:
                    </td>
                    <td>
                        <input <?php if ($type == "yes") {echo "checked"; } ?> type="radio" name="booked" value="yes">yes
                        <input <?php if ($type == "no") {echo "checked";} ?> type="radio" name="booked" value="no">no
                    </td>
                </tr>
                <tr>
                    <td>
                        Description:
                    </td>
                    <td>
                        <textarea name="description" cols="22" rows="3" value="<?php echo $description; ?>"></textarea>
                    </td>
                </tr>
               

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                        <input type="submit" name="submit" value="Update Hostel" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

    <?php

        //check whether the button is clicked or not
        if (isset($_POST['submit'])) {

            //1. get data from form
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $type = $_POST['type'];
            $booked= $_POST['booked'];
            $description = $_POST['description'];
           


            //2.upload the image if selected
            //check whether the upload button is clicked or not
            if (isset($_FILES['image']['name'])) {
                //get the details of the selected image
                $image_name = $_FILES['image']['name']; //new image name

                //check if the image is available or not
                if ($image_name != "") {
                    //image is available
                    //i. uploading new image
                    //get the details of the selected image(jpg,png,gif,etc)
                    $ext = end(explode('.', $image_name));


                    //create new name for the selected image
                    $image_name = "Hostel-Name-" . rand(0000, 9999) . '.' . $ext; //this will be renamed image

                    //2. upload the image
                    //get the src path and destination path

                    //source path is the current working directory of the image
                    $src_path = $_FILES['image']['tmp_name'];

                    //destination path for the image to be uploaded
                    $dest_path = "../images/hostel/" . $image_name;

                    //finally upload the hostel image
                    $upload = move_uploaded_file($src_path, $dest_path);

                    //check whether the image uploaded or not

                    if ($upload == false) {
                        //failed to upload the image
                        //Redirect to add hostel page with error message
                        $_session['upload'] = "<div class='error'>Failed to upload the image.</div>";
                        header('Location:'.SITEURL. 'admin/add-hostel.php');

                        //stop the process
                        die();
                    }
                    //remove the image if new image is uploaded and current_image exists
                    //remove current_image if available
                    if ($current_image != "") {
                        //current image is available
                        //remove the image
                        $remove_path = "../images/hostel/" . $current_image;

                        $remove = unlink($remove_path);
                        //check whether the image is removed or not
                        if ($remove == false) {
                            //failed to remove current_image
                            $_SESSION['remove-failed'] = "<div class='error'>Failed to remove current image.</div>";
                            //redirect to manage hostel
                            header('Location:'.SITEURL.'admin/manage-hostel.php');
                            //stop process
                            die();
                        }
                    }
                } 
                else 
                {
                    $image_name = $current_image; //setting the default image when image is not selected
                }
            }
            else
            {
                $image_name = $current_image; //Default Image when Button is not Clicked
            }
            // update in database

            $sql3 = "UPDATE  hostels SET
                image_name = '$image_name',
                name = '$name',
                price = $price,
                address= '$address',
                contact = $contact,
                type='$type',
                booked = '$booked',
                description = '$description'
                
                WHERE id = $id
        ";
            //execute query
            $res3 = mysqli_query($conn, $sql3);
            //check whether the query is executed or not
            if ($res3 == true) {
                //query executed successfully
                $_SESSION['update'] = "<div class='success'>Hostel updated Successfully</div>";
                header('Location:' . SITEURL . 'admin/manage-hostel.php');
            } else {
                //Failed to update hostel
                $_SESSION['update'] = "<div class='error'>Failed to update hostel</div>";
                header('Location:' . SITEURL . 'admin/manage-hostel.php');
            }
        }

        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>



</div>
</div>