<?php
session_start();
$adminId = $_SESSION["id"];
include_once 'connect.php';
include "header.php";


?>

<div class="masthead">
    <h4 class="text-muted"></h4><br>
    <nav class="navbar navbar-expand-md navbar-light bg-light rounded mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav text-md-center nav-justified w-100">
                <li class="nav-item ">
                    <a class="nav-link text-dark" href="subject.php"><h4>Dodaj przedmiot<br>Zobacz Sprawozdania</h4></a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link text-dark" href="logout.php"><h4>Wyloguj się</h4></a>
                </li>
            </ul>
        </div>
    </nav>
</div>



</div>


<div class="container text-center">
    <div class="table-responsive text-center">
        <table class="table table-dark table-striped table-bordered">
            <thead>
            <tr>
                <th>Nazwa przedmiotu</th>
                <th>Rok</th>
                <th>Akcja</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT `subjects`.`id`, `subjects`.`name`,  `rok`.`name` AS `rok` FROM subjects LEFT JOIN `rok` ON (`subjects`.`rok` = `rok`.`id`)WHERE `admin_id` = $adminId ORDER BY `subjects`.`id` DESC"; //desc - malejąco wg id i pokazuje ostatnie dodane
            $result_set = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result_set)) {
                echo "<tr>";
                echo "<td><a href=\"sprawozdania.php?p=".$row['id']."\" target=\"_blank\">" . $row['name'] . "</a></td>";
                echo "<td>" . $row['rok'] . "</td>";
                echo "<td><a href='delete.php?did=" . $row['id'] . "'>Usuń przedmiot</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>