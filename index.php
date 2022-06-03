<?php include('frontend-partials/menu.php'); ?>

<!-- Hostel Search Section Starts Here -->
<section class="hostel-search text-center">
    <div class="container">
        
        <form action="<?php echo SITEURL; ?>hostel-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Hostel.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
</section>
<!-- Hostel sEARCH Section Ends Here -->



<!-- Hostel MEnu Section Starts Here -->
<section class="hostel-menu">
    <div class="container">
        <h2 class="text-center">Hostels</h2>

        <?php 
            //getting from hostel database
            $sql = "SELECT * FROM hostels where booked='no'";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //CHeck whether the Hostels are availalable or not
            if($count>0)
            {
                //we have hostel in database
                //get the hostel from database
                while($row = mysqli_fetch_assoc($res))
                {
                    //get the value from individual columns
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
                                    //check whether we have image or not
                                    if($image_name=="")
                                    {
                                        //we don't want image,display error message
                                        echo "<div class='error'>Image not Available</div>";
                                    } 
                                    else
                                    {
                                        //we have image,display
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
            //hostel not availalable
            echo "<div class='error'>Hostel not availalable</div>";
        }

        ?>  

        <div class="clearfix"></div>

    </div>

</section>
<!-- hostel Menu Section Ends Here -->

<?php include('frontend-partials/footer.php'); ?>