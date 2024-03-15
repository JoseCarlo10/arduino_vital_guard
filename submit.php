<?php
// Connect to MySQL database
$connection = mysqli_connect("localhost", "root", "", "avg_db");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Extract data from form submission
$name = $_POST['name'];
$model = $_POST['model'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$sex = $_POST['sex'];

// Insert data into the database
$sql = "INSERT INTO users (name, model, age, height, weight, sex) VALUES ('$name', '$model', '$age', '$height', '$weight', '$sex')";

if (mysqli_query($connection, $sql)) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

// Close connection
mysqli_close($connection);
?>
