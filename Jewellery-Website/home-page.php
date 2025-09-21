<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "homepage";

$conn = new mysqli($host, $user, $password, $dbname);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kashish Jewels | Home</title>
    <link rel="stylesheet" href="home_page.css">
</head>
<body>
    <div class="layer1">
        <div class="menu">
            <ul type="none" class="menu-items">
                <li><a href="wedding.php">Wedding</a></li>
                <li><a href="modern.php">Modern</a></li>
                <li><img src="img7.png" class="logo"></li>
                <li><a href="Traditional.php">Traditional</a></li>
                <li><a href="account.php">Account</a></li>
            </ul> 
        </div>
        <div class="header">
                <h1>KASHISH<br>JEWELS</h1>
        </div>
    </div>
    <!-- <div class="view"> -->
        <div class="circles">
            <?php
                $sql = "SELECT * FROM section WHERE section_name = 'section-A'";
                $result = $conn->query($sql);
                while($rows = $result->fetch_assoc()){
                    echo "<img src='" .$rows['img']. "' class='img'>";
                }
            ?>

             <?php
                $sql2 = "SELECT * FROM section WHERE section_name = 'section-A2'";
                $res = $conn->query($sql2);
                while($rows = $res->fetch_assoc()){
                    echo "<img src='" .$rows['img']. "' class='img'>";
                }
             ?>

            <?php
                $sql3 = "SELECT * FROM section WHERE section_name = 'section-A3'";
                $res1 = $conn->query($sql3);
                while($rows = $res1->fetch_assoc()){
                    echo "<img src = '" .$rows['img']. "' class='img'>";
                }
            ?>

            <?php
                $sql4 = "SELECT * FROM section WHERE section_name = 'section-A4'";
                $res2 = $conn->query($sql4);
                while($rows = $res2->fetch_assoc()){
                    echo "<img src = '" .$rows['img']. "' class='img'>";
                }
            ?>

            <?php
                $sql5 = "SELECT * FROM section WHERE section_name = 'section-A5'";
                $res3 = $conn->query($sql5);
                while($rows = $res3->fetch_assoc()){
                    echo "<img src = '" .$rows['img']. "' class='img'>";
                }
            ?>

        </div>
        <div class="layer2">
            <h1 class="heading">Every piece is <br>ethically made<br> using traditional <br>handcrafted <br> methods, in our<br> workshop.</h1>
        </div>
        <div class="layer3">
            <h1>Rings of rare beauty</h1>
            <p class="sub">The Perfect Ring for the Perfect Moment.</p>
            <img src="https://www.tanishq.co.in/on/demandware.static/-/Library-Sites-TanishqSharedLibrary/default/dw78fb320b/images/home/Line-Design.svg" style="margin-top: -4vh;">

            <div class="gallery">

                <div class="polaroid">
                    <?php
                        $sel = "SELECT * FROM rings WHERE section_name = 'ring-1'";
                        $result1 = $conn->query($sel);
                        while($rows = $result1->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'> <p> " .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
                <div class="polaroid">
                <?php
                        $sel1 = "SELECT * FROM rings WHERE section_name = 'ring-2'";
                        $result2 = $conn->query($sel1);
                        while($rows = $result2->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'> <p> " .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
                <div class="polaroid">
                <?php
                        $sel2 = "SELECT * FROM rings WHERE section_name = 'ring-3'";
                        $result3 = $conn->query($sel2);
                        while($rows = $result3->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'> <p> " .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
                <div class="polaroid">
                <?php
                    $sel3 = "SELECT * FROM rings WHERE section_name = 'ring-4'";
                    $result4 = $conn->query($sel3);
                    while($rows = $result4->fetch_assoc()){
                        echo "<img src = '" .$rows['img']. "'>";
                        echo "<div class='text-container'> <p> " .$rows['description']. "</p></div>";
                    }
                ?>
                </div>
            </div>
        </div>

        <div class="layer3">
            <h1>Earring is Forever</h1>
            <p class="sub">Let's Steal the Spotlight.</p>
            <img src="https://www.tanishq.co.in/on/demandware.static/-/Library-Sites-TanishqSharedLibrary/default/dw78fb320b/images/home/Line-Design.svg" style="margin-top: -4vh;">

            <div class="gallery">
                
                <div class="polaroid">
                    <?php
                        $se = "SELECT * FROM earrings WHERE section_name = 'ear-1'";
                        $re = $conn->query($se);

                        while($rows = $re->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'><p>" .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
                <div class="polaroid">
                    <?php
                        $se1 = "SELECT * FROM earrings WHERE section_name = 'ear-2'";
                        $re1 = $conn->query($se1);

                        while($rows = $re1->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'><p>" .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
                <div class="polaroid">
                    <?php
                        $se2 = "SELECT * FROM earrings WHERE section_name = 'ear-3'";
                        $re2 = $conn->query($se2);

                        while($rows = $re2->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'><p>" .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
                <div class="polaroid">
                    <?php
                        $se3 = "SELECT * FROM earrings WHERE section_name = 'ear-4'";
                        $re3 = $conn->query($se3);
                        while($rows = $re3->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'><p>" .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="layer3">
            <h1>Shop By Category</h1>
            <p class="sub">Browse through your favorite categories.</p>
            <img src="https://www.tanishq.co.in/on/demandware.static/-/Library-Sites-TanishqSharedLibrary/default/dw78fb320b/images/home/Line-Design.svg" style="margin-top: -4vh;">

            <div class="gallery">
                
                <div class="polaroid">
                    <?php
                        $ab = "SELECT * FROM category WHERE section_name = 'necklace'";
                        $cd = $conn->query($ab);
                        while($rows = $cd->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'><p>" .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
                
                <div class="polaroid">
                    <?php
                        $ab1 = "SELECT * FROM category WHERE section_name = 'chokar'";
                        $cd1 = $conn->query($ab1);
                        while($rows = $cd1->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'><p>" .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
                <div class="polaroid">
                    <?php
                        $ab2 = "SELECT * FROM category WHERE section_name = 'ring'";
                        $cd2 = $conn->query($ab2);
                        while($rows = $cd2->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'><p>" .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
                <div class="polaroid">
                    <?php
                        $ab3 = "SELECT * FROM category WHERE section_name = 'chain'";
                        $cd3 = $conn->query($ab3);
                        while($rows = $cd3->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'><p>" .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
            </div>


            <div class="gallery">
                <div class="polaroid">
                    <?php
                        $ab4 = "SELECT * FROM category WHERE section_name = 'bracelate'";
                        $cd4 = $conn->query($ab4);
                        while($rows = $cd4->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'><p>" .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
                <div class="polaroid">
                    <?php
                        $ab5 = "SELECT * FROM category WHERE section_name = 'bangle'";
                        $cd5 = $conn->query($ab5);
                        while($rows = $cd5->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'><p>" .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
                <div class="polaroid">
                <?php
                        $ab6 = "SELECT * FROM category WHERE section_name = 'pendent'";
                        $cd6 = $conn->query($ab6);
                        while($rows = $cd6->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'><p>" .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
                <div class="polaroid">
                    <?php
                        $ab7 = "SELECT * FROM category WHERE section_name = 'mangal'";
                        $cd7 = $conn->query($ab7);
                        while($rows = $cd7->fetch_assoc()){
                            echo "<img src = '" .$rows['img']. "'>";
                            echo "<div class='text-container'><p>" .$rows['description']. "</p></div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    <!-- </div> -->
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

