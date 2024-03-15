<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arduino Vital Guard - Admin Panel</title>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <h2>Submitted User Data:</h2>
    <?php
    // Connect to MySQL database
    $connection = mysqli_connect("localhost", "root", "", "avg_db");

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve data from the database
    $sql = "SELECT * FROM users";
    $result = mysqli_query($connection, $sql);

    // Display data in a table
    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Model</th>
                <th>Age</th>
                <th>Height</th>
                <th>Weight</th>
                <th>Sex</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row['name']."</td>
                <td>".$row['model']."</td>
                <td>".$row['age']."</td>
                <td>".$row['height']."</td>
                <td>".$row['weight']."</td>
                <td>".$row['sex']."</td>
            </tr>";
    }
    echo "</table>";

    // Close connection
    mysqli_close($connection);
    ?>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
