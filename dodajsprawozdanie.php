<?php
session_start();

include_once 'connect.php';
include "header.php";
include "navbar2.php";

$studentId = $_SESSION["id"];
$studentRok = $_SESSION["rok"];
?>

<body>

<div class="container" align='center'>
    <div class="col-sm-12 text-left">
        <div id="body" align="center">

            <?php
            if (isset($_GET['sukces'])) {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="dodajsprawozdanie.php" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Plik został dodany</strong><br/><a href="view.php" class="alert-link">Zobacz plik</a>.
                </div


                <?php
            } else if (isset($_GET['fail'])) {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <a href="dodajsprawozdanie.php" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Wystąpił problem, spróbuj jeszcze raz</strong><br/>
                </div

                <?php
            }
            ?>

        </div>
    </div>

    <div class="table-responsive text-center">
        <table class="table table-dark table-striped table-bordered">
            <thead>
            <tr>
                <th class="text-center">Nazwa przedmiotu</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM `subjects` WHERE `rok` = $studentRok ORDER BY id DESC"; //desc - malejąco wg id i pokazuje ostatnie dodane
            $result_set = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result_set))
            {
            ?>

            <tbody>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <!--metoda multipart nam na przekazanie pliku na serwer-->
                        <input type="file" name="file"/>
                        <input type="hidden" name="subject" value="<?php echo $row['id'] ?>"/>
                        <!-- przesylane metoda 'post' w pliku 'upload.php' $_FILES['file']['name']-->
                        <button type="submit" name="btn-upload">Dodaj</button>
                        <!--name=upload - definiujemy go w pliku 'upload.php' i wysyłamy metoda POST (ponieawaz jest wiele plikow)zeby-->
                    </form>
                </td>
            </tr>
            </tbody>

            <?php
            }
            ?>
        </table>
    </div>
</div>

</body>

