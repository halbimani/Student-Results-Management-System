<?php
include 'server_config.php';

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
