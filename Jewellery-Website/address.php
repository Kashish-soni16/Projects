<?php
session_start();
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "signin"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $address = $_POST['add'];
    $town = $_POST['locality'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['pin'];

    $sql = "INSERT INTO addresses (user_id, address, city, state, zip_code) 
            VALUES ('$user_id', '$address', '$city', '$state', '$zip')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Address saved successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Please login first!";
}
?>