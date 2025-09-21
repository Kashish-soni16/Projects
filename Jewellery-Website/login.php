<?PHP
session_start();
$servername = "localhost";
$user = "root";
$password = "";
$db = "signin";

$conn = new mysqli($servername, $user, $password, $db);

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    $select = "SELECT * FROM registration WHERE email = '$email' && password = '$password'";
    $result = $conn->query($select);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if ($password == $row['password'] && $email == $row['email']){
            header('Location: home_page.php');
        }
    }
    else{
        echo "<script>
            function openpop(){
                alert('Email not found. Make sure you have an account!');
            }
        </script>";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="layer"></div>
    <div class="half-img"> 
        <div class="wrapper">
            <div class="container">  
                <img src="jewel3.jpeg" class="side-img">
            </div>
        </div>
        <div class="bgtext">
            <div class="Login">
                <h1>𝘓𝘰𝘨𝘪𝘯</h1>
                <form action="" method="POST">
                    Phone no:<br>
                    <input type="text" id="no" name="no" placeholder="Enter Your Number..." required><br>
                    Email:<br>
                    <input type="text" id="email" name="email" placeholder="Enter Your Email..."><br>
                    Password:<br>
                    <input type="password" id="pwd" name="pwd" placeholder="Enter Your Password..." required><br>
                    <input type="submit" id="submit" onclick="openpop();" name="submit" value="Submit">
                </form>
                <p>Don't have an account?<span><a style="text-decoration: none; color: inherit;" href="sign-in.php">Sign-in</a></span></p>
            </div>
        </div>
    </div>
</body>
</html>