<?php include('../config/constants.php');?>
<html>
    <head>
        <title>Login Admin</title>
        <link rel="stylesheet" href="../css/admin.css">
        <script type="text/javascript" src="password.js"></script>
    </head>
    <body>
      <div class="login">
          <h1 class="text-center">Login</h1>
          <br><br>
          <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            
            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
          ?>
          <br><br
            
                <!--login form starts here-->
          <form action="" method="post">
              Username:<br>
               <input type="text" name="username"placeholder="Enter your username" ><br><br>

              Password:<br>
               <input type="password" name="password" id="myPass" placeholder="Enter your password">
               <input type="checkbox" onclick="myFunction()">unhide<br><br>

              <input type="submit" name="submit" value="Login" class="btn-primary">


            </form> 
                 <!--login form ends here-->
          <p class="text-center">2022 All right reserved,@MeroHostel.</p>
      </div>

    </body>
</html>
<?php
    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //process for login
        //1. Get the data from login form 
        $username = mysqli_real_escape_string($conn, $_POST['username']); 
        
        $raw_password= md5($_POST['password']);
        
        $password = mysqli_real_escape_string($conn,$raw_password);

        //2. SQL to check if the the user with username and password exists or not

        $sql = "SELECT * FROM admins where username='$username' AND password='$password'";

        //3.Execute the query
        $res = mysqli_query($conn,$sql);

        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1){
            //user available and login success
            $_SESSION['login'] = "<div class='success'>Login Successfully.</div>";
            $_SESSION['user']= $username;//To check whether the user is logged in or not  and logout will unset it
            //Redirect to Home Page/Dashboard
            header('Location:'.SITEURL.'admin/');
        }
    
        else{
            //user not available and login failed
            $_SESSION['login'] = "<div class='error text-center'>Login Failed. Username or password incorrect.</div>";
           
            header('Location:'.SITEURL.'admin/login.php');
        }
    }
?>