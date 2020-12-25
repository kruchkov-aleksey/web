<?php
session_start();
$connect1 = mysqli_connect('localhost',  'root', '', 'laba4');

require_once "header.html";
require_once "links.html";




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="style2.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
            async defer>
    </script>
</head>

<body>

<main>
    <div class='bar'>
        <p class='barcon'><a class='catalhov' href='catalog.php'>Каталог</a></p>
        <p class='barcon'><a class='catalhov' href='magaz.php'>Магазины</a></p>
    </div>

    <div class='fpc'>

        <form action="proverka_reg.php" method="post" enctype="multipart/form-data">
            <label style="font-weight: bold">Логин (обязательно)</label>
            <input type='text' name='login' placeholder='Ваш логин (более трёх символов)'>
            <br>
            <label style="font-weight: bold">Пароль (обязательно)</label>
            <input type='text' name='password' placeholder='Ваш пароль (более трёх символов)'>
            <br>
            <label style="font-weight: bold">Подтвердите пароль</label>
            <input type='text' name='password_again' placeholder='Введите пароль ещё раз'>
            <br>
            <label style="font-weight: bold">Аватар (не обязательно)</label>
            <input type='file' name='upload'>
            <br>
            <label style="font-weight: bold">Информация о себе (не обязательно)</label>
            <input type='text' name='inf' placeholder='Введите что нибудь о себе'>
            <br>
            <div class="g-recaptcha" data-sitekey="6Le8GxAaAAAAADx-xNdcywHa54hFMsFDM1-0LuBi"></div>
            <br/>
            <button type='submit'>Зарегестрироваться</button>
            <?php


            if (isset($_SESSION['message'])) {

                echo '<p style="border: 2px solid #00bfff;border-radius: 3px;padding: 5px; font-family: Roboto Slab, serif; text-align: center;font-weight: bold; margin-top: 4px;">' . $_SESSION['message'] . '</p>' ;
            }
            unset($_SESSION['message']);


            ?>
        </form>
    </div>

</main>

<?php
require_once "footer.html";
?>
</body>
</html>



