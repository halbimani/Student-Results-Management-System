<?php
include 'server_config.php';

if (isset($_GET['studentid']) && !empty($_GET['studentid'])) {
    $studentid = $_GET['studentid'];
    $query = "SELECT * FROM students WHERE studentid = " . $studentid . ";";
    $result = $conn->query($query);
} else {
    $sql = "select * from students";
    $result = ($conn->query($sql));
}

$row = [];

if ($result->num_rows > 0)
{
    $row = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Students</title>
        <link rel="stylesheet" href="table_designCSS.css">
    </head>
    <body style="background-color: gray;">
        <div class="box">
            <h2 style="color: white;">Students Table</h2>
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Roll Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Email Address</th>
                        <th>Date of Birth</th>
                        <th>Major</th>
                        <th>Blood Group</th>
                        <th>Registration Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($row))
                    foreach($row as $rows)
                    {
                    ?>
                    <tr>
                        <td><a href="grade_table_student.php?studentid=<?= urlencode($rows['studentid']) ?>" style="color: white;">
                            <?php echo $rows['studentid']?>
                        </a></td>
                        <td><?php echo $rows['rollnumber']?></td>
                        <td><?php echo $rows['firstname']?></td>
                        <td><?php echo $rows['lastname']?></td>
                        <td><?php echo $rows['gender']?></td>
                        <td><?php echo $rows['emailaddress']?></td>
                        <td><?php echo $rows['dob']?></td>
                        <td><?php echo $rows['major']?></td>
                        <td><?php echo $rows['bloodgroup']?></td>
                        <td><?php echo $rows['regdate']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

<?php
$conn->close();
?>
