<?php
include 'server_config.php';

if (isset($_GET['studentid']) && !empty($_GET['studentid'])) {
    $studentid = $_GET['studentid'];
    $query = "SELECT sg.studentid, s.firstname, s.lastname, c.subjectname, sg.mark FROM student_marks AS sg JOIN students AS s ON sg.studentid = s.studentid JOIN subjects AS c ON sg.subjectid = c.subjectid WHERE sg.studentid = " . $studentid . ";";
    $result = $conn->query($query);
}
if (isset($_GET['studentid']) && !empty($_GET['studentid'])) {
    $studentid = $_GET['studentid'];
    $query = "SELECT sg.studentid, s.firstname, s.lastname, c.subjectname, sg.mark FROM student_marks AS sg JOIN students AS s ON sg.studentid = s.studentid JOIN subjects AS c ON sg.subjectid = c.subjectid WHERE sg.studentid = " . $studentid . ";";
    $once = $conn->query($query);
}

// $query = "SELECT sg.studentid, s.firstname, s.lastname, c.subjectname, sg.mark FROM student_marks AS sg JOIN students AS s ON sg.studentid = s.studentid JOIN subjects AS c ON sg.subjectid = c.subjectid WHERE sg.studentid = '1920'";
// $result = $conn->query($query);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Grade</title>
        <link rel="stylesheet" href="..\css\table_designCSS.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    </head>
    <body>
        <div style="max-width: 800px;" class="container" id="content">
            <?php $title = $once->fetch_assoc() ?>
            <h2 ><?php echo $title['firstname'] . ' ' . $title['lastname'] ?>'s Grades</h2>
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
            <br>
            <button class="print" onclick="generatePDF()" data-html2canvas-ignore="true">Generate PDF</button>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
        <script>
            function generatePDF() {
                const doc = new jsPDF();
                const content = document.getElementById('content');
                html2canvas(content, { scale: 2 }).then(canvas => {
                    const imgData = canvas.toDataURL('image/png');
                    doc.addImage(imgData, 'PNG', 10, 10, 180, 0);
                    doc.save('student_grade.pdf');
                });
            }
        </script>
    </body>
</html>

<?php
$conn->close();
?>
