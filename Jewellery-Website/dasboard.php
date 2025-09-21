<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "signin"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
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
    <div class="field">
    <aside class="sidebar">
        <ul>
            <li onclick="showSection('face')">Category Banners</li>
            <li onclick="showSection('product_list')">View Products</li>
            <li onclick="showSection('add_products')">Add Products</li>
            <li onclick="showSection('make_changes')">Make Changes</li>
            <li onclick="showSection('orders')">View Orders</li>
            <li onclick="showSection('user')">Customers</li>
            <li><a href="dashboard_login.php">Log Out</a></li>
        </ul>
    </aside>
    <main class="content">
        <section id="face" class="section active">
            <h2>Change Category Banner From Home Page</h2>                   
            <div class="product-container">
                <?php
                    $server = "localhost";
                    $user = "root"; 
                    $pwd = "";
                    $db = "homepage"; 
                    
                    $conn2 = new mysqli($server, $user, $pwd, $db);
                    
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sell = "SELECT * FROM category";
                    $result3 = $conn2->query($sell);
                    while($row = $result3->fetch_assoc()){
                        echo "<div class='product'>";
                        echo "<table>";
                        echo "<tr>";
                        echo "<td><img src = '" .$row['img']. "'></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>ID = " .$row['id']. "</td>";
                        echo "</tr>";
                        echo "</table>";
                        echo "</div>";
                    }
                    if(isset($_POST['submit'])){
                        if($_POST['form_type'] == "update"){
                            $new_banner = $_POST['img'];
                            $new_desc = $_POST['name'];
                            $banner_id = $_POST['id'];
                            if(!empty($new_desc)){
                                $up = "UPDATE category SET img = '$new_banner', description = '$new_desc' WHERE id = $banner_id";
                                $result = $conn2->query($up);
                                if($result){
                                    echo "<script>
                                            alert('Update Done..');
                                        </script>";
                                    echo "<script>window.location.href = dashborad.php#face;</script>";
                                    exit();
                                }
                            }
                            else{
                                $up = "UPDATE category SET img = '$new_banner' WHERE id = $banner_id";
                                $result = $conn2->query($up);
                                if($result){
                                    echo "<script>
                                            alert('Update Done..');
                                            </script>";
                                    echo "<script>window.location.href = dashborad.php#add_products;</script>";
                                    exit();
                                }
                            }
                        }
                    }
                ?>
            </div>
            <div class="adder">
                <form method="post" action="">
                    <label for="img">Image:-</label>
                    <input type="file" name="img"><br>
                    <input type="hidden" name="form_type" value="update">
                    <label for="name">Description :- </label>
                    <input type="text" name="name"> <br>
                    <label for="id" >Id :- </label>
                    <input type="text" name="id"><br>
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>
        </section>
        <section id="product_list" class="section">
        <?php
            $servername = "localhost";
            $username = "root"; 
            $password = "";
            $dbname = "signin"; 

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $select = "SELECT * FROM modern";
            $table = $conn->query($select);

            $select1 = "SELECT * FROM traditional";
            $table1 = $conn->query($select1);

            $select2 = "SELECT * FROM wedding_bridal";
            $table2 = $conn->query($select2);

            $select3 = "SELECT * FROM wedding_chokar";
            $table3 = $conn->query($select3);

            $select4 = "SELECT * FROM wedding_necklace";
            $table4 = $conn->query($select4);
        ?>
        <h2>Modern Jewellery</h2>
            <div class="items">
                <table>
                    <tr>
                        <td>Id</td>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                    </tr>

                    <?php
                    if ($table->num_rows > 0) {
                        while ($row = $table->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" .$row['id'] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td><img src='" . $row["img"] . "' alt='Product Image'></td>";
                            echo "<td>" . $row["price"] . " Rs.</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No products found</td></tr>";
                    }
                    ?>
                </table>
            </div>

            <h2>Traditional Jewellery</h2>
            <div class="items">
                <table>
                    <tr>
                        <td>Id</td>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                    </tr>

                    <?php
                    if ($table1->num_rows > 0) {
                        while ($row = $table1->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" .$row['id'] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td><img src='" . $row["img"] . "' alt='Product Image'></td>";
                            echo "<td>" . $row["price"] . " Rs.</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No products found</td></tr>";
                    }
                    ?>
                </table>
            </div>

            <h2>Bridal Jewellery</h2>
            <div class="items">
                <table>
                    <tr>
                        <td>Id</td>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                    </tr>

                    <?php
                    if ($table2->num_rows > 0) {
                        while ($row = $table2->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" .$row['id'] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td><img src='" . $row["img"] . "' alt='Product Image'></td>";
                            echo "<td>" . $row["price"] . " Rs.</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No products found</td></tr>";
                    }
                    ?>
                </table>
            </div>

            <h2>Wedding Chokars</h2>
            <div class="items">
                <table>
                    <tr>
                        <td>Id</td>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                    </tr>

                    <?php
                    if ($table3->num_rows > 0) {
                        while ($row = $table3->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" .$row['id'] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td><img src='" . $row["img"] . "' alt='Product Image'></td>";
                            echo "<td>" . $row["price"] . " Rs.</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No products found</td></tr>";
                    }
                    ?>
                </table>
            </div>

            <h2>Modern Necklace</h2>
            <div class="items">
                <table>
                    <tr>
                        <td>Id</td>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                    </tr>

                    <?php
                    if ($table4->num_rows > 0) {
                        while ($row = $table4->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" .$row['id'] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td><img src='" . $row["img"] . "' alt='Product Image'></td>";
                            echo "<td>" . $row["price"] . " Rs.</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No products found</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </section>
        <section id="add_products" class="section">
            <h2>Add Product in Modern Designs</h2>
            <div class="adder">
                <form method="post">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" name="name" placeholder="Enter name of product*" required ><br><br>
                    <input type="hidden" name="form_type" value="modern">
                    <label for="price"><strong>Price:</strong></label>
                    <input type="text" name="price" placeholder="Enter the Price*" require pattern="[0-9]+" ><br><br>
                    <label for="img"><strong>Select Image:</strong></label>
                    <input type="file" class="file" name="img" required><br><br>
                    <input type="submit" id="btn" name="submit" accept=".jpg, .jpeg, .png" value="ADD" title="Only image file Acceptable">
                </form>
            </div>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "signin";
            
            $conn = new mysqli($host, $user, $password, $dbname);
            
            if($conn->connect_error){
                echo "Connection failed" . $conn->connect_error;
            }
                if(isset($_POST['submit'])){
                    if(isset($_POST['form_type'])){
                        $form_type = $_POST['form_type'];
                        if($form_type == "modern"){
                            $name = $_POST['name'];
                            $price = $_POST['price'];
                            $img = $_POST['img'];

                            $check = "SELECT * FROM modern WHERE img = '$img'";
                            $check_result = $conn->query($check);

                            if ($check_result->num_rows > 0) {
                                echo "<script>alert('This image already exists in the database. Please upload a different image.');</script>";
                                echo "<script>window.location.href = window.location.href;</script>";
                            } else{

                                $sql = "INSERT INTO modern (name, price, img) VALUES('$name', '$price', '$img')";
                                $result = $conn->query($sql);

                                if($result){
                                    echo "<script>
                                        alert('Product added successfully');
                                        </script>";
                                    echo "<script>window.location.href = dashborad.php#add_products;</script>";
                                    exit();
                                }
                            } 
                        }
                    }
                }
            ?>

            <h2>Add Product in Traditional Designs</h2>
            <div class="adder">
                <form id="traditional" method="post">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" name="name" placeholder="Enter name of product*" required ><br><br>
                    <input type="hidden" name="form_type" value="traditional">
                    <label for="price"><strong>Price:</strong></label>
                    <input type="text" name="price" placeholder="Enter the Price*" require pattern="[0-9]+" ><br><br>
                    <label for="img" ><strong>Select Image:</strong></label>
                    <input type="file" class="file" name="img" required><br><br>
                    <input type="submit" id="btn" name="submit" accept=".jpg, .jpeg, .png" value="ADD" title="Only image file Acceptable">
                </form>
                <?php   
                    $host = "localhost";
                    $user = "root";
                    $password = "";
                    $dbname = "signin";
                    
                    $conn = new mysqli($host, $user, $password, $dbname);
                    
                    if($conn->connect_error){
                        echo "Connection failed" . $conn->connect_error;
                    }        
                    if(isset($_POST['submit'])){
                        if(isset($_POST['form_type'])){
                            $form_type = $_POST['form_type'];
                            if($form_type == "traditional"){
                                $name = $_POST['name'];
                                $price = $_POST['price'];
                                $img = $_POST['img'];

                                $check = "SELECT * FROM traditional WHERE img = '$img'";
                                $check_result = $conn->query($check);

                                if ($check_result->num_rows > 0) {
                                    echo "<script>alert('This image already exists in the database. Please upload a different image.');</script>";
                                    echo "<script>window.location.href = dashboard.php#traditional;</script>";
                                } else{

                                    $sql = "INSERT INTO traditional (name, price, img) VALUES('$name', '$price', '$img')";
                                    $result = $conn->query($sql);
                                    if($result){
                                        echo "<script>alert('Product added successfully');</script>";
                                        echo "<script>window.location.href = dashborad.php#traditional;</script>";
                                        header('Location:dashboard.php#traditional');
                                        exit();
                                    }
                                }
                            }
                        }
                    }
                ?>
            </div>

            <h2>Add Product in Wedding Chokar Designs</h2>
            <div class="adder">
                <form id="wedding_chokar" method="post">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" name="name" placeholder="Enter name of product*" required ><br><br>
                    <input type="hidden" name="form_type" value="wedding_choker">
                    <label for="price"><strong>Price:</strong></label>
                    <input type="text" name="price" placeholder="Enter the Price*" require pattern="[0-9]+" ><br><br>
                    <label for="img"><strong>Select Image:</strong></label>
                    <input type="file" class="file" name="img" required><br><br>
                    <input type="submit" id="btn" name="submit" accept=".jpg, .jpeg, .png" value="ADD" title="Only image file Acceptable">
                </form>
                <?php
                    $host = "localhost";
                    $user = "root";
                    $password = "";
                    $dbname = "signin";

                    $conn = new mysqli($host, $user, $password, $dbname);

                    if($conn->connect_error){
                        echo "Connection failed" . $conn->connect_error;
                    }
                                
                    if(isset($_POST['submit'])){
                        if(isset($_POST['form_type'])){
                            $form_type = $_POST['form_type'];
                            if($form_type == "wedding_choker"){
                                $name = $_POST['name'];
                                $price = $_POST['price'];
                                $img = $_POST['img'];

                                $check = "SELECT * FROM wedding_chokar WHERE img = '$img'";
                                $check_result = $conn->query($check);

                                if ($check_result->num_rows > 0) {
                                    echo "<script>alert('This image already exists in the database. Please upload a different image.');</script>";
                                    echo "<script>window.location.href = dashboard.php#wedding_chokar;</script>";
                                } else{

                                    $sql = "INSERT INTO wedding_chokar (name, price, img) VALUES('$name', '$price', '$img')";
                                    $result = $conn->query($sql);

                                    if($result){
                                        echo "<script>
                                            alert('Product added successfully');
                                            </script>";
                                        echo "<script>window.location.href = dashborad.php#wedding_chokar;</script>";
                                        exit();
                                    }
                                }
                            }
                        }
                    }
                ?>
            </div>

            <h2>Add Product in Wedding Necklace Designs</h2>
            <div class="adder">
                <form id="wedding_necklace" method="post">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" name="name" placeholder="Enter name of product*" required ><br><br>
                    <input type="hidden" name="form_type" value="wedding_necklace">
                    <label for="price"><strong>Price:</strong></label>
                    <input type="text" name="price" placeholder="Enter the Price*" require pattern="[0-9]+" ><br><br>
                    <label for="img"><strong>Select Image:</strong></label>
                    <input type="file" class="file" name="img" required><br><br>
                    <input type="submit" id="btn" name="submit" accept=".jpg, .jpeg, .png" value="ADD" title="Only image file Acceptable">
                </form>
                <?php
                    $host = "localhost";
                    $user = "root";
                    $password = "";
                    $dbname = "signin";

                    $conn = new mysqli($host, $user, $password, $dbname);

                    if($conn->connect_error){
                        echo "Connection failed" . $conn->connect_error;
                    }
                                
                    if(isset($_POST['submit'])){
                        if(isset($_POST['form_type'])){
                            $form_type = $_POST['form_type'];
                            if($form_type == "wedding_necklace"){
                                $name = $_POST['name'];
                                $price = $_POST['price'];
                                $img = $_POST['img'];

                                $check = "SELECT * FROM wedding_necklace WHERE img = '$img'";
                                $check_result = $conn->query($check);

                                if ($check_result->num_rows > 0) {
                                    echo "<script>alert('This image already exists in the database. Please upload a different image.');</script>";
                                    echo "<script>window.location.href = dashboard.php#wedding_necklace;</script>";
                                } else{

                                    $sql = "INSERT INTO wedding_necklace (name, price, img) VALUES('$name', '$price', '$img')";
                                    $result = $conn->query($sql);

                                    if($result){
                                        echo "<script>
                                            alert('Product added successfully');
                                            </script>";
                                        echo "<script>window.location.href = dashborad.php#wedding_necklace;</script>";
                                        exit();
                                    }
                                }
                            }
                        }
                    }
                ?>
            </div>

            <h2>Add Product in Wedding Bridal Set Designs</h2>
            <div class="adder">
                <form id="wedding_bridal" method="post">
                    <label for="name"><strong>Name:</strong></label>
                    <input type="text" name="name" placeholder="Enter name of product*" required ><br><br>
                    <input type="hidden" name="form_type" value="wedding_bridal">
                    <label for="price"><strong>Price:</strong></label>
                    <input type="text" name="price" placeholder="Enter the Price*" require pattern="[0-9]+" ><br><br>
                    <label for="img"><strong>Select Image:</strong></label>
                    <input type="file" class="file" name="img" required><br><br>
                    <input type="submit" id="btn" name="submit" accept=".jpg, .jpeg, .png" value="ADD" title="Only image file Acceptable">
                </form>
                <?php
                    $host = "localhost";
                    $user = "root";
                    $password = "";
                    $dbname = "signin";

                    $conn = new mysqli($host, $user, $password, $dbname);

                    if($conn->connect_error){
                        echo "Connection failed" . $conn->connect_error;
                    }
                                
                    if(isset($_POST['submit'])){
                        if(isset($_POST['form_type'])){
                            $form_type = $_POST['form_type'];
                            if($form_type == "wedding_bridal"){
                                $name = $_POST['name'];
                                $price = $_POST['price'];
                                $img = $_POST['img'];

                                $check = "SELECT * FROM wedding_bridal WHERE img = '$img'";
                                $check_result = $conn->query($check);

                                if ($check_result->num_rows > 0) {
                                    echo "<script>alert('This image already exists in the database. Please upload a different image.');</script>";
                                    echo "<script>window.location.href = dashboard.php#wedding_bridal;</script>";
                                } else{

                                    $sql = "INSERT INTO wedding_bridal (name, price, img) VALUES('$name', '$price', '$img')";
                                    $result = $conn->query($sql);

                                    if($result){
                                        echo "<script>
                                            alert('Product added successfully');
                                            </script>";
                                        echo "<script>window.location.href = dashborad.php#wedding_bridal;</script>";
                                        header('Location:dashboard.php#traditional');
                                        exit();
                                    }
                                }
                            }
                        }
                    }
                ?>
            </div>
        </section>
        
        <section id="make_changes" class="section">
            <?php
            if(isset($_POST['submit'])){
                $new_banner = $_POST['img'];
                $new_des = $_POST['description'];
                $banner_id = $_POST['id'];
                $new_price = $_POST['price'];
            
                if($_POST['form_type'] == "modern_update"){
                    $up = "UPDATE modern 
                           SET name = COALESCE(NULLIF(?, ''), name), 
                               price = COALESCE(NULLIF(?, ''), price), 
                               img = COALESCE(NULLIF(?, ''), img) 
                           WHERE id = ?";
            
                    $stmt = $conn->prepare($up);
                    $stmt->bind_param("sssi", $new_des, $new_price, $new_banner, $banner_id);
                    $result = $stmt->execute();
            
                    if($result){
                        echo "<script>
                            alert('Update Done! ✅');
                            // window.location.href = 'dashborad.php#face';
                            </script>";
                        exit();
                    }
                    $stmt->close();
                }
                elseif($_POST['form_type'] == "traditional_update"){
                    $up = "UPDATE traditional 
                           SET name = COALESCE(NULLIF(?, ''), name), 
                               price = COALESCE(NULLIF(?, ''), price), 
                               img = COALESCE(NULLIF(?, ''), img) 
                           WHERE id = ?";
            
                    $stmt = $conn->prepare($up);
                    $stmt->bind_param("sssi", $new_des, $new_price, $new_banner, $banner_id);
                    $result = $stmt->execute();
            
                    if($result){
                        echo "<script>
                            alert('Update Done! ✅');
                            window.location.href = 'dashborad.php#face';
                            </script>";
                        exit();
                    }
                    $stmt->close();
                }
                elseif($_POST['form_type'] == "weddingneck_update"){
                    $up = "UPDATE wedding_necklace 
                           SET name = COALESCE(NULLIF(?, ''), name), 
                               price = COALESCE(NULLIF(?, ''), price), 
                               img = COALESCE(NULLIF(?, ''), img) 
                           WHERE id = ?";
            
                    $stmt = $conn->prepare($up);
                    $stmt->bind_param("sssi", $new_des, $new_price, $new_banner, $banner_id);
                    $result = $stmt->execute();
            
                    if($result){
                        echo "<script>
                            alert('Update Done! ✅');
                            // window.location.href = 'dashborad.php#face';
                            </script>";
                        exit();
                    }
                    $stmt->close();
                }
                elseif($_POST['form_type'] == "weddingchok_update"){
                    $up = "UPDATE wedding_chokar 
                           SET name = COALESCE(NULLIF(?, ''), name), 
                               price = COALESCE(NULLIF(?, ''), price), 
                               img = COALESCE(NULLIF(?, ''), img) 
                           WHERE id = ?";
            
                    $stmt = $conn->prepare($up);
                    $stmt->bind_param("sssi", $new_des, $new_price, $new_banner, $banner_id);
                    $result = $stmt->execute();
            
                    if($result){
                        echo "<script>
                            alert('Update Done! ✅');
                            // window.location.href = 'dashborad.php#face';
                            </script>";
                        exit();
                    }
                    $stmt->close();
                }
                else{
                    $up = "UPDATE wedding_bridal
                           SET name = COALESCE(NULLIF(?, ''), name), 
                               price = COALESCE(NULLIF(?, ''), price), 
                               img = COALESCE(NULLIF(?, ''), img) 
                           WHERE id = ?";
            
                    $stmt = $conn->prepare($up);
                    $stmt->bind_param("sssi", $new_des, $new_price, $new_banner, $banner_id);
                    $result = $stmt->execute();
            
                    if($result){
                        echo "<script>
                            alert('Update Done! ✅');
                            // window.location.href = 'dashborad.php#face';
                            </script>";
                        exit();
                    }
                    $stmt->close();
                }
            }
        ?>
            <h2>Make a Change in Modern Designs</h2>
            <div class="adder">
                <form method="post" action="">
                    <label for="img">Image :- </label>
                    <input type="file" class="file" name="img" ><br>
                    <label for="name">Description :- </label>
                    <input type="text" name="description"><br>
                    <label for="price">Price :- </label>
                    <input type="text" name="price"><br>
                    <input type="hidden" name="form_type" value="modern_update">
                    <label for="id">Id :- </label>
                    <input type="text" name="id"><br>
                    <input type="submit" id="btn" name="submit" value="Submit">
                </form>
            </div>
            <h2>Make a Change in Traditional Designs</h2>
            <div class="adder">
                <form method="post" action="">
                    <label for="img">Image :- </label>
                    <input type="file" class="file" name="img" ><br>
                    <label for="name">Description :- </label>
                    <input type="text" name="description"><br>
                    <label for="price">Price :- </label>
                    <input type="text" name="price"><br>
                    <input type="hidden" name="form_type" value="traditional _update">
                    <label for="id">Id :- </label>
                    <input type="text"  name="id"><br>
                    <input type="submit" id="btn" name="submit" value="Submit">
                </form>
            </div>   
            <h2>Make a Change in Wedding Necklaces</h2>
            <div class="adder">
                <form method="post" action="">
                    <label for="img">Image :- </label>
                    <input type="file" class="file" name="img" ><br>
                    <label for="name">Description :- </label>
                    <input type="text" name="description"><br>
                    <label for="price">Price :- </label>
                    <input type="text" name="price"><br>
                    <input type="hidden" name="form_type" value="weddingneck_update">
                    <label for="id">Id :- </label>
                    <input type="text"  name="id"><br>
                    <input type="submit" id="btn" name="submit" value="Submit">
                </form>
            </div>
            <h2>Make a Change in wedding Choker Designs</h2>
            <div class="adder">
                <form method="post" action="">
                    <label for="img">Image :- </label>
                    <input type="file" class="file" name="img" ><br>
                    <label for="name">Description :- </label>
                    <input type="text" name="description"><br>
                    <label for="price">Price :- </label>
                    <input type="text" name="price"><br>
                    <input type="hidden" name="form_type" value="weddingchok_update">
                    <label for="id">Id :- </label>
                    <input type="text"  name="id"><br>
                    <input type="submit" id="btn" name="submit" value="Submit">
                </form>
            </div>

            <h2>Make a Change in Bridal Wedding Sets</h2>
            <div class="adder">
                <form method="post" action="">
                    <label for="img">Image :- </label>
                    <input type="file" class="file" name="img" ><br>
                    <label for="name">Description :- </label>
                    <input type="text" name="description"><br>
                    <label for="price">Price :- </label>
                    <input type="text" name="price"><br>
                    <input type="hidden" name="form_type" value="weddingbride_update">
                    <label for="id">Id :- </label>
                    <input type="text"  name="id"><br>
                    <input type="submit" id="btn" name="submit" value="Submit">
                </form>
            </div>
        </section>
        <section id="orders" class="section">
            <h2>User Orders</h2>
            <div>
                <table class="users">
                    <tr>
                        <th><strong>Order ID</strong></th>
                        <th><strong>Name</strong></th>
                        <th><strong>Product Name</strong></th>
                        <th><strong>Price</strong></th>
                        <th><strong>Image</strong></th>
                        <th><strong>Address</strong></th>
                        <th><strong>Time</strong></th>
                        <th><strong>Status</strong></th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM orders";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["id"] . "</td>
                                        <td>" . $row["user_name"] . "</td>
                                        <td>" . $row["name"] . "</td>
                                        <td>" . $row["price"] . " Rs.</td>
                                        <td><img src='" . $row["img"] . "' width='50'></td>
                                        <td>" . $row["address"] . "</td>
                                        <td>" . $row["created_at"] . "</td>
                                        // <td><form method='post'>
                                        // <input type='submit' name='cancel' value='Cancel'>
                                        // <input type='hidden' name='form_type' value='cancelation'>
                                        // <input type='hidden' name='order_id' value='".$row['id']."'
                                        // </form>
                                    </tr>";
                                    if(isset($_POST['cancel'])) {
                                        if($_POST['form_type'] == "cancelation"){
                                            $order_id = $_POST['order_id']; 
                                            $delete_sql = "DELETE FROM orders WHERE id = '$order_id'";
                                            $del = $conn->query($delete_sql);
                                            
                                            if ($del) {
                                                echo "<script>alert('Order Canceled Successfully');</script>";
                                            } else {
                                                echo "Error deleting record: " . $conn->error;
                                            }
                                        }
                                    }
                            }
                        } else {
                            echo "<tr><td colspan='7'>No orders found</td></tr>";
                        }

                    ?>
                </table>
            </div>
        </section>
        <section id="user" class="section ">
            <h2>Customer Details</h2>
            <div class="container">
                
                <table class="users">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone No</th>
                        <th>Email</th>
                    </tr>
                    <?php
                    $sql = "SELECT id, Name, phone, email FROM registration";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["Name"] . "</td>
                                    <td>" . $row["phone"] . "</td>
                                    <td>" . $row["email"] . "</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No customers found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </table>
            </div>
        </section>
    </main>
    </div>
</body>
</html>