<?php
include 'connect.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instructor_id = $_POST['instructor_id'];

    // Delete the instructor from the database
    $sql = "DELETE FROM Instructor WHERE instructor_id = $instructor_id";

    if ($conn->query($sql) === TRUE) {
        $message = "Instructor deleted successfully.";
    } else {
        $message = "Error deleting instructor: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Instructor</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Delete Instructor</h1>
    </header>
    <div class="container">
        <!-- Display success or error message -->
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <!-- Instructor Delete Form -->
        <form action="delete_instructor.php" method="POST">
            <label for="instructor_id">Instructor ID:</label>
            <input type="number" id="instructor_id" name="instructor_id" required>
            <br>
            <input type="submit" value="Delete Instructor">
        </form>
    </div>
</body>
</html>
