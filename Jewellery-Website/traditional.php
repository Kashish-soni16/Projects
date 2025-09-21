<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kashish Jewels | Traditional</title>
    <link rel="stylesheet" href="traditional.css">
</head>
<body>
    <div class="menu">
        <ul type="none" class="menu-items">
            <li><a href="wedding.php">Wedding</a></li>
            <li><a href="modern.php">Modern</a></li>
            <li><a href="home_page.php"><img src="img7.png" class="logo"></a></li>
            <li>Traditional</li>
            <li><a href="account.php">Account</a></li>
        </ul> 
    </div>
    <div class="container">
        
        <video autoplay loop muted plays-inline class="background-clip">
            <source src="video.mp4" type="video/mp4">
        </video>

    </div>

    <div class="product-container">
        <?php
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "signin"; 

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT name, price, img FROM traditional";
            $result = $conn->query($sql);
        ?>
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product'>
                            <img class='image' src='" . $row["img"] . "' alt='Product Image'>
                            <p><strong>" . $row["name"] . "</strong></p>
                            <span>Price: " . $row["price"] . " Rs.</span>
                            <form action='add_to_cart.php' method='post'>
                                <input type='hidden' name='name' value='" . $row['name'] . "'>
                                <input type='hidden' name='price' value='" . $row['price'] . "'>
                                <input type='hidden' name='img' value='" . $row['img'] . "'>
                                <input type='submit' class='btn' name='submit' value='Add to Cart'>
                            </form>
                        </div>";
                }
            } else {
                echo "<p>No products found</p>";
            }
            $conn->close();
            ?>
        </div>
    <div class="ending">
        <div class="details">
            <ul type="none">
                <li><h2>Useful Links</h2></li>
                <li>Delivery Information</li>
                <li>Payment Option</li>
                <li>Track your Order</li>
                <li>Return</li>
                <li>International Shipping</li>
            </ul>
            <ul type="none">
                <li><h2>Contact Us</h2></li>
                <li>Write to Us</li>
                <li>1800-566-447</li>
                <li>Chat with us</li>
            </ul>
            <ul type="none">
                <li><h2>More</h2></li>
                <li><a href="wedding.php">Wedding</a></li>
                <li><a href="modern.php">Modern</a></li>
                <li><a href="traditional.php">Traditional</a></li>
                <li>Account</li>
            </ul>   
        </div>
    </div>
</body>
</html>