<?php

include_once 'connect.php';

$przedmiotId = $_GET['did'];

    mysqli_query($con, "DELETE FROM `subjects` WHERE id = $przedmiotId LIMIT 1;");

    header('Location: subject.php');


?>


