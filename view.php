<?php
session_start();
$studentId = $_SESSION["id"];
$studentRok = $_SESSION["rok"];



include 'connect.php';
include "header.php";
?>

<body>

<div class="container" align='center'>
    <h2>Twoje pliki</h2>
    <p><a href="dodajsprawozdanie.php" class="btn btn-info" role="button">Dodaj nowy plik</a></p>
    <div class="table-responsive text-center">
        <table class="table table-dark table-striped table-bordered">
            <thead>
            <tr>
                <th>File Name</th>
                <th>File Type</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>

        <?php
        $sql="SELECT * FROM `uploads` INNER JOIN subjects ON uploads.subject_id=subjects.id WHERE student_id=$studentId AND rok=$studentRok"; //desc - malejąco wg id i pokazuje ostatnie dodane
        $result_set=mysqli_query($con, $sql);
        while($row=mysqli_fetch_array($result_set))
        {
        echo "<tr>";
        echo "<td> <?php echo " . $row['id'] . " ?> " . $row['file'] . " </td>";
        echo "<td>" . $row['type'] . "</td>";
        echo "<td><a href='delete1.php?did=" . $row['id'] . "'>Usuń sprawozdanie</a></td>";
        echo "</tr>";
        }
        ?>
        </table>
    </div>
</div>
</body>
