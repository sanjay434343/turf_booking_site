<?php
session_start(); // Start the session

// Extract username and phonenumber from URL parameters
$username = $_GET['username'] ?? '';
$phonenumber = $_GET['phonenumber'] ?? '';

// Establish connection to the database
include 'connection.php'; // Include your database connection file

// Retrieve form data with default values if not set
$ground = $_POST['ground'] ?? '';
$selectedtime = $_POST['selectedtime'] ?? '';
$endtime = $_POST['endtime'] ?? '';
$booked_datetime = date("Y-m-d H:i:s");

// Check if the selected time range is valid
if ($selectedtime >= $endtime) {
 
} else {
    // Check if the selected time range overlaps with existing bookings
    $sql_check_availability = "SELECT * FROM booking WHERE ground = ? AND ((selectedtime >= ? AND selectedtime < ?) OR (endtime > ? AND endtime <= ?))";
    $stmt_check_availability = $conn->prepare($sql_check_availability);
    $stmt_check_availability->bind_param('sssss', $ground, $selectedtime, $endtime, $selectedtime, $endtime);
    $stmt_check_availability->execute();
    $result_check_availability = $stmt_check_availability->get_result();

    if ($result_check_availability->num_rows > 0) {
        // Alert the user that the selected time range is not available for the ground
        $error_message = "Sorry, the selected time range for the ground is not available. Please choose another time range or ground.";
    } else {
        // Proceed with the booking
        $sql = "INSERT INTO booking (username, phonenumber, ground, selectedtime, endtime, booked_datetime)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssss', $username, $phonenumber, $ground, $selectedtime, $endtime, $booked_datetime);

        // Execute SQL statement
        if ($stmt->execute()) {
            $error_message = "Booked Successfully";
        } else {
            $error_message =  "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: linear-gradient(to bottom right, #B1DB7D72 40%, #99DBB4 100%);
    
        }
        .login-wrp {
            max-width: 400px;
            width: 100%;
            margin: 50px auto;
        }
        .top {
            background-image:url(fb.jpg);
            object-fit: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
            height: 300px;
            position: relative;
        }
        .logo {
            font-size: 30px;
            color: green;
            align-items: center;
            font-weight: bold;
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin-left: 50px;
            margin-bottom: 30px;
        }
        .bottom {
            background: #eee;
            height: 300px;
            position:relative;
            background-image:url(cri.jpg);
            object-fit: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
        }
        .bottom .login-form {
            background: #FFFFFF2B;
            backdrop-filter: blur(3px);
            position: absolute;
            border: 1px solid #ffffff;
            width: 70%;
            top: -80%;
            left: 5%;
            border-radius: 20px;
            padding: 40px 40px;
        }
        .btn {
            border-radius: 30px;
        }
        .checkbox-inline {
            cursor: pointer;
        }
        .btn-link {
            color: #fff;
            margin-left: 10px;
            margin-top: 10px;
            display: block;
        }
        .btn-link:hover, .btn-link:focus {
            color: #777;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        .btn {
            display: inline-block;
            width: 277px;
            padding: 10px 20px;
            background-color: #6AF471;
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
            background-color: #01FA33;
        }

        /* Basic styles for the select element */
select {
    appearance: none; /* Removes default styling */
    width: 281px; /* Sets width of the select box */
    padding: 10px; /* Adds padding inside the select box */
    font-size: 16px; /* Sets font size */
    color: #333; /* Sets font color */
    background-color: #ffffff; /* Sets background color */
    border: 1px solid #ccc; /* Adds border */
    border-radius: 4px; /* Rounds the corners */
    cursor: pointer; /* Changes cursor to pointer */
    margin-bottom: 15px;
}

/* Styling for the dropdown arrow */
select::after {
    content: '▼'; /* Adds a dropdown arrow */
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none; /* Ensures the arrow does not block clicks */
}

/* Ensuring the position is relative for the arrow positioning to work */
select {
    position: relative;
}

/* Styling the options inside the dropdown */
select option {
    padding: 10px; /* Adds padding to the options */
    background-color: #fff; /* Sets background color */
    color: #333; /* Sets font color */
}

.lables{
    color: #FEFEFE;
}

.lables2{
    color: #FEFEFE;
    margin-bottom: 10px;
    text-align: center;
}
    </style>
</head>
<body>
<div class="login-wrp">
    <div class="top"></div>
    <div class="bottom">
        <form action="submit_booking.php" class="login-form" method="POST">
            <div class="logo">THE TURF</div>
            <!-- Username (will be auto-filled from session) -->
            <input type="hidden" id="username" name="username" value="<?php echo $username; ?>" required>
            <!-- Phone number (will be auto-filled from session) -->
            <input type="hidden" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber; ?>" required>

            <select id="ground" name="ground" required>
                <option value="">Select the Ground here</option>
                <option value="Cricket Ground">Cricket Ground</option>
                <option value="Football Ground">Football Ground</option>
                <option value="Shuttle cock Ground">Shuttle Cock Ground</option>
                <!-- Add more options as needed -->
            </select>   
            <div class="form-group">
                <label for="starttime" class="lables">Select Start-Time</label>
                <input type="time" class="form-control" name="selectedtime" placeholder="Start Time" required>
            </div>
            <div class="form-group">
                <label for="endtime" class="lables">Select End-Time</label>
                <input type="time" class="form-control" name="endtime" placeholder="End Time" required>
            </div>
            <div class="form-group" id="prebook-date-group" style="display: none;">
                <label for="prebookdate" class="lables">Select Pre-book Date</label>
                <input type="date" class="form-control" name="prebookdate" placeholder="Pre-book Date (Optional)">
            </div>
            <label for="pre-book" class="lables2" id="label">If you want to pre-book click &darr;</label>
            <button type="button" class="btn" id="toggle-prebook">Pre-Book Here</button>
            <button type="submit" class="btn">Book Now</button>
        </form>
    </div>
</div>

<script>
    // Get the pre-book button and date field group
    const prebookButton = document.getElementById("toggle-prebook");
    const prebookDateGroup = document.getElementById("prebook-date-group");

    // Add click event listener to the pre-book button
    prebookButton.addEventListener("click", function() {
        // Toggle the display of the date field group
        prebookDateGroup.style.display = prebookDateGroup.style.display === "none" ? "block" : "none";
        label.style.display = label.style.display === "none" ? "block" : "none";


        // Remove the pre-book button after it's clicked
        prebookButton.remove();
    });
</script>

</body>
</html>
