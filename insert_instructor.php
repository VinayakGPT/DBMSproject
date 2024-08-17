<?php
include 'connect.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instructor_id = $_POST['instructor_id'];
    $instructor_name = $_POST['instructor_name'];
    $department_id = $_POST['department_id'];
    $is_head = $_POST['is_head'];

    // Insert the instructor into the database
    $sql = "INSERT INTO Instructor (instructor_id, instructor_name, department_id, is_head) VALUES ('$instructor_id', '$instructor_name', '$department_id', '$is_head')";

    if ($conn->query($sql) === TRUE) {
        $message = "New instructor added successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Instructor</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Add Instructor</h1>
    </header>
    <div class="container">
        <!-- Display success or error message -->
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <!-- Instructor Insert Form -->
        <form action="insert_instructor.php" method="POST">
            <label for="instructor_id">Instructor ID:</label>
            <input type="number" id="instructor_id" name="instructor_id" required>
            <br>
            <label for="instructor_name">Instructor Name:</label>
            <input type="text" id="instructor_name" name="instructor_name" required>
            <br>
            <label for="dept_id">Department ID:</label>
            <input type="number" id="department_id" name="department_id" required>
            <br>
            <label for="is_head">Is Head:</label>
            <select id="is_head" name="is_head" required>
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            <br>
            <input type="submit" value="Add Instructor">
        </form>
    </div>
</body>
</html>
