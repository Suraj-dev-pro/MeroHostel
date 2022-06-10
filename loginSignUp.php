<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginSignUp.css">
    <!-- <link rel="stylesheet" href="" -->

</head>

<body>

    <div class="container">
        <!-- Login -->
        <form method="POST" action="login.php" class="form" id="login">

            <h1 class="formTitle">Login</h1>

            <div class="formMessage formMessageError">
            </div>

            <div class="formInputGroup email">

                <input type="text" name="Email" class="formInput" placeholder="Email" value="">

                <div class="formInputErrorMessage" id="errEmail"></div>
            </div>

            <div class="formInputGroup password">

                <input type="password" name="Password" class="formInput" placeholder="Password">

                <div class="formInputErrorMessage" id="errPassword"></div>
            </div>

            <div class="form-group">

                <input type="checkbox" name="remember" value="remember">Remember me
                
            </div>

            <button class="formButton" name="login" type="submit">Login</button>

            <p class="formText">
                <a href="#" class="formLink">Forgot your password?</a>
            </p>

            <p class="formText">
                <a href="./" class="formLink signupLink" id="linkCreateAccount">Don't have an account? Create account</a>
            </p>

        </form>


        <!-- SignUp -->
        <form method="post" action="register.php" class="form formHidden" id="createAccount">

            <h1 class="formTitle">Create Account</h1>
            <div class="formMessage formMessageError">

            </div>
            <div class="formInputGroup Username">

                <input type="text" name="Username" id="signupUsername" class="formInput" autofocus placeholder="Username">

                <span class="formInputErrorMessage" id="eerrUsername"></span>
            </div>

            <div class="formInputGroup email">

                <input type="text" name="Email" class="formInput" autofocus placeholder="Email Address">

                <span class="formInputErrorMessage" id="eerrEmail"></span>
            </div>

            <div class="formInputGroup password">

                <input type="password" name="Password" class="formInput" autofocus placeholder="Password">

                <span class="formInputErrorMessage" id="eerrPassword"></span>
            </div>

            <div class="formInputGroup repassword">

                <input type="password" name="Cpassword" class="formInput" autofocus placeholder="Confirm Password">

                <span class="formInputErrorMessage" id="eerrorRePassword"></span>
            </div>

            <div class="formInputGroup phoneNo">

                <input type="text" name="PhoneNo" class="formInput" autofocus placeholder="Enter Phone Number">

                <span class="formInputErrorMessage" id="eerrorPhoneNo"></span>
            </div>

            <div class="formInputGroup address">

                <input type="text" name="Address" class="formInput" autofocus placeholder="Enter address">

                <span class="formInputErrorMessage" id="eerrorAddress"></span>
            </div>

            <div class="formInputGroup gender">

                <label for="gender">Gender: </label>

                <input type="radio" id="gender" name="Gender" value="Male">Male
                <input type="radio" id="gender" name="Gender" value="Female">Female
                <input type="radio" id="gender" name="Gender" value="Others">Others

                <span class="formInputErrorMessage" id="eerrorGender"></span>
            </div>

            <button class="formButton" name="signUp" type="submit">Sign Up</button>

            <p class="formText">
                <a href="./" class="formLink loginLink" id="linkLogIn">Already have an account? Sign In</a>
            </p>

        </form>
        
    </div>

    <script src="loginSignUp.js"></script>
    
</body>

</html>