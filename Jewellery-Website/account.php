<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kashish Jewels | Account</title>
    <link rel="stylesheet" href="account.css">
    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');
        }
    </script>
</head>
<body>
    <div class="menu">
        <ul type="none" class="menu-items">
            <li><a href="wedding.php">Wedding</a></li>
            <li><a href="modern.php">Modern</a></li>
            <li><a href="home_page.php"><img src="img7.png" class="logo"></a></li>
            <li><a href="Traditional.php">Traditional</a></li>
            <li>Account</li>
        </ul> 
    </div>
<div class="field">
    <aside class="sidebar">
        <ul type="none" class="items">
            <h1>My Account</h1>
            <li onclick="showSection('profile')">Overview</li>
            <li onclick="showSection('address')">Address</li>
            <li onclick="showSection('payment')">Payments</li>
            <li onclick="showSection('wishlist')">Wishlist</li>
            <li><a href="logout.php">LogOut</a></li>
        </ul> 
    </aside>
    <main class="content">
        <section id="profile" class="section ">
            <h2>Account Overview</h2>
            <div class="overview">
                <p><?php echo"<strong>Name: </strong>" .$_SESSION['user'];?></p>
                <p><?php echo"<strong>Email: </strong>" .$_SESSION['user_email'];?></p>
                <p><?php echo "<strong>Phone Number: </strong>". $_SESSION['user_no'];?></p>
            </div>
        </section>
        <section id="address" class="section">
        
            <h2>Permenant Address</h2>
            <button onclick="showPopup();" class="address"><strong>Add New Address</strong></button>

            <div id="popup" class="popup">
        <div class="popup-content">
            <form method="post" class="add">
                <h4>Contact Details</h4>
                <input type="text" class="input" name="name"  placeholder="Name*"><br>
                <input type="text" class="input" name="mobile"  placeholder="Mobile No*"> 

                <h4>Address</h4>
                <input type="text" class="input" name="pin"  placeholder="Pin Code*"><br>

                <input type="text" class="input" name="add" placeholder="Address(House No, Building, Street, Area)*"><br>

                <input type="text" class="input" name="locality" placeholder="Locality/Town*"><br>

                <input type="text" class="input" name="city" placeholder="City/District*"><br>

                <select id="state" name="state">
                <option value="">--Select State--</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
                </select><br>

                <input type="checkbox" name="check" >
                <label>Make this my default address</label><BR>
                <input type="submit" class="btn" name="submit" value="ADD ADDRESS">
            </form>
            <button onclick="closePopup('popup')">Close</button>
        </div>
    </div>
    <?php
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "signin"; 

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }



            if(isset($_POST['submit'])){

                if (isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $address = $_POST['add'];
                    $town = $_POST['locality'];
                    $city = $_POST['city'];
                    $state = $_POST['state'];
                    $zip = $_POST['pin'];

                    if(!empty($address)){
                        $sql = "INSERT INTO addresses (user_id, address, city, town, state, zip_code) 
                            VALUES ('$user_id', '$address', '$city', '$town', '$state', '$zip')";
                        $add2 = $conn->query($sql);

                        $coll = "SELECT * FROM addresses WHERE user_id = '$user_id'";
                        $add = $conn->query($coll);
                        $rows = $add->fetch_assoc();
                        if($add){
                            echo " <div class='address-container'>" .$rows['address']."," . $rows['town']. "<br>" .$rows['city'].", " .$rows['state']. "<br>" . $rows['zip_code']. "</div>";
                        }
                    }
                    else{
                        echo "No address is added yet!.";
                    }
                }
            }
            ?>
    
    <script>
        function closePopup() {
            document.getElementById("popup").style.display = 'none';
        }

        function showPopup() {
            document.getElementById("popup").style.display = 'flex';
        }
    </script>
        </section>
        <section id="payment" class="section">
            <?php
                if(isset($_POST['submit'])){
                    if($_POST['form_type'] == "payment"){
                        $card = $_POST['card'];
                        $user = $_SESSION['user_id'];
                        $user_name = $_SESSION['user_name'];

                        $payment = "INSERT INTO cards (user_id, user_name, card) VALUES ('$user', '$user_name', '$card')";
                        $payment_check = $conn->query($payment);

                        if($payment){
                            echo "<script>alert('Card Details Added Successfully');</script>";
                        }
                    }
                }
            ?>
            <h2>Add Your Credit Card Number</h2>
            <form action="" method="post">
                <input type="hidden" value="payment" name="form_type">
                <input type="text" name="card" placeholder="Enter card number here..."><br>
                <input type="submit" value="Submit" name="submit">
            </form>
        </section>

        <section id="wishlist" class="section active">
            <?php
                $servername = "localhost";
                $username = "root"; 
                $password = ""; 
                $dbname = "signin"; 

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $user_id = $_SESSION['user_id'];

                $sql = "SELECT product_name, price, img FROM cart WHERE user_id = '$user_id'";
                $result = $conn->query($sql);

                if(isset($_POST['submit2'])){
                    if(!empty($_POST['img'])){
                        $img = $_POST['img'];
                        $dele = "DELETE FROM cart WHERE img = '$img'";
                        $delete = $conn->query($dele);

                        if($delete){
                            echo "<script>alert('Product removed from cart');</script>";
                        }
                    }
                }

            ?>
            <h2>Product List</h2>
            <div class="product-container">
                <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<div class='product'>
                                <img src='" . $row["img"] . "' alt='Product Image'>
                                <h3>" . $row["product_name"] . "</h3>
                                <p>Price: " . $row["price"] . " Rs.</p>
                                <button class='button buyNow' 
                                    data-name='" . $row["product_name"] . "' 
                                    data-price='" . $row["price"] . "' 
                                    data-img='" . $row["img"] . "'>Buy Now</button>
                            </div>";
                        }
                    } else {
                        echo "<p>No products found</p>";
                    }
                ?>
            </div>

            <div class="overlay" id="overlay"></div>

                <div class="popup" id="addressPopup">
                    <span class="close-btn" onclick="closePopup('addressPopup')">&times;</span>
                    <?php
                        $user_id = $_SESSION['user_id'];
                        $address_query = "SELECT * FROM addresses WHERE USER_ID = '$user_id'";
                        $result = $conn->query($address_query);

                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $address = $row['address'];
                            $town = $row['town'];
                            $city = $row['city'];
                            $state = $row['state'];
                            $zip = $row['zip_code'];

                            echo "<h2>Use this Address?</h2>";
                            echo "<p>$address, <br> $town,<br> $city,<br> $state,<br> $zip</p>";
                            echo "<button onclick='useSavedAddress()'>Use This Address</button>";
                        } else {
                            echo "Add Your Address First";
                        }
                    ?>
                </div>

                <script>
                    function useSavedAddress() {
                        nextPopup('addressPopup', 'paymentPopup');
                    }

                    function showNewAddressForm() {
                        document.getElementById("newAddressForm").style.display = "block";
                    }
                </script>
            </div>

<!-- Payment Popup -->
            <div class="popup" id="paymentPopup">
                <span class="close-btn" onclick="closePopup('paymentPopup')">&times;</span>
                <h2>Payment Details</h2>
                <?php
                    $user_id = $_SESSION['user_id'];
                    $payment_query = "SELECT * FROM cards WHERE user_id = '$user_id'";
                    $result2 = $conn->query($payment_query);

                    if ($result2 && $result2->num_rows > 0) {
                        $row = $result2->fetch_assoc();
                        $name = $row['user_name'];
                        $card = $row['card'];
                        echo "<p>$name, $card</p>";
                    } else {
                        echo "Add your card details first";
                    }
                ?>
                <button onclick="nextPopup('paymentPopup', 'confirmationPopup')">Next</button>

            </div>

            <!-- Confirmation Popup -->
            <div class="popup" id="confirmationPopup">
                
                <span class="close-btn" onclick="closePopup('confirmationPopup')">&times;</span>
                <h2>Order Confirmation</h2>
                <p>Your order has been placed successfully!</p>
                <form id="orderForm" method="POST">
                    <input type="hidden" name="name" id="orderName">
                    <input type="hidden" name="price" id="orderPrice">
                    <input type="hidden" name="img" id="orderImg">
                    <input type="hidden" name="form_type" value="submittion" >
                    <input type="submit" name="submit" value="Confirm Order" >
                </form>
                <?php
                    if (isset($_POST['submit'])) { 
                        if ($_POST['form_type'] == "submittion") {
                            $user_id = $_SESSION['user_id'];

                            $address_query = "SELECT * FROM addresses WHERE user_id = '$user_id'";
                            $address_result = $conn->query($address_query);

                            $payment_query = "SELECT * FROM cards WHERE user_id = '$user_id'";
                            $payment_result = $conn->query($payment_query);

                            if ($address_result->num_rows > 0) {
                                $address_data = $address_result->fetch_assoc();
                                $full_address = $address_data['address'] . ', ' . $address_data['town'] . ', ' . $address_data['city'] . ', ' . $address_data['state'] . ' - ' . $address_data['zip_code'];

                                if ($payment_result->num_rows > 0) {
                                    $payment_data = $payment_result->fetch_assoc();
                                    $card_last4 = substr($payment_data['card'], -4);
                                } else {
                                    $card_last4 = NULL;
                                }

                                $name = $_POST['name'];
                                $price = $_POST['price'];
                                $img = $_POST['img'];
                                $user_name = $_SESSION['user_name'];

                                $order_insert = "INSERT INTO orders (user_id, user_name, name, price, img, address, card_last4) 
                                                VALUES ('$user_id', '$user_name', '$name', '$price', '$img', '$full_address', '$card_last4')";

                                if ($conn->query($order_insert) === TRUE) {
                                    echo "<script>alert('Order placed successfully!');</script>";
                                } else {
                                    echo "<script>alert('Error placing order: " . $conn->error . "');</script>";
                                }
                            } else {
                                echo "<script>alert('No address found! Please add your address first.');</script>";
                            }
                        }
                    }
                ?>
            </div>

            <script>
            document.querySelectorAll(".buyNow").forEach(button => {
                button.addEventListener("click", function(event) {
                    event.preventDefault();
                    
                    // Data ko hidden input fields me store karo
                    document.getElementById("orderName").value = this.getAttribute("data-name");
                    document.getElementById("orderPrice").value = this.getAttribute("data-price");
                    document.getElementById("orderImg").value = this.getAttribute("data-img");
                    
                    openPopup('addressPopup');
                });
            });

            function openPopup(popupId) {
                document.getElementById('overlay').style.display = 'block';
                document.getElementById(popupId).style.display = 'block';
            }

            function nextPopup(current, next) {
                document.getElementById(current).style.display = 'none';
                document.getElementById(next).style.display = 'block';
            }

            function closePopup(popupId) {
                document.getElementById(popupId).style.display = 'none';
                document.getElementById('overlay').style.display = 'none';
            }
            </script>
    

        </section>

        <section id="orders" class="section ">
            <div class="product-container2">
            <h2>Your Order History</h2>
                <?php
                    $user_id = $_SESSION['user_id'];
                    $history_check = "SELECT name, price, img FROM orders WHERE user_id = '$user_id'";
                    $history_query = $conn->query($history_check);

                    if ($history_query->num_rows > 0) {
                        while($rowsss = $history_query->fetch_assoc()) {
                            echo "<div class='product2'> 
                            <img class=''src='" .$rowsss['img'] ."'>
                            <h3>" .$rowsss['name'] . "</h3>
                            <p>Price : " .$rowsss['price']. "</p>
                        </div>";
                        }   
                    }
                    else{
                        echo "No Orders Found.";
                    }
                ?>
            </div>
        </section>
        
    </main>
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