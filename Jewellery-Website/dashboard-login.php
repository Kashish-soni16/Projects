<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Login</title>
    <link rel="stylesheet" href="dashboard_login.css">
</head>
<body>
    <div class="base">
        <h2>Dashboard Login</h2><br><br>
        <form class="form" method="post" action="dashboard.php">
            <input type="text" name="email" placeholder="EMAIL*" required pattern="kashusoni167@gmail.com"
            title="Access is denied to the user!"><br><br>
            <input type="password" name="pwd" placeholder="PASSWORD*" required pattern="A1b2c3d4#"
            title="Password dosen't match!"><br><br>
            <button>Login</button>
        </form>
    </div>
</body>
</html>