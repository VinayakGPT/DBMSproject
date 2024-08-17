<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_id = $_POST['department_id'];

    // Delete the department
    $sql = "DELETE FROM Department WHERE department_id = $department_id";

    if ($conn->query($sql) === TRUE) {
        echo "Department deleted successfully.";

        // Reset auto-increment to the next available ID
        $reset_ai_sql = "ALTER TABLE Department AUTO_INCREMENT = (SELECT MAX(department_id) FROM Department) + 1";
        $conn->query($reset_ai_sql);
    } else {
        echo "Error deleting department: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Department</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>Delete Department</h1>
    </header>
    <div class="container">
        <!-- Delete Department Form -->
        <form action="delete_department.php" method="POST">
            <label for="department_id">Department ID:</label>
            <input type="number" id="department_id" name="department_id" required>
            <input type="submit" value="Delete Department">
        </form>
    </div>
</body>
</html>
