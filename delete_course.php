<?php
include 'connect.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];

    $sql = "DELETE FROM Course WHERE course_id = $course_id";

    if ($conn->query($sql) === TRUE) {
        $message = "Course deleted successfully.";
    } else {
        $message = "Error deleting course: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Course</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Delete Course</h1>
    </header>
    <div class="container">
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <form action="delete_course.php" method="POST">
            <label for="course_id">Course ID:</label>
            <input type="number" id="course_id" name="course_id" required>
            <br>
            <input type="submit" value="Delete Course">
        </form>
    </div>
</body>
</html>
