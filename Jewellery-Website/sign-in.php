<?PHP
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "signin";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $phone = $_POST["no"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];

    $select = "SELECT * FROM registration WHERE email = '$email' AND phone = '$phone'";
    $result = $conn->query($select);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_no'] = $phone;
        if($email == $row['email'] && $password == $row['password']){
            echo "<script>
            function openpop(){
                alert('User already exist. Please Login!.');
            }
            </script>";
        }
    }
    else{
        $add = "INSERT INTO `registration` (`Name`, `phone`, `email`, `password`) VALUES ('$name', '$phone', '$email', '$password')";        
        mysqli_query($conn, $add);
        $_SESSION['user'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_no'] = $phone;
        if(isset($_SESSION['user'])){
            header('Location: home_page.php'); 
        exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
    <link rel="stylesheet" href="sign-in.css">
</head>
<body>
    <div class="layer"></div>
            <div class="half-img"> 
                <div class="wrapper">
                    <div class="container">
                        <img src="jewel2.jpeg" class="side-img">
                    </div>
                </div>
                <div class="bgtext">
                    <div class="Login">
                        <h1>𝙎𝙞𝙜𝙣 𝙄𝙣</h1>
                        <form action="" method="POST">
                            Name:<br>
                            <input type="text" id="name" name="name" required placeholder="Enter your name"><br>
                            Phone no:<br>
                            <input type="text" id="no" name="no" required placeholder="Enter your number"><br>
                            Email:<br>
                            <input type="text" id="email" name="email" required placeholder="Enter your email" pattern="^[A-Za-z]+.*@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
                            title="Email must start with a letter and be in a valid format."><br>
                            Password:<br>
                            <input type="password" id="pwd" name="pwd" placeholder="Enter your password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$"
                            title="Password must be at least 8 characters long and include uppercase, lowercase, and a special character."><br>
                            <input type="submit" id="submit" onclick="openpop()" name="submit" value="Submit">
                        </form>
                        <p>Already have an account?<span><a href="login.php">Login</a></span></p>
                    </div>
                </div>
            </div>   
    </div>
</body>
</html>