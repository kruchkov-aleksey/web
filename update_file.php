<?php
session_start();
$connect = mysqli_connect('localhost',  'root', '', 'laba4');
if (!$connect) {
    die('error');
}

$id_update=strip_tags(mysqli_real_escape_string($connect, $_GET['id']));
$result_update=mysqli_query($connect, "SELECT * FROM baza WHERE id='$id_update' ");
$result_update=mysqli_fetch_assoc($result_update);
//print_r($result_update);

require_once "header.html";
require_once "links.html";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Добавление в базу данных</title>
    <link rel="stylesheet" href="style2.css">

</head>

<body>

<main>
    <div class='bar'>
        <p class='barcon'><a class='catalhov' href='catalog.php'>Каталог</a></p>
        <p class='barcon'><a class='catalhov' href='magaz.php'>Магазины</a></p>
    </div>


    <div class='fpc'>

        <form action="update_file_valid.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$result_update['id']?>">
            <input type='file' name='upload'>
            <br>
            <button type='submit'>Изменить</button>
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

