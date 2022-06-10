<?php include('partials/menu.php');?>

    <div class="main-content">
        <div class="wrapper">
             <h1>Update Admin</h1>
             <br/><br/>
             <?php
                 //get id of selected admin
                 $id=$_GET["id"];
            
                //create sql query to get the details
                $sql = "SELECT * from admins where id = $id";

                 //execute the sql query
                 $res = mysqli_query($conn,$sql);

                 //check if query executed or not
                if($res==true){
                //check whether data available or not
                $count = mysqli_num_rows($res);
                //check if we have admin data or not
                if($count==1)
                {
                    //get details
                    $row = mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else{
                    //redirect to manage admin page
                    header('Location:'.SITEURL.'/admin/manage-admin.php');
                }
            }
                 ?>
                <form action="" method="POST">
                     <table class="tbl-30">
                         <tr>
                            <td>Full Name:</td>
                             <td><input type="text" name="full_name" placeholder="Enter Full Name" value="<?php echo $full_name?>" required></td>
                         </tr>
                         <tr>
                             <td>Username:</td>
                             <td>
                             <input type="text" name="username" placeholder="Enter Username" value="<?php echo $username?>" required></td>
                             </td>
                         </tr>
                        <tr>
                            <td>
                             <td colspan="2">
                                 <input type="hidden" name="id" value="<?php echo $id?>">
                                <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                             </td>
                            </td>
                        </tr>
                     </table>
            
        </form>
     </div>
    </div>
<?php
    //check whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        //echo "Button clicked";
        //get all the values from form to update the
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //create sql query to update admin 
        $sql = "UPDATE admin SET
        ful_name ='$full_name',
        username ='$username'
        where id = '$id'
         ";
        //execute query
        $res = mysqli_query($conn,$sql);
        //check whether the query executed successfully or not
        if($res==true){
            //query executed and admin is updated
            $_SESSION['update']="<div class='success'>Admin updated successfully.</div>";
            //redirect to manage admin password_get_info
            header('Location:'.SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['update']="<div class='error'>Admin updated successfully.</div>";
            //redirect to manage admin password_get_info
            header('Location:'.SITEURL.'admin/manage-admin.php');
        }
    }
    ?>
<?php include('partials/footer.php');?>
