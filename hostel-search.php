<?php include('frontend-partials/menu.php'); ?>

<!-- Hostel sEARCH Section Starts Here -->
<section class="hostel-search text-center">
    <div class="container">
        <?php 

            //Get the Search Keyword
           
            $search = mysqli_real_escape_string($conn, $_POST['search']);
        
        ?>
         <legend class="text-search">Hostel result based on your Keyword:<h2><?php echo $search; ?></h2></legend>
    </div>
</section>
<!-- Hostel Search Section Ends Here -->

<!--hostel menu starts here -->
<section class="hostel-menu">
    <div class="container">
        <h2 class="text-center">Hostels</h2>
        <?php
            //sql query to get hostel based on search keywords
            $sql = "SELECT * FROM hostels WHERE name LIKE '%$search%' OR address LIKE '%$search%' OR type LIKE '%$search%'";

            //execute query
            $res =mysqli_query($conn, $sql);

            //count rows returned
            $count= mysqli_num_rows($res);

            //check whether hostel was found
            if($count>0)
            {
                //hostel available
                while($row=mysqli_fetch_assoc($res))
                {
                    //get details
                    $id = $row['id'];
                    $image_name = $row['image_name'];
                    $name = $row['name'];
                    $price = $row['price'];
                    $address = $row['address'];
                    $contact = $row['contact'];
                    $type = $row['type'];
                    $description = $row['description'];
                ?>
                   <div class="hostel-menu-box">
                       <div class="hostel-menu-img">
                        <?php 
                        //check if image is available or not
                            if($image_name=="")
                            {
                                //image not available
                                echo "<div class='error'>Image not available</div>";

                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/hostel/<?php echo $image_name;?>" class="img-responsive img-curve">
                                        <?php
                            }
                        
                        ?> 
                    </div>
                       <div class="hostel-menu-desc">
                            <h4><?php echo $name;?></h4>
                            <p><label for="price">Price: </label><?php echo $price;?></p>
                            <p><label for="address">Address: </label><?php echo $address;?></p>
                            <p><label for="address">Contact: </label><?php echo $contact;?></p>
                            <p><label for="address">Type: </label><?php echo $type;?></p>
                            <p><label for="description">Description: </label><?php echo $description;?></p>
                            <div class="button">
                                <a href="<?php echo SITEURL; ?>book.php" class="btn btn-primary">Book Hostel</a>
                            </div>
                        </div>
                   </div>
                   <?php
                }
            }
            
            else{
                //hostel not available
                echo "<div class='error'>Hostel not found try again</div>";
            
            }
            ?>
            <div class="clearfix"></div>
       
    </div>
</section>
<!--end of menu section-->
<?php include('frontend-partials/footer.php'); ?>