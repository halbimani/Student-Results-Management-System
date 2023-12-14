<?php 
include 'server_config.php';

if (isset($_GET['subjectid']) && !empty($_GET['subjectid'])) {
    $subjectid = $_GET['subjectid'];
    $query = "SELECT subjectid, subjectname FROM subjects WHERE subjectid = " . $subjectid . ";";
    $result = $conn->query($query);
} else {
    $sql = "select * from subjects";
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
        <title>Subjects</title>
        <link rel="stylesheet" href="..\css\table_designCSS.css">
    </head>
    <body>
        <div style="max-width: 600px;" class="container">
        <h2>Subjects Table</h2>
            <table>
                <thead>
                    <tr>
                        <th>Subject ID</th>
                        <th>Subject Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($row))
                    foreach($row as $rows)
                    {
                    ?>
                    <tr>
                        <td><a href="grade_table_subject.php?subjectid=<?php echo $rows['subjectid'] ?>" style="color: white;">
                            <?php echo $rows['subjectid']?>
                        </a></td>
                        <td><?php echo $rows['subjectname']?></td>
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
