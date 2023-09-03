<?php
$servername = "localhost";  // Database server name
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "login_sample_db";   // Database name

// Get user input from the form
if($_SERVER["REQUEST_METHOD"]=="POST"){ 
    $user_input_username = $_POST['username'];
    $user_input_password = $_POST['password'];
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, "3307");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute a query to validate user credentials. Vulnerability lies here:
$query = "SELECT * FROM users WHERE user_name = '$user_input_username' AND password = '$user_input_password'";
$result = $conn->query($query);


if ($result->num_rows != 0) {
    $row = $result->fetch_assoc();
    $value = $row['user_name'];
    echo  TRUE ."Login successful! Welcome $value";
} else {
    echo "Invalid login credentials. Please try again.";
}

$conn->close();
?>