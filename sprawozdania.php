<?php
session_start();
include 'connect.php';
include "header.php";

if (isset($_POST['subject_name'])) {
    $name = trim($_POST['subject_name']);
    $sql = "INSERT INTO `zadania`(`id`, `name`)  VALUES (NULL , '" . $name . "')";
    mysqli_query($con, $sql);
}
?>

<body>

<div class="container" align='center'>
    <h2>Twoje zadania z przedmiotu</h2>

    <div class="form-group text-center">
        <form action="sprawozdania.php?p=" method="post" enctype="multipart/data">
            <label for="nazwa">Nazwa zadania</label>
            <input class="name" name="subject_name" type="text" placeholder="">
            <button type="submit">Dodaj</button>

    </div>

    <div class="table-responsive text-center">
        <table class="table table-dark table-striped table-bordered">
            <thead>
            <tr>
                <th>File Name</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $sql="SELECT * FROM  `zadania` "; //desc - malejąco wg id i pokazuje ostatnie dodane
            $result_set=mysqli_query($con, $sql);
            while($row=mysqli_fetch_array($result_set))
            {
                echo "<tr>";
                echo "<td><?php echo " . $row['id'] . " ?>" . $row['name']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

