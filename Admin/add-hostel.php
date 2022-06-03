<?php include('partials/menu.php');?> 

<div class="main-content">
    <div class="wrapper">
        <h1>Add Hostel</h1>
        <br><br>

        <?php if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>
                        Name:
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Name of the Hostel" required />
                    </td>
                </tr>
                <tr>
                    <td>
                       Price:
                    </td>
                    <td>
                        <input type="number" name="price" placeholder="Price" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        Address:
                    </td>
                    <td>
                        <input type="text" name="address" placeholder="Address of the Hostel" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        Contact:
                    </td>
                    <td>
                        <input type="tel" name="contact" placeholder="Hostel Contact No" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        Type:
                    </td>
                    <td>
                        <input type="radio" name="type" value="boys" required/>Boys' Hostel
                        <input type="radio" name="type" value="girls" required/>Girls' Hostel
                </td>
                </tr>
                <tr>
                    <td>Booked:</td>
                    <td>
                        <input type="radio" name="booked" value="yes" required/>yes
                        <input type="radio" name="booked" value="no" required/>no
                    </td>
                </tr>
                <tr>
                    <td>
                       Description:
                    </td>
                    <td>
                       <textarea name="description" cols="22" rows="3" placeholder="Enter your hostel description here" required></textarea>
                    </td>
                </tr>
               
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Hostel" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
           
            //check whether the button is clicked or not
            if(isset($_POST['submit']))
            {
                //add the hostel in the database
                //echo "clicked";
                //1. get data from form
                
                $name = $_POST['name'];
                $price = $_POST['price'];
                $address = $_POST['address'];
                $contact = $_POST['contact'];
                $type = $_POST['type'];
                $booked = $_POST['booked'];
                $description=$_POST['description'];
               
            
                //2.upload the image if selected
                //check whether the image is clicked or not and upload only if the image is selected
                if(isset($_FILES['image']['name']))
                {
                    //get the details of the selected image
                    $image_name = $_FILES['image']['name'];

                    //check if the image is selected or not and upload only if the image is selected
                    if($image_name != "")
                    {
                        //image is selected
                        //A. rename the image
                        //get the details of the selected image(jpg,png,gif,etc)
                        $ext = end(explode('.', $image_name));
                        //create new name for the selected image
                        $image_name="Hostel-Name-".rand(0000,9999).".".$ext;//new image name 

                        //B. upload the image
                        //get the src path and destination path
                        //source path is the current working directory of the image
                        $src = $_FILES['image']['tmp_name'];

                        //destination path for the image to be uploaded
                        $dst ="../images/hostel/".$image_name;

                        //finally upload the hostel image
                        $upload = move_uploaded_file($src,$dst);

                        //check whether the image uploaded or not

                        if($upload==false)
                        {
                            //failed to upload the image
                            //Redirect to add hostel page with error message
                            $_SESSION['upload'] = "<div class='error'>Failed to upload the image.</div>";
                            header('Location:'.SITEURL.'admin/add-hostel.php');
                        
                            //stop the process
                            die();
                        }
                    }
                }
                else
                {
                    $image_name="";//setting the default value as blank
                }

                //3. Insert into database
                //create a sql query to save or add hostel
                $sql2 = "INSERT INTO hostels SET
                    image_name = '$image_name',
                    name = '$name',
                    price = $price,
                    address= '$address',
                    contact=$contact,
                    type='$type',
                    booked='$booked'
                    description='$description'
                    
                    ";
                    //execute query
                    $res2 = mysqli_query($conn, $sql2);
                    //check whether data was inserted or not
                    //4. Redirect with message to manage Hostel page
                    if($res2== true)
                    {
                        //data inserted successfully
                        $_SESSION['add']="<div class='success'>Hostel Added Successfully</div>";
                        header('Location:'.SITEURL.'admin/manage-hostel.php');
                        
                    }
                    else
                    {
                        //data insert failed
                        $_SESSION['add']="<div class='error'>Failed to add hostel</div>";
                        header('Location:'.SITEURL.'admin/manage-hostel.php');
                    }


                }
            ?>

    </div>
</div>
<?php include ('partials/footer.php'); ?>



