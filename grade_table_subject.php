<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_grades";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['subjectid']) && !empty($_GET['subjectid'])) {
    $subjectid = $_GET['subjectid'];
    $query = "SELECT sg.studentid, s.firstname, s.lastname, c.subjectname, sg.mark, c.subjectid FROM student_marks AS sg JOIN students AS s ON sg.studentid = s.studentid JOIN subjects AS c ON sg.subjectid = c.subjectid WHERE sg.subjectid = " . $subjectid . ";";
    $result = $conn->query($query);
}
if(isset($_GET['subjectid']) && !empty($_GET['subjectid'])) {
    $subjectid = $_GET['subjectid'];
    $query = "SELECT sg.studentid, s.firstname, s.lastname, c.subjectname, sg.mark, c.subjectid FROM student_marks AS sg JOIN students AS s ON sg.studentid = s.studentid JOIN subjects AS c ON sg.subjectid = c.subjectid WHERE sg.subjectid = " . $subjectid . ";";
    $once = $conn->query($query);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Subject Grade</title>
        <link rel="stylesheet" href="table_designCSS.css">
    </head>
    <body style="background-color: gray;">
        <div class="box">
            <?php $title = $once->fetch_assoc() ?>
            <h2 style="color: white;"><?php echo $title['subjectname'] ?>'s Grades</h2>
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Subject</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while ($row = $result->fetch_assoc()) {
                ?>

                <tr>
                    <td><?php echo $row['studentid'] ?></td>
                    <td><?php echo $row['firstname'] ?></td>
                    <td><?php echo $row['lastname'] ?></td>
                    <td><?php echo $row['subjectname'] ?></td>
                    <td><?php echo $row['mark'] ?></td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

<?php
$conn->close();
?>
