<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kashish Jewels | Wedding Collection</title>
    <link rel="stylesheet" href="wedding.css">
</head>
<body>
    <div class="menu">
        <ul type="none" class="menu-items">
            <li>Wedding</li>
            <li><a href="modern.php">Modern</a></li>
            <li><a href="home_page.php"><img src="img7.png" class="logo"></a></li>
            <li><a href="Traditional.php">Traditional</a></li>
            <li><a href="account.php">Account</a></li>
        </ul> 
    </div>
    <div class="face">
        <img src="https://static.vecteezy.com/system/resources/previews/013/455/285/non_2x/jewelry-shop-display-with-gold-necklaces-rings-free-vector.jpg" class="img">
    </div>
    <div class="heading" id="choker">
        <h1 class="header">Beautiful Chokers</h1>
    </div>
    <img src="https://www.tanishq.co.in/on/demandware.static/-/Library-Sites-TanishqSharedLibrary/default/dw78fb320b/images/home/Line-Design.svg" style="margin-top: -4vh;">
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

            $sql = "SELECT name, price, img FROM wedding_chokar";
            $result = $conn->query($sql);
        ?> 

        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product'>
                            <img class='image' src='" . $row['img'] . "' alt='Product Image'>
                            <p>" . $row['name'] . "</p>
                            <span>Price: " . $row['price'] . " Rs.</span>
                            <form action='add_to_cart.php' method='post'>
                                <input type='hidden' name='name' value='" . $row['name'] . "'>
                                <input type='hidden' name='price' value='" . $row['price'] . "'>
                                <input type='hidden' name='img' value='" . $row['img'] . "'>
                                <input type='submit' class='btn' name='submit' value='Add to Cart'>
                            </form>
                        </div>";
                }
            }
            ?>
    </div>
    <div class="heading">
        <h1 class="header">Necklaces</h1>
    </div>
    <img src="https://www.tanishq.co.in/on/demandware.static/-/Library-Sites-TanishqSharedLibrary/default/dw78fb320b/images/home/Line-Design.svg" style="margin-top: -4vh;">
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

            $sql = "SELECT name, price, img FROM wedding_necklace";
            $result = $conn->query($sql);
        ?>

        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product'>
                            <img class='image' src='" . $row["img"] . "' alt='Product Image'>
                            <p>" . $row["name"] . "</p>
                            <span>Price: " . $row["price"] . " Rs.</span>
                            <form action='add_to_cart.php' method='post'>
                                <input type='hidden' name='name' value='" . $row['name'] . "'>
                                <input type='hidden' name='price' value='" . $row['price'] . "'>
                                <input type='hidden' name='img' value='" . $row['img'] . "'>
                                <input type='submit' class='btn' name='submit' value='Add to Cart'>
                            </form>
                        </div>";
                }
            } 
            ?>
        </div>


        <div class="heading" id="necklace">
        <h1 class="header">Bridal Set</h1>
        </div>
        <img src="https://www.tanishq.co.in/on/demandware.static/-/Library-Sites-TanishqSharedLibrary/default/dw78fb320b/images/home/Line-Design.svg" style="margin-top: -4vh;">


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

            $sql = "SELECT name, price, img FROM wedding_bridal";
            $result = $conn->query($sql);
        ?>

        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product'>
                            <img class='image' src='" . $row["img"] . "' alt='Product Image'>
                            <p>" . $row["name"] . "</p>
                            <span>Price: " . $row["price"] . " Rs.</span>
                            <form action='add_to_cart.php' method='post'>
                                <input type='hidden' name='name' value='" . $row['name'] . "'>
                                <input type='hidden' name='price' value='" . $row['price'] . "'>
                                <input type='hidden' name='img' value='" . $row['img'] . "'>
                                <input type='submit' class='btn' name='submit' value='Add to Cart'>
                            </form>
                        </div>";
                }
            } 
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