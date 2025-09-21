<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "signin"; 
session_start();

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $user_id = $_SESSION['user_id'];

    $check_sql = "SELECT * FROM cart WHERE product_name = '$name' AND user_id = '$user_id'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Product already exist!.');</script>";
    } else {
        $insert_sql = "INSERT INTO cart (user_id, product_name, price, img) VALUES ('$user_id', '$name', '$price', '$img')";
        $result1 = $conn->query($insert_sql);
        if($result1){
            echo "<script>alert('Product has been added to your cart!. ✅');</script>";
        }
    }
}
?>
