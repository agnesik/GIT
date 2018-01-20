<?php

include_once 'connect.php';

$sprawkoId = $_GET['did'];



    mysqli_query($con, "DELETE FROM `uploads` WHERE id = $sprawkoId LIMIT 1;");

    header('Location: view.php');





?>

