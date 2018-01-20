<?php


$con= mysqli_connect("localhost","root","","logowanie");

// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
