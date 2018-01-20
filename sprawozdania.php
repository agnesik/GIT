<?php
session_start();
$adminId = $_SESSION ['id'];
$przedmiotId = $_GET['p'];


include 'connect.php';
include "header.php";

if (isset($_POST['subject_name'])) {
    $name = trim($_POST['subject_name']);
    $sql = "INSERT INTO `zadania`(`id`, `name`)  VALUES (NULL , '" . $name . "')";
    mysqli_query($con, $sql);
}

$result = mysqli_query($con, "SELECT name FROM subjects WHERE id = $przedmiotId LIMIT 1;");
$name = mysqli_fetch_assoc($result);
$subjectName = $name['name'];
?>

<body>

<div class="container" align='center'>
    <h2>Twoje zadania z przedmiotu:  <?= $subjectName ?></h2>



    <div class="table-responsive text-center">
        <table class="table table-dark table-striped table-bordered">
            <thead>
            <tr>
                <th>File Name</th>
            </tr>
            </thead>
            <tbody>

            <?php

            $sql="SELECT `subjects`.`id`,  `zadania`.`id`,  `zadania`.`name`  AS `name` FROM `subjects` LEFT JOIN `zadania` ON (`subjects`.`zadanie_id`=`zadania`.`id`)   WHERE   `admin_id` = $adminId AND `zadanie_id`=$przedmiotId";
            $result_set = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result_set)) {
                echo "<tr>";
                echo "<td><a href=\"zobaczsprawozdania.php?p=".$row['id']."\" target=\"_blank\">" . $row['name'] . "</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
