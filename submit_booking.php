<?php
// Establish connection to the database
include 'connection.php'; // Include your database connection file

// Retrieve form data with default values if not set
$username = $_POST['username'] ?? '';
$phonenumber = $_POST['phonenumber'] ?? '';
$ground = $_POST['ground'] ?? '';
$selectedtime = $_POST['selectedtime'] ?? '';
$endtime = $_POST['endtime'] ?? '';
$prebookdate = $_POST['prebookdate'] ?? '';
$booked_datetime = date("Y-m-d H:i:s");

// Get the current date and time
$current_datetime = date("Y-m-d H:i:s");

// Check if the selected time range is valid
if ($selectedtime >= $endtime) {
    $error_message =  "End time should be after the start time. Please select a valid time range.";
} elseif (empty($prebookdate)) {
    if (strtotime($selectedtime) < strtotime($current_datetime)) {
        // Check if the selected time is in the past without pre-book date
        $error_message = "Please select a future time for booking.";
    } else {
        // Proceed with regular booking

        // Prepare SQL statement to check availability
        $sql_check_availability = "SELECT * FROM booking WHERE ground = ? AND (
            (selectedtime < ? AND endtime > ?) OR 
            (selectedtime < ? AND endtime > ?) OR 
            (selectedtime >= ? AND selectedtime < ?)
        )";
        $stmt_check_availability = $conn->prepare($sql_check_availability);
        $stmt_check_availability->bind_param('sssssss', $ground, $endtime, $selectedtime, $selectedtime, $endtime, $selectedtime, $endtime);
        $stmt_check_availability->execute();
        $result_check_availability = $stmt_check_availability->get_result();

        if ($result_check_availability->num_rows > 0) {
            // Alert the user that the selected time range is not available for regular booking
            $error_message = "Sorry, the selected time range for the ground is not available. Please choose another time range or ground.";
        } else {
            // Proceed with the booking using a prepared statement
            $booking_type = empty($prebookdate) ? "Regular" : "Pre-Booked"; // Determine booking type
            $sql = "INSERT INTO booking (username, phonenumber, ground, selectedtime, endtime, booked_datetime, book_type)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssssss', $username, $phonenumber, $ground, $selectedtime, $endtime, $booked_datetime, $booking_type);

            // Execute SQL statement
            if ($stmt->execute()) {
                $success_message = "Booking successful!";
            } else {
                $error_message =  "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
} else {
    // Proceed with pre-booking

    // Adjust selected time if pre-booking date is set
    $selectedtime = date("Y-m-d H:i:s", strtotime($prebookdate . ' ' . date("H:i:s", strtotime($selectedtime))));
    $endtime = date("Y-m-d H:i:s", strtotime($prebookdate . ' ' . date("H:i:s", strtotime($endtime))));

    // Prepare SQL statement to check availability for pre-booking
    $sql_check_prebook_conflict = "SELECT * FROM booking WHERE ground = ? AND (
        (selectedtime < ? AND endtime > ?) OR 
        (selectedtime < ? AND endtime > ?) OR 
        (selectedtime >= ? AND selectedtime < ?)
    )";
    $stmt_check_prebook_conflict = $conn->prepare($sql_check_prebook_conflict);
    $stmt_check_prebook_conflict->bind_param('sssssss', $ground, $endtime, $selectedtime, $selectedtime, $endtime, $selectedtime, $endtime);
    $stmt_check_prebook_conflict->execute();
    $result_check_prebook_conflict = $stmt_check_prebook_conflict->get_result();

    if ($result_check_prebook_conflict->num_rows > 0) {
        // Alert the user that the selected time range is not available for pre-booking
        $error_message = "Sorry, the selected time range for pre-booking conflicts with an existing booking. Please choose another time range or ground.";
    } else {
        // Proceed with the pre-booking using a prepared statement
        $booking_type = "Pre-Booked"; // Determine booking type
        $sql = "INSERT INTO booking (username, phonenumber, ground, selectedtime, endtime, booked_datetime, prebookdate, book_type)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssss', $username, $phonenumber, $ground, $selectedtime, $endtime, $booked_datetime, $prebookdate, $booking_type);

        // Execute SQL statement
        if ($stmt->execute()) {
            $success_message = "Booked Successfully";
        } else {
            echo "Error
            $error_message = " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close statements and connection
if (isset($stmt_check_availability)) {
    $stmt_check_availability->close();
}
if (isset($stmt_check_prebook_conflict)) {
    $stmt_check_prebook_conflict->close();
}
$conn->close();
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>success</title>
    <link rel="stylesheet" href="style.scss">
    <style>
        .success-message {
    text-align: center;
    max-width: 500px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.success-message__icon {
    width: 155px;
}

.success-message__title {
    color: #3DC480;
    width: 100%;
    transform: translateY(25px);
    opacity: 0;
    transition: all 200ms ease;
}

.success-message__content {
    color: #FF0000;
    transform: translateY(25px);
    opacity: 0;
    width: 100%;
    transition: all 200ms ease;
    transition-delay: 50ms;
}

.icon-checkmark circle {
    fill: #3DC480;
    transform-origin: 50% 50%;
    transform: scale(0);
    transition: transform 200ms cubic-bezier(.22, .96, .38, .98);
}

.icon-checkmark path {
    transition: stroke-dashoffset 350ms ease;
    transition-delay: 100ms;
}

.active .success-message__title {
    transform: translateY(0);
    opacity: 1;
}

.active .success-message__content {
    transform: translateY(0);
    opacity: 1;
}

.active .icon-checkmark circle {
    transform: scale(1);
}

.error{
    font-size: 20px;
    width: 100%;
}

.error-message{
    width: 200px;
    width: 100%;
}
.success{
    margin-top: 20px;
    text-align: center;
    color: #FF0000;
    font-size: 1em;
    width: auto;
}

.error{
    margin-top: 20px;
    text-align: center;
    font-size: 1em;
    margin-top: 15px;
    margin-bottom: 10px;
    width: auto;
}

.btn {
            display: inline-block;
            width: 277px;
            padding: 10px 20px;
            background-color: #3DC480;
            border: none;
            border-radius: 30px;
            text-align: center;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            margin-bottom: 10px;
            margin-top: 5px ;
            transition: background-color 0.3s ease;
        }
        .btn:hover, .btn:focus {
            background-color: #06FB80;
        }


        .btns {
            display: inline-block;
            width: 277px;
            padding: 10px 20px;
            background-color: #F46A6A;
            border: none;
            border-radius: 30px;
            text-align: center;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            margin-bottom: 10px;
            margin-top: 5px ;
            transition: background-color 0.3s ease;
        }
        .btns:hover, .btn:focus {
            background-color: #FA0101;
        }
    </style>
</head>
<body>
    


<div class="success-message">
  
    
    <div class="success-message__content">
    <?php
                // Display error message if set
                if (isset($error_message)) {
                    echo '<div class="error-message">';
                    echo '    <svg viewBox="0 0 76 76" class="error-message__icon icon-failure">';
                    echo '        <circle cx="38" cy="38" r="36" fill="#FD0101"/>';
                    echo '        <path fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M30,30l16,16 M46,30l-16,16"/>';
                    echo '    </svg>';
                    echo '    <div class="error">' . $error_message . '</div>';
                    echo'<a href="booking.php" class="btns">BACK</a>';
                    echo '</div>';
                }
                
                // Display success message if set
                if (isset($success_message)) {
                    echo '<div class="success-message">';
                    echo '    <svg viewBox="0 0 76 76" class="success-message__icon icon-checkmark">';
                    echo '        <circle cx="38" cy="38" r="36" fill="#3DC480"/>';
                    echo '        <path fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M17.7,40.9l10.9,10.9l28.7-28.7"/>';
                    echo '    </svg>';
                    echo '    <p class="success">' . $success_message . '</p>';
                    echo '<a href="greeting.php" type="button" class="btn" >CONTINUE</a>';
                    echo '</div>';
                }
            ?>
    </div>
</div>
<script>
        function goBack() {
            window.history.back();
        }
    </script>
<script>
    function PathLoader(el) {
	this.el = el;
    this.strokeLength = el.getTotalLength();
	
    // set dash offset to 0
    this.el.style.strokeDasharray =
    this.el.style.strokeDashoffset = this.strokeLength;
}

PathLoader.prototype._draw = function (val) {
    this.el.style.strokeDashoffset = this.strokeLength * (1 - val);
}

PathLoader.prototype.setProgress = function (val, cb) {
	this._draw(val);
    if(cb && typeof cb === 'function') cb();
}

PathLoader.prototype.setProgressFn = function (fn) {
	if(typeof fn === 'function') fn(this);
}

var body = document.body,
    svg = document.querySelector('svg path');

if(svg !== null) {
    svg = new PathLoader(svg);
    
    setTimeout(function () {
        document.body.classList.add('active');
        svg.setProgress(1);
    }, 200);
}

document.addEventListener('click', function () {
    
    if(document.body.classList.contains('active')) {
        document.body.classList.remove('active');
        svg.setProgress(0);
        return;
    }
    document.body.classList.add('active');
    svg.setProgress(1);
});
</script>

</body>
</html>