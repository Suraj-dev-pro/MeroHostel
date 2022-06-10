<?php include('partials/menu.php') ?>

<?php

require_once("../config/constants.php");

$sql = "select * from customer";



?>

<div class="main-content">
    <div class="wrapper">

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Username</th>
                <th>Email</th>
                <th>PhoneNo</th>
                <th>Address</th>
                <th>Gender</th>
            </tr>
            <?php $counter = 1; ?>
            <?php foreach ($conn->query($sql)->fetch_all() as $item) { ?>
                <tr>
                    <td><?php echo $counter++; ?></td>
                    <td><?php echo $item[1] ?></td>
                    <td><?php echo $item[2] ?></td>
                    <td><?php echo $item[4] ?></td>
                    <td><?php echo $item[5] ?></td>
                    <td><?php echo $item[6] ?></td>
                </tr>
            <?php } ?>



        </table>

    </div>

</div>




<?php include('partials/footer.php') ?>