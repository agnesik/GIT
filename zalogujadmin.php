<?php

session_start();  //funckaj ta pozwala dokumentowi korzystac z sesji

//require wymaga pliku w kodzie

require_once "connect.php";

//otwieramy połącznie z bazą danych

$polaczenie = @new mysqli("localhost","root","","logowanie");

//@ wycisza php, nie będzie wyrzucać nam informacji o błędzie

//sprawdzamy czy udalo nam się nawiązać połącznie z bazą

if ($polaczenie->connect_errno!=0)     //connect erno = 0 oznacza iz ostatnio podjeta proba polaczenia się a bazą zakonczyla sie sukcesem

{
    echo "Error:".$polaczenie->connect_errno;
}
else
{
    $login2 = $_POST['login2'];
    $haslo2 = $_POST ['haslo2'];

    $sql = "SELECT * FROM `admin` WHERE user='$login2' AND pass='$haslo2'"
    ;
//wybierz z tabeli ... zmienne php bedace lancuchami zamykamy w apostrofach

    if ($rezultat = @$polaczenie->query($sql))   //bedziemy wyciagac dane z tabeli, jesli bedzie blad przyjmie wartosc false
    {
        $ilu_userow = $rezultat->num_rows;  //sprawdzamy ile rekordow zwrocila baza- liczba zwroconych wierszy
        if($ilu_userow>0)
        {
            $_SESSION['zalogowany2']=true; //flaga-zmienna ktora ustawiamy jako symbol zajscia czegos w kodzie, umozliwia przekazywanie zmiennych pomiedzy stronami z uzyciem globalnej tablicy asocjacyjnej
            //jeśli komus udalo sie zalogowac to bedzie istniec w sesji zmienna 'zalogowany' i wartosc = true
            $wiersz = $rezultat->fetch_assoc();   // fetch uwtorzony nam tablice gdzie beda wkladane zmienne o takich samych nazwach jak nazwach kolumn w bazie

            $_SESSION['id']=$wiersz['id'];
            $_SESSION['user'] = $wiersz ['user'];

            unset($_SESSION['blad2']); //jesli udalo nam sie zalogowac to usuniemy z sesji zmienna blad, unset - wywal, usun

            $rezultat->close();   //zwolni pamiec zeby pozbyc sie niepotrzebnych rezultatow zapytania
            header('Location:admin.php'); //pobrane dane chcemy wyswietlic w pliku stunt.php - przekierowujemy

        }else {   //nie ma nikogo w bazie o tym loginie i hasle, gdy poda nieprawidlowe dane,

            $_SESSION['blad2'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>'; //ustawiamy info o bledzie i przenosimy do forumlarza logowania
            header('Location:login.php');



        }
    }

    $polaczenie->close(); //zamykamy polaczenie
}

?>
