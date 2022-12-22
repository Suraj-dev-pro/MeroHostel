<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Hostel</h1>
        <br/><br/><br/>
        <!-- Button to add hostel-->
                 <a href="<?php echo SITEURL; ?>admin/add-hostel.php" class="btn-primary">Add Hostel</a>
                 <br/><br/><br/>
                 <?php
                    if (isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                 ?>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Type</th>
                        <th>Booked</th>
                        <th>Action</th>
                        
                    </tr>

                    <?php
                            //crete a query to get all the hostel
                            $sql = "SELECT * FROM hostels";
                            
                            //execute the query
                            $res = mysqli_query($conn, $sql);

                            //count the rows to check whether we have hostels or not
                            $count = mysqli_num_rows($res);
                            //create serial number variable and set default value as 1
                            $sn=1;
                            
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
                                    $booked = $row['booked'];
                                   ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++;?></td>
                                        <td>
                                            <?php 
                                                //check whether we have image or not
                                                if($image_name=="")
                                                {
                                                    //we don't want image,display error message
                                                    echo "<div class='error'>Image not added</div>";
                                                } 
                                                else
                                                {
                                                    //we have image,display
                                                    ?>
                                                    <img src="<?php echo SITEURL; ?>images/hostel/<?php echo $image_name;?>" width="100px">
                                                    <?php
                                                }                                      
                                            ?>
                                        </td>
                                        <td><?php echo $name;?></td>
                                        <td><?php echo $price;?></td>
                                        <td><?php echo $address;?></td>
                                        <td><?php echo $contact;?></td>
                                        <td><?php echo $type;?></td>
                                        <td><?php echo $booked;?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-hostel.php?id=<?php echo $id; ?>" class="btn-secondary">Update Hostel</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-hostel.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Hostel</a>
                                        </td>
                                    </tr>
                                    <?php

                                }
                            }
                            else
                            {
                                //hostel not added yet
                                echo "<tr><td colspan='8' class='error'>Hostel not added yet</td></tr>";
                            }
                        ?>
                </table>
    </div>

</div> 

<?php include('partials/footer.php'); ?>