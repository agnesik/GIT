<?php
session_start();
$subjectId = $_SESSION["id"];
$przedmiotId = $_GET['p'];


include_once 'connect.php';
include "header.php";

if (isset($_POST['subject_name'])) {
    $name = trim($_POST['subject_name']);
    $sql = "INSERT INTO `zadania`(`id`, `name`)  VALUES (NULL , '" . $name . "',)";
    mysqli_query($con, $sql);
}

$result = mysqli_query($con, "SELECT name FROM subjects WHERE id = $przedmiotId LIMIT 1;");
$name = mysqli_fetch_assoc($result);
$subjectName = $name['name'];

?>

<div class="container" align='center'>
    <h2>Twoje pliki z przedmiotu: <?= $subjectName ?></h2>
</div>

<div class="form-group text-center">
    <form action="poziom1.php?p" method="post" enctype="multipart/data">
        <label for="nazwa">Nazwa przedmiotu</label>
        <input class="name" " name="subject_name" type="text" placeholder="">
        <button type="submit">Dodaj</button>

</div>

<?php
$sql = "SELECT * FROM  `zadania`"; //desc - malejąco wg id i pokazuje ostatnie dodane
$result_set = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result_set)) {
    echo "<tr>";
    echo "<td><a href=\"poziom2.php?p=".$row['id']."\" target=\"_blank\">" . $row['name'] . "</a></td>";
    echo "</tr>";
}
?>
</table>
</div>