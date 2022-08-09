<?php include('partials/menu.php');

// Add hostel validation
$err = [];

if (isset($_POST['submit'])) {

    if (!isset($_FILES['image'])) {
        $err['image'] = "Choose an image";
    }

    // if(!isset($_POST['name']) && empty($_POST['name'])) {
    //   $err['name'] = "Enter the name of the hostel";
    // }

    // if(!isset($_POST['price']) && empty($_POST['price'])) {
    //     $err['price'] ;
    // }

    function validateField($name)
    {
        return isset($_POST["$name"]) && !empty(trim($_POST["$name"]));
    }

    if (!validateField("name")) {
        $err['name'] = "Enter the name of the hostel";
    }
    if (!validateField("price")) {
        $err['price'] = "Enter the price";
    }
    if (!validateField("address")) {
        $err['address'] = "Enter the address";
    }
    if (!validateField("contact") || !preg_match("/^[0-9]{10}+$/", $_POST["contact"])) {
        $err['contact'] = "Enter the contact";
    }

    if (empty($_POST['type'])) {
        $err['type'] = "Select your gender";
    }

    if (empty($_POST['description'])) {
        $err['description'] = "Description is mandatory";
    }

    //add the hostel in the database
    //echo "clicked";
    //1. get data from form

    if (!count($err)) {

        $name = $_POST['name'];
        $price = $_POST['price'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $type = $_POST['type'];
        $booked = $_POST['booked'];
        $description = $_POST['description'];


        //2.upload the image if selected
        //check whether the image is clicked or not and upload only if the image is selected
        if (isset($_FILES['image']['name'])) {
            //get the details of the selected image
            $image_name = $_FILES['image']['name'];

            //check if the image is selected or not and upload only if the image is selected
            if ($image_name != "") {
                //image is selected
                //A. rename the image
                //get the details of the selected image(jpg,png,gif,etc)
                $ext = end(explode('.', $image_name));
                //create new name for the selected image
                $image_name = "Hostel-Name-" . rand(0000, 9999) . "." . $ext; //new image name 

                //B. upload the image
                //get the src path and destination path
                //source path is the current working directory of the image
                $src = $_FILES['image']['tmp_name'];

                //destination path for the image to be uploaded
                $dst = "../images/hostel/" . $image_name;

                //finally upload the hostel image
                $upload = move_uploaded_file($src, $dst);

                //check whether the image uploaded or not

                if ($upload == false) {
                    //failed to upload the image
                    //Redirect to add hostel page with error message
                    $_SESSION['upload'] = "<div class='error'>Failed to upload the image.</div>";
                    header('Location:' . SITEURL . 'admin/add-hostel.php');

                    //stop the process
                    die();
                }
            }
        } else {
            $image_name = ""; //setting the default value as blank
        }

        //3. Insert into database
        //create a sql query to save or add hostel
        $sql2 = "INSERT INTO hostels SET
                        image_name = '$image_name',
                        name = '$name',
                        price = '$price',
                        address= '$address',
                        contact='$contact',
                        type='$type',
                        booked='$booked',
                        description='$description';";

        //execute query
        $res2 = mysqli_query($conn, $sql2);
        //check whether data was inserted or not
        //4. Redirect with message to manage Hostel page
        if ($res2 == true) {
            //data inserted successfully
            $_SESSION['add'] = "<div class='success'>Hostel Added Successfully</div>";
            header('Location:' . SITEURL . 'admin/manage-hostel.php');
        } else {
            //data insert failed
            $_SESSION['add'] = "<div class='error'>Failed to add hostel</div>";
            header('Location:' . SITEURL . 'admin/manage-hostel.php');
        }
    }
}

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Hostel</h1>
        <br><br>

        <?php if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Image:</td>
                    <td>
                        <input type="file" name="image">
                        <?php if (isset($err['image'])) { ?>
                            <span><?php echo $err['image']; ?></span>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Name:
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Name of the Hostel" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" />
                        <span><?php if (isset($err['name'])) echo $err['name']; ?></span>

                    </td>
                </tr>
                <tr>
                    <td>
                        Price:
                    </td>
                    <td>
                        <input type="number" name="price" placeholder="Price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>" />
                        <span><?php if (isset($err['price'])) echo $err['price']; ?></span>

                    </td>
                </tr>
                <tr>
                    <td>
                        Address:
                    </td>
                    <td>
                        <input type="text" name="address" placeholder="Address of the Hostel" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>" />
                        <span><?php if (isset($err['address'])) echo $err['address']; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        Contact:
                    </td>
                    <td>
                        <input type="tel" name="contact" placeholder="Hostel Contact No" value="<?php echo isset($_POST['contact']) ? $_POST['contact'] : ''; ?>" />
                        <span><?php if (isset($err['contact'])) echo $err['contact']; ?></span>

                    </td>
                </tr>
                <tr>
                    <td>
                        Type:
                    </td>
                    <td>
                        <input type="radio" name="type" value="boys" />Boys' Hostel
                        <input type="radio" name="type" value="girls" />Girls' Hostel
                        <span><?php if (isset($err['type'])) echo $err['type']; ?></span>

                    </td>
                </tr>
                <tr>
                    <td>Booked:</td>
                    <td>
                        <input type="radio" name="booked" value="yes" />yes
                        <input type="radio" name="booked" value="no" checked />no
                    </td>
                </tr>
                <tr>
                    <td>
                        Description:
                    </td>
                    <td>
                        <textarea name="description" cols="22" rows="3" placeholder="Enter your hostel description here" value="<?php echo isset($_POST['description']) ? $_POST['description'] : '' ?>"></textarea>
                        <span><?php if (isset($err['description'])) echo $err['description']; ?></span>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Hostel" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>
<?php include('partials/footer.php'); ?>