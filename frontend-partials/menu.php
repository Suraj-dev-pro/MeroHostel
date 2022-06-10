<?php include('config/constants.php'); 
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
            <a href="<?php echo SITEURL; ?>loginSignUp.php">Login</a>
          </li>

         </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </section>
  <!-- Navigation Bar end-->