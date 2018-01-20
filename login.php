<?php
session_start();

if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))


{
    header('Location:student.php');
    exit(); //w tej lini konczymy przetwarzanie i od razi przechodimy do pliku student.php
}

if ((isset($_SESSION['zalogowany2'])) && ($_SESSION['zalogowany2']==true))


{
    header('Location:admin.php');
    exit(); //w tej lini konczymy przetwarzanie i od razi przechodimy do pliku student.php
}
include("header.php");
include("navbar.php");

?>



<div class="row marketing">
    <div class="col-lg-6">
        <div class="card card-container">
            <form action="zalogujstudent.php" method="post">
                <h4 class="text-center">Logowanie jako student</h4>
                <img class="profile-img-card" src="student_128.png?sz=120" alt="" />
                <!-- <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" /> -->
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin">
                    <input type="text" name="login" class="form-control" placeholder="Login" required>
                    <input type="password" name="haslo" class="form-control" placeholder="Hasło" required>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Zaloguj</button>
                </form><!-- /form -->
            </form>

            <?php
            if(isset($_SESSION['blad'])) echo $_SESSION['blad'];  //
            ?>

        </div><!-- /card-container -->
    </div>





    <div class="col-lg-6">
        <div class="card card-container">
            <form action="zalogujadmin.php" method="post"form>
            <h4 class="text-center">Logowanie jako wykładowca</h4>
            <img class="profile-img-card" src="professor_128.png?sz=120" alt="" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <input type="text" name="login2" class="form-control" placeholder="Login" required>
                <input type="password" name="haslo2" class="form-control" placeholder="Hasło" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Zaloguj</button>
            </form><!-- /form -->
            </form>

            <?php
            if(isset($_SESSION['blad2'])) echo $_SESSION['blad2'];  //
            ?>

        </div><!-- /card-container -->
    </div>
</div>


<?php
include("footer.php");
?>

<style>

    .card-container.card {
        max-width: 350px;
        padding: 15px 40px 40px 40px;
        height: 450px;
    }

    .card-container.card h4 {
        margin-bottom: 40px;
    }

    .btn {
        font-weight: 700;
        height: 36px;
        -moz-user-select: none;
        -webkit-user-select: none;
        user-select: none;
        cursor: default;
    }

    /*
     * Card component
     */
    .card {
        background-color: #F7F7F7;
        /* just in case there no content*/
        padding: 20px 25px 30px;
        margin: 0 auto 25px;
        margin-top: 50px;
        /* shadows and rounded borders */
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }

    .profile-img-card {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }

    /*
     * Form styles
     */
    .profile-name-card {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        margin: 10px 0 0;
        min-height: 1em;
    }



    .form-signin #inputLogin,
    .form-signin #inputPassword {
        direction: ltr;
        height: 44px;
        font-size: 16px;
    }

    .form-signin input[type=text],
    .form-signin input[type=password],
    .form-signin button {
        width: 100%;
        display: block;
        margin-bottom: 10px;
        z-index: 1;
        position: relative;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin .form-control:focus {
        border-color: rgb(104, 145, 162);
        outline: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    }

    .btn.btn-signin {
        /*background-color: #4d90fe; */
        background-color: rgb(104, 145, 162);
        /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
        padding: 0px;
        font-weight: 700;
        font-size: 14px;
        height: 36px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        border: none;
        -o-transition: all 0.218s;
        -moz-transition: all 0.218s;
        -webkit-transition: all 0.218s;
        transition: all 0.218s;
    }

    .btn.btn-signin:hover,
    .btn.btn-signin:active,
    .btn.btn-signin:focus {
        background-color: rgb(12, 97, 33);
    }

</style>