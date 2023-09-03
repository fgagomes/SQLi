<?php
$servername = "localhost";  // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "login_sample_db";   // Replace with your database name

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

// Prepare and execute a query to validate user credentials
$query = "SELECT user_name FROM users WHERE user_name = ? AND password = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $user_input_username, $user_input_password);
$stmt->execute();
$result = $stmt->get_result();



if ($result->num_rows != 0) {
    $row = $result->fetch_assoc();
    $value = $row['user_name'];
    echo "Login successful! Welcome $value";
} else {
    echo "Invalid login credentials. Please try again.";
}

$stmt->close();
$conn->close();
?>

