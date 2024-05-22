	
<?php
session_start(); // Start the session

// Include your database connection file
include 'connection.php';

// Check if the user is logged in
if(isset($_SESSION['username'])) {
    // The user is logged in, retrieve the username
    $username = $_SESSION['username'];

    // Retrieve the phone number from the database based on the username
    $sql = "SELECT phonenumber FROM userdetail WHERE username = '$username'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Fetch the phone number
        $row = $result->fetch_assoc();
        $phonenumber = $row['phonenumber'];
    } else {
        // Handle the case where the username is not found
        // You can set a default value or display an error message
        $phonenumber = ''; // Default value
    }

} else {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit;
}

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the current timestamp
    $current_timestamp = time();
    
    // Check if the last booking was made less than an hour ago
    // Assuming you have a column 'last_booking_timestamp' in the userdetails table
    $sql = "SELECT last_booking_timestamp FROM userdetails WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $last_booking_timestamp = $row["last_booking_timestamp"];
        
        if ($current_timestamp - $last_booking_timestamp < 3600) {
            // Less than an hour since the last booking
            echo "<script>alert('Please wait for one hour before making another booking.');</script>";
        } else {
            // Allow booking and update the last booking timestamp
            // Update the 'last_booking_timestamp' column in the userdetails table
            $update_sql = "UPDATE userdetails SET last_booking_timestamp = '$current_timestamp' WHERE username = '$username'";
            $conn->query($update_sql);
            
            // Proceed with the booking
            // Insert the booking details into the database
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Turf Company</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body, html {
            background-color: #B1DB7D72; /* Green background */
            scroll-behavior: smooth;
        }

        .navbar {
            background-color: #B1DB7D72;
        
            font-weight: bold;
        }

        .jumbotron {
            background-image: url(d.jpg);
            background-attachment: fixed; /* Fixed background */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 95vh;
            color: #4F7942;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .jumbotron h1,
        .jumbotron p {
            color: #ffffff; /* White text in hero section */
        }

        .btn-primary {
            background-color: #64EF14; /* Light green buttons */
            border-color: #64EF14;
        }

        .btn-primary:hover {
            background-color: #4F7942; /* Dark green on button hover */
            border-color: #4F7942;
        }

        .bg-light {
            background-color: #E6FFCC; /* Light green background for sections */
        }

        .card {
            background-color: #ffffff; /* White cards */
            border: 1px solid #4F7942; /* Dark green border */
        }

        .btn {
            margin-top: 50px;
            color: red;
            background-color: #4F7942;
            padding: 15px 50px;
            border-radius: 30px;
            text-decoration: none;
            color: white;
        }

        .btn:hover {
            background-color: #AD4646;
            border: 1px solid #4F7942;
            color: white;
            transform: scale(1.04); /* Increase the scale factor to fill the space */
            transition: transform 0.5s ease; /* Add a transition for smoother animation */
        }

      
        #facilities {
    transition: all 0.5s ease; /* Applies a smooth transition effect */

}

hr{
    color: red;
    font-weight: bold;
}
.nav-link {
    color: #33502A!important; /* Add your desired color here */
}


    </style>
</head>

<body>

    <!-- Header and Navigation Bar -->
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container">
            <a class="navbar-brand" href="#">THE TURF</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item text-dark">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#facilities">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#benefits">Benefits</a>
                    </li>
                    <li class="nav-item" style="color: #000;">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

    <section id="hero" class="jumbotron">
        <div class="container text-center">
          <h1 style="font-weight:bold; font-size:20px;  font-size: calc(1.5em + 1vw);">&#x2630; Welcome &#x2630;</h1>
       
            <h1 class="display-4" style="font-family: 'Bree Serif', serif;
            font-size: calc(3.5em + 1vw); /* Dynamic font size based on viewport width */
            line-height: 0.9em;
            text-wrap: wordwrap;
            color: #E6FFCC;;
            margin-bottom: 20px;
            text-transform: uppercase;">  <?php echo $_SESSION['username']; ?></h1>

            <a href="booking.php?username=<?php echo $username; ?>&phonenumber=<?php echo $phonenumber; ?>"
                class="btn">Book Now</a>
        </div>
    </section>



    <!-- About Section -->
    <section id="about" class="py-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="text-center mb-4"><hr>About Us<hr></h2>
                    <p>Providing High-Quality Sports Turf for Your Favorite Games</p>
                    <p>At [THE TURF], we're passionate about creating top-notch sports turf that elevates your game to new heights. With our dedication to quality and innovation, we ensure that every field we design and maintain meets the highest standards, allowing athletes to perform at their best.</p>
                    <p>Football fields are meticulously crafted to mimic the feel of natural grass while offering unparalleled durability and playability. Whether it's a local match or a professional tournament, our turf provides the perfect surface for exciting gameplay, ensuring that every pass, dribble, and goal is made with precision.</p>
                    <p>For badminton enthusiasts, we offer high-quality shuttlecock courts that are optimized for speed, agility, and control. With our specially designed turf and covered nets, players can enjoy a smooth playing experience without worrying about weather conditions or surface inconsistencies, allowing them to focus solely on their game.</p>
                    <p>Our cricket pitches are engineered to meet the demands of the modern game, offering consistent bounce, spin, and pace. Whether you're a spin bowler, a fast bowler, or a master batsman, our turf ensures a level playing field where skills are put to the test. Plus, with our covered nets, you can practice and play year-round, rain or shine.</p>
                    <p>At [THE TURF], we understand the importance of
                    safety and convenience. That's why all our sports turf installations come with high-quality covered nets that not only protect players from stray balls but also enhance the overall aesthetics of the field. Made from premium materials, our nets are durable, weather-resistant, and designed to withstand the rigors of intense gameplay.</p>
<p>With our commitment to excellence and attention to detail, [Company Name] is your trusted partner for all your sports turf needs. Whether you're a professional athlete, a sports club, or a recreational player, we're here to transform your sporting experience with turf that's as dynamic and versatile as you are.</p>
</div>
</div>
</div>
</section>

<!-- Facilities Section -->
<section id="facilities" class="py-5 ">
    <div class="container">
        <h2 class="text-center mb-4" style="color: #4F7942; font-weight:bold;"><hr>Our Facilities<hr></h2>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #B1DB7D72;">
                    <img src="cr.jpg" class="card-img-top" alt="Facility 1">
                    <div class="card-body">
                        <h5 class="card-title">Football Fields</h5>
                        <p class="card-text">Perfect pitch for football enthusiasts.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #B1DB7D72;">
                    <img src="fb-f.jpg" class="card-img-top" alt="Facility 1">
                    <div class="card-body">
                        <h5 class="card-title">Football Fields</h5>
                        <p class="card-text">Perfect pitch for football enthusiasts.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #B1DB7D72;">
                    <img src="sc.jpg" class="card-img-top" alt="Facility 2">
                    <div class="card-body">
                        <h5 class="card-title">Shuttle Cock</h5>
                        <p class="card-text">Premium shuttlecock sports facility</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section id="benefits" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4" style="color: #4F7942; font-weight:bold;"><hr>Benefits of Sports Turf<hr></h2>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #B1DB7D72;">
                    <img src="fb-f.jpg" class="card-img-top" alt="Benefit 1">
                    <div class="card-body">
                        <h5 class="card-title">Durability</h5>
                        <p class="card-text">Artificial turf offers long-lasting durability and consistent performance, making it ideal for various sports </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #B1DB7D72;">
                    <img src="ma.jpg" class="card-img-top" alt="Benefit 2">
                    <div class="card-body">
                        <h5 class="card-title">Low Maintenance</h5>
                        <p class="card-text">Artificial turf requires minimal maintenance, ensuring a hassle-free experience for players and caretakers alike.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Us Section -->
<section id="contact" class="py-5 ">
    <div class="container" >
        <h2 class="text-center mb-4"><hr>Contact Us<hr></h2>
        <div class="row justify-content-center" >
            <div class="col-md-6">
                <div class="card" style="background-color: #B1DB7D72;">
                    <div class="card-body">
                    <form action="contact.php" method="POST">
    <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Your Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="message">Your Message</label>
        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Send Message</button>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
