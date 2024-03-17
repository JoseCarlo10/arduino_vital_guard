<?php
session_start();
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "avg_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Redirect logged-in users to avgweb.php
if (isset($_SESSION['username'])) {
    header("Location: avgweb.php");
    exit();
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Check login credentials (dummy implementation)
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Authentication successful, redirect to avgweb.php
        $_SESSION['username'] = $username;
        header("Location: avgweb.php");
        exit();
    } else {
        // Authentication failed, display error message
        $login_error = "Invalid username or password";
    }
}

// Handle signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    // Handle signup process
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $signup_success = "Signup successful! Please log in.";
    } else {
        $signup_error = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup Form</title>
    <link rel="stylesheet" href="css/userloginsignupstyle.css">
</head>
<body>
    <a href="index.php"><b>User Mode</b></a>
    <div class="container">
        <center><h1 style="cursor: default;">Arduino Vital Guard</h1></center>
        <h3 style="cursor: default;">Login</h2>
        <?php if (isset($login_error)) { ?>
            <p class="error"><?php echo $login_error; ?></p>
        <?php } ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" name="login" value="Login">
        </form>

        <hr>

        <h3 style="cursor: default;">Signup</h2>
        <?php if (isset($signup_success)) { ?>
            <p class="success"><?php echo $signup_success; ?></p>
        <?php } ?>
        <?php if (isset($signup_error)) { ?>
            <p class="error"><?php echo $signup_error; ?></p>
        <?php } ?>
        <form method="post">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" name="signup" value="Signup">
        </form>
    </div>
</body>
</html>
