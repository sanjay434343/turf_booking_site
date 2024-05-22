<?php

// Database configuration
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "turf"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to execute SQL queries
if (!function_exists('executeQuery')) {
    function executeQuery($sql) {
        global $conn;
        $result = $conn->query($sql);
        if (!$result) {
            echo "Error executing query: " . $conn->error;
        }
        return $result;
    }
}

// Close connection
// Note: It's usually not necessary to close the connection explicitly as PHP automatically closes it when the script finishes executing.
// However, you can use this function if needed.
function closeConnection() {
    global $conn;
    $conn->close();
}

?>
