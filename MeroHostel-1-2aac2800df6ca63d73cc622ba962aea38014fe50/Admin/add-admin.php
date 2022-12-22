<?php
  //process value from form and save it in database
  //check whether the button is clicked or not
        $showError='';
  if(isset($_POST['submit']))
  {
    if(empty($_POST['full_name'])){
        $showError='Plese enter full name';
  }else{

      $full_name = $_POST['full_name'];

  }
      if(empty($_POST['password'])){
          $showError="Please Enter password";
      }else{
  
       
         $password = md5($_POST['password']);//Password Encryption with md5
      }
      if(empty($_POST['username'])){
          $showError="Please Enter username";
        }else{
            
            $username = $_POST['username'];
        }
        



     if($showError==''){
         include "../config/constants.php";


         //sql query to save data into database
         $sql = "Insert into admins SET
             full_name ='$full_name',
             username ='$username',
             password ='$password'
         ";
         
    
         //executing query and saving data into database
         $res= mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
         //check whether data is inserted into database or not and display appropriate message
         if($res==TRUE){
             $_SESSION['add']='Admin added sucessfully';
             //redirect page to admin to manage admin
             header("Location:".SITEURL."admin/manage-admin.php");
         }
         else{
            $_SESSION['add']='Failed to add admin';
            //redirect page to admin to add admin
            header("Location:".SITEURL."admin/add-admin.php");
         }
     }else{
         echo $showError;
     }

    }
?>

<script type="text/javascript" src="password.js"></script>

<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/> <br/>
        <?php
            if(isset($_SESSION['add']))//checking whether session is set or not
            {
                echo $_SESSION['add'];//display session message 
                unset($_SESSION['add']);//remove session message
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>FullName:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Full Name" required/></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" id="username" placeholder="Enter Username" maxlength="20" minlength="5" required/>
                        <span id="msg_username"></span>
                    </td>
                   
                    <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" id="myPass" placeholder="Enter Password" maxlength="15" minlength="6" required/>
                        
                        <input type ="checkbox" onclick="myFunction()">unhide
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php')?>

