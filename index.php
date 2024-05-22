<?php
// Include the common database connection file
include 'connection.php';

// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    // Prepare SQL statement to select user from the database
    $sql = "SELECT * FROM userdetail WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // Fetch the user data
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Verify the password
        if ($input_password == $stored_password) {
            // Password is correct, set session variable and redirect to home.php
            $_SESSION["username"] = $input_username;
            header("Location: home.php");
            exit();
        } else {
            // Password is incorrect, display error message
            $error_message = "Invalid password.";
        }
    } else {
        // Username not found, display error message
        $error_message = "Username not found.";
    }

    // Close statement
    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE TURF LOGIN PAGE</title>
    <style>

      body {
         background: linear-gradient(to bottom right, #B1DB7D72 40%, #99DBB4 100%);
         height: 95vh;
      }

        .login-wrp{
   max-width: 400px;
   width: 100%;
   margin: 50px auto;
}
.top{
   background-image:url(fb.jpg);
   object-fit:cover;
background-repeat: no-repeat;
background-position: center;
background-size: cover;
border-top-right-radius: 20px;
border-top-left-radius: 20px;
   height: 300px;
   position: relative
}
.logo{
    font-size: 30px;
color: green;
align-items: center;
font-weight: bold;
font-family: Georgia, 'Times New Roman', Times, serif;
margin-left: 50px;
 margin-bottom: 30px;

}
.bottom{
   background: #eee;
   height: 300px;
   position:relative;
   background-image:url(cri.jpg);
   object-fit:cover;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    border-bottom-right-radius: 20px;
    border-bottom-left-radius: 20px;
}
.bottom .login-form{
   background: #FFFFFF2B;
   backdrop-filter: blur(3px);
   position: absolute;
    border: 1px solid #ffffff;
   width: 70%;
   top:-55%;
   left: 5%;
   border-radius: 20px;
   padding: 40px 40px;
}
.btn{
   border-radius: 30px
}

.checkbox-inline{
   cursor: pointer;
}
.btn-link{
   color: #fff;
   margin-left: 10px;
   margin-top:10px;
   display: block
}
.btn-link:hover,.btn-link:focus{
   color: #777;
}
/* Add the missing CSS for the input fields */
.form-control {
   width: 100%;
   padding: 10px;
   border: 1px solid #ccc;
   border-radius: 5px;
   margin-bottom: 20px;
   box-sizing: border-box;
}

/* Adjust the style for the login button */
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
   transition: background-color 0.3s ease;
}

.btn:hover,
.btn:focus {
   background-color: #01FA33;
}

    </style>
</head>
<body>
<div class="login-wrp">
   <div class="top">
      
   </div>
   <div class="bottom">
    
   <form action="" class="login-form" method="POST"> <!-- Added method="POST" to specify the form submission method -->

<div class="logo">THE TURF</div>
<div class="form-group">
    <input type="text" class="form-control" name="username" placeholder="Username"> <!-- Added name="username" -->
</div>
<div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="Password"> <!-- Added name="password" -->
</div>

<button type="submit" class="btn">Login</button> <!-- Changed <a> tag to <button> and added type="submit" -->
<p class="text-center"><small><a href="signup.php" class="btn-link">Click To Register</a></small></p>
</form>

   </div>
</div>
</body>
</html>
