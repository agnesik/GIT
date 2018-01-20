<?php

include_once 'connect.php';

$sprawozdanieId = $_GET['did'];

mysqli_query($con, "DELETE FROM `uploads` WHERE student_id = $sprawozdanieId LIMIT 1;");

header('Location: subject.php');


?>