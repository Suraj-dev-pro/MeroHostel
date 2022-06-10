<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="modal.js"></script>

</head>

<body>

    <div id="myModal" class="hostel-menu-box">

        <!-- Modal content -->
        <div class="hostel-menu-desc">

            <h3>Booking successful</h3>
            <br>
            <label>Please enter the check in date</label>
            <input type="date" id="checkDate" name="date">

            <button class="btn btn-primary" id="confirmButton">Confirm</button>

            <span id="success"></span>

        </div>

    </div>

    <script>
        let checkingDate = document.getElementById('checkDate');
        checkingDate.min = new Date().toLocaleDateString('en-ca');

        var confirm = document.getElementById('confirmButton');
        confirm.addEventListener("click", function() {

            if (checkingDate.value === '') {
                alert('Please select your checkin date');
                return;
            }
            let xhr = new XMLHttpRequest();

            xhr.onreadystatechange = () => {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        console.log(xhr.responseText);
                        if (xhr.responseText == '0') {
                            alert("booking failed");
                        } else {
                            document.getElementById('success').innerHTML = alert("Successfully Booked");
                            location.replace("dashboard.php");
                        }
                    } else {
                        document.getElementById('success').innerHTML = 'Booking Failed';
                    }
                }
            }

            xhr.open("GET", "book.php?id=<?php echo $_GET['id']; ?> &date=" + checkingDate.value, false);
            xhr.send();
        })
    </script>

    <!-- <script src="modal.js"></script> -->

</body>

</html>