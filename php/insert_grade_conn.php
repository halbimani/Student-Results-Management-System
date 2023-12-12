<?php 
include 'server_config.php';

$studentid = $_POST['studentid'];
$subjectid = $_POST['subjectid'];
$mark = $_POST['mark'];

$sql = "INSERT INTO student_marks (studentid, subjectid, mark) VALUES ('$studentid', '$subjectid', '$mark')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted succefully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
