<?php
// Include the database connection
include 'connect.php';

// Initialize an empty message variable
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the department id and name from the form
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];

    // Insert the department into the database
    $sql = "INSERT INTO Department (department_id, department_name) VALUES ('$department_id', '$department_name')";

    if ($conn->query($sql) === TRUE) {
        $message = "New department added successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Department</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Insert Department</h1>
    </header>
    <div class="container">
        <!-- Display success or error message -->
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <!-- Department Insert Form -->
        <form action="insert_department.php" method="POST">
            <label for="department_id">Department ID:</label>
            <input type="number" id="department_id" name="department_id" required>
            <br>
            <label for="department_name">Department Name:</label>
            <input type="text" id="department_name" name="department_name" required>
            <br>
            <input type="submit" value="Insert Department">
        </form>
    </div>
</body>
</html>
