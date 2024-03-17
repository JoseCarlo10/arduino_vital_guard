<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $sql = "INSERT INTO arduino_specs (name, model, age, height, weight, sex) VALUES ('$name', '$model', '$age', '$height', '$weight', '$sex')";

    if (mysqli_query($connection, $sql)) {
        echo '<script>alert("Data added successfully");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    // Close connection
    mysqli_close($connection);
    exit; // Stop further execution after form submission
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arduino Vital Guard - User Submission</title>
    <link rel="stylesheet" href="css/avgwebstyle.css">
</head>
<body>
    <div class="arduino-form-container">
        <a href="userlogout.php">Logout</a>
        <h1>User Submission Form</h1>
        <form id="submission-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="model">Model:</label>
            <input type="text" id="model" name="model" required><br>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required><br>
            <label for="height">Height:</label>
            <input type="number" id="height" name="height" required><br>
            <label for="weight">Weight:</label>
            <input type="number" id="weight" name="weight" required><br>
            <label for="sex">Sex:</label>
            <input type="text" id="sex" name="sex" required><br>
            <button type="button" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;" onclick="submitForm()">Submit</button>
        </form>
    </div>

    <script>
        function submitForm() {
        var name = document.getElementById("name").value;
        var model = document.getElementById("model").value;
        var age = document.getElementById("age").value;
        var height = document.getElementById("height").value;
        var weight = document.getElementById("weight").value;
        var sex = document.getElementById("sex").value;

        // Check if required fields are empty
        if (name === '' || model === '' || age === '' || height === '' || weight === '' || sex === '') {
            alert("Please fill out all required fields");
            return; // Stop further execution
        }

        // All required fields are filled, proceed with form submission
        var form = document.getElementById("submission-form");
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "", true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert("Data added successfully");
                window.location.reload();
            }
        };

        xhr.send(formData);
}

    </script>
</body>
</html>
