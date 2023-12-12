<?php
include 'server_config.php';

$studentid = $_POST['studentid'];
$rollnumber = $_POST['rollnumber'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$emailaddress = $_POST['emailaddress'];
$dob = $_POST['dob'];
$major = $_POST['major'];
$bloodgroup = $_POST['bloodgroup'];
$regdate = $_POST['regdate'];

$sql = "INSERT INTO students (studentid, rollnumber, firstname, lastname, gender, emailaddress, dob, major, bloodgroup, regdate) VALUES ('$studentid', '$rollnumber', '$firstname', '$lastname', '$gender', '$emailaddress', '$dob', '$major', '$bloodgroup', '$regdate')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted succefully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error; 
}

$conn->close();
?>
