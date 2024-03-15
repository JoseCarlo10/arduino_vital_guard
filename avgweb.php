<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arduino Vital Guard - User Submission</title>
</head>
<body>
    <h1>User Submission Form</h1>
    <form action="submit.php" method="POST">
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
        <button type="submit">Submit</button>
    </form>
</body>
</html>
