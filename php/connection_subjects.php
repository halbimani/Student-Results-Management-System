<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_grades";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$subjectid = $_POST['subjectid'];
$subjectname = $_POST['subjectname'];

$sql = "INSERT INTO subjects (subjectid, subjectname) VALUES ('$subjectid', '$subjectname')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
