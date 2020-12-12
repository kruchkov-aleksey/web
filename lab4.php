<?php
session_start();
$connect = mysqli_connect('localhost',  'root', '', 'laba4');
if (!$connect) {
    die('error');
}

require_once "header.html";
require_once "links.html";

?>
<!DOCTYPE html>
<html lang="en">
<body>
<head>
    <title>Добавление в базу данных</title>
    <link rel="stylesheet" href="style2.css">

</head>
<main>
    <div class='bar'>
        <p class='barcon'><a class='catalhov' href='catalog.php'>Каталог</a></p>
        <p class='barcon'><a class='catalhov' href='magaz.php'>Магазины</a></p>
    </div>


    <div class='fpc'>

        <form action="lab4_valid.php" method="post" enctype="multipart/form-data">
            <label style="font-weight: bold">Название книги(только буквы)</label>
            <input type='text' name='name' placeholder='Введите название книги'>
            <br>
            <label style="font-weight: bold">Автор(только буквы)</label>
            <input type='text' name='author' placeholder='Введите автора'>
            <br>
            <label style="font-weight: bold">Цена(руб, только цифры)</label>
            <input type='text' name='price' placeholder='Введите цену'>
            <br>
            <label style="font-weight: bold">Год(руб, только цифры)</label>
            <input type='text' name='year' placeholder='Введите год'>
            <br>
            <label style="font-weight: bold">Файл</label>
            <input type='file' name='upload'>
            <br>
            <button type='submit'>Добавить в базу</button>
            <br>
            <?php


            if (isset($_SESSION['msg'])) {

                echo '<p style="border: 2px solid #00bfff;border-radius: 3px;padding: 5px; font-family: Roboto Slab, serif; text-align: center;font-weight: bold; margin-top: 4px;">' . $_SESSION['msg'] . '</p>' ;
            }
            unset($_SESSION['msg']);


            ?>
        </form>

    </div>
    
<?php
    require_once "footer.html";
?>

</main>

</body>
</html>
