	
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
    <title>Document</title>
    <style>
        *{
  box-sizing:border-box;
 /* outline:1px solid ;*/
}
body{
background: #ffffff;
background: #C2EFB2;

    height: 100vh;
        margin: 0;
        background-repeat: no-repeat;
        background-attachment: fixed;
  
}



.wrapper-1{
    margin-top: 30px;
  width:100%;
  height:100vh;
  display: flex;
flex-direction: column;
}
.wrapper-2{
  padding :30px;
  text-align:center;
}
h2{
    font-family: 'Kaushan Script', cursive;
  font-size:3em;
  letter-spacing:3px;
  color:#4F7942 ;
  margin:0;
  margin-bottom:20px;
}
.wrapper-2 p{
  margin:0;
  font-size:1.3em;
 
  font-family: 'Source Sans Pro', sans-serif;
  letter-spacing:1px;
}
.go-home{
  color:#fff;
  background:#4F7942;
  border:none;
  padding:10px 50px;
 margin-top: 30px;
  border-radius:30px;
  text-transform:capitalize;
  box-shadow: #4DFC02;
  text-decoration: none;
}
.footer-like{
  margin-top: auto; 
  background:#D7E6FE;
  padding:6px;
  text-align:center;
}
.footer-like p{
  margin:0;
  padding:4px;
  color:#4F7942 ;
  font-family: 'Source Sans Pro', sans-serif;
  letter-spacing:1px;
}
.footer-like p a{
  text-decoration:none;
  color:#4F7942;
  font-weight:600;
}

@media (min-width:360px){
  h1{
    font-size:4.5em;
  }
  .go-home{
    margin-bottom:20px;
  }
}

@media (min-width:600px){
  .content{
  max-width:1000px;
  margin:0 auto;
}
  .wrapper-1{
  height: initial;
  max-width:620px;
  margin:0 auto;
  margin-top:50px;
  box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
}
  
}
.greet{
    text-align: left;
    color: #4F7942;

}
hr {
    border: none;
    border-top: 4px solid #4F7942;
    margin: 20px 0;
}
 </style>
</head>
<body>
<div class=content>
  <div class="wrapper-1">
    <div class="wrapper-2">
      <h2>Thank you !</h2><hr>
 
      <div class="greet">
      <p style="font-weight: bold; margin-bottom:10px; font-size:25px;">Dear <?php echo $_SESSION['username']; ?>,</p>
      <p>To complete your transaction, please proceed to the ground counter and pay the required amount. </p><br>
        </div>

        <a href="home.php" class="go-home" style="margin-top: 30px;">Back</a>
    </div>
   
</div>
</div>



<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">
</body>
</html>

