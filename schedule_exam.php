<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connect.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $dept_id = $_POST['dept_id'];
    $exam_date = $_POST['exam_date'];

    $sql = "INSERT INTO Exam (course_id, dept_id, exam_date) VALUES ('$course_id', '$dept_id', '$exam_date')";

    if ($conn->query($sql) === TRUE) {
        $message = "Exam scheduled successfully";
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
    <title>Schedule Exam</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Schedule Exam</h1>
    </header>
    <div class="container">
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <form action="schedule_exam.php" method="POST">
            <label for="course_id">Course ID:</label>
            <input type="number" id="course_id" name="course_id" required>
            <br>
            <label for="dept_id">Department ID:</label>
            <input type="number" id="dept_id" name="dept_id" required>
            <br>
            <label for="exam_date">Exam Date:</label>
            <input type="date" id="exam_date" name="exam_date" required>
            <br>
            <input type="submit" value="Schedule Exam">
        </form>
    </div>
</body>
</html>
