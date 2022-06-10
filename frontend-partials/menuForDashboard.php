<?php include('config/constants.php');
require_once('checkUserLogin.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>homepage</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/homepage.js" type="stylesheet"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Navigation Bar -->
    <section class="navbar">
        <div class="container">

            <a href="<?php SITEURL; ?>index.php">
                <h1 class="logo">MeroHostel</h1>
            </a>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php SITEURL; ?>index.php">Home</a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL; ?>aboutus.html">About Us</a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL; ?>logout.php">Logout</a>
                    </li>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navigation Bar end-->