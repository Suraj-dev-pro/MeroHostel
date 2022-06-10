<?php
include('partials/menu.php');
?>
<!-- Main section-->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br>

        <div class="col-4 text-center">
            <h3>No of Hostels</h3>
            <br>
            <?php

            $sql = "select count(*) as Hostels from hostels";

            $result = $conn->query($sql);
            $fetch = $result->fetch_assoc();

            $count = $fetch['Hostels'];
            echo $count;

            ?>
        </div>


        <div class="col-4 text-center">
            <h3>No of Customers</h3>
            <br>
            <?php

            $sql = "select count(*) as Customers from customer";

            $result = $conn->query($sql);
            $fetch = $result->fetch_assoc();

            $count = $fetch['Customers'];
            echo $count;

            ?>
        </div>


        <div class="col-4 text-center">
            <h3>No of Bookings</h3>
            <br>
            <?php

            $sql = "select count(*) as Bookings from booking_details";

            $result = $conn->query($sql);
            $fetch = $result->fetch_assoc();

            $count = $fetch['Bookings'];
            echo $count;

            ?>
        </div>


        <div class="clearfix"></div>
    </div>
</div>
<!-- Main section ends-->

<?php include("partials/footer.php")
?>