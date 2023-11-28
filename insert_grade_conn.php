<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_grades";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
