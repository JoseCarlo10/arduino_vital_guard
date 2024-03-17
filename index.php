<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arduino Vital Guard - Login</title>
    <link rel="stylesheet" href="css/indexstyle.css">
</head>
<body>
    <a href="userloginsignup.php"><b>Admin Mode</b></a>
    <div class="login-container">
        <h1 style="cursor: default;">Arduino Vital Guard</h1>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
