<?php
include 'connect.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $department_id = $_POST['department_id'];
    $instructor_id = $_POST['instructor_id'];

    // Insert the course into the database
    $sql = "INSERT INTO Course (course_id, course_name, department_id, instructor_id) VALUES ('$course_id', '$course_name', '$department_id', '$instructor_id')";

    if ($conn->query($sql) === TRUE) {
        $message = "New course added successfully!";
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
    <title>Add Course</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Add Course</h1>
    </header>
    <div class="container">
        <!-- Display success or error message -->
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <!-- Course Insert Form -->
        <form action="insert_course.php" method="POST">
            <label for="course_id">Course ID:</label>
            <input type="number" id="course_id" name="course_id" required>
            <br>
            <label for="course_name">Course Name:</label>
            <input type="text" id="course_name" name="course_name" required>
            <br>
            <label for="dept_id">Department ID:</label>
            <input type="number" id="department_id" name="department_id" required>
            <br>
            <label for="instructor_id">Instructor ID:</label>
            <input type="number" id="instructor_id" name="instructor_id" required>
            <br>
            <input type="submit" value="Add Course">
        </form>
    </div>
</body>
</html>
