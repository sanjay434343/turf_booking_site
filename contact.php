<?php
// Include the common database connection file
include 'connection.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $username = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare SQL statement to insert data into contact table
    $stmt = $conn->prepare("INSERT INTO contact (username, email, message, created_at) VALUES (?, ?, ?, NOW())");

    // Bind parameters
    $stmt->bind_param("sss", $username, $email, $message);

    // Execute the SQL query
    if ($stmt->execute()) {
        // Data inserted successfully, you can perform any additional actions here if needed
        // For example, redirect the user to another page
        header("Location: contact_success.php#contact");
        exit; // Ensure no further code is executed after redirection
    } else {
        // Error in executing SQL query
        echo "Error executing query: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted, redirect the user back to the form page
    header("Location: index.html");
    exit;
}
?>
