<?php
session_start();
$przedmiotId = $_GET['p'];
$adminId = $_SESSION ['id'];

include 'connect.php';
include "header.php";

$result = mysqli_query($con, "SELECT name FROM subjects WHERE id = $przedmiotId LIMIT 1;");
$name = mysqli_fetch_assoc($result);
$subjectName = $name['name'];
?>

<body>

    <div class="container" align='center'>
        <h2>Twoje pliki z przedmiotu:  <?= $subjectName ?></h2>
        <div class="table-responsive text-center">
            <table class="table table-dark table-striped table-bordered">
                <thead>
                <tr>
                    <th>File Name</th>
                    <th>File Type</th>
                    <th>Uczeń</th>
                    <th>View</th>
                    <th>Usuń</th>
                </tr>
                </thead>
                <tbody>

            <?php

            $sql="SELECT * FROM uploads LEFT JOIN student ON (uploads.student_id=student.id) WHERE subject_id = $przedmiotId   ORDER BY uploads.id DESC";            $result_set = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result_set)) {
                echo "<tr>";
                echo "<td><?php echo " . $row['id'] . " ?>" . $row['file']."</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['user']." &nbsp  ". $row['pass'] . "</td>";
                echo "<td><a href=\"uploads/".$row['file']."\" target=\"_blank\">Zobacz plik</a></td>";
                echo "<td><a href='delete2.php?did=" . $row['id'] . "'>Usuń przedmiot</a></td>";
                echo "</tr>";

            }
            ?>
        </table>
    </div>
