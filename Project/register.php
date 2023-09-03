<?php
$servername="localhost";
$username="root";
$pass = "";
$dbname="login_sample_db";

//connect to my database
$conn=new mysqli($servername, $username, $pass, $dbname, "3307");
//check if the connection was successful
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
} else{
    echo "successful";
}
//get the user input
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $user_name = $_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
     // Ideally we should use a hashing mechanism, but it's out of project's scope

    $hashed_pass= password_hash($password, PASSWORD_DEFAULT);
    //insert the new values in to my sql
    $sql="INSERT INTO users (user_name,email, password) VALUES ('$user_name','$email','$password')";

    if($conn->query($sql)==TRUE){
        echo "Registration successful! Welcome, $user_name!";
    } else{
        echo "ERROR: .$sql . <br>".$conn->error;
    }
    
}


?>