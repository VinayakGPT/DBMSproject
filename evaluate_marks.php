<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $exam_id = $_POST['exam_id'];
    $marks = $_POST['marks'];

    $sql = "UPDATE Performance SET marks=$marks WHERE student_id=$student_id AND exam_id=$exam_id";

    if ($conn->query($sql) === TRUE) {
        echo "Marks updated successfully";
    } else {
        echo "Error updating marks: " . $conn->error;
    }

    $conn->close();
}
?>
