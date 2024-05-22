<?php
include 'connection.php';

$error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $phonenumber = $_POST["phonenumber"];
    $confirmPassword = $_POST["confirm_password"];
    
    // Check if passwords match
    if ($password !== $confirmPassword) {
        $error_message = "Passwords do not match.";
    } else {
        // Check if username or phonenumber already exists
        $check_sql = "SELECT * FROM userdetail WHERE username = ? OR phonenumber = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("ss", $username, $phonenumber);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            // Username or phonenumber already exists
            $error_message = "Username or phonenumber already exists.";
        } else {
            // Prepare SQL statement to insert data into userdetail table
            $stmt = $conn->prepare("INSERT INTO userdetail (username, password, confirm_password, phonenumber) VALUES (?, ?, ?, ?)");
            
            // Bind parameters
            $stmt->bind_param("ssss", $username, $password, $confirmPassword, $phonenumber); 
            
            // Execute the SQL query
            if ($stmt->execute()) {
                // Redirect to success.php if the query was successful
                header("Location: success.php");
                exit(); // Ensure no further code is executed after redirection
            } else {
                // Print error message
                $error_message = "Error executing query: " . $stmt->error;
            }
            
            // Close statement
            $stmt->close();
        }

        // Close check statement
        $check_stmt->close();
    }
    
    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body {
            background: linear-gradient(to bottom right, #B1DB7D72 40%, #99DBB4 100%);
            height: 92vh;
        }
        .login-wrp {
            max-width: 400px;
            width: 100%;
            margin: 50px auto;
        }
        .top {
            background-image: url(fb.jpg);
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
            color: #3AC518;
            align-items: center;
            font-weight: bold;
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin-left: 50px;
            margin-bottom: 30px;
        }
        .bottom {
            background: #eee;
            height: 300px;
            position: relative;
            background-image: url(cri.jpg);
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
            top: -63%;
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
            color: #999;
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
            border-radius: 30px;
            margin-bottom: 10px;
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
            transition: background-color 0.3s ease;
        }
        .btn:hover, .btn:focus {
            background-color: #01FA33;
        }
        .container {
            background-color: #F45C5C86;
            padding: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 96%;
            color: #ffffff;
            margin-bottom: 3px;
            border-radius: 30px;
            font-size: 10px;
            max-width: 500px;
            margin-bottom: 5px;
            text-align: center;
            z-index: 1000;
        }   
    </style>
</head>
<body>
<div class="login-wrp">
    <div class="top"></div>
    <div class="bottom">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login-form" onsubmit="return validateForm()">
            <div class="logo">THE TURF</div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <?php
        if ($error_message != '') {
            echo "<div class='container'>$error_message</div>";
        }
        ?>
            <div class="form-group">
                <input type="tel" class="form-control" placeholder="Enter phone number" name="phonenumber" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required oninput="checkPasswordMatch()">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Confirm Password" id="confirm_password" name="confirm_password" required oninput="checkPasswordMatch()">
            </div>
            <button type="submit" class="btn" id="signup_btn">Signup</button>
        </form>
      
    </div>
</div>

<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        
        if (password !== confirmPassword) {
            alert("Passwords do not match");
            return false;
        }
        return true;
    }
    
    function checkPasswordMatch() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        
        if (password !== confirmPassword) {
            document.getElementById("confirm_password").setCustomValidity("Passwords do not match");
            document.getElementById("signup_btn").disabled = true;
        } else {
            document.getElementById("confirm_password").setCustomValidity("");
            document.getElementById("signup_btn").disabled = false;
        }
    }
</script>
</body>
</html>
