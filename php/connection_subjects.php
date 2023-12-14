<?php
include 'server_config.php';

$subjectname = $_POST['subjectname'];

$sql = "INSERT INTO subjects (subjectname) VALUES ('$subjectname')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
