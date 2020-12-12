<?php
session_start();
$connect = mysqli_connect('localhost',  'root', '', 'laba4');
if (!$connect) {
    die('error');
}

if(!isset($_GET['id']))
    header('Location: lab4.php');

$id_update=strip_tags(mysqli_real_escape_string($connect, $_GET['id']));
$result_update=mysqli_query($connect, "SELECT baza.id, baza.name, baza.author, baza.price, baza.file, years.year FROM baza JOIN years ON years.id=baza.id WHERE baza.id='$id_update' ");
$result_update=mysqli_fetch_assoc($result_update);
print_r($result_update);

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

        <form action="update_valid.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$result_update['id']?>">
            <label style="font-weight: bold">Новое название книги(только буквы)</label>
            <input type='text' name='name' placeholder='Введите название книги' value="<?=$result_update['name']?>">
            <br>
            <label style="font-weight: bold">Новый автор(только буквы)</label>
            <input type='text' name='author' placeholder='Введите автора' value="<?=$result_update['author']?>">
            <br>
            <label style="font-weight: bold">Новая цена(руб, только цифры)</label>
            <input type='text' name='price' placeholder='Введите цену' value="<?=$result_update['price']?>">
            <br>
            <label style="font-weight: bold">Новый год( только цифры)</label>
            <input type='text' name='year' placeholder='Введите year' value="<?=$result_update['year']?>">
            <br>
            <button type='submit'>Изменить</button>
            <br>
            <button><a style="color: black" href="delete.php?id=<?=$result_update['id']?>">Удалить эту запись</a></button>
            <br>
            <button><a style="color: black" href="delete_file.php?id=<?=$result_update['id']?>">Удалить файл</a></button>
            <br>
            <button><a style="color: black" href="update_file.php?id=<?=$result_update['id']?>">Загрузить новый файл</a></button>
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

