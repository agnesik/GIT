<?php
session_start();
include("header.php");
?>
<div class="masthead">
    <h4 class="text-muted"></h4><br>
    <nav class="navbar navbar-expand-md navbar-light bg-light rounded mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav text-md-center nav-justified w-100">
                <li class="nav-item ">
                    <a class="nav-link text-dark" href="dodajsprawozdanie.php"><h4>Dodaj sprawozdanie</h4></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-dark" href="logout.php"><h4>Wyloguj się</h4></a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="col-sm-12 text-left text-center text-primary"">
    <?php
    echo "<p ><h2>Witaj użytkowniku,  ".$_SESSION['user']."!</p></h2>"; //pokazuje nam wyciagnieta nazwe uzytkownika z bazy
    ?>
    <p class="col-sm-12 text-left text-center text-dark">Udało Ci się poprawnie zalogować, masz pełny dostęp do swojego konta!</p>
</div>




