<?php

session_start();

//niszczymy sesje, zebysmy sie mogli zalogowac na inne konto i przekierowujemy uzytkownika na strone glowna
session_unset();

header('Location:index.php');

?>