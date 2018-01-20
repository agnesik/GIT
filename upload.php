<?php



include_once 'connect.php';

if(isset($_POST['btn-upload'])) {
    session_start();
    $studentId = $_SESSION["id"];
    $subject = $_POST['subject'];


    //Tablica $_FILES zawiera dane pliku wysłanego przez formularz HTML
    $file =  $_FILES['file']['name'];  //Oryginalna nazwa wysyłanego pliku . rand przypisuje nam jakąś wartość do nazwy pliku, plus dodaje "-----" i potem nazwa pliku
    $file_loc = $_FILES['file']['tmp_name']; //Tymczasowa nazwa pliku, który został wysłany na serwer.
    $file_size = $_FILES['file']['size']; //Rozmiar wysyłanego pliku (w bajtach)
    $file_type = $_FILES['file']['type']; //Typ MIME wysyłanego pliku (JPEG, GIF, ...).
    $folder = "uploads/";



    // twirzymy nowy plik, ktorego wielkosc bedzie podawana w kB
    //$new_size = $file_size / 1024;

    // strtolower - zwraca ciąg wejściowy ze znakami zmienionymi na małe litery
    //$new_file_name = strtolower($file);

    // str_replace ('ciąg ktory ma być podmieniony', 'ciag nowy podmieniony-wyrazenie, zmienna podmieoniona)
    //$final_file = str_replace(' ', '-', $new_file_name);

    $sql = "INSERT INTO uploads(file, type, size, student_id, subject_id) VALUES('$file','$file_type','$file_size', $studentId, $subject)  ";
    mysqli_query($con, $sql );




    if (move_uploaded_file($file_loc, $folder . $file)) {


// ?>
        <script>
            window.location.href = 'dodajsprawozdanie.php?sukces';
        </script>
        <?php
    } else {
        ?>
        <script>
            window.location.href = 'dodajsprawozdanie.php?fail';
        </script>
        <?php


    }
}
?>